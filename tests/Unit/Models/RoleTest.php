<?php

namespace Tests\Unit\Models;

use App\Models\Role;
use Tests\TestCase;

class RoleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testContainsValidFillableProperties()
    {
        $m = new Role();
        $this->assertEquals([
            'name',
        ], $m->getFillable());
    }

    public function testTableName()
    {
        $m = new Role();
        $this->assertEquals('roles', $m->getTable());
    }

    public function testPropertiesHaveValidValues()
    {
        Role::unguard();
        $initial = [
            'name' => 'manager',
        ];
        $m = new Role($initial);
        $this->assertEquals($initial, $m->attributesToArray());
    }
}
