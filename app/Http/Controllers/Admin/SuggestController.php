<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Suggest\SuggestRepository;
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
    public function __construct(SuggestRepository $suggestRepository)
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
        $suggests = $this->suggestRepository->all();

        return view(
            'admin.suggest.index',
            compact('suggests')
        );
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailSuggest = $this->suggestRepository->findOrFail($id);

        return view('admin.suggest.detail', compact('detailSuggest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        $changeStatus = $this->suggestRepository->changeStatus($id);
        if ($changeStatus) {
            return back()->withSuccess('message.change_status.success');
        }

        return back()->withError('message.change_status.fail');
    }
}
