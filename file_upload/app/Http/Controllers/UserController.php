<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        return view('file-upload' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // dd($file);
        $request->validate(
            [
                'photo' => 'required|image'
            ]
            );
            $file = $request->file('photo');
            // $extension = $file->getClientOriginalExtension();
            // return $extension;


            $path = $request->file('photo')->store('images','public');
            // $file_name = time().'_'.$file->getClientOriginalName();
            User::create([
                'file' => $path,
            ]);
            // $path = $request->file('photo')->storeAs('images', $file_name,'public');
            return redirect()->route('user.index')->with('status',"Image Uploaded success");
            // // return $path;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user =  User::find($id);
        return view('file-update' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   

        $user = User::find($id);
        if($request->hasFile('photo'))
        {
            $image_path  = public_path('storage/') . $user->file;
                if(file_exists($image_path))
                {
                    @unlink($image_path);
                }    

            $path = $request->photo->store('images','public');
            $user->file = $path;
            $user->save();

            return redirect()->route('user.index')->with('status','Image Updated Success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = USer::find($id);

        $user->delete();

        $image_path  = public_path('storage/') . $user->file;
        if(file_exists($image_path))
        {
            @unlink($image_path);
        }    

        return redirect()->route('user.index')->with('status','Image deleted Success');
    }
}
