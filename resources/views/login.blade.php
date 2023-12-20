@extends('layout') 

@section('content')
    <h1>Login</h1>

    <!-- @if($errors->any())
        <script>
            // Display an alert if there are errors
            alert("{{ $errors->first() }}");
        </script>
    @endif -->

    <form action="{{ route('login.process') }}" method="post">
        @csrf
        <label for="id">ID:</label>
        <input type="text" name="id" required>
        
        <label for="user_type">User Type:</label>
        <select name="user_type" required>
            <option value="admin">Admin</option>
            <option value="evaluator">Evaluator</option>
            <option value="fyp_group">FYP Group</option>
        </select>
        
        <button type="submit">Login</button>
    </form>
@endsection
