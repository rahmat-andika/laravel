<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index(){
        $data = [
            ['id' => 1, 'title' => 'post 1', 'body' => 'post dengan Id 1'],
            ['id' => 2, 'title' => 'post 2', 'body' => 'post dengan Id 2'],
            ['id' => 3, 'title' => 'post 3', 'body' => 'post dengan Id 3'],
            ['id' => 4, 'title' => 'post 4', 'body' => 'post dengan Id 4'],
            ['id' => 5, 'title' => 'post 5', 'body' => 'post dengan Id 5'],
        ];

        echo "<ul>";
            foreach($data as $d){
                echo "<li><a href='/post/" . $d['id'] . "'>" . $d['title'] . "</a></li>";
            }
        echo "</ul>";
    }

    public function show($id){
        echo "post " . $id;
        echo "</br>";
        echo "body dengan Id " . $id;
    }

    public function create(){
        return view('blog/create');
    }

    public function store(Request $request){
        return $request;
    }

    public function insert(){
        $data = [
            'title' => 'ini post 1',
            'body' => 'ini body dari post 1',
            'user_id_new' => 1
        ];
        DB::table('posts')->insert($data);
        echo "<script>
                alert('data berhasil di tambahkan');
              </script>";
    }

    public function lihat(){
        $data = DB::table('posts')->get();
        return $data;
    }

    public function ubah(){
        $data = [
            'title' => 'ini post title setelah di ubah',
            'body' => 'ini post body setelah di ubah',
            'user_id_new' => 2
        ];

        DB::table('posts')->update($data);

        echo "<script>
                alert('data berhasil di ubah');
              </script>";
    }

    public function hapus($id){
        DB::table('posts')->where('id', $id)->delete();
        echo "<script>
                alert('data berhasil di hapus');
              </script>";
    }
}
