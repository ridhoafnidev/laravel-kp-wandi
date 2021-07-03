<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\nsrNonProduk;
use Yajra\DataTables\DataTables;  
class nsrNonProdukController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $rules='admin';
        if(Auth::user()->role == $rules ){
        return view('admin.nsrNonProduk.index');
    }else{
        return view('admin.nsrNonProduk.index2');
    }
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nsrNonProduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lokasi_id' => 'required',
            'ukuran' => 'required|integer',
            'jangka_waktu' => 'required|integer',
            'ketinggian' => 'required|integer', 
            'nsr' => 'required|integer'
            ]);

            nsrNonProduk::create($request->all()); 
            Session::flash('success', 'Data berhasil diBUat!');

            return redirect()->route('admin.nsrNonProduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $nsrNonProduk = nsrNonProduk::findOrFail($id);
       return view('admin.nsrNonProduk.show', compact('nsrNonProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nsrN = nsrNonProduk::findOrFail($id);
        return view('admin.nsrNonProduk.edit', compact('nsrN'));
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
        $this->validate($request, [
            'lokasi_id' => 'required',
            'ukuran' => 'required|integer',
            'jangka_waktu' => 'required|integer',
            'ketinggian' => 'required|integer', 
            'nsr' => 'required|integer'
            ]);

            $nsrN = nsrNonProduk::findOrFail($id);
            $nsrN->update($request->all());
            Session::flash('success', 'Data berhasil di Edit!');

            return redirect()->route('admin.nsrNonProduk.index');
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
    public function dataTable()
    {
        $nsrNonProduk = nsrNonProduk::query();
        return DataTables::of($nsrNonProduk)
        ->addColumn('lokasi', function($nsrNonProduk){
            return $nsrNonProduk->lokasi->jenis_lokasi;
        })
        ->addColumn('action', function($nsrNonProduk){
            return view('layouts.admin.partials._action', [
                'model' => $nsrNonProduk,
                'show_url' => route('admin.nsrNonProduk.show', $nsrNonProduk->id),
                'edit_url' => route('admin.nsrNonProduk.edit', $nsrNonProduk->id),
                'delete_url' => route('admin.nsrNonProduk.destroy', $nsrNonProduk->id),
            ]);
        })
        ->addColumn('action2', function($nsrNonProduk){
            return view('layouts.admin.partials._action2', [
                'model' => $nsrNonProduk,
                'show_url' => route('admin.nsrNonProduk.show', $nsrNonProduk->id)
            ]);
        })
        ->rawColumns(['action', 'action2'])
        ->make(true);
    }
}
