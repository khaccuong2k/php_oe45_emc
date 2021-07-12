<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\Admin\OrderController;
use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Mockery as m;
use Tests\TestCase;

class OrderControllerTest extends TestCase
{
    protected $mock;

    public function setUp(): void
    {
        // We have no interest in testing Eloquent
        $this->mock = m::mock(OrderRepositoryInterface::class);

        parent::setUp();
    }

    public function tearDown(): void
    {
        m::close();

        parent::tearDown();
    }

    public function testIndex()
    {
        $this->mock
            ->shouldReceive('all')
            ->once()
            ->andReturn(new Collection);

        $order = new OrderController($this->mock);

        $result = $order->index();
        
        $data = $result->getData();
        $this->assertEquals('admin.order.index', $result->getName());
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $data['orders']);
    }

    public function testShow()
    {
        $this->mock
            ->shouldReceive('findOrFail')
            ->with($id = 1)
            ->once()
            ->andReturn(new Order());

        $order = new OrderController($this->mock);

        $result = $order->show($id = 1);
        
        $data = $result->getData();
        $this->assertEquals('admin.order.detail', $result->getName());
        $this->assertInstanceOf('\Illuminate\Database\Eloquent\Model', $data['detailOrder']);
    }
}
