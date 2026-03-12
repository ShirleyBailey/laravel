<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(Request $request)
    {
        $tasks = Task::create(
                ['title' => $request->title,
                'description' => $request->description,
                'status' => $request->status]
            );                       

        return response()->json($tasks, 200);
    }

    public function read()
    {
        $tasks = DB::table('tasks')->get();

        return response()->json($tasks, 200);
    }

    public function read_one($id)
    {
        $tasks = DB::table('tasks')->where('id', $id)->get();            

        return response()->json($tasks, 200);
    }

    public function update($id, Request $request)
    {
        if($request->title)
            $tasks = Task::where('id', $id)->update(['title' => $request->title]);     
        if($request->description)
            $tasks = Task::where('id', $id)->update(['description' => $request->description]);     
        if($request->status)
            $tasks = Task::where('id', $id)->update(['status' => $request->status]);     

        return response()->json('success', 200);
    }

    public function delete($id)
    {
        $tasks = DB::table('tasks')->where('id', $id)->delete();            

        return response()->json('success', 200);
    }
}
