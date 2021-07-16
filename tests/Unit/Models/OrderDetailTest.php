<?php

namespace Tests\Unit\Models;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class OrderDetailTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new OrderDetail();

        $checkHasColumns = [
            'order_id',
            'product_id',
            'quantity',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }

    /**
     * Test model OrderDetail have relationship belongsTo with model Product
     */
    public function testOrderDetailBelongsToProductRelationship()
    {
        $model = new OrderDetail();

        $relation = $model->product();

        $this->assertInstanceOf(HasMany::class, $relation);

        $this->assertEquals('order_detail.product_id', $relation->getQualifiedParentKeyName());

        $this->assertEquals('id', $relation->getForeignKeyName());
    }

    /**
     * Test model OrderDetail have relationship belongsTo with model Order
     */
    public function testOrderDetailBelongsToOrderRelationship()
    {
        $model = new OrderDetail();
        
        $relation = $model->order();

        $this->assertInstanceOf(BelongsTo::class, $relation);

        $this->assertEquals('id', $relation->getOwnerKeyName());

        $this->assertEquals('order_id', $relation->getForeignKeyName());
    }
}
