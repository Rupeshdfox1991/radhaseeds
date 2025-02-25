<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;

use App\Models\Careers;
use App\Models\Products;
use App\Models\Product_category;
use App\Models\ImageCategory;
use App\Models\ImageGallery;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\CareersFormMail;
use App\Mail\ThankYouMail;
use App\Mail\ThankYouForCareersFormMail;




class SiteController extends Controller
{
    public function index()
    {

        $productData = Products::where(['is_active' => 1, 'for_home' => 'Yes'])->orderBy('id', 'desc')->take(4)->get();
        $blogs = Blogs::where(['is_active' => 1, 'for_home' => 'Yes'])->orderBy('id', 'desc')->take(3)->get();

        return view('frontend.home', compact('productData', 'blogs'));
    }

    public function aboutUs()
    {
        return view('frontend.about-us');
    }

    public function gallery()
    {
        $imageCategory = ImageCategory::where('is_active', '=', 1)
            ->orderBy('id', 'desc')->get();
        return view('frontend.gallery.gallery', compact('imageCategory'));
    }

    public function galleryDetails($slug)
    {
        $imageCategory = ImageCategory::where(['is_active' => 1, 'slug' => $slug])->firstOrFail();
        $id = $imageCategory->id;
        $imagecategoryName = $imageCategory->name;
        $imageGallery = ImageGallery::where(['is_active' => 1, 'img_cat_id' => $id])
            ->orderBy('id', 'desc')->get();
        return view('frontend.gallery.gallery-details', compact('imageGallery', 'imagecategoryName'));
    }

    public function blog()
    {
        $blogs = Blogs::where('is_active', '=', 1)
            ->orderBy('id', 'desc')->get();

        return view('frontend.blogs.blog-listing', compact('blogs'));
    }

    public function blog_details($slug)
    {
        $blog = Blogs::where('slug', $slug)->firstOrFail();

        return view('frontend.blogs.blog-details', compact('blog'));
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function submitCareersForm(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all());
        // exit;
        // Validate the form inputs, including reCAPTCHA
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/',
            ],
            'country_code' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'file' => 'required|file|max:20000|mimes:pdf,doc,docx',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        // If validation passes, proceed with the rest of your logic

        // Send email
        $data = [
            'name' => $request->input('first_name') . $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone') . $request->input('country_code'),
            'message' => $request->input('comment'),
            'file' => $request->file('file'),
        ];


        Mail::to('rupesh@dfoxmediadigital.com')->bcc('rupesh@dfoxmediadigital.com')->send(new CareersFormMail($data));
        // Send thank-you email to the user
        Mail::to($data['email'])->send(new ThankYouForCareersFormMail($data));

        return redirect()->route('thank-you')->with('success', 'Message sent successfully!');
    }


    public function contact_us()
    {
        $productData = Products::where(['is_active' => 1])->orderBy('id', 'desc')->get();
        return view('frontend.contact-us', compact('productData'));
    }

    public function submitContactForm(Request $request)
    {
        // dd($request->all());
        // Validate the form inputs, including reCAPTCHA
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'regex:/^\w+[-\.\w]*@(?!(?:outlook|myemail|yahoo)\.com$)\w+[-\.\w]*?\.\w{2,4}$/',
            ],
            'country_code' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:10',
            'product' => 'required',
            'comment' => 'required|string',
            'g-recaptcha-response' => 'required|recaptcha',

        ]);


        // If validation passes, proceed with the rest of your logic

        // Send email
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('country_code') . $request->input('phone'),
            'product' => $request->input('product'),
            'message' => $request->input('comment'),
        ];

        Mail::to('rupesh@dfoxmediadigital.com')->bcc('rupesh@dfoxmediadigital.com')->send(new ContactFormMail($data));


        // Send thank-you email to the user
        Mail::to($data['email'])->send(new ThankYouMail($data));

        return redirect()->route('thank-you')->with('success', 'Message sent successfully!');
    }


    public function careerDetails($slug)
    {
        $careerDetails = Careers::where('slug', $slug)->firstOrFail();

        return view('frontend.career.career-details', compact('careerDetails'));
    }


    public function productCategory()
    {
        $productCategory = Product_category::where(['is_active' => 1])->orderBy('id', 'desc')->get();

        return view('frontend.products.product-category', compact('productCategory'));
    }
    public function productListing($slug)
    {
        $productCategory = Product_category::where('slug', $slug)->firstOrFail();
        $productCategoryName = $productCategory->name;
        $products = Products::where(['pro_cat_id' => $productCategory->id, 'is_active' => 1])->orderBy('id', 'desc')->get();

        return view('frontend.products.product-listing', compact('products', 'productCategoryName'));
    }
    public function productDetails($slug)
    {
        $productDetails = Products::where('product_slug', $slug)->firstOrFail();


        return view('frontend.products.product-details', compact('productDetails'));
    }

    public function thank_you()
    {
        return view('frontend.thank-you');
    }

}