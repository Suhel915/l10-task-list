<?php

use App\Http\Requests\Taskrequest;
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
  $task = Task::latest()->paginate();
    return view('index',[
       'tasks'=> $task
    ]);
})->name('tasks.index');
// Create
Route::view('tasks/create','create')->name('tasks.create');

// Edit
Route::get('/{task}/edit', function (Task $task)  {
   
    return view('edit',['task' => $task]);
})->name("tasks.edit");

// Update Data
Route::put('/tasks/{task}', function(Task $task, Taskrequest $request) {

  // $data = $request->validated();
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save(); 
  $task->update($request->validated());
  return redirect()->route('tasks.show',['task'=> $task])
  ->with('success','Task updated successfully');

})->name('tasks.update');


// Show
Route::get('/{task}', function ( Task $task)  {
   
    return view('show',['task' => $task]);
})->name("tasks.show");

// Post Data
Route::post('/tasks', function(Taskrequest $request) {
  // $data = $request->validated();
  // $task = new Task;
  // $task->title = $data['title'];
  // $task->description = $data['description'];
  // $task->long_description = $data['long_description'];
  // $task->save(); 
  $task = Task::create($request->validated());
  return redirect()->route('tasks.show',['task'=> $task->id])
  ->with('success','Task created successfully');

})->name('tasks.store');

Route::delete('tasks/{task}', function (Task $task) {
  $task->delete();
  return redirect()->route('tasks.index')->with('success','Task Deleted Successfully ');
}
)->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function(Task $task) {
  $task->toggleComplete();
  return redirect()->back()->with('success','Task Updated successfully');
})->name('tasks.toggle-complete');


// Route::fallback(function (){
//     return "Something went wrong";
// });