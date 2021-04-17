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
        $user = User::select('firstname', 'lastname')->get();
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
        $request->validate([
            'user_id' => ['required', 'regex:[A-Za-z0-9]'],
            'firstname' => ['required', 'regex:[A-Za-z]'],
            'lastname' => ['regex:[A-Za-z]'],
            'password' => ['required', 'regex:[A-Za-z0-9]', 'min:8'],
            'role_id' => ['required', 'regex:[1]', 'max:1'],
            'organizer_id' => ['required', 'regex:[1]', 'max:1'],
            'election_id' => ['required', 'regex:[1]', 'max:1']
        ]);

        return User::create($request->all());
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
            'user_id' => ['required', 'regex:[A-Za-z0-9]'],
            'firstname' => ['required', 'regex:[A-Za-z]'],
            'lastname' => ['regex:[A-Za-z]'],
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
        return User::destroy($user_id);
    }

    public function login(Request $request){
        $userdata = [
            'user_id' => $request->input('user_id'),
            'password' => $request->input('password')
        ];
        
        Auth::attempt($userdata);

        if(Auth::check()){
            return redirect()->route('user', [$request->input('user_id')]);
        } else {
            echo 'Failed Login';
        }
    }    
}
