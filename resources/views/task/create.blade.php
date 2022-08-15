@extends('layouts.app')

@section('title', 'Create Task')

@section('content')
    <div class="bg-light p-5 rounded mt-3">
        <h1>Create Task for Project ({{ $project->name }})</h1>
        <form class="mt-5" method="POST" action="{{ route('tasks.save') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Task Name">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
            </div>
            <input class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>
@endsection

@section('scripts')
@endsection
