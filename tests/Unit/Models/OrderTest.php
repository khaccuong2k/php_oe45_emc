<?php

namespace Tests\Unit\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new Order();

        $checkHasColumns = [
            'user_id',
            'type_payment',
            'status',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }

    /**
     * Test model Order have relationship hasMany with model OrderDetail
     */
    public function testOrderHasManyOrderDetailRelationship()
    {
        $model = new Order();

        $relation = $model->orderDetail();

        $this->assertInstanceOf(HasMany::class, $relation);

        $this->assertEquals('order_id', $relation->getForeignKeyName());

        $this->assertEquals('orders.id', $relation->getQualifiedParentKeyName());
    }

    /**
     * Test model Order have relationship hasManyThrough with model Product
     */
    public function testOrderHasManyThroughProductRelationship()
    {
        $model = new Order();
        
        $relation = $model->products();

        $this->assertInstanceOf(HasManyThrough::class, $relation);

        $this->assertEquals('id', $relation->getForeignKeyName());

        $this->assertEquals('order_detail.product_id', $relation->getQualifiedParentKeyName());
    }
}
