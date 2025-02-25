<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\country;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Admin_user extends Controller
{
    public function dashboard()
    {
        // $admin_asset_path = public_path('public/admin_assets');
        // return view('admin/index', compact('admin_asset_path'));
        return view('admin/index');
    }

    public function userProfile(Request $request)
    {
        $user = auth()->user();
        $countries = country::all();
        return view('admin/user/admin-user',compact('user','countries'));
    }

    public function admin_user()
    {
        $users = User::all();        
        return view('admin/user/admin-user',compact('users'));
    }

    public function editUsers(Request $request, $id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return back()->with('warning', 'User not found.');
        }
        $countries = country::all();
        return view('admin.user.edit_user',compact('user','countries'));

    }

    public function updateUsers(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:2|max:20|string',
            'user_name' => 'required|min:2|max:10|string|different:fname',
            'password' => 'required|min:6',
            'email' => 'required|email',
            'contact' => 'numeric|nullable',
            'role_id' => 'in:0,1',
            'address' => 'nullable|string|max:100',
            'country' => 'required|exists:tbl_countries,id',
            'profile' => 'image|mimes:jpg,jpeg,png',
        ]);
        $requestData = $request->except(['_token', '_method']);
        $requestData['password'] = Hash::make($request->password);
        
        if (!empty($request->profile)) {
            $imageName = 'lv_'.rand().'.'.$request->profile->extension();
             // echo  "<pre>";
            $request->profile->move(public_path('profiles/'),$imageName);
            $requestData['profile'] = $imageName;

        } else {
            $requestData['profile'] = $request->old_img;            
        }        
        
        $user = User::find($id);
        if (!empty($user)) {
            if (empty($request->old_img)) {
                $existingProfile = $user->profile;
            }            
            $user->update($requestData);
            $profileExists = '';
            if(!empty($existingProfile)){
                $profileExists = public_path("profiles/$existingProfile");
            }            
            if (file_exists($profileExists)) {
                unlink("profiles/$existingProfile");
            }
            return redirect()->route('admin_user')->with('success', 'User Data Updated Successfully!');
        } else { 
            return redirect()->route('admin_user')->with('danger', 'Something went wrong.');
        }

    }

    public function changeUserStatus(Request $request, $id, $status = 1)
    {
        echo "<pre>";
        $user = User::find($id);
        if (!empty($user)) {
            $user->is_active = $status;
            $user->save();            
            return redirect()->route('admin_user')->with('success', 'User Status Updated Successfully!');
        } else { 
            return redirect()->route('admin_user')->with('danger', 'Something went wrong.');
        }

    }

    public function add_admin_user()
    {
        return view('admin/user/add-admin-user');
    }

    public function blogListing()
    {
        return view('admin/blog/blog-listing');
    }

    public function add_blog()
    {
        return view('admin/blog/add-blog');
    }

    public function photo_gallery()
    {
        return view('admin/gallery/photo-gallery-listing');
    }

    public function add_images_category()
    {
        return view('admin/gallery/add-images-category');
    }

    public function add_multiple_images()
    {
        return view('admin/gallery/add-multiple-images');
    }

    public function video_gallery()
    {
        return view('admin/gallery/video-gallery-listing');
    }

    public function add_video()
    {
        return view('admin/gallery/add-video');
    }

    public function downloads()
    {
        return view('admin/downloads/download-listing');
    }

    public function add_download()
    {
        return view('admin/downloads/add-download');
    }
}
