<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImageCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Image Category";
        $imagecategory = ImageCategory::where('is_active', '!=', 2)->orderBy('id', 'desc')->get();
        return view('admin.image-category.listing', compact('imagecategory', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        $title = "Add Image Category";
        $imagecategory = ImageCategory::find($id);

        return view('admin.image-category.form', compact('imagecategory', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id = null)
    {

        $rules = [
            'alt_tag' => 'nullable|string',
            'title_tag' => 'nullable|string',
            'for_home' => 'string|in:Yes,No|nullable',

        ];

        // If creating a new photo, add image validation
        if (!$id) {
            $rules['name'] = 'required|string|max:255|unique:image_categories';
            $rules['image'] = 'required|image|mimes:jpg,jpeg,png|max:2048'; // max 2MB
        } else {
            $rules['name'] = 'required|string|unique:image_categories,name,' . $id;
            $rules['image'] = 'nullable|image|mimes:jpg,jpeg,png|max:2048'; // max 2MB
        }

        // Validate request
        $validatedData = $request->validate($rules);
        // Generate a unique slug from the name field
        $slug = Str::slug($request->name);


        // Check if $item is null, create new Item; otherwise, update existing Item
        if (!$id) {
            $status = "saved";
            $imagecategory = new ImageCategory();
        } else {
            $status = "updated";
            $imagecategory = ImageCategory::find($id);
        }

        $imagecategory->slug = $slug;
        $imagecategory->name = $validatedData['name'];
        $imagecategory->alt_tag = $validatedData['alt_tag'];
        $imagecategory->title_tag = $validatedData['title_tag'];
        $imagecategory->for_home = $request->for_home ? $request->for_home : 'No';


        // Set other fields here

        if ($request->hasFile('image')) {
            // If a new image has been uploaded, process it
            $imageName = 'ICi_' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('imagecategory/'), $imageName);

            // Remove old image
            $existingImage = $request->old_img;

            if (!empty($existingImage)) {
                $imagePath = public_path("imagecategory/{$existingImage}");

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $imagecategory->image = $imageName;
        } else {
            // If no new image is uploaded, retain the existing or fallback to a default
            $imagecategory->image = $request->image ?? $request->old_img;
        }

        $imagecategory->save();

        return redirect()->route('image-category')->with('success', "Image category {$status} successfully.");
    }



    public function changeImageCatStatus(Request $request, $id, $status = 1)
    {
        $imagecategory = ImageCategory::find($id);
        if (!empty($imagecategory)) {
            $imagecategory->is_active = $status;
            $imagecategory->save();
            return redirect()->route('image-category')->with('success', 'Image Category status updated Successfully.');
        } else {
            return redirect()->route('image-category')->with('error', 'Something went wrong.');
        }
    }


    public function destroy(Request $request, $id, $status = 2)
    {
        $imagecategory = ImageCategory::find($id);
        if (!empty($imagecategory)) {
            $imagecategory->is_active = $status;
            $imagecategory->save();
            return redirect()->route('image-category')->with('success', 'Image Category deleted Successfully.');
        } else {
            return redirect()->route('image-category')->with('error', 'Something went wrong.');
        }
    }
}