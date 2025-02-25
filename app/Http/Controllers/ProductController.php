<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product_category;
use App\Models\Products;


class ProductController extends Controller
{
    public function index()
    {
        $title = "Products";
        $productData = Products::where('is_active', '!=', 2)->orderBy('id', 'desc')->get();
        return view('admin.product.product_list', compact('productData', 'title'));
    }

    public function create()
    {
        $title = "Add Product";
        $ProductCategorys = Product_category::where('is_active', '=', 1)->get();

        return view('admin.product.create_product', compact('ProductCategorys', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pro_cat_id' => 'required|integer',
            'product_name' => 'required|string|max:255|unique:products',
            'product_code' => 'nullable|string',
            'product_desc' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title_tag' => 'nullable|string|max:255',
            'alt_tag' => 'nullable|string|max:255',
            'related_product_id' => 'nullable|string',
            'for_home' => 'string|in:Yes,No|nullable',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'page_schema' => 'nullable|string',
            'og_code' => 'nullable|string',

        ]);

        // Add the generated slug to the validated data
        $slug = Str::slug($request->product_name);


        $product = new Products();
        $product->pro_cat_id = $request->pro_cat_id;
        $product->product_name = $request->product_name;
        $product->product_slug = $slug;
        $product->product_code = $request->product_code;
        $product->product_desc = $request->product_desc;
        $product->title_tag = $request->title_tag;
        $product->alt_tag = $request->alt_tag;

        $product->related_product_id = $request->related_product_id;
        $product->for_home = $request->for_home ?? 'No';
        $product->meta_title = $request->meta_title;
        $product->meta_keyword = $request->meta_keyword;
        $product->meta_description = $request->meta_description;
        $product->page_schema = $request->page_schema;
        $product->og_code = $request->og_code;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'PI_' . time() . '.' . $image->extension();
            $image->move(public_path('product-images'), $imageName);
            $product->image = $imageName;
        }


        $product->save();

        return redirect()->route('product-list')->with('success', 'Product created successfully.');
    }


    public function edit(Request $request, $id)
    {
        $productData = Products::find($id);
        $ProductCategorys = Product_category::where('is_active', '!=', 2)->get();

        return view('admin.product.edit_product', compact('productData', 'ProductCategorys'));
    }

    public function update(Request $request, $id)
    {
        // Retrieve the record to update
        $updateProducts = Products::findOrFail($id);

        $request->validate([
            'pro_cat_id' => 'required|integer',
            'product_name' => 'required|string|max:255|unique:products,product_name,' . $id,
            'product_code' => 'nullable|string',
            'product_desc' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'title_tag' => 'nullable|string|max:255',
            'alt_tag' => 'nullable|string|max:255',
            'related_product_id' => 'nullable|string',
            'for_home' => 'string|in:Yes,No|nullable',
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'page_schema' => 'nullable|string',
            'og_code' => 'nullable|string',

        ]);

        // Add the generated slug to the validated data
        $slug = Str::slug($request->product_name);



        $updateProducts->pro_cat_id = $request->pro_cat_id;
        $updateProducts->product_name = $request->product_name;
        $updateProducts->product_slug = $slug;
        $updateProducts->product_code = $request->product_code;
        $updateProducts->product_desc = $request->product_desc;
        $updateProducts->title_tag = $request->title_tag;
        $updateProducts->alt_tag = $request->alt_tag;
        $updateProducts->related_product_id = $request->related_product_id;
        $updateProducts->for_home = $request->for_home ?? 'No';
        $updateProducts->meta_title = $request->meta_title;
        $updateProducts->meta_keyword = $request->meta_keyword;
        $updateProducts->meta_description = $request->meta_description;
        $updateProducts->page_schema = $request->page_schema;
        $updateProducts->og_code = $request->og_code;

        // Handle image upload (if updating the image)
        if ($request->hasFile('image')) {
            // If a new image has been uploaded, process it
            $imageName = 'PI_' . time() . '.' . $request->image->extension();
            $request->image->move(public_path('product-images/'), $imageName);

            // Remove old image
            $existingImage = $request->old_img;

            if (!empty($existingImage)) {
                $imagePath = public_path("product-images/{$existingImage}");

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }

            $updateProducts->image = $imageName;
        } else {
            // If no new image is uploaded, retain the existing or fallback to a default
            $updateProducts->image = $request->image ?? $request->old_img;
        }


        $updateProducts->save();

        return redirect()->route('product-list')->with('success', 'Product updated successfully.');
    }


    public function changeProductStatus(Request $request, $id, $status = 1)
    {
        $product = Products::find($id);
        if (!empty($product)) {
            $product->is_active = $status;
            $product->save();
            return redirect()->route('product-list')->with('success', 'Product status updated Successfully.');
        } else {
            return redirect()->route('product-list')->with('danger', 'Something went wrong.');
        }

    }

    public function deleteProduct(Request $request, $id, $status = 2)
    {
        $product = Products::find($id);
        if (!empty($product)) {
            $product->is_active = $status;
            $product->save();
            return redirect()->route('product-list')->with('success', 'Product deleted Successfully.');
        } else {
            return redirect()->route('product-list')->with('danger', 'Something went wrong.');
        }

    }



    //get product filter category
    public function getProductSubcategory($pro_cat_id)
    {
        try {
            $productsubcategory = ProductSubcategory::where('pro_cat_id', $pro_cat_id)->where('is_active', '=', 1)->get();
            return response()->json($productsubcategory);
        } catch (\Exception $e) {
            // Log any exception that occurs
            \Log::error("Error: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    //get product filter
    public function productFilter($pro_filt_cat_id = null)
    {

        $proFiltCatId = explode(",", $pro_filt_cat_id);

        try {
            $productFilter = product_filter::whereIn('pro_filt_cat_id', $proFiltCatId)->where('is_active', '=', 1)->get();
            return response()->json($productFilter);
        } catch (\Exception $e) {
            // Log any exception that occurs
            \Log::error("Error: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    //get product series
    public function productSeries($pro_filt_id = null)
    {
        $proFiltId = explode(",", $pro_filt_id);

        try {
            $productSeries = product_series::whereIn('pro_filt_id', $proFiltId)->where('is_active', '=', 1)->get();
            return response()->json($productSeries);
        } catch (\Exception $e) {
            // Log any exception that occurs
            \Log::error("Error: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}