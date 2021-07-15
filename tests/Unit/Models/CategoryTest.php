<?php

namespace Tests\Unit\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new Category();

        $checkHasColumns = [
            'name',
            'thumbnail',
            'slug',
            'description',
            'parent_id',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }

    /**
     * Test model Category have relationship belongsToMany with model Product
     */
    public function testCategoryBelongsToManyProductRelationship()
    {
        $model = new Category();

        $relation = $model->products();

        $this->assertInstanceOf(BelongsToMany::class, $relation);

        $this->assertEquals('category_product.category_id', $relation->getQualifiedForeignPivotKeyName());

        $this->assertEquals('category_product.product_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    /**
     * Test model Category have relationship hasMany with model Category
     */
    public function testCategoryHasManySubCategoryRelationship()
    {
        $model = new Category();
        
        $relation = $model->subCategories();

        $this->assertInstanceOf(HasMany::class, $relation);

        $this->assertEquals('parent_id', $relation->getForeignKeyName());

        $this->assertEquals('categories.id', $relation->getQualifiedParentKeyName());
    }

    /**
     * Test model Category have relationship belongsTo with model Category
     */
    public function testCategoryBelongsToParentCategoryRelationship()
    {
        $model = new Category();

        $relation = $model->parentCategory();

        $this->assertInstanceOf(BelongsTo::class, $relation);

        $this->assertEquals('id', $relation->getOwnerKeyName());

        $this->assertEquals('parent_id', $relation->getForeignKeyName());
    }
}
