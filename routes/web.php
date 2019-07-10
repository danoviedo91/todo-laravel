<?php
use Illuminate\Console\Scheduling\Event;

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

Route::get('/', 'TodoListController@Index');
//Route::get('/todos', 'TodoListController@Index');
//Route::get('/todos/{id}', 'TodoListController@Show');

Route::get('db', function() {

    // DB::table('todo_lists')->insert(
    //     array('name' => 'Your List')
    // );

    $result = DB::table('todo_lists')->where('name', "Your List")->first();

    return var_dump($result);

});

Route::resource('todos', 'TodoListController'); 