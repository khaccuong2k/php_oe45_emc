<?php

namespace Tests\Unit\Models;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testContainsValidFillableProperties()
    {
        $m = new Tag();
        $this->assertEquals(['name'], $m->getFillable());
    }

    public function testTableName()
    {
        $m = new Tag();
        $this->assertEquals('tags', $m->getTable());
    }

    public function testPropertiesHaveValidValues()
    {
        Tag::unguard();
        $initial = [
            'name' => 'rung na uy',
        ];
        $m = new Tag($initial);
        $this->assertEquals($initial, $m->attributesToArray());
    }


    public function testProductsRelation()
    {
        $m = new Tag();
        $relation = $m->productstag();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertInstanceOf(Product::class, $relation->getRelated());
        $this->assertEquals('product_id', $relation->getRelatedPivotKeyName());
        $this->assertEquals('tag_id', $relation->getForeignPivotKeyName());
    }
}
