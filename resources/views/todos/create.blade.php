@extends('todos.layout')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl pb-4">What next you need To-DO</h1>
    <a href="{{route('todo.index')}}" class="mx-5 py-2 text-gray-400 cursor-pointer text-white">
        <span class="fas fa-arrow-left" />
    </a>
</div>

<form method="post" action="{{route('todo.store')}}" class="py-5">
    @csrf
    <div class="py-1">
        <input type="text" name="title" class="py-2 px-2 border rounded" placeholder="Title" value="{{ old('title') }}" />
    </div>
    @if($errors->has('title'))
    <em class="invalid-feedback">
        {{ $errors->first('title') }}
    </em>
   @endif
    <div class="py-1">
        <textarea name="description" class="p-2 rounded border" placeholder="Description">{!! old('description') !!}</textarea>
    </div>
    @if($errors->has('description'))
    <em class="invalid-feedback">
        {{ $errors->first('description') }}
    </em>
   @endif

   
    <div class="py-1">
        <input type="submit" value="Create" class="p-2 border rounded" />
    </div>
</form>
@endsection