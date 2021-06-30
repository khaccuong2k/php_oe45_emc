<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
    * 
    * @var $categoryRepository
    */
    protected $categoryRepository;

    /**
     * @var CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->getAllCategoryIsParent();

        return view('admin.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryRepository->createCategory($request);
        if ($category) {
            return redirect()->route('categories.index');
        }
        
        return back()->withError('message.category.store.fail');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findOrFail($id);
        if ($category) {
            return view('admin.category.detail', compact('category'));
        }

        return back()->withError('message.category.notFound');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = $this->categoryRepository->getAllCategoryIsParent();

        $category = $this->categoryRepository->findOrFail($id);
        if ($category && $categories) {
            return view('admin.category.edit', compact('category', 'categories'));
        }
        
        return back()->withError('message.category.edit.noFound');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $update = $this->categoryRepository->updateCategory($id, $request);
        if ($update) {
            return redirect()->route('categories.show', $id);
        }

        return back()->withError('message.category.update.error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = $this->categoryRepository->deleteCategory($id);
        if ($delete) {
            return redirect()->route('categories.index')->withSuccess('message.category.delete.success');
        }

        return back()->withError('message.category.delete.error');
    }

    /**
     * Get all product by category_id
     */
    public function getAllProductByCategoryId($id)
    {
        $listProduct = $this->categoryRepository->getAllProductByCategoryId($id);
        if ($listProduct) {
            $products = $listProduct->products;
            $breadcrumb = true;

            return view('admin.product.index', compact('products', 'breadcrumb'));
        }

        return back()->withError('message.category.notFound');
    }
}
