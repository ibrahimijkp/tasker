<?php

declare(strict_types=1);

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SaveController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        //Check last priority
        $priority = 1;
        $last_record = Task::where('project_id', $request->post('project_id'))->orderBy('id', 'DESC')->first();
        if ($last_record !== null) {
            $priority = $last_record->priority + 1;
        }

        //Check if Task already exists
        $task = new Task;
        if ($request->post('id')) {
            $task = $task->find(
                $request->post('id')
            );
            //Set priority if it's Edit mode
            $priority = $task->priority;
        }

        //Save Task
        $task->name = $request->post('name');
        $task->priority = $priority;
        $task->project_id = $request->post('project_id');
        $task->save();

        //Set flash message and redirect
        session()->flash('message', 'Task saved successfully.');
        $redirectTo = route('projects.view', $task->project_id);

        return redirect()->to($redirectTo);
    }
}
