<?php

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

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
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index',[
       'tasks'=> \App\Models\Task::latest()->where('completed',true)->get()
    ]);
})->name('tasks.index');
// Create
Route::view('tasks/create','create')->name('tasks.create');

// Edit
Route::get('/{id}', function ($id)  {
   
    return view('edit',['task' => \App\Models\Task::findOrFail($id)]);
})->name("tasks.edit");



// Show
Route::get('/{id}', function ($id)  {
   
    return view('show',['task' => \App\Models\Task::findOrFail($id)]);
})->name("tasks.show");

// Post Data
Route::post('/tasks', function(Request $request) {
  $data = $request->validate([
    'title'=>'required|max:255',
    'description'=>'required',
    'long_description'=>'required'
  ]);
  $task = new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];
  $task->save(); 
  return redirect()->route('tasks.show',['id'=> $task->id])
  ->with('success','Task created successfully');

})->name('tasks.store');

// Route::get('/hello', function () {
//     return redirect('heelo');
// });
// Route::get('/heelo', function () {
//     return 'Heelo';
// })->name('hello');
// Route::get('/hello/{name}', function ($name) {
//     return ' Hello '. $name .'!';
// });

// Route::fallback(function (){
//     return "Something went wrong";
// });