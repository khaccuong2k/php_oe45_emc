<?php

namespace Tests\Unit\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new User();

        $checkHasColumns = [
            'username',
            'email',
            'password',
            'fullname',
            'avatar',
            'address',
            'phone',
            'role_id',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }

    /**
     * Test model User have relationship belongsTo with model Role
     */
    public function testUserBelongsToRoleRelationship()
    {
        $model = new User();

        $relation = $model->role();

        $this->assertInstanceOf(BelongsTo::class, $relation);

        $this->assertEquals('id', $relation->getOwnerKeyName());

        $this->assertEquals('role_id', $relation->getForeignKeyName());
    }

    /**
     * Test model User have relationship hasMany with model Suggest
     */
    public function testUserHasManySuggestRelationship()
    {
        $model = new User();

        $relation = $model->suggests();

        $this->assertInstanceOf(HasMany::class, $relation);

        $this->assertEquals('user_id', $relation->getForeignKeyName());

        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    /**
     * Test model User have relationship hasMany with model Comment
     */
    public function testUserHasManyCommentRelationship()
    {
        $model = new User();

        $relation = $model->comments();

        $this->assertInstanceOf(HasMany::class, $relation);

        $this->assertEquals('user_id', $relation->getForeignKeyName());

        $this->assertEquals('id', $relation->getLocalKeyName());
    }

    /**
     * Test model User have relationship belongsToMany with model Coupon
     */
    public function testUserBelongsToManyCouponRelationship()
    {
        $model = new User();

        $relation = $model->coupons();

        $this->assertInstanceOf(BelongsToMany::class, $relation);

        $this->assertEquals('coupon_detail.user_id', $relation->getQualifiedForeignPivotKeyName());

        $this->assertEquals('coupon_detail.coupon_id', $relation->getQualifiedRelatedPivotKeyName());
    }

    /**
     * Test model User have relationship hasMany with model Order
     */
    public function testUserHasManyOrderRelationship()
    {
        $model = new User();
        
        $relation = $model->orders();

        $this->assertInstanceOf(HasMany::class, $relation);

        $this->assertEquals('user_id', $relation->getForeignKeyName());

        $this->assertEquals('id', $relation->getLocalKeyName());
    }
}
