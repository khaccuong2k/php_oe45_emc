<?php

namespace Tests\Unit\Views;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use WithoutMiddleware;

    public function testIndexViewCategory()
    {
        $this->withoutMiddleware();
        
        $response = $this->get('/admin/categories');

        $response->assertStatus(302);
    }
}
