@extends('layouts.app')

@section('content')

    <h2>{{ $page_title }}</h2>
    <p>{{ $page_description }}</p>

    <h3>Danh sách công việc:</h3>
    <ul>
        @foreach($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>

@endsection
