<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportProductRequest;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Exception;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    /**
     * 
     * @var $productRepository
     */
    protected $productRepository;

    /**
     * 
     * @var $categoryRepository
     */
    protected $categoryRepository;

    /**
     * 
     * @var ProductRepository  $productRepository
     * @var CategoryRepository $categoryRepository
     */
    public function __construct(
        ProductRepository $productRepository,
        CategoryRepository $categoryRepository
    ) {
        $this->productRepository = $productRepository;

        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepository->paginate(
            'id',
            'desc',
            (config('app.paginate_number'))
        );
        
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get all category with relationship subcategory
        $categories = $this->categoryRepository->all();

        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $this->productRepository->transaction($request, $id = null, 'create');
        if ($store) {
            return redirect()->route('products.index');
        }

        return back()->withError('message.store.error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Get all category of this product and detail product
        $detailProduct = $this->productRepository->getAllCategoryByProductId($id);
        
        return view('admin.product.detail', compact('detailProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get all category with relationship subcategory
        $categories = $this->categoryRepository->all();

        // Get all category of this product and detail product
        $detailProduct = $this->productRepository->getAllCategoryByProductId($id);

        // List id parent category of this product
        $listIdCategoryOfThisProduct = [];
        foreach ($detailProduct->categories as $category)
        {
            $listIdCategoryOfThisProduct[] = $category->id;
        }

        return view('admin.product.edit', compact(
            'categories',
            'detailProduct',
            'listIdCategoryOfThisProduct',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = $this->productRepository->transaction($request, $id, 'update');
        if ($update) {
            return redirect()->route('products.show', $id);
        }

        return back()->withError('message.update.error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->productRepository->transaction(null, $id, 'delete');
        if ($destroy) {
            return redirect()->route('products.index');
        }

        return back()->withError('message.destroy.error');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('admin.product.import');
    }

    public function import(ImportProductRequest $request) 
    {
        $resulf = $this->productRepository->import($request);

        if ($request) {
            return back()->withSuccess('message.product.import.success');
        }

        return back()->withError('message.product.import.error');
    }
}
