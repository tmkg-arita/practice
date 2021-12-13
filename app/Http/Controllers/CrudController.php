<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\HelloRequest;
use App\Http\Requests\EditRequest;
//use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        // dd($users);


        return view('posts.list')
        ->with(['users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('posts.index')->with(['msg' => '下記のフォームを入力して下さい。']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelloRequest $request)
    {
        // var_dump($request->name);
        //  dd($request);
        $gen = $request -> gender;
        $gen = intval($gen);

        $post = new User();
        $post->name = $request->name;
        $post->mail = $request->mail;
        $post->age = $request->age;
        $post->gender = $gen;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        // var_dump($users.'<br/>');
        $msg = '編集して下さい。';
        // var_dump($users.'<br>');
        return view('posts.edit',compact('users','msg'));

        // $id = $request -> id_number;
        // $id = intval($id);
        // $users = User::where('id', $id)->get();
        // // dd($users);
        // $msg = '編集する項目を修正して下さい。';

        // return view('posts.edit',compact('msg','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request,$id)
    {
        $gen = $request -> gender;
        $gen = intval($gen);

        $users = User::findOrFail($id);
        // var_dump($users.'<br/>');

        $users->name = $request->name;
        $users->mail = $request->mail;
        $users->age = $request->age;
        $users->gender = $gen;
        $users->save();
        return redirect()->route('posts.index');

        // var_dump($request.'<br/>');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        // var_dump($users.'<br/>');
        $users -> delete();
        return redirect()->route('posts.index');

    }
}
