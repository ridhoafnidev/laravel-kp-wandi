<?php

namespace App\Http\Controllers;
use Session;
use App\Pelanggan;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;  

class PelanggansController extends Controller
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
        return view('admin.pelanggans.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggans.create');
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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255|min:3',
            'jk' => 'required|string|min:1',
            'perusahaan' => 'required|string|max:255', 
            'tgl_pemesanan' => 'required', 
            'alamat_usaha' => 'required|string|max:255|min:3'
            ]);

            Pelanggan::create($request->all());
            
            return redirect()->route('admin.pelanggans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggans.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('admin.pelanggans.edit', compact('pelanggan'));
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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255|min:3',
            'jk' => 'required|string|min:1',
            'perusahaan' => 'required|string|max:255', 
            'tgl_pemesanan' => 'required', 
            'alamat_usaha' => 'required|string|max:255|min:3'
            ]);

        $pelanggan = Pelanggan::findOrFail($id);

        $pelanggan->update($request->all());
        
        Session::flash('success', 'Data berhasil di Edit!');
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');

        return redirect()->route('admin.pelanggans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Pelanggan::destroy($id)) 
        return redirect()->back();
        Session::flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('admin.pelanggans.index');
    }
    public function dataTable()
    {
        $pelanggan = Pelanggan::query();
        return DataTables::of($pelanggan)
        ->addColumn('action', function($pelanggan){
            return view('layouts.admin.partials._action', [
                'model' => $pelanggan,
                'show_url' => route('admin.pelanggans.show', $pelanggan->id),
                'edit_url' => route('admin.pelanggans.edit', $pelanggan->id),
                'delete_url' => route('admin.pelanggans.destroy', $pelanggan->id),
            ]);
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
