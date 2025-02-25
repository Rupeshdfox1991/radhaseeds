<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use App\Models\ImageCategory;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $title = "Gallery";
        $gallery = ImageGallery::where('is_active', '!=', 2)->orderBy('id', 'desc')->get();
        return view('admin.gallery.listing', compact('gallery', 'title'));
    }

    public function create()
    {
        $title = "Add Gallery";
        $imagecategory = ImageCategory::where('is_active', '!=', 2)->get(['id', 'name']);

        return view('admin.gallery.form', compact('imagecategory', 'title'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'img_cat_id' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each uploaded file
        ]);


        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image in storage/app/public directory
                $imageName = 'Gi_' . rand() . '.' . $image->extension();
                $image->move(public_path('gallery-images/'), $imageName);

                // Save image data into database
                $gallery = new ImageGallery();
                $gallery->images = $imageName;
                $gallery->img_cat_id = $request->img_cat_id;

                $gallery->save();
            }
            return redirect()->route('image-gallery')->with('success', 'Images uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No images were uploaded.');
    }

    public function editGallery($id)
    {
        $title = "Edit Gallery";
        $gallery = ImageGallery::find($id);
        $imagecategory = ImageCategory::where('is_active', '!=', 2)->get(['id', 'name']);

        return view('admin.gallery.edit-gallery', compact('gallery', 'imagecategory', 'title'));
    }

    public function updateGallery(Request $request, $id)
    {

        $validatedData = $request->validate([
            'img_cat_id' => 'required',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each uploaded file
        ]);

        $gallery = ImageGallery::find($id);


        $gallery->img_cat_id = $validatedData['img_cat_id'];


        // Set other fields here

        if ($request->hasFile('images')) {
            // If a new image has been uploaded, process it
            $imageName = 'Ci_' . rand() . '.' . $request->images->extension();
            $request->images->move(public_path('gallery-images/'), $imageName);

            // Remove old image
            $existingImage = $request->old_img;

            if (!empty($existingImage)) {
                $imagePath = public_path("gallery-images//{$existingImage}");

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $gallery->images = $imageName;
        } else {
            // If no new image is uploaded, retain the existing or fallback to a default
            $gallery->images = $request->images ?? $request->old_img;
        }

        $gallery->save();

        return redirect()->route('image-gallery')->with('success', "Gallery image Updated successfully.");
    }

    public function changeGalleryStatus(Request $request, $id, $status = 1)
    {
        $gallery = ImageGallery::find($id);
        if (!empty($gallery)) {
            $gallery->is_active = $status;
            $gallery->save();
            return redirect()->route('image-gallery')->with('success', 'Gallery image status updated Successfully.');
        } else {
            return redirect()->route('image-gallery')->with('error', 'Something went wrong.');
        }
    }


    public function deleteGallery(Request $request, $id, $status = 2)
    {
        $gallery = ImageGallery::find($id);
        if (!empty($gallery)) {
            $gallery->is_active = $status;
            $gallery->save();
            return redirect()->route('image-gallery')->with('success', 'Gallery image deleted Successfully.');
        } else {
            return redirect()->route('image-gallery')->with('error', 'Something went wrong.');
        }
    }
}