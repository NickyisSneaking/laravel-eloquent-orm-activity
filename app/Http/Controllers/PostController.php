<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //is he a student? yes he is a student, he is a student of the year.
    //maybe he is just afraid of getting dropped out of the school again
    public $school = "Kim Student of the year"; 

    public function index()
    {
        //get basic information about the student and return it as a json response
        $student = "Kim";
        $message = "Hello, $student";
        return response()->json(Post::latest()->get());

        return response() ->json([
            'student' => $student,
            'message' => $message,
        ]);
    }

    public function read()
    {
        $school = $this->school;
        $message = "hello, $school";

        return response() ->json([
            'message' => $message,
            'school' => $school,
        ]);
    }

    public function greet($name)
    {
        $message = "Hello, $name";

        return response() ->json([
            'message' => $message,
            'name' => $name,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $post = Post::create([
            'message' => $request->message,
        ]);

        return response()->json($post, 201);
    }
}