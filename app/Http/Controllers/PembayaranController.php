<?php

namespace App\Http\Controllers;
use Session;
use Auth;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\Reklame;
use Yajra\DataTables\DataTables; 
use Illuminate\Support\Facades\DB;


class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role='admin';
        if (Auth::user()->role == $role) {
        return view('admin.pembayaran.index');
        }else{
        return view('admin.pembayaran.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role='admin';
        if (Auth::user()->role == $role) {
        return view('admin.pembayaran.create');
        }else{
            return view('admin.pembayaran.create2');
        }
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
            'bukti_pembayaran' => 'required',
            'reklame_id' => 'required|unique:pembayarans'
            ]);
            Pembayaran::create($request->all()); 
            Session::flash('success', 'Data berhasil diBuat!');

            return redirect()->route('admin.pembayaran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $pembayaran = DB::table('reklames')
        // ->join('users', 'reklames.user_id', '=', 'users.id')
        // ->join('pembayarans', 'reklames.id', '=', 'pembayarans.reklame_id')
        // ->where('pembayarans.id', '=', '$id')
        // ->select(['users.name', 'pembayarans.*']); 

        $pembayaran = Pembayaran::findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $role='admin';
        if (Auth::user()->role == $role) {
        return view('admin.pembayaran.edit', compact('pembayaran'));
        }else{
            return view('admin.pembayaran.edit2', compact('pembayaran'));  
        }
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
            'bukti_pembayaran' => 'required',
            'deskripsi' => 'required',
            'reklame_id' => 'required',
            ]);
            
        $pembayaran = pembayaran::findOrFail($id);
        $pembayaran->update($request->all());
        Session::flash('success', 'Data berhasil di Edit!');

        return redirect()->route('admin.pembayaran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Pembayaran::destroy($id)) 
        return redirect()->back();
        Session::flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('admin.pembayaran.index');
    }
    public function dataTable()
    {
        $user = Auth::user()->id;
        $rules='admin';
        if(Auth::user()->role == $rules ){
        $pembayaran=Pembayaran::query();
        return DataTables::of($pembayaran)
        ->addColumn('deskripsi', function ($pembayaran) {
            return strip_tags($pembayaran->deskripsi);
        })
        ->addColumn('user', function ($user) {
            return $user->name;
        })
        ->addColumn('bukti_pembayaran', function ($pembayaran) {
            $url=asset("$pembayaran->bukti_pembayaran");
            return '<img src='.$url.' alt="Bukti tidak ada" height="150" width="150"/>';

        })
        ->addColumn('action', function($pembayaran){
            return view('layouts.admin.partials._action', [
                'model' => $pembayaran,
                'show_url' => route('admin.pembayaran.show', $pembayaran->id),
                'edit_url' => route('admin.pembayaran.edit', $pembayaran->id),
                'delete_url' => route('admin.pembayaran.destroy', $pembayaran->id),
            ]);
        })
        ->rawColumns(['action','user','bukti_pembayaran'])
        ->make(true);
    }else{
        $pembayaran = DB::table('reklames')
        ->join('users', 'reklames.user_id', '=', 'users.id')
        ->join('pembayarans', 'reklames.id', '=', 'pembayarans.reklame_id')
        ->WHERE('reklames.user_id','=',$user)
        ->select(['users.name', 'pembayarans.*']); 

        return DataTables::of($pembayaran)
        ->addColumn('deskripsi', function ($pembayaran) {
            return strip_tags($pembayaran->deskripsi);
        })
        ->addColumn('user', function ($user) {
            return $user->name;
        })
        ->addColumn('bukti_pembayaran', function ($pembayaran) {
            $url=asset("$pembayaran->bukti_pembayaran");
            return '<img src='.$url.' alt="Bukti tidak ada" height="150" width="150"/>';

        })
        ->addColumn('action', function($pembayaran){
            return view('layouts.admin.partials._action', [
                'model' => $pembayaran,
                'show_url' => route('admin.pembayaran.show', $pembayaran->id),
                'edit_url' => route('admin.pembayaran.edit', $pembayaran->id),
                'delete_url' => route('admin.pembayaran.destroy', $pembayaran->id),
            ]);
        })
        ->rawColumns(['action','user','bukti_pembayaran'])
        ->make(true);
    }
}
}