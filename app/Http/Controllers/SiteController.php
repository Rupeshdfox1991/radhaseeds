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
use Validator;
use GuzzleHttp\Client;


class SiteController extends Controller
{
    public function index()
    {

        $productData = Products::where(['is_active' => 1, 'for_home' => 'Yes'])->orderBy('id', 'desc')->take(3)->get();
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

        $popularPosts = Blogs::where('is_active', '=', 1)
            ->where('slug', '!=', $slug) // Exclude the current blog
            ->orderBy('id', 'desc')
            ->get();

        return view('frontend.blogs.blog-details', compact('blog', 'popularPosts'));
    }

    public function careers()
    {
        return view('frontend.careers');
    }

    public function submitCareersForm(Request $request)
    {

        // Validate the form inputs, including reCAPTCHA
        $valid = Validator::make($request->all(), [
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
        ]);

        // If validation passes, proceed with the rest of your logic
        // If validation passes, proceed with the rest of your logic
        $client = new Client();

        // Get the token from the form input
        $recaptchaToken = $request->input('recaptcha_token');

        // Verify the token with Google
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $recaptchaToken,
            ]
        ]);

        $body = json_decode($response->getBody()->getContents());

        if (!$body->success || $body->score < 0.5) {
            // The verification failed or the score is too low
            return back()->withErrors(['recaptcha' => 'reCAPTCHA validation failed. Please try again.']);
        }

        if ($valid->fails()) {

            // If validation fails, redirect back to the form with errors and old input data
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            // Send email
            $data = [
                'name' => $request->input('first_name') . $request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('country_code') . $request->input('phone'),
                'message' => $request->input('comment'),
                'file' => $request->file('file'),
            ];


            Mail::to('rupeshdfoxmedia@gmail.com')->bcc('rupeshdfoxmedia@gmail.com')->send(new CareersFormMail($data));
            // Send thank-you email to the user
            Mail::to($data['email'])->send(new ThankYouForCareersFormMail($data));

            return redirect()->route('thank-you')->with('success', 'Message sent successfully!');
        }
    }


    public function contact_us()
    {
        $productData = Products::where(['is_active' => 1])->orderBy('id', 'desc')->get();
        return view('frontend.contact-us', compact('productData'));
    }

    public function submitContactForm(Request $request)
    {
        // dd($request->all());
        $valid = Validator::make($request->all(), [
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
            'comment' => 'required|string'
        ]);


        // If validation passes, proceed with the rest of your logic
        $client = new Client();

        // Get the token from the form input
        $recaptchaToken = $request->input('recaptcha_token');

        // Verify the token with Google
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $recaptchaToken,
            ]
        ]);

        $body = json_decode($response->getBody()->getContents());

        if (!$body->success || $body->score < 0.5) {
            // The verification failed or the score is too low
            return back()->withErrors(['recaptcha' => 'reCAPTCHA validation failed. Please try again.']);
        }

        if ($valid->fails()) {
            // If validation fails, redirect back to the form with errors and old input data
            return redirect()->back()->withErrors($valid)->withInput();
        } else {
            // Send email
            $data = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('country_code') . $request->input('phone'),
                'product' => $request->input('product'),
                'message' => $request->input('comment'),
            ];

            Mail::to('rupeshdfoxmedia@gmail.com')->bcc('rupeshdfoxmedia@gmail.com')->send(new ContactFormMail($data));


            // Send thank-you email to the user
            Mail::to($data['email'])->send(new ThankYouMail($data));

            return redirect()->route('thank-you')->with('success', 'Message sent successfully!');
        }
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