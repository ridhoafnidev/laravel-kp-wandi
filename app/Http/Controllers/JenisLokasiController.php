<?php

namespace App\Http\Controllers;
use App\JenisLokasi;
use Session;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;  

class JenisLokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jenisLokasi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenisLokasi.create');
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
            'jenis_lokasi' => 'required|string|max:255|min:3'
            ]);
    
            JenisLokasi::create($request->all());
            Session::flash('success', 'Data berhasil diBUat!');
            return redirect()->route('admin.jenisLokasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisLokasi = JenisLokasi::findOrFail($id);
        return view('admin.jenisLokasi.show', compact('jenisLokasi'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenisLokasi = JenisLokasi::findOrfail($id);
        return view('admin.jenisLokasi.edit', compact('jenisLokasi'));
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
            'jenis_lokasi' => 'required|string|max:255|min:3'
            ]);
    
            $jenisLokasi = JenisLokasi::findOrFail($id);
            $jenisLokasi->update($request->all());
            Session::flash('success', 'Data berhasil diEdit!');
            return redirect()->route('admin.jenisLokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!JenisLokasi::destroy($id)) 
        return redirect()->back();
        Session::flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('admin.jenisLokasi.index');
    }
    public function dataTable()
    {
        $jenisLokasi = JenisLokasi::query();
        return DataTables::of($jenisLokasi)
        ->addColumn('action', function($jenisLokasi){
            return view('layouts.admin.partials._action', [
                'model' => $jenisLokasi,
                'show_url' => route('admin.jenisLokasi.show', $jenisLokasi->id),
                'edit_url' => route('admin.jenisLokasi.edit', $jenisLokasi->id),
                'delete_url' => route('admin.jenisLokasi.destroy', $jenisLokasi->id),
            ]);
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
