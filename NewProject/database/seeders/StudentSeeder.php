<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{

    public function run(): void
    {

        for ($i=0; $i <10 ; $i++) { 
            student::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->email(),
            ]);
        }

        
        


        // $students = collect( // collect methods
        //     [
        //     [
        //         'name' => "Saurabh Pandey",
        //         'email' => "test@test.com"
        //     ],
        //     [
        //         'name' => "Ankit Pandey",
        //         'email' => "dev.ankit@gmail.com"
        //     ],
        //     [
        //         'name' => "Nisga Pandey",
        //         'email' => "nisha@gmail.com"

        //     ]
        // ]
        // );

        // $json = File::get(path:'database/json/students.json');

        // $students = collect(json_decode($json));
        // $students->each(function ($stu){
        //     student::insert($stu);
        // });

        // student::create([
        //     'name' => "Saurabh Pandey",
        //     'email' => "k50553005@gmail.com"
        // ]);

        // $students->each(function ($stu){
        //     student::create([
        //         'name' => $stu->name,
        //         'email' => $stu->email,
        //     ]);
        // });


    }
}
