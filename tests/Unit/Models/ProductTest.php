<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testContainsValidFillableProperties()
    {
        $m = new Product();
        $this->assertEquals(
            [
                'name',
                'thumbnail',
                'content',
                'short_description',
                'quantity',
                'views',
                'price',
                'number_of_vote_submissions',
                'total_vote',
                'sold'
            ],
            $m->getFillable()
        );
    }

    public function testTableName()
    {
        $m = new Product();
        $this->assertEquals('products', $m->getTable());
    }

    public function testCommentsRelation()
    {
        $m = new Product();
        $relation = $m->comments();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertInstanceOf(Comment::class, $relation->getRelated());
        $this->assertEquals('product_id', $relation->getForeignKeyName());
    }

    public function testCategoriesRelation()
    {
        $m = new Product();
        $relation = $m->categories();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf(Category::class, $relation->getRelated());
        $this->assertEquals('category_id', $relation->getRelatedPivotKeyName());
        $this->assertEquals('product_id', $relation->getForeignPivotKeyName());
    }
}
