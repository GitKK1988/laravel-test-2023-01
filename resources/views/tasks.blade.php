@extends('layouts/baselayout')

@section('content')


    <h2>news task</h2>

    <form action="/tasksstore" method="post">
        @csrf
        <input type="text" name="taskname" id="taskname">
        <input type="date" name="taskdate" id="taskdate">
        <input type="submit" value="Add Task">

    </form>

    <h1>Tasks</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task->taskname }} - {{ $task->taskdate }} </li>
        @endforeach
    </ul>



@endsection
