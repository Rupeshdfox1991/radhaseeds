<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Blog";
        $blogs = Blogs::where('is_active', '!=', 2)
            ->orderBy('id', 'desc')
            ->get();
        return view('admin/blog/blog-listing', compact('blogs', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Blog";
        return view('admin/blog/add-blog', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:160|string|unique:blogs',
            'title_tag' => 'min:2|max:40|string|nullable',
            'alt_tag' => 'min:2|max:40|string|nullable',
            'for_home' => 'string|in:Yes,No|nullable',
            'description' => 'string|nullable',
            'meta_title' => 'string|nullable',
            'meta_keyword' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'page_schema' => 'string|nullable',
            'og_code' => 'string|nullable',
            'image_thumb' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $requireData = $request->except(['_token']);

        // Generate a unique slug from the name field
        $slug = Str::slug($request->name);
        $requireData['slug'] = $slug;
        $requireData['user_id'] = Auth::user()->id;



        if (!empty($request->image_thumb)) {
            $image_thumbName = 'Bi_' . time() . '.' . $request->image_thumb->extension();
            $request->image_thumb->move(public_path('blogs-images/image_thumb'), $image_thumbName);
            $requireData['image_thumb'] = $image_thumbName;
        }

        $user = Blogs::create($requireData);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog inserted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogs $blog)
    {
        $title = "Edit Blog";

        return view('admin.blog.edit-blog', compact('blog', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogs $blog)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:160|string|unique:blogs,name,' . $blog->id,
            'title_tag' => 'min:2|max:40|string|nullable',
            'alt_tag' => 'min:2|max:40|string|nullable',
            'for_home' => 'string|in:Yes,No|nullable',
            'description' => 'string|nullable',
            'meta_title' => 'string|nullable',
            'meta_keyword' => 'string|nullable',
            'meta_description' => 'string|nullable',
            'page_schema' => 'string|nullable',
            'og_code' => 'string|nullable',
            'image_thumb' => 'image|mimes:jpg,jpeg,png',
        ]);
        $blog->name = $request->name ?? $blog->name;
        $blog->title_tag = $request->title_tag ?? $blog->title_tag;
        $blog->alt_tag = $request->alt_tag ?? $blog->alt_tag;
        $blog->image_thumb_title_tag = $request->image_thumb_title_tag ?? $blog->image_thumb_title_tag;
        $blog->image_thumb_alt_tag = $request->image_thumb_alt_tag ?? $blog->image_thumb_alt_tag;
        $blog->for_home = $request->for_home ?? 'No';
        $blog->meta_title = $request->meta_title ?? $blog->meta_title;
        $blog->meta_keyword = $request->meta_keyword ?? $blog->meta_keyword;
        $blog->meta_description = $request->meta_description ?? $blog->meta_description;
        $blog->page_schema = $request->page_schema ?? $blog->page_schema;
        $blog->og_code = $request->og_code ?? $blog->og_code;
        $blog->description = $request->description ?? $blog->description;

        // Generate a unique slug from the name field
        $slug = Str::slug($request->name);

        $blog->slug = $slug;
        $blog->user_id = Auth::user()->id;

        if ($request->hasFile('image_thumb')) {
            // If a new image has been uploaded, process it
            $image_thumbName = 'Bi_' . time() . '.' . $request->image_thumb->extension();
            $request->image_thumb->move(public_path('blogs-images/image_thumb'), $image_thumbName);

            // Remove old image_thumb
            $existingImage = $request->old_img;

            if (!empty($existingImage)) {
                $imagePath = public_path("blogs-images/image_thumb{$existingImage}");

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $blog->image_thumb = $image_thumbName;
        } else {
            // If no new image_thumb is uploaded, retain the existing or fallback to a default
            $blog->image_thumb = $request->image_thumb ?? $request->old_thumb_img;
        }



        $blog->save();
        return redirect()->route('admin.blogs.index')->with('success', 'Blogs updated Successfully.');
    }

    public function changeBlogStatus(Request $request, $id, $status = 1)
    {
        $blog = Blogs::find($id);
        if (!empty($blog)) {
            $blog->is_active = $status;
            $blog->save();
            return redirect()->route('admin.blogs.index')->with('success', 'Blogs status updated Successfully.');
        } else {
            return redirect()->route('admin.blogs.index')->with('danger', 'Something went wrong.');
        }

    }

    public function deleteBlog(Request $request, $id, $status = 2)
    {
        $blog = Blogs::find($id);
        if (!empty($blog)) {
            $blog->is_active = $status;
            $blog->save();
            return redirect()->route('admin.blogs.index')->with('success', 'Blogs deleted Successfully.');
        } else {
            return redirect()->route('admin.blogs.index')->with('danger', 'Something went wrong.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogs $blogs)
    {
        //
    }
}