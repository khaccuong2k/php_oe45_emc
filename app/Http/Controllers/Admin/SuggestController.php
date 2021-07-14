<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Suggest\SuggestRepositoryInterface;
use Doctrine\DBAL\Query\QueryException;
use Illuminate\Http\Request;

class SuggestController extends Controller
{
    /**
     *
     * @var $suggestRepository
     */
    protected $suggestRepository;

    /**
     *
     * @var SuggestRepository  $suggestRepository
     */
    public function __construct(SuggestRepositoryInterface $suggestRepository)
    {
        $this->suggestRepository = $suggestRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $suggests = $this->suggestRepository->all();
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        if ($suggests) {
            return view('admin.suggest.index', compact('suggests'));
        }

        return back()->withError('message.select_data.fail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $detailSuggest = $this->suggestRepository->findOrFail($id);
        } catch (QueryException $exception) {
            return back()->withError('message.select_data.fail');
        }
        
        if ($detailSuggest) {
            return view('admin.suggest.detail', compact('detailSuggest'));
        }

        return back()->withError('message.select_data.fail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        try {
            $changeStatus = $this->suggestRepository->changeStatus($id);
        } catch (QueryException $exception) {
            return response()->json(
                [
                'success' => false,
                'message' => trans('message.change_status.fail'),
                ]
            );
        }

        if ($changeStatus) {
            return response()->json(
                [
                'success' => true,
                'message' => trans('lable.order_confirmation'),
                ]
            );
        }
        
        return response()->json(
            [
            'success' => false,
            'message' => trans('message.change_status.fail'),
            ]
        );
    }
}
