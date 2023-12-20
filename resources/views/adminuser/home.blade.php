@extends('layout')  
@section('content')
    <h2>Welcome, {{ $name }}!</h2>

    @if($projects->isEmpty())
        <p>No projects found based on your preferences.</p>
    @else
        <div>
            <h3>Projects based on Your Preferences:</h3>
            @foreach($projects as $project)
                <div>
                    <h4>{{ $project->title }}</h4>
                    <p>{{ $project->description }}</p>
                    <p>Location: {{ $project->location }}</p>
                    
                    @php
                        $existingRating = \DB::table('evaluations')
                            ->where('project_id', $project->id)
                            ->where('evaluator_id', $request->session()->get('id'))
                            ->value('score');
                    @endphp

                    <!-- Display the rating button -->
                    @if(isset($evaluations[$project->id]))
                        <p>Rating: <span id="rating_{{ $project->id }}">{{ $evaluations[$project->id]->score }}</span><button data-project-id="{{ $project->id }}" data-evaluator-id="{{ $request->session()->get('id') }}" onclick="rateProject('{{ $project->id }}', '{{ $request->session()->get('id') }}', '{{ $existingRating }}')">Modify Rating</button></p>
                    @else
                        <button data-project-id="{{ $project->id }}" data-evaluator-id="{{ $request->session()->get('id') }}" onclick="rateProject('{{ $project->id }}', '{{ $request->session()->get('id')}}', '{{ $existingRating }}')">Rate</button>
                    @endif
                </div>
            @endforeach
        </div>
    @endif

    <script>
        function rateProject(projectId, evaluatorId, existingRating=null) {
            console.log(projectId, evaluatorId, existingRating);
            var newRating = prompt('Enter a rating between 1 and 10:', existingRating);
            if (newRating !== null) {
                newRating = parseInt(newRating);

                if (!isNaN(newRating) && newRating >= 1 && newRating <= 10) {
                    // Update the content of the rating span
                    document.getElementById('rating_' + projectId).innerText = newRating;
                    
                    fetch('{{ route("update.rating") }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            projectId: projectId,
                            newRating: newRating,
                            evaluatorId: evaluatorId
                        })
                    })

                    // For simplicity, let's assume the update is successful
                    alert('Rating updated successfully.');
                } else {
                    alert('Invalid rating. Please enter a number between 1 and 10.');
                }
            }
        }
    </script>
@endsection
