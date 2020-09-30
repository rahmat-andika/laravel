<?php

use Illuminate\Support\Facades\Route;
use App\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return 'hello world';
});

Route::get('/blog', function(){
    return 'ini halaman blog';
});

// Route::get('/post', 'PostController@index');
// Route::get('/post/create', 'PostController@create');
// Route::post('/post/store', 'PostController@store');
// Route::get('/post/{id}', 'PostController@show');

Route::resource('post', 'PostController2');

// Route::get('/insert', 'PostController@insert');
// Route::get('/lihat', 'PostController@lihat');
// Route::get('/ubah', 'PostController@ubah');
// Route::get('/hapus/{id}', 'PostController@hapus');


Route::get('/laman', function(){
    $data = Post::all();
    dd($data);
});

Route::get('/find', function(){
    return Post::find(3);
});

Route::get('/create', function(){
    $data = new Post;
    $data->title = 'post title dari eloquent (menginsert id login)';
    $data->body = 'post body dari eloquent (menginsert id login)';
    $data->user_id_new = Auth::user()->id;
    $data->save();

    echo "<script>
            alert('data berhasil di tambahkan');
         </script>";
});

Route::get('/postcreate', function(){
    Post::create([
        'title' => 'ini post title dari mass asigment',
        'body' => 'ini post title dari mass asigment',
        'user_id_new' => Auth::user()->id
    ]);

    echo "<script>
            alert('data berhasil di tambahkan');
         </script>";


});

Route::get('/updatepost', function(){
    Post::where('id', 3)
          ->update([
              'title' => 'ini post yg sudah di update meess update',
              'body' => 'ini body yg sudah di update meess update',
              'user_id_new' => 3
          ]);
    
    echo "<script>
            alert('data berhasil di ubah');
          </script>";
});

Route::get('/deletepost', function(){
    Post::find(5)
          ->delete();
    
    echo "<script>
            alert('data berhasil di hapus');
          </script>";
});

Route::get('/softdelete', function(){
    Post::destroy(9);

    echo "<script>
            alert('data berhasil di hapus');
          </script>";
});

Route::get('/trash', function(){
    $posts = Post::onlyTrashed()
             ->get();
    
    foreach($posts as $post){
        echo '<p>post ini dihapus pada : ' . $post->deleted_at . '</p>';
    }
});

Route::get('/restore', function(){
    Post::onlyTrashed()
          ->restore();

    echo "<script>
            alert('data berhasil di restore');
          </script>";
});

Route::get('/permanent', function(){
    Post::where('id', 10)
          ->forceDelete();
    echo "<script>
            alert('data berhasil di hapus');
          </script>";
});

// auth
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', 'HomeController@user');

Route::get('/admin', function(){
    return 'Halaman Admin';
})->middleware('role','auth');

Route::get('/member', function(){
    return 'Halaman member';
});

