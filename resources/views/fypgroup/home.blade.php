@extends('layout')

@section('content')
    <h1>FYP Group Home Page</h1>

    <div>
        <h2>Project Details</h2>
        <p>Title: {{ $project->title }}</p>
        <p>Description: {{ $project->description }}</p>
        <p>Location: {{ $project->location ?? 'Not specified' }}</p>

        <p>Evaluator Count: {{ $evaluatorCount }}</p>

        <h2>Keywords</h2>
        <ul>
            @foreach($keywords as $keyword)
                <li>{{ $keyword->keyword }}</li>
            @endforeach
        </ul>

        <div>
            <h2>Edit Details</h2>
            <form action="{{ route('edit.details') }}" method="post">
                @csrf
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ $project->title }}" required>

                <label for="description">Description:</label>
                <textarea name="description" required>{{ $project->description }}</textarea>

                <label for="location">Location:</label>
                <input type="text" name="location" value="{{ $project->location ?? '' }}">

                <button type="submit">Save</button>
            </form>
        </div>

        <div>
            <h2>Edit Keywords</h2>
            <form action="{{ route('edit.keywords') }}" method="post">
                @csrf
                <label for="keywords">Keywords (comma-separated):</label>
                <input type="text" name="keywords" value="{{ implode(', ', $keywords) }}" required>

                <button type="submit">Save</button>
            </form>
        </div>
    </div>

@endsection
