<?php

namespace Tests\Unit\Models;

use App\Models\Contact;
use Tests\TestCase;

class ContactTest extends TestCase
{
    /**
     * Test Model Configuration
     */
    public function testModelConfiguration()
    {
        $model = new Contact();

        $checkHasColumns = [
            'email',
            'name',
            'content',
        ];
        
        $this->assertEquals($checkHasColumns, $model->getFillable());
    }
}
