<?php

namespace Tests\Unit\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\UserController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Http\RedirectResponse;
use Mockery as m;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $categoryMock;

    public function setUp(): void
    {
        $this->categoryMock = m::mock(CategoryRepositoryInterface::class);
        parent::setUp();
    }

    public function tearDown(): void
    {
        m::close();
        parent::tearDown();
    }

    public function testIndexFuntion()
    {
        $this->categoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn(new Collection);
        $category = new CategoryController($this->categoryMock);
        $result = $category->index();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.category.index', $result->getName());
        $this->assertArrayHasKey('categories', $data);
    }
    
    public function testCreateFunction()
    {
        $this->categoryMock
            ->shouldReceive('all')
            ->once()
            ->andReturn(new Collection);
        $category = new CategoryController($this->categoryMock);
        $result = $category->create();
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.category.add', $result->getName());
        $this->assertArrayHasKey('categories', $data);
    }

    public function testStoreFunction()
    {
        $faker = Faker::create();
        $this->categoryMock
            ->shouldReceive('create')
            ->once()
            ->andReturn(true);
        $name = $faker->name;
        $data = [
            'name' => $name,
            'parent_id' => null,
            'description' => 'dsds'
        ];
        $request = new CategoryRequest($data);
        $category = new CategoryController($this->categoryMock);
        $result = $category->store($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('categories.index'), $result->headers->get('Location'));
    }

    public function testEditFunction()
    {
        $this->categoryMock
            ->shouldReceive('all', 'findOrFail')
            ->once()
            ->andReturn(new Category());
        $category = new CategoryController($this->categoryMock);
        $data = [
            'category' => 2
        ];
        $request = new Request($data);
        $result = $category->edit($request);
        $data = $result->getData();
        $this->assertIsArray($data);
        $this->assertEquals('admin.category.edit', $result->getName());
        $this->assertArrayHasKey('categories', $data);
        $this->assertArrayHasKey('category', $data);
    }

    public function testUpdateFunction()
    {
        $faker = Faker::create();
        $this->categoryMock
            ->shouldReceive('update')
            ->once()
            ->andReturn(true);
        $name = $faker->name;
        $data = [
            'name' => $name,
            'parent_id' => null,
            'description' => 'dsds fdfd'
        ];
        $request = new CategoryRequest($data);
        $category = new CategoryController($this->categoryMock);
        $result = $category->update($request, 2);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('categories.show', 2), $result->headers->get('Location'));
    }

    public function testDestroyFunction()
    {
        $data = [
            'id' => 2
        ];
        $request = new Request($data);
        $this->categoryMock
            ->shouldReceive('delete')
            ->once()
            ->andReturn(new Category());
        $category = new CategoryController($this->categoryMock);
        $result = $category->destroy($request);
        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(route('categories.index'), $result->headers->get('Location'));
    }
}
