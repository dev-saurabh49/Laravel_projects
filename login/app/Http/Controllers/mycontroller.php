<?php

namespace App\Http\Controllers;

use App\Models\signuptbl;
use Illuminate\Http\Request;

class mycontroller extends Controller
{
    public function signup()
    {
        return view('signup');
    }
    public function signupcode(Request $result)
    {
        $a = $result->input('name');
        $b = $result->input('email');
        $c = $result->input('password');

        $data = new signuptbl();

        $check = signuptbl::where('email',$b)->first();
        if($check)
        {
            echo "Email Already Exists";
        }else 
        {
            echo "Data Saved";
        }

        $data->name = $result->input('name');
        $data->email = $result->input('email');
        $data->password = $result->input('password');

        $data->save();

        return redirect()->route('login')->with('success', 'Signup successful! You can now log in.');
        
    }

    public function login()
    {
        return view('login');
    }

    public function logincode(Request $result)
    {
        $a = $result->input('email');
        $b = $result->input('password');

        $data = signuptbl::where('email',$a)
        ->first();

        if($data)
        {
            if($data->password===$b)
            {
                $result->session()->put('user',$a);
                return redirect()->route('dashboard')->with('success', 'Login successfull');
            }else
            {
                return redirect()->route('login')->with('error', 'password not matched.');
            }
        }else
        {
            return redirect()->route('login')->with('error', 'Wrong email given.');
        }

    }

    public function dashboard(Request $result)
    {
        if($result->session()->has('user'))
        {
            $sesid = $result->session()->get('user');
            $data=signuptbl::where('email',$sesid)->first();
            return view('dashboard',compact('data'));
        }
        else
        {
            return view('login');
        }
        
    }

    public function changepassword(Request $result)
    {
        if($result->session()->has('user'))
        {
            return view('changepassword');
        }
        else
        {
            return redirect('login');
        }
    }
    public function changepasswordcode(Request $result)
    {
        $a = $result->input('opass');
        $b = $result->input('npass');
        $c = $result->input('cpass');

        $sesid = $result->session()->get('user');
        $data=signuptbl::where('email',$sesid)->first();

        if($data->password==$a)
        {
            if($a==$b)
            {
                // echo "All okay";
                $data->password=$b;
                $data->save();
                return redirect('login');
            }else{
                echo "New And confirm password not matched";
            }
        }else{
            echo "Old Password Not Matched";
        }
    }
    public function logout(Request $result)
    {
        if($result->session()->has('user'))
        {
            $result->session()->forget('user');
            return redirect('login');
        }else{
            return redirect('login');
        }
    }
}

?>
