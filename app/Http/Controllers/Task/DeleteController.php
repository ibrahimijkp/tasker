<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $task = Task::find(
            $request->id
        );

        //Delete Task
        $task->delete();

        //Set flash message and redirect
        session()->flash('message', 'Task deleted successfully.');
        $redirectTo = route('projects.view', $task->project_id);

        return redirect()->to($redirectTo);
    }
}
