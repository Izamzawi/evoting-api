<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::where('role_id', '1')->select('firstname', 'lastname')->get();
        return $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = $request->validate([
            'user_id' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
            'firstname' => ['required', 'regex:/^[A-Z][a-z]+$/'],
            'lastname' => ['regex:/^[A-Z][a-z]+$/'],
            'password' => ['required', 'regex:/^[A-Za-z0-9]+$/', 'min:8'],
            'role_id' => ['required', 'regex:[1]'],
            'organizer_id' => ['required', 'regex:[1]'],
            'election_id' => ['required', 'regex:[1]']
        ]);

        $user = User::create($request->all());
        $userdata = [
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname')
        ];

        if($user){
            return $userdata;
        } else {
            return "Failed to store data.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        //
        return User::find($user_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        //
        $user = User::find($user_id);

        $request->validate([
            'user_id' => ['required', 'regex:/^[A-Za-z0-9]+$/'],
            'firstname' => ['required', 'regex:/^[A-Z][a-z]+$/'],
            'lastname' => ['regex:/^[A-Z][a-z]+$/'],
            'organizer_id' => ['required', 'regex:[1]', 'max:1'],
            'election_id' => ['required', 'regex:[1]', 'max:1']
        ]);

        $user->update($request->all());
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        //
        $deletion = User::destroy($user_id);
        if($deletion){
            return "User deleted.";
        } else {
            return "User deletion failed.";
        }
    }

    public function login(Request $request){
        $userdata = [
            'user_id' => $request->input('user_id'),
            'password' => $request->input('password')
        ];
        
        Auth::attempt($userdata);

        if(Auth::check()){
            $user = User::find($request->input('user_id'));

            if($user->role_id == '1'){
                return redirect()->route('user', [$request->input('user_id')]);
            } if($user->role_id == '2'){
                return redirect()->route('hasvoted');
            }
            
        } else {
            echo 'Failed Login';
        }
    }    
}
