<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Product Category";
        $ProductCategorys = Product_category::where('is_active', '!=', 2)->get();

        return view('admin.ProductCategory.ProductCategoryList', compact('ProductCategorys', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add Category";
        return view('admin.ProductCategory.ProductCategoryCreate', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'page_schema' => 'nullable|string',
            'og_code' => 'nullable|string',
            'title_tag' => 'nullable|string|max:255',
            'alt_tag' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // Example validation for image upload
            // 'description' => 'nullable|string',

        ]);

        $slug = Str::slug($validatedData['name']);

        // Add the generated slug to the validated data
        $validatedData['slug'] = $slug;

        if (!empty($request->image)) {
            $imageName = 'Pc_' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('ProductCategorys/'), $imageName);
            // $requireData['image'] = $imageName;
        } else {
            $imageName = '';
        }

        // Create a new instance of your model and fill it with the validated data
        $Product_category = new Product_category();
        $Product_category->fill($validatedData);

        // Assign the image path to the 'image' attribute
        $Product_category->image = $imageName;

        // Save the model to the database
        $Product_category->save();

        return redirect()->route('admin.product_categories.index')->with('success', 'Product categories inserted successfully');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_category  $product_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_category $product_category)
    {
        return view('admin.ProductCategory.editProductCategory', compact('product_category'));
    }



    public function update(Request $request, Product_category $product_category)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'page_schema' => 'nullable|string',
            'og_code' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048', // Example validation for image upload
            'title_tag' => 'nullable|string|max:255',
            'alt_tag' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);
        $product_category->name = $request->name ?? $product_category->name;
        $product_category->meta_title = $request->meta_title ?? $product_category->meta_title;
        $product_category->meta_keyword = $request->meta_keyword ?? $product_category->meta_keyword;
        $product_category->meta_description = $request->meta_description ?? $product_category->meta_description;
        $product_category->page_schema = $request->page_schema ?? $product_category->page_schema;
        $product_category->og_code = $request->og_code ?? $product_category->og_code;

        $product_category->title_tag = $request->title_tag ?? $product_category->title_tag;
        $product_category->alt_tag = $request->alt_tag ?? $product_category->alt_tag;
        // $product_category->description = $request->description ?? $product_category->description;

        // Generate a unique slug from the name field
        $slug = Str::slug($request->name);
        $requireData['slug'] = $slug;

        $product_category->slug = $slug;


        if ($request->hasFile('image')) {
            // If a new image has been uploaded, process it
            $imageName = 'Pc_' . rand() . '.' . $request->image->extension();
            $request->image->move(public_path('ProductCategorys/'), $imageName);

            // Remove old image
            $existingImage = $request->old_img;

            if (!empty($existingImage)) {
                $imagePath = public_path("ProductCategorys/{$existingImage}");

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $product_category->image = $imageName;
        } else {
            // If no new image is uploaded, retain the existing or fallback to a default
            $product_category->image = $request->image ?? $request->old_img;
        }

        $product_category->save();
        return redirect()->route('admin.product_categories.index')->with('success', 'Product categories updated Successfully.');
    }

    public function changeProduct_categoriesStatus(Request $request, $id, $status = 1)
    {
        $product_category = Product_category::find($id);
        if (!empty($product_category)) {
            $product_category->is_active = $status;
            $product_category->save();
            return redirect()->route('admin.product_categories.index')->with('success', 'Product Category status updated Successfully.');
        } else {
            return redirect()->route('admin.product_categories.index')->with('danger', 'Something went wrong.');
        }

    }

    public function deleteProduct_categories(Request $request, $id, $status = 2)
    {
        $product_category = Product_category::find($id);
        if (!empty($product_category)) {
            $product_category->is_active = $status;
            $product_category->save();
            return redirect()->route('admin.product_categories.index')->with('success', 'Product Category deleted Successfully.');
        } else {
            return redirect()->route('admin.product_categories.index')->with('danger', 'Something went wrong.');
        }

    }


}