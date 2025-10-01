

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Todo List</title>
    @vite('resources/css/app.css')

</head>
<body>

<div class ="container">

    <h1>Todo List</h1>

    {{--  {{ $variable }} -> Echo out a variable  --}}
    <form method="POST" action="{{ route('add.attempt') }}"  class="add-form">
        @csrf
        <input type="text" name="task" class="task-input" placeholder="Add new task" required />
        <button type="submit" class="add-button">Add</button>
    </form>


    <ul>
    @if($tasks->isEmpty())
        <p>No tasks yet.</p>
    @else
        @foreach ($tasks as $task)
        <li class="{{ $task->completed ? 'completed' : '' }}">
            <span class ="task-text" id="task-text-{{ $task->id }}">{{ $task->task }}</span>

            <div class="actions">



                <button  type="button" onclick="showEditForm( {{ $task->id }} ); return false;"> edit </button>

                <form method="POST" action="{{ route('edit.attempt') }}" class="inline-edit" style="display: none;" id="edit-form-{{ $task->id }}">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}" />
                    <input type="text" name="task" value="{{ $task->task }}" style="border: 2px solid gray" />
                    <button type="submit" style="color:gray">save</button>
                    <button type="button" onclick="cancelEdit( {{ $task->id }} )" style="color:gray">Cancel</button>
                </form>




                @if(!$task->completed)
                <form method="POST" action="{{ route('complete.attempt') }}" class="{{$task->completed ? 'completed' : ''}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}" />
                    <button class="actions" type="submit">Check</button>
                </form>
                @else
                <form method="POST" action="{{ route('complete.attempt') }}"  class="{{$task->completed ? 'completed' : '' }}" >
                    @csrf
                    <input type="hidden"  name="id" value="{{ $task->id }}" />
                    <button  type="submit">uncheck</button>
                </form>
                @endif


                


                <form method="POST" action="{{ route('delete.attempt') }}" class="inline" onsubmit="return confirm('Delete this task?');">
                    @csrf
                    <input type="hidden" name="id" value="{{ $task->id }}" />
                    <button  type="submit" style="color: red;">Delete</button>
                </form>


            </div>
        </li>
        @endforeach
    @endif
    </ul>

</div>

    <script>

        function showEditForm(id) {
            document.getElementById('task-text-' + id).style.display = 'none';
            document.getElementById('edit-form-' + id).style.display = 'block';
        }

        function cancelEdit(id) {
            document.getElementById('task-text-' + id).style.display = 'block';
            document.getElementById('edit-form-' + id).style.display = 'none';        
        }

    </script>

    

</body>


</html>




