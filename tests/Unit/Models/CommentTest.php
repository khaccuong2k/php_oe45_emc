<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testContainsValidFillableProperties()
    {
        $m = new Comment();
        $this->assertEquals(['user_id',
        'comment_parent_id',
        'product_id',
        'content'], $m->getFillable());
    }

    public function testTableName()
    {
        $m = new Comment();
        $this->assertEquals('comments', $m->getTable());
    }

    public function testPropertiesHaveValidValues()
    {
        Comment::unguard();
        $initial = [
            'user_id' => 2,
            'product_id' => 1,
            'comment_parent_id' => null,
            'content' => 'best product that i seen',
        ];
        $m = new Comment($initial);
        $this->assertEquals($initial, $m->attributesToArray());
    }

    public function testUserRelation()
    {
        $m = new Comment();
        $relation = $m->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('id', $relation->getOwnerKeyName());
        $this->assertEquals('user_id', $relation->getForeignKeyName());
    }

    public function testReplyRelation()
    {
        $m = new Comment();
        $relation = $m->reply();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Comment::class, $relation->getRelated());
        $this->assertEquals('comment_parent_id', $relation->getForeignKeyName());
    }

    public function testProductRelation()
    {
        $m = new Comment();
        $relation = $m->product();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertInstanceOf(Product::class, $relation->getRelated());
        $this->assertEquals('product_id', $relation->getForeignKeyName());
    }
}
