<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportProductRequest;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Product\ProductRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

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
        try {
            $products = $this->productRepository->paginate(
                'id',
                'desc',
                (config('app.paginate_number'))
            );
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            // Get all category with relationship subcategory
            $categories = $this->categoryRepository->all();
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }

        return view('admin.product.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = $this->productRepository->transaction($request, 'create', $id = null);
        if ($store) {
            return redirect()->route('products.index');
        }

        return back()->withError('message.store.error');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailProduct = $this->productRepository->getAllCategoryByProductId($id);
        if ($detailProduct) {
            return view('admin.product.detail', compact('detailProduct'));
        }

        return back()->withError('message.notFound');
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
            // Get all category with relationship subcategory
            $categories = $this->categoryRepository->all();

            // Get all category of this product and detail product
            $detailProduct = $this->productRepository->getAllCategoryByProductId($id);
        } catch (QueryException $exception) {
            return back()->withError('message.notFound');
        }

        if ($categories && $detailProduct) {
            // List id parent category of this product
            $listIdCategoryOfThisProduct = [];
            foreach ($detailProduct->categories as $category) {
                $listIdCategoryOfThisProduct[] = $category->id;
            }

            return view('admin.product.edit', compact(
                'categories',
                'detailProduct',
                'listIdCategoryOfThisProduct',
            ));
        }
        
        return back()->withError('message.notFound');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = $this->productRepository->transaction($request, 'update', $id);
        if ($update) {
            return redirect()->route('products.show', $id);
        }

        return back()->withError('message.update.error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->productRepository->transaction(null, 'delete', $id);
        if ($destroy) {
            return redirect()->route('products.index');
        }

        return back()->withError('message.destroy.error');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import(ImportProductRequest $request)
    {
        $import = $this->productRepository->import($request);

        if ($import) {
            return redirect()->route('products.index')->withSuccess('message.product.import.success');
        }

        return back()->withError('message.product.import.error');
    }
}
