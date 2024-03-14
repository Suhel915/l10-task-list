@extends('layouts.app')
@section('title','Edit Task')

@section('styles')
<style>
    .error-message{
    color: red;
    font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<form action="{{ route('tasks.store') }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div><label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div><label for="long_description">Long Description</label>
        <textarea name="long_description" id="long_description" cols="30" rows="10"></textarea>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Add Task</button>
    </div>
</form>
@endsection