<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = DB::table('students')
        ->paginate(4)
        ->appends(['sort' => 'votes'])
        ;
        
        // $users = DB::table('students')->where('id',2)->get();
        // $users = DB::table('students')->find(4);
        // return $users;
        // dd($users);
        // dump($users);
        // echo "Hello";

        // foreach($users as $user){
        //     echo $user->name . "</br>";
        // }

        return view('allusers',['data'=>$users]);
    }

    public function singleUser(string $id)
    {
        $user = DB::table('students')->where('id',$id)->get();
        // return $users;
        return view('user',['data' => $user]);
    }

    public function addUser(Request $req)
    {
        $user = DB::table('students')
        ->insert([ //upsert
            'name' => $req->name,
            'email' => $req->email,
            'age' => $req->age,
            'city' => $req->city,
            
        ])
        // ->insertOrIgnore([
        //     [
        //         'name' => 'Ravi Kumar',
        //         'email' => 'ravi@gmail.com',
        //         'age' => 33,
        //         'city' => 'goa',
                
        //     ],
        //     [
        //         'name' => 'Krishna Kumar',
        //         'email' => 'krishna@gmail.com',
        //         'age' => 21,
        //         'city' => 'bihar',
                
        //     ],
        //     [
        //         'name' => 'Jijabai',
        //         'email' => 'krishna@gmail.com',
        //         'age' => 21,
        //         'city' => 'bihar',
                
        //     ]
        // ])
        ;
        // dd($user);
        if($user)
        {
            return redirect()->route('home');
        }
        else
        {
            echo "Not saved ";
        }
    }

    public function updatePage(string $id)
    {
        // $user = DB::table('students')->where('id',$id)->get();
        $user = DB::table('students')->find($id);
        // return $user;
        return view('updateuser',['data' => $user]);
    }

    public function updateUser(Request $req , $id)
    {
        $user = DB::table('students')
        ->where('id',$id)
        ->update([
            'name' => $req->name,
            'email' => $req->email,
            'age' => $req->age,
            'city' => $req->city,
        ]);
        // $user = DB::table('students')
        // ->where('id',$id)
        // ->increment('age');

        if($user){
            return redirect()->route('home');
        }
    }

    public function deleteUser(string $id)
    {
        $user = DB::table('students')
        ->where('id',$id)
        ->delete();

        if($user){
            return redirect()->route('home');
        }
    }
}
