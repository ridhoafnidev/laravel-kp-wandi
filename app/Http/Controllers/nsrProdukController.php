<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use App\NSR_Produk;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;  

class nsrProdukController extends Controller
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
            return view('admin.nsrProduk.index');
        }else{
            return view('admin.nsrProduk.index2');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nsrProduk.create');
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

            NSR_Produk::create($request->all());
            
            return redirect()->route('admin.nsrProduk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nsrProduk = NSR_Produk::findOrFail($id);
        return view('admin.nsrProduk.show', compact('nsrProduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nsr = NSR_Produk::findOrFail($id);
        return view('admin.nsrProduk.edit', compact('nsr'));
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

            $reklame = NSR_Produk::findOrFail($id);
            $reklame->update($request->all());
            Session::flash('success', 'Data berhasil di Edit!');

            return redirect()->route('admin.nsrProduk.index');
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
        $nsrProduk = NSR_Produk::query();
        return DataTables::of($nsrProduk)
        ->addColumn('lokasi', function($nsrProduk){
            return $nsrProduk->lokasi->jenis_lokasi;
        })
        ->addColumn('action', function($nsrProduk){
            return view('layouts.admin.partials._action', [
                'model' => $nsrProduk,
                'show_url' => route('admin.nsrProduk.show', $nsrProduk->id),
                'edit_url' => route('admin.nsrProduk.edit', $nsrProduk->id),
                'delete_url' => route('admin.nsrProduk.destroy', $nsrProduk->id),
            ]);
        })
        ->addColumn('action2', function($nsrProduk){
            return view('layouts.admin.partials._action2', [
                'model' => $nsrProduk,
                'show_url' => route('admin.nsrProduk.show', $nsrProduk->id),
                'edit_url' => route('admin.nsrProduk.edit', $nsrProduk->id)
            ]);
        })
        ->rawColumns(['action', 'action2'])
        ->make(true);
    }
}
