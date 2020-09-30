<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Profile;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){
    $data = User::create([
        'name' => 'tukiyem',
        'email' => 'kiyem@gmail.com',
        'password' => bcrypt('password')
    ]);

    return $data;
});

Route::get('create-profile', function(){
    // masih mengisi user_id secara manual

    // $profile = Profile::create([
    //     'user_id' => 1,
    //     'phone' => '08123456',
    //     'address' => 'ds. kebonsari candi'
    // ]);

    $user = User::find(6);
    $user->profile()->create([
        'phone' => '0123456789',
        'address' => 'JL. candi sayang kamu'
    ]);

    return $user;
});

// one to one relations
Route::get('create-user-profile', function(){
    $user = User::find(5); // berisi user dengan id 2

    $profile = new Profile([
        'phone' => '123456789',
        'address' => 'JL. candi'
    ]);

    $user->profile()->save($profile);

    return $user;
});

Route::get('/read-user', function(){
    $user = User::find(1);
    $data = [
        'name' => $user->name,
        'phone' => $user->profile->phone,
        'address' => $user->profile->address
    ];

    return $data;
});

Route::get('/read-profile', function(){
    $profile = Profile::where('phone', '08123456')->first();

    // return $profile->user->name;

    $data = [
        'name' => $profile->user->name,
        'email' => $profile->user->email,
        'phone' => $profile->phone,
        'address' => $profile->address
    ];

    return $data;
});

// one to one update relations data
Route::get('/update-profile', function(){
    $user = User::find(2);

    $user->profile()->update([
        'phone' => '081931050584',
        'address' => 'permata candiloka asri'
    ]);

    $data = [
        'name' => $user->name,
        'email' => $user->email,
        'address' => $user->profile->address
    ];

    return $data;
});

// one on one delete data
Route::get('delete-profile', function(){
    $user = User::find(6);
    $user->profile->delete();

    return $user;
});

/**
 * one to many create data
 */
Route::get('create-post', function(){
    // $user = User::find(2);

    // $user->post()->create([
    //     'title' => 'ini post yg di buat oleh user ber id ' . $user->id,
    //     'body' => 'hello user ber id ' . $user->id
    // ]);

    $user = User::findOrFail(1);

    $user->post()->create([
        'title' => 'ini masih post baru milik user ber id ' . $user->id,
        'body' => 'ini body user baru ber id ' . $user->id
    ]);

    return $user;
});

/**
 * one to many read data
 */
Route::get('read-post', function(){
    $user = User::findOrFail(1);
    $data = $user->post()->get();

    foreach($data as $d){
        echo $d->title . "<br>";
        echo $d->body . "<br>";
    }
});