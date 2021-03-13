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
            @forelse ($todos as $todo)
            <div class="w-100 d-flex align-items-center justify-content-between">
                <div class="p-4">@if ($todo->completed == 0)
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 24 24" stroke="#c14638">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                      </svg>
                
                        
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" fill="currentColor" class="bi bi-check2" viewBox="0 0 24 24" stroke=#198754>
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                      </svg>
                    
                @endif {{ $todo->title }}</div>
            
                <div class="mr-4 d-flex align-items-center">
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
                <a href="{{ route('todo.edit', $todo->id) }}" class="inlane-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square ml-4" viewBox="0 0 24 24" stroke="#696969">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                </a>
                
                  <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button class="border-0 bg-transparent ml-2"> <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-trash ml-2" viewBox="0 0 24 24" stroke="#696969">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>
                    </button>
                </form>
                  
                </div>
            </div>
            @empty
            <p class="p-4" style="font-size: 1.4rem">Nothing added to your list!</p>
            @endforelse
        </div>
    </div>
        
    </div>
@endsection