<?php

namespace App\Http\Controllers;

use App\Models\ProductEnquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ProductEnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Product Enquiry";
        $productEnquiry = ProductEnquiry::where('is_active', '!=', 2)->orderBy('id', 'desc')->get();

        return view('admin/productenquiry/productenquiry-listing', compact('productEnquiry', 'title'));
    }

    public function create()
    {
        return view('admin/productenquiry/test');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function deleteProductEnquiry(Request $request, $id, $status = 2)
    {
        $productEnquiry = ProductEnquiry::find($id);
        if (!empty($productEnquiry)) {
            $productEnquiry->is_active = $status;
            $productEnquiry->save();
            return redirect()->route('product-enquiry')->with('success', 'Product Enquiry deleted Successfully.');
        } else {
            return redirect()->route('product-enquiry')->with('danger', 'Something went wrong.');
        }

    }
}