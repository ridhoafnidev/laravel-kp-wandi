<?php

namespace App\Http\Controllers;
use Auth;
use App\Reklame;
use App\User;
use PDF;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;


use Yajra\DataTables\DataTables;  

class ReklameController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        // $reklames = Reklame::with('total')->find(1);

        // $user = User::all();
        // $reklame = Reklame::all();

        // $reklames = $reklame->where("user_id", "=", $user->id)->get(); 

        // // $role='admin';
        //   $user = Auth::user()->id;
        //   $reklame = Reklame::all();
        // //   $reklame = DB::select('select user_id from reklames');
        
        // if ($user == $reklame) {
        return view('admin.reklame.index');
        // }else{
        // return view('admin.pembayaran.index');
        // }
        
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
        return view('admin.reklame.create');
        }else{
            return view('admin.reklame.create2');
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
            'lokasi_id' => 'required',
            'nsr' => 'required|integer',
            'alamat' => 'required|min:3',
            'jenis' => 'required',
            'qty' => 'required',
            'lebar' => 'required',
            'panjang' => 'required',             
            'lebar' => 'required',
            'jangka_waktu' => 'required',
            'des_jenis' => 'required'

            ]);
            $request['user_id'] = $request->user()->id;
            
            Reklame::create($request->all()); 
            Session::flash('success', 'Data berhasil diBuat!');

            return redirect()->route('admin.reklame.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role='admin';
        if (Auth::user()->role == $role) {
            $reklame = Reklame::findOrFail($id);
            return view('admin.reklame.show', compact('reklame'));
        }else{
            $reklame = Reklame::findOrFail($id);
            return view('admin.reklame.show2', compact('reklame'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reklame = Reklame::findOrFail($id);
        $role='admin';
        if (Auth::user()->role == $role) {
            return view('admin.reklame.edit', compact('reklame'));
            
        }else{
            return view('admin.reklame.edit2', compact('reklame'));
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
            'lokasi_id' => 'required',
            'nsr' => 'required|integer',
            'alamat' => 'required|min:3',
            'jenis' => 'required',
            'qty' => 'required',
            'lebar' => 'required',
            'panjang' => 'required',             
            'lebar' => 'required',
            'jangka_waktu' => 'required',
			'des_jenis' => 'required'

            ]);
            
        $reklame = Reklame::findOrFail($id);
        $reklame->update($request->all());
        Session::flash('success', 'Data berhasil di Edit!');
        $role='admin';
        if (Auth::user()->role == $role) {
        return redirect()->route('admin.reklame.index');
        }else{
            return redirect()->route('admin.reklame.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Reklame::destroy($id)) 
        return redirect()->back();
        Session::flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('admin.reklame.index');
    }

    public function dataTable()
    {
        
        $user = Auth::user()->id;
        $rules='admin';
        if(Auth::user()->role == $rules ){
        $reklame=Reklame::query();
            return DataTables::of($reklame)
            ->addColumn('lokasi', function($reklame){
                return $reklame->lokasi->jenis_lokasi;
            })
            ->addColumn('user', function($reklame){
                // $bisa=$reklame['user_id'];
                return $reklame->user->name;
                // return $bisa;
            })
            ->addColumn('total', function($reklame){
                // foreach ($reklame as $data) {
                    $a = $reklame->lebar;
                    $b = $reklame->panjang;
                    $c = $reklame->qty;
                    $d = $reklame->nsr;
					$e = $reklame->jangka_waktu;
    
                    $luas = $a * $b;
                    $pajak = 10/100;
                
                    $hasil = $luas *$c*$d*$e*$pajak;
    
                    return $hasil;
                
            })
            ->addColumn('action', function($reklame){
                return view('layouts.admin.partials._action', [
                    'model' => $reklame,
                    'show_url' => route('admin.reklame.show', $reklame->id),
                    'edit_url' => route('admin.reklame.edit', $reklame->id),
                    'delete_url' => route('admin.reklame.destroy', $reklame->id),
                ]);
            })
            ->rawColumns(['action','total'])
            ->make(true);
        }else{
            $reklame= DB::table('reklames')
            ->join('users','users.id','=','reklames.user_id')
            ->WHERE('reklames.user_id','=',$user)
            ->join ('jenis_lokasis','jenis_lokasis.id','=','reklames.lokasi_id')
            ->select(['reklames.*','users.name','jenis_lokasis.jenis_lokasi']);
            
        return DataTables::of($reklame)
        ->addColumn('lokasi', function($reklame){
            return $reklame->jenis_lokasi;
        })
        ->addColumn('user', function($reklame){
            // $bisa=$reklame['user_id'];
            return $reklame->name;
            // return $bisa;
        })
        ->addColumn('total', function($reklame){
            // foreach ($reklame as $data) {
                $a = $reklame->lebar;
                $b = $reklame->panjang;
                $c = $reklame->qty;
                $d = $reklame->nsr;
				$e = $reklame->jangka_waktu;

                $luas = $a * $b;
                $pajak = 10/100;
            
                $hasil = $luas * $c * $d * $e * $pajak;

                return $hasil;
        })
        ->addColumn('action', function($reklame){
            return view('layouts.admin.partials._action', [
                'model' => $reklame,
                'show_url' => route('admin.reklame.show', $reklame->id),
                'edit_url' => route('admin.reklame.edit', $reklame->id),
                'delete_url' => route('admin.reklame.destroy', $reklame->id),
            ]);
        })
        ->rawColumns(['action','total'])
        ->make(true);
        }
        
    }

    public function downloadPDF($id){
        
        // $reklame = Reklame::find($id);

        $reklame = DB::table('reklames')
        ->join('users','users.id','=','reklames.user_id')
        ->WHERE('reklames.id','=',$id)
        ->join ('jenis_lokasis','jenis_lokasis.id','=','reklames.lokasi_id')
        ->select(['reklames.*','users.*','jenis_lokasis.jenis_lokasi'])
        ->first();
    
        $pdf = PDF::loadView('admin.reklame.pdf', compact('reklame'));
        return $pdf->download('hasli cetak.pdf');
  
      }
}