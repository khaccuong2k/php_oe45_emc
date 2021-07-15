<?php

namespace Tests\Unit\Models;

use App\Models\Event;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new Event();

        $checkHasColumns = [
            'start_date',
            'end_date',
            'percent_discount',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }
}
