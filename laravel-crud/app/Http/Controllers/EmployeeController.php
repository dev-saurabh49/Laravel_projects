<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees  = DB::table('employees')->get();

        // sending data in view
        return view('employees.index',compact('employees'));
    }

    /// create
    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'phone' => 'required'
        ]);

        DB::table('employees')->insert([
            'name'=>$req->name,
            'email'=>$req->email,
            'city'=>$req->city,
            'phone'=>$req->phone,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        // redirect
        return redirect()->route('employees.index')->with('success','employee added succes');
    }

    public function edit(string $id)
    {
        $employees = DB::table('employees')->where('id',$id)->first();
        return view('employees.edit',compact('employees'));
    }

    public function update(Request $req, string $id)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'phone' => 'required'
        ]);

        DB::table('employees')->where('id',$id)->update([
            'name'=>$req->name,
            'email'=>$req->email,
            'city'=>$req->city,
            'phone'=>$req->phone,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        return redirect()->route('employees.index')->with('success','employee added succes');
    }

    public function destroy(string $id)
    {
        DB::table('employees')->where('id',$id)->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
}
