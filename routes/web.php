<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin_user;

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageCategoryController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\ProductEnquiryController;



Route::get('/admin', [AuthenticationController::class, 'login']);

Route::controller(AuthenticationController::class)->group(function () {
    Route::get('/admin/register', 'register')->name('register');
    Route::post('/admin/register', 'storeUser')->name('store_user');
    Route::get('admin', 'login')->name('admin');
    Route::post('admin', 'authenticate')->name('authenticate');
    Route::get('admin/logout', 'logout')->name('logout');
});


Route::group(['middleware' => ['checkRoles']], function () {
    Route::group(['prefix' => '/admin'], function () {
        Route::get('/dashboard', [Admin_user::class, 'dashboard'])->name('dashboard');
        Route::get('/admin-user', [Admin_user::class, 'admin_user'])->name('admin_user');
        Route::get('/profile', [Admin_user::class, 'userProfile'])->name('user_profile');
        Route::get('/edit-user/{id}', [Admin_user::class, 'editUsers'])->name('admin_user_edit');
        Route::put('/update-user/{id}', [Admin_user::class, 'updateUsers'])->name('admin_user_update');
        Route::get('/change-user-status/{id}/{status?}', [Admin_user::class, 'changeUserStatus'])->name('admin_change_user_status');

    });

    Route::group(['prefix' => '/admin'], function () {
        Route::resource('/blogs', BlogsController::class, ['names' => 'admin.blogs']);
        Route::get('/change-blog-status/{id}/{status?}', [BlogsController::class, 'changeBlogStatus'])->name('admin_change_blog_status');
        Route::get('/delete-blog/{id}/{status?}', [BlogsController::class, 'deleteBlog'])->name('admin_blog_delete');
    });

    Route::group(['prefix' => '/admin'], function () {
        Route::resource('/downloads', DownloadsController::class, ['names' => 'admin.downloads']);
        Route::get('/change-download-status/{id}/{status?}', [DownloadsController::class, 'changeDownloadStatus'])->name('admin_change_download_status');
        Route::get('/delete-download/{id}/{status?}', [DownloadsController::class, 'deleteDownload'])->name('admin_download_delete');
    });


    Route::group(['prefix' => '/admin'], function () {
        //product category route
        Route::resource('/product_categories', ProductCategoryController::class, ['names' => 'admin.product_categories']);
        Route::get('/change-product_categories-status/{id}/{status?}', [ProductCategoryController::class, 'changeProduct_categoriesStatus'])->name('admin_change_product_categories_status');
        Route::get('/delete-product_categories/{id}/{status?}', [ProductCategoryController::class, 'deleteProduct_categories'])->name('admin_product_categories_delete');


    });

    Route::group(['prefix' => '/admin'], function () {
        //product route
        Route::get('/product', [ProductController::class, 'index'])->name('product-list');
        Route::get('/product/create', [ProductController::class, 'create'])->name('product-create');
        Route::post('/product/store', [ProductController::class, 'store'])->name('product-store');
        Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('edit-product');
        Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('update-product');
        Route::get('/change-product-status/{id}/{status?}', [ProductController::class, 'changeProductStatus'])->name('changeProductStatus');
        Route::get('/delete-product/{id}/{status?}', [ProductController::class, 'deleteProduct'])->name('deleteProduct');


        //image Category route
        Route::get('/image-category', [ImageCategoryController::class, 'index'])->name('image-category');
        // Route to display the form for adding or editing
        Route::get('/image-category/create/{id?}', [ImageCategoryController::class, 'edit'])->name('create-category');
        // Route to handle form submission for adding (POST) or updating (PUT/PATCH)
        Route::match(['post', 'put'], '/image-category/store/{id?}', [ImageCategoryController::class, 'store'])->name('store-category');
        Route::get('/delete-image-category/{id}/{status?}', [ImageCategoryController::class, 'destroy'])->name('delete-image-category');
        Route::get('/change-imagecategory-status/{id}/{status?}', [ImageCategoryController::class, 'changeImageCatStatus'])->name('changeimagecatstatus');

        //Image gallery route
        Route::get('/gallery', [ImageGalleryController::class, 'index'])->name('image-gallery');
        Route::get('/gallery/create', [ImageGalleryController::class, 'create'])->name('gallery-create');
        Route::post('/gallery/upload', [ImageGalleryController::class, 'upload'])->name('gallery-upload');
        Route::get('/gallery/edit/{id}', [ImageGalleryController::class, 'editGallery'])->name('edit-gallery');
        // Route to handle form submission for adding (POST) or updating (PUT/PATCH)
        Route::put('/gallery/update/{id}', [ImageGalleryController::class, 'updateGallery'])->name('update-gallery');
        Route::get('/delete-gallery/{id}/{status?}', [ImageGalleryController::class, 'deleteGallery'])->name('delete-gallery');
        Route::get('/change-gallery-status/{id}/{status?}', [ImageGalleryController::class, 'changeGalleryStatus'])->name('changegallerycatstatus');

        //product enquiry
        Route::get('/product-enquiry', [ProductEnquiryController::class, 'index'])->name('product-enquiry');
        Route::get('/product-enquiry/create', [ProductEnquiryController::class, 'create'])->name('product-enquiry-create');
        Route::delete('/delete-product-enquiry/{id}/{status?}', [ProductEnquiryController::class, 'deleteProductEnquiry'])->name('delete-product-enquiry');


    });

});


Route::post('/product-enquiry/store', [SiteController::class, 'productEnquirystore'])->name('product-enquiry-store');
//product filter
Route::get('/products-filter', [SiteController::class, 'filter'])->name('products-filter');
Route::get('/get-subcategory', [SiteController::class, 'getsubcategoryPaginationData'])->name('get-subcategory');

Route::get('/get-productlisting', [SiteController::class, 'getproductlistingPaginationData']);

Route::get('/thank-you', [SiteController::class, 'thank_you'])->name('thank-you');

Route::get('/downloads', [SiteController::class, 'downloads']);

//frontend route

Route::get('/', [SiteController::class, 'index']);
Route::get('/about-us', [SiteController::class, 'aboutUs'])->name('about');
Route::get('/products/product-category', [SiteController::class, 'productCategory'])->name('product-category');
Route::get('/products/{slug?}', [SiteController::class, 'productListing'])->name('product-listing');
Route::get('/product/{slug}', [SiteController::class, 'productDetails'])->name('product-details');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');
Route::get('/gallery-details/{slug}', [SiteController::class, 'galleryDetails'])->name('gallery-details');
Route::get('/blog', [SiteController::class, 'blog'])->name('blogs');
Route::get('/blog/{slug}', [SiteController::class, 'blog_details'])->name('blog-details');
Route::get('/careers', [SiteController::class, 'careers'])->name('careers');
Route::post('/careers', [SiteController::class, 'submitCareersForm'])->name('submit-careers');
Route::get('/contact-us', [SiteController::class, 'contact_us'])->name('contact-us');
Route::post('/contact-us', [SiteController::class, 'submitContactForm'])->name('contact-submit');