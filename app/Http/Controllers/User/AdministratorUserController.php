<?php

namespace App\Http\Controllers\user;

use App\Hobby;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AdministratorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $users= User::all();
       return view('admin.usuarios', compact('users'));
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
    public function store(Request $request,$user)
    {
        $bol=true;
        $bol2=true;
       $this->validate($request,[
           'name'=>'required'
       ]);
    
  $user=User::find($user);
  $hobby=Hobby::all()->where('name',$request->name);
  
  if ($hobby->isEmpty()) {
   $hobby=Hobby::create($request->all());
  }
     
       $user->hobbies()->syncWithoutDetaching($hobby);
       return back()->with('flash','se ha eliminado el hobby');
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
        $user= User::find($id);
        $hobbies=$user->hobbies;
        return view('admin.editUser', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'name_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'city' => 'required|string',
        ]);

        $user=User::find($request->id);
        $user->name=$request->name;
        $user->name_user=$request->name_user;
        $user->email=$request->email;
        $user->city=$request->city;
        $user->save();
        return back()->with('flash','Perfil de usuario editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hobby,$user)
    {
        $user= User::find($user);
       $user->hobbies()->detach($hobby);
       return back()->with('flash','se ha eliminado el hobby');
    }
}
