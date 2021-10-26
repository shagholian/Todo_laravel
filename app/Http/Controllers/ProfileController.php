<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;



class ProfileController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if(!$user) {
            throw new \Exception("failed");
        }
        $title = 'show profile';
        return view('profile.show', compact('user', 'title') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(!$user) {
            throw new \Exception("failed");
        }
        return view('profile.edit', compact('user'));
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
        $user = User::find($id);
        if(!$user) {
            throw new \Exception("failed");
        }

        $params = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ];
        if(!empty($request->password)) {
            $params['password'] = ['required', 'string', 'min:8', 'password_confirm'];
            $params['password_confirm'] = 'required_with:password|same:password';
        }
        $request->validate($params);

        try {
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            if(!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->save();
            return redirect(route('profile/show', $user->id))->with('successful', 'edit profile successfuly');

        }catch (Exception $ex) {
            return redirect()->back()->with('warning', "Error Code:‌" . $ex->getcode());
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
        //
    }

    public function myTodos($id)
    {
        $user = User::find($id);
        if(!$user) {
            throw new \Exception("failed");
        }


        $todos = $user->todos;
        return view('profile.myTodos', ['todos' => $todos]);
    }
}
