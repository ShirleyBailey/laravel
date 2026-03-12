<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create($title, $description, $status)
    {
        $tasks = DB::table('tasks')
            ->create(['title', $title,
                      'description', $description,
                      'status', $status])           
            ->get();

        return response()->json($tasks, 200);
    }

    public function read()
    {
        $tasks = DB::table('tasks')->get();

        return response()->json($tasks, 200);
    }

    public function read_only($id)
    {
        $tasks = DB::table('tasks')->where('id', $id)->get();            

        return response()->json($tasks, 200);
    }

    public function update($id, $title="", $description="", $status="")
    {
        $tasks = DB::table('tasks')
            ->where('id', $id)
            ->update(['title', $title,
                      'description', $description,
                      'status', $status])           
            ->get();

        return response()->json($tasks, 200);
    }

    public function delete($id)
    {
        $tasks = DB::table('tasks')
            ->delete('id', $id);            

        return response()->json($tasks, 200);
    }
}
