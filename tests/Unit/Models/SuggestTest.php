<?php

namespace Tests\Unit\Models;

use App\Models\Suggest;
use Tests\TestCase;

class SuggestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testContainsValidFillableProperties()
    {
        $m = new Suggest();
        $this->assertEquals([
            'content',
            'user_id',
            'status',
        ], $m->getFillable());
    }

    public function testTableName()
    {
        $m = new Suggest();
        $this->assertEquals('suggests', $m->getTable());
    }

    public function testPropertiesHaveValidValues()
    {
        Suggest::unguard();
        $initial = [
            'user_id' => 2,
            'content' => 'i wanna suggest a book has name norwegian woods',
            'status' => 0,
        ];
        $m = new Suggest($initial);
        $this->assertEquals($initial, $m->attributesToArray());
    }
}
