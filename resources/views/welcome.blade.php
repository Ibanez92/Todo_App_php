@extends('layouts.app')
@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
        <div class="text-center" style="width: 40%">
        <h1 class="display-2 text-white">Todo App</h1>
        <h2 class="text-white pt-5">What next? Add something to your list!</h2>
        <form action="{{ route('todo.store') }}" method="POST">
            @csrf
            <div class="input-group mb-3 w-100">
                <input type="text" class="form-control form-control-lg " name='title' placeholder="Type here.." aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2">Add to the list</button>
                </div>
            </div>
        </form>

        <h2 class="text-white pt-2">My Todo List:</h2>
        <div class="bg-white w-100">
            @foreach ($todos as $todo)
            <div class="w-100 d-flex align-items-center justify-content-between">
                <div class="p-4">@if ($todo->completed == 0)
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 24 24" stroke="#c14638">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                
                        
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-check2" viewBox="0 0 24 24" stroke="#c14638">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    
                @endif {{ $todo->title }}</div>
            
                <div class="mr-4">
                    @if ($todo->completed == 0)
                    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="completed" value="1" hidden>
                        <button class="btn btn-success">Mark it as Completed</button>
                    </form>
                    @else
                    <form action="{{ route('todo.update', $todo->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="text" name="completed" value="0" hidden>
                        <button class="btn btn-warning">Mark it as Uncompleted</button>
                    </form>
                        
                    @endif
                </div>
            </div>
            @endforeach
        </div>

    </div>
        
    </div>
@endsection