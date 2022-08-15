@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <div class="bg-light p-5 rounded mt-3">
        <h1>Project ({{ $project->name }}) Details</h1>

        @if (Session::has('message'))
            <div class="alert alert-info  mt-3" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif

        <a class="btn btn-primary mt-3" href="{{ route('tasks.create', ['project_id' => $project->id]) }}" role="button">Create Task</a>
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
                @foreach ($project->tasks as $key => $task)
                    <tr class="ui-state-default">
                        <th colspan="4">{{ $task->id }}</th>
                        <td colspan="4">{{ $task->name }}</td>
                        <td colspan="4">{{ $task->priority }}</td>
                        <td colspan="4">
                            <a class="btn btn-success" href="{{ route('tasks.edit', $task->id) }}"
                                title="Edit Task" role="button"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger" href="{{ route('tasks.delete', $task->id) }}" title="Delete Task" role="button"><i
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
                $.post("{{ route('tasks.priority') }}", {
                    id: id,
                    priority: priority
                });
            });
        });
        $("table tbody").trigger('sortupdate');
    </script>
@endsection
