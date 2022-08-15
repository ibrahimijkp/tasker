@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <div class="bg-light p-5 rounded mt-3">
        <h1>Create Project</h1>
        <form class="mt-5" method="POST" action="{{ route('projects.save') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Project Name">
            </div>
            <input class="btn btn-primary" type="submit" value="Save">
        </form>
    </div>
@endsection

@section('scripts')
@endsection
