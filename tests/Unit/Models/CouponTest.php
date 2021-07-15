<?php

namespace Tests\Unit\Models;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class CouponTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new Coupon();

        $checkHasColumns = [
            'name',
            'start_date',
            'end_date',
            'percent_discount',
            'quantity',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }

    /**
     * Test model Coupon have relationship belongsToMany with mode User
     */
    public function testCouponBelongsToManyUserRelationship()
    {
        $model = new Coupon();
        
        $relation = $model->users();

        $this->assertInstanceOf(BelongsToMany::class, $relation);

        $this->assertEquals('coupon_detail.coupon_id', $relation->getQualifiedForeignPivotKeyName());

        $this->assertEquals('coupon_detail.user_id', $relation->getQualifiedRelatedPivotKeyName());
    }
}
