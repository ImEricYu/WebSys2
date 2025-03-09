<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function insertform()
    {
        return view('student_create');
    }


    public function insert(Request $request)
    {
        $name = $request->input('stud_name');
        DB::insert('insert into students (name) values(?)', [$name]);
        return redirect()->route('home')->with("success", "Inserted Successfully!");
    }

    public function index()
    {
        $users = DB::select('select * from students order by id asc');
        return view('student_view', ['users' => $users]);
    }


    public function showEdit($id)
    {
        $users = DB::select('select * from students where id = ?', [$id]);
        return view('student_update', ['users' => $users]);
    }
    public function edit(Request $request, $id)
    {
        $name = $request->input('stud_name');
        DB::update('update students set name = ? where id = ?', [$name, $id]);
        return redirect()->route('home')->with("success", "Updated Successfully!");
    }

    public function destroy($id)
    {
        DB::delete("delete from students where id = ?", [$id]);
        return redirect()->route('home')->with("success", "Deleted Successfully!");
    }
}
