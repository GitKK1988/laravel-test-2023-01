<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    $tasks = Task::all();
    return view('tasks', ['tasks' => $tasks]);
});

Route::post('/tasksstore', function (Request $request) {
    $validatedData = $request->validate([
        'taskname' => 'required|max:255',
        'taskdate' => 'required|date|max:255',
    ]);

    $task = new Task;
    $task->taskname = $validatedData['taskname'];
    $task->taskdate = $validatedData['taskdate'];
    $task->save();
    // Store the data in the database or perform any other actions here

    return redirect('/tasks')->with('success', 'Data has been stored successfully!');
});


Route::get('/hello', function(){
    return 'Hello';
});


// with parameters
Route::get('/users/{id}/{name}', function($id, $name){
    return 'This is user '.$name.' with an id of '.$id;
});

// redirect
Route::get('/redirect', function(){
    return redirect('/hello');
}); 

//  fallback route
Route::fallback(function(){
    return 'This is a fallback route';
});

// pass data to view
Route::get('/user/{id}/{name}', function($id, $name){
    $data = array(
        'id' => $id,
        'name' => $name
    );
    return view('user')->with($data);
});