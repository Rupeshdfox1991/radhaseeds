<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blogs;

class ApiController extends Controller
{
    //Create Blog
    public function createBlog(Request $request)
    {
    }
    //List Blog
    public function listBlog()
    {
        $blogs = Blogs::where('is_active', '!=', 2)->orderBy('id', 'desc')->get();
        return response()->json([
            "status" => 1,
            "message" => "Blogs Details",
            "data" => $blogs
        ]);
    }
    // Single Blog API
    public function getSingleBlog($id)
    {
        $blogs = Blogs::where('is_active', '!=', 2)->where('id', $id)->get();

        if (count($blogs) > 0) {
            return response()->json([
                "status" => 1,
                "message" => "Blog Details",
                "blog" => $blogs
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "message" => "Blog not found..",

            ]);
        }

    }

}