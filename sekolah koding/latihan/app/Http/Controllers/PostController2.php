<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController2 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = [
            ["id" => 1, "title" => "title post 1", "body" => "body post 1"],
            ["id" => 2, "title" => "title post 2", "body" => "body post 2"],
            ["id" => 3, "title" => "title post 3", "body" => "body post 3"],
            ["id" => 4, "title" => "title post 4", "body" => "body post 4"],
            ["id" => 5, "title" => "title post 5", "body" => "body post 5"],
            ["id" => 6, "title" => "title post 6", "body" => "body post 6"],
            ["id" => 7, "title" => "title post 7", "body" => "body post 7"],
            ["id" => 8, "title" => "title post 8", "body" => "body post 8"],
            ["id" => 9, "title" => "title post 9", "body" => "body post 9"],
            ["id" => 10, "title" => "title post 10", "body" => "body post 10"],
        ];

        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "halaman berId : " . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit halaman berId : " .$id;
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
        //
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
