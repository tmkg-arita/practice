<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\HelloRequest;

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
        return view('posts.index')->with(['msg' => '登録が完了しました。']);
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
    public function edit(Request $request)
    {

        $id = $request -> id_number;
        $id = intval($id);
        $users = User::where('id', $id)->get();
        // dd($users);
        $msg = '編集する項目を修正して下さい。';

        return view('posts.edit',compact('msg','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelloRequest $request)
    {
        // var_dump($request->name);
        $gen = $request -> gender;
        $gen = intval($gen);

        $posts = new User();

        $posts->name = $request->name;
        $posts->mail = $request->mail;
        $posts->age = $request->age;
        $posts->gender = $gen;
        // var_dump($posts -> name);
        $posts->update();
        return  view('posts.index')->with(['msg' => '編集が完了しました。']);
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
}
