<?php

namespace App\Http\Controllers;

use Alert;
use Auth;
use Session;
use App\User; 
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;  

class UsersController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
    {
        // $user = User::findOrFail();
        $user = DB::table('users')->get();

        // return view('user.index', ['users' => $users]);
        // return view('admin.users.show', compact('user'));
        return view('admin.users.index2');      
    }
    public function index()
    {
            return view('admin.users.index');      
    }
	
	 public function profile(){
        $profile = Auth::user();
        return view('admin.users.profile', compact('profile'));
    }
	
	public function profile2(){
        $profile2 = Auth::user();
        return view('admin.users.profile2', compact('profile2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'alamat' => 'required|string|max:255',
        'npwp' => 'required|integer|unique:users',
        'password' => 'required|string|min:6',
        'role' => 'required' 
        ]);

        $request['password'] = bcrypt($request->get('password'));
        User::create($request->all());
        Session::flash('success', 'Data berhasil di Buat!');
        return redirect()->route('admin.users.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        // $user = Auth::user();
        return view('admin.users.edit', compact('user'));    
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
            'name'  => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            'password' => 'nullable|string|min:6',
            'role' => 'required'
            ]);

        $user = User::findOrFail($id);

        $request['password']=$request->get('password') ? bcrypt($request->get('password')) : $user->password;
        $user->update($request->all());
        
        Session::flash('success', 'Data berhasil di Edit!');
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');

        return redirect()->route('admin.users.index');
    }

    public function update2(Request $request, $id)
    {
        // $this->validate($request, [
        //     'name'  => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        //     'password' => 'nullable|string|min:6',
        //     'role' => 'required'
        //     ]);

        $user = User::findOrFail($id);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');

        $request['password']=$request->get('password') ? bcrypt($request->get('password')) : $user->password;
        $user->update($request->all());
        
        Session::flash('success', 'Data berhasil di Edit!');
        // Alert::success('pesan yang ingin disampaikan', 'Judul Pesan');

        return redirect()->route('profile2');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!User::destroy($id)) 
        return redirect()->back();
        Session::flash('success', 'Data berhasil di Hapus!');
        return redirect()->route('admin.users.index');
    }

    public function dataTable()
    {
        $users = User::query();
        return DataTables::of($users)
        ->addColumn ('user', function ($users) {
            return '<img src="' .asset('images/user-icon.png'). '" height="32" width="32">' .$users->name;
        })
        ->addColumn('action', function($users){
            return view('layouts.admin.partials._action', [
                'model' => $users,
                'show_url' => route('admin.users.show', $users->id),
                'edit_url' => route('admin.users.edit', $users->id),
                'delete_url' => route('admin.users.destroy', $users->id),
            ]);
        })
        ->rawColumns(['user', 'action'])
        ->make(true);
    }
}
