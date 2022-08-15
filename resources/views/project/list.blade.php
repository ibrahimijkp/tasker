@extends('layouts.app')

@section('title', 'Projects Listings')

@section('content')
    <div class="bg-light p-5 rounded mt-3">
        <h1>Projects</h1>

        @if (Session::has('message'))
            <div class="alert alert-info  mt-3" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <a class="btn btn-primary mt-3" href="{{ route('projects.create') }}" role="button">Create Project</a>
        <table class="table table-hover mt-3">
            <thead>
                <tr class="ui-state-default">
                    <th colspan="4">ID</th>
                    <th colspan="4">Name</th>
                    <th colspan="4">Priority</th>
                    <th colspan="4">Actions</th>
                </tr>
            </thead>
            <tfoot>
                <tr class="ui-state-default">
                    <th colspan="4">ID</th>
                    <th colspan="4">Name</th>
                    <th colspan="4">Priority</th>
                    <th colspan="4">Actions</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($projects as $key => $project)
                    <tr class="ui-state-default">
                        <th colspan="4">{{ $project->id }}</th>
                        <td colspan="4">{{ $project->name }}</td>
                        <td colspan="4">{{ $project->priority }}</td>
                        <td colspan="4">
                            <a class="btn btn-primary" href="{{ route('projects.view', $project->id) }}" title="View Project" role="button"><i
                                    class="far fa-eye"></i></a>
                            <a class="btn btn-success" href="{{ route('projects.edit', $project->id) }}"
                                title="Edit Project" role="button"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" data-href="{{ route('projects.delete', $project->id) }}"
                                href="{{ route('projects.delete', $project->id) }}" title="Delete Project" role="button"><i
                                    class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $("table tbody").sortable();
        $("table tbody").on('sortupdate', function(event, ui) {
            $(this).children().each(function(index) {
                var priority = index + 1
                $(this).find('td').last().prev().html(priority);
                var id = $(this).find('th').html();
                $.post("{{ route('projects.priority') }}", {
                    id: id,
                    priority: priority
                });
            });
        });
        $("table tbody").trigger('sortupdate');
    </script>
@endsection
