<?php

namespace App\Http\Controllers;

use App\Hobby;
use App\Http\Middleware\User;
use App\User as AppUser;
use Illuminate\Http\Request;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
         $bol=true;
         $bol2=true;
        $this->validate($request,[
            'name'=>'required'
        ]);
     
   $user=auth()->user();
   $hobby=Hobby::all()->where('name',$request->name);
   
   if ($hobby->isEmpty()) {
    $hobby=Hobby::create($request->all());
   }
      
        $user->hobbies()->syncWithoutDetaching($hobby);
        
        if ($user->profile=='Administrador') {
            return redirect()->route('adminIndex')->with('flash','se ha agregado correctamente el hobby');
        
        }
        return redirect()->route('userIndex')->with('flash','se ha agregado correctamente el hobby');
        
        
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
        //
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

        $user=AppUser::find($request->id);
        $user->name=$request->name;
        $user->name_user=$request->name_user;
        $user->email=$request->email;
        $user->city=$request->city;
        $user->save();
        return redirect()->route('adminIndex');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($hobby,$user)
    {
       $user= AppUser::find($user);
       $user->hobbies()->detach($hobby);
       return redirect('/admin')->with('flash','se ha eliminado el hobby');
    }
}
