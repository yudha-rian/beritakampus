<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
 // Create users and profiles
 $user = \App\Models\User::factory()->create([
 'name' => 'Alice',
 'email'=> 'alice@example.com',
 'password' => bcrypt('password')
 ]);
 $user->profile()->create([
 'address' => 'Jl. Merdeka 1',
 'phone' => '08123456789'
 ]);
 // Create a post with comments
 $post = \App\Models\Post::create([
 'user_id' => $user->id,
 'title' => 'Halo Dunia',
 'body' => 'Ini posting percobaan.'
 ]);
 $post->comments()->createMany([
 ['user_id'=> $user->id, 'comment_text' => 'Komentar pertama'],
 ['user_id'=> null, 'comment_text' => 'Komentar anonim'],
 ]);
 // Students & Courses
 $s1 = \App\Models\Student::create(['name'=>'Budi','nim'=>'S001']);
 $s2 = \App\Models\Student::create(['name'=>'Siti','nim'=>'S002']);
 $c1 =
\App\Models\Course::create(['course_name'=>'Matematika','code'=>'MATH101']);
 $c2 =
\App\Models\Course::create(['course_name'=>'Pemrograman','code'=>'CS101']);
 $s1->courses()->attach([$c1->id, $c2->id]);
 $s2->courses()->attach([$c2->id]);
}
}
