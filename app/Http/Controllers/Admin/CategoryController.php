<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Database\QueryException;
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
        try {
            $categories = $this->categoryRepository->all();
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        return view(
            'admin.category.index',
            compact('categories')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = $this->categoryRepository->all();
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        return view(
            'admin.category.add',
            compact(
                'categories'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        try {
            $category = $this->categoryRepository->create($request);
        } catch (QueryException $exception) {
            return back()->withError(
                'message.store.fail'
            );
        }

        if ($category) {
            return redirect()->route(
                'categories.index'
            );
        }
        
        return back()->withError(
            'message.store.fail'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryRepository->findOrFail($id);
        if ($category) {
            return view(
                'admin.category.detail',
                compact(
                    'category'
                )
            );
        }

        return back()->withError(
            'message.notFound'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $categories = $this->categoryRepository->all();

            $category = $this->categoryRepository->findOrFail($id);
        } catch (QueryException $exception) {
            return back()->withError(
                'message.notFound'
            );
        }

        return view(
            'admin.category.edit',
            compact(
                'category',
                'categories'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        try {
            $update = $this->categoryRepository->update($request, $id);
        } catch (QueryException $exception) {
            return back()->withError(
                'message.update.fail'
            );
        }

        if ($update) {
            return redirect()->route(
                'categories.show',
                $id
            );
        }

        return back()->withError(
            'message.update.fail'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete = $this->categoryRepository->delete($id);
        } catch (QueryException $exception) {
            return back()->withError(
                'message.delete.fail'
            );
        }

        if ($delete) {
            return redirect()->route(
                'categories.index'
            )->withSuccess(
                'message.delete.success'
            );
        }
        
        return back()->withError(
            'message.delete.fail'
        );
    }

    /**
     * Get all product by category_id
     */
    public function getAllProductByCategoryId($id)
    {
        try {
            $listProduct = $this->categoryRepository->getAllProductByCategoryId($id);
        } catch (QueryException $exception) {
            return back()->withError(
                'message.notFound'
            );
        }

        if ($listProduct) {
            $products = $listProduct->products;
            $breadcrumb = true;
    
            return view(
                'admin.product.index',
                compact(
                    'products',
                    'breadcrumb'
                )
            );
        }
        
        return back()->withError(
            'message.notFound'
        );
    }
}
