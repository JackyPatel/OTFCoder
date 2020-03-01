<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Authorizable;

class UserController extends Controller
{
    use Authorizable;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();        
        return view('users.create', compact('roles'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles' => 'required'
        ]);

        $user = User::create($request->except('roles'));
        
        if($request->roles <> ''){
            $user->roles()->attach($request->roles);
        }
        return redirect()->route('users.index')->with('success','User has been created'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $roles = Role::get(); 
        return view('users.edit', compact('user', 'roles')); 
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
        $user = User::findOrFail($id);   
        $this->validate($request, [
            'first_name'=>'required|max:120',
            'last_name'=>'required|max:120',
            'email'=>'required|email|unique:users,email,'.$id,
            // 'password'=>'min:6|confirmed'
        ]);
        $input = $request->except('roles');
        $input['password'] = $input['password'] != null ? \Hash::make($input['password']) : $user['password'];
        $user->fill($input)->save();
        if ($request->roles <> '') {
            $user->roles()->sync($request->roles);        
        }        
        else {
            $user->roles()->detach(); 
        }
        return redirect()->route('users.index')->with('success',
             'User successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id); 
        $user->delete();
        return redirect()->route('users.index')->with('success',
             'User successfully deleted.');
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();

        return view('users.profile', compact('user')); 

    }
    public function updateProfile(Request $request)
    {
        $request = $request->all();

        $user = User::findOrFail($request['id']);

        if(isset($request['profile_pic']))
        {
            if($user['profile_pic'] != '' && file_exists(public_path('uploads/users'.'/'.$user['profile_pic']))) {
                unlink(public_path('uploads/users'.'/'.$user['profile_pic']));
            }
            $path = public_path()."/uploads/users/";
            $file = $request['profile_pic'];
            $filename = $file->getClientOriginalName();
            $filename = sha1(microtime()).'_'.$filename;
            $file->move($path,$filename);
        } 

        $user->fill($request);
        $user->profile_pic = $filename;
        $user->save();
        return redirect()->back()->with('success',
             'Profile successfully updated.');
   
    }
}
