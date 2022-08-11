<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Print_;
use App\Models\Admin;
use App\Models\Country;
use Illuminate\Support\Facades\Hash;
use Image;
use Session;
use App\Models\Seller;
use App\Models\SellersBusinessDetails;
use App\Models\SellersBankDetails;
use App\Models\Category;
use App\Models\Plan;
use App\Models\SellersDetail;

class AdminController extends Controller
{
    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $validated  = $request->validate([
                'email' => 'required|email|max:255' ,
                'password' => 'required' ,
            ]);

            //validation with our own custom messages
            // $rules =[
            //     'email' => 'required|email|max:255' ,
            //     'password' => 'required' ,
            // ];

            // $customMessages = [
            //     //Add custom message here
            //     'email.required' => 'Email is required !',
            //     'email.email' => 'Valid Email is required !',
            //     'password.required' => 'Password is required !',

            // ];
            // $this->validate($request , $rules , $customMessages);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'] , 'status' => 1])){
                return redirect('admin/dashboard');
            }
            else{
                return redirect()->back()->with('error_message' , 'Invalid Email or Password');
            }
        }
        return view('admin.login');
    }


    public function updateadminpassword(Request $request)
    {
        //  echo "<pre>";
        //  print_r(Auth::guard('admin')->user()); die;

        if($request->isMethod('post')){
            $data =$request->all();
            //echo "<pre>"; print_r($data); die;

            //Check if current password entered by admin is correct
            if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password))
            {
                //check if new password is matching with confirm password
                if($data['confirm_password'] == $data['new_password'])
                {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);

                    return redirect()->back()->with('success_message' , 'Password has been updated successfully.');
                }
                else{
                    return redirect()->back()->with('error_message' , 'New Password and Confirm password does not matched !');
                }
            }
            else{
                //if the password is incorrect
                return redirect()->back()->with('error_message' , 'Your current password is incorrect');
            }
        }

        $adminDetail = Admin::where('email' , Auth::guard('admin')->user()->email)->first()->toArray();

        return view('admin.setting.update_admin_password' , compact('adminDetail'));
    }

    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
       // echo "<pre>" ; print_r($data); die;
        if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password))
        {
                return "true";
        }
        else
        {
            return "false";
        }

    }



    public function updateAdminDetails(Request $request)
    {

        if($request->isMethod('post'))
        {
            $data = $request->all();
          //  echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric',
            ];
            $this->validate($request , $rules);

            //upload Admin Photo
            if($request->hasFile('admin_image'))
            {
                $image_tmp = $request->file('admin_image');
                if($image_tmp->isValid())
                {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate new image name
                    $imageName = rand(1111,99999).'.'.$extension;
                    $imagepath = 'admin/images/photos/'.$imageName;

                    //upload the image
                    Image::make($image_tmp)->save($imagepath);
                }
            }
            else if(!empty($data['current_admin_image']))
            {
                $imageName = $data['current_admin_image'];
            }
            else{
                $imageName = "";
            }

            //update admin details
            Admin::where('id' , Auth::guard('admin')->user()->id)->update(['name' => $data['admin_name']  , 'mobile' => $data['admin_mobile'] , 'image' => $imageName]);
            return redirect()->back()->with('success_message' , 'Admin Details Updated Successfully . ');
         }
        return view('admin.setting.update-admin-details');
    }


    // public function updateSellerDetails($slug , Request $request)
    // {
    //     if($slug == "personal")
    //     {
    //         if($request->isMethod('post'))
    //         {
    //             $data = $request->all();
    //             //echo "<pre>"; print_r($data); die;

    //             $rules = [
    //                 'seller_name' => 'required|regex:/^[\pL\s\-]+$/u',
    //                 'seller_mobile' => 'required|numeric',
    //                 'seller_city' => 'required|regex:/^[\pL\s\-]+$/u',
    //                 'seller_address' => 'required',
    //                 'seller_state' => 'required',
    //                 'seller_country' => 'required',
    //                 'seller_pincode' => 'required',

    //             ];
    //             $this->validate($request , $rules);

    //             //upload Admin Photo
    //             if($request->hasFile('seller_image'))
    //             {
    //                 $image_tmp = $request->file('seller_image');
    //                 if($image_tmp->isValid())
    //                 {
    //                     //Get Image Extension
    //                     $extension = $image_tmp->getClientOriginalExtension();

    //                     //Generate new image name
    //                     $imageName = rand(1111,99999).'.'.$extension;
    //                     $imagepath = 'admin/images/photos/'.$imageName;

    //                     //upload the image
    //                     Image::make($image_tmp)->save($imagepath);
    //                 }
    //             }
    //             else if(!empty($data['current_seller_image']))
    //             {
    //                 $imageName = $data['current_seller_image'];
    //             }
    //             else{
    //                 $imageName = "";
    //             }

    //             //update in Admin Table
    //             Admin::where('id' , Auth::guard('admin')->user()->id)->update(['name' => $data['seller_name']  , 'mobile' => $data['seller_mobile'] , 'image' => $imageName]);

    //            //update in Seller table
    //            Seller::where('id' , Auth::guard('admin')->user()->seller_id)->update(['name' => $data['seller_name']  , 'mobile' => $data['seller_mobile'] , 'address' => $data['seller_address'] ,'city' => $data['seller_city'] , 'state' => $data['seller_state'] ,'country' => $data['seller_country'] ,'pincode' => $data['seller_pincode'] , 'image' => $imageName]);
    //             return redirect()->back()->with('success_message' , 'Seller Details Updated Successfully . ');


    //         }
    //         $sellerDetail = Seller::where('id' , Auth::guard('admin')->user()->seller_id)->first()->toArray();

    //     }
    //     else if($slug == "business")
    //     {
    //         if($request->isMethod('post'))
    //         {
    //             $data = $request->all();
    //             //echo "<pre>"; print_r($data); die;

    //             $rules = [
    //                 'shop_name'    => 'required|regex:/^[\pL\s\-]+$/u',
    //                 'shop_mobile'  => 'required|numeric',
    //                 'shop_city'    => 'required|regex:/^[\pL\s\-]+$/u',
    //                 'shop_address' => 'required',
    //                 'shop_state'   => 'required',
    //                 'shop_country' => 'required',
    //                 'shop_pincode' => 'required',
    //                 'address_proof' => 'required',
    //                 // 'address_proof_image' => 'required',
    //                 // 'pan_number' => 'required',
    //             ];
    //             $this->validate($request , $rules);

    //             //upload Admin Photo
    //             if($request->hasFile('address_proof_image'))
    //             {
    //                 $image_tmp = $request->file('address_proof_image');
    //                 if($image_tmp->isValid())
    //                 {
    //                     //Get Image Extension
    //                     $extension = $image_tmp->getClientOriginalExtension();

    //                     //Generate new image name
    //                     $imageName = rand(1111,99999).'.'.$extension;
    //                     $imagepath = 'admin/images/proof/'.$imageName;

    //                     //upload the image
    //                     Image::make($image_tmp)->save($imagepath);
    //                 }
    //             }
    //             else if(!empty($data['current_addressProof_image']))
    //             {
    //                 $imageName = $data['current_addressProof_image'];
    //             }
    //             else{
    //                 $imageName = "";
    //             }
    //            //update in Seller Business details table
    //            SellersBusinessDetails::where('seller_id' , Auth::guard('admin')->user()->seller_id)->update(['shop_name' => $data['shop_name']  , 'shop_mobile' => $data['shop_mobile'] , 'shop_address' => $data['shop_address'] ,'shop_city' => $data['shop_city'] , 'shop_state' => $data['shop_state'] ,'shop_country' => $data['shop_country'] ,'shop_pincode' => $data['shop_pincode'] , /* 'shop_website' => $data['shop_website'] , 'shop_email' => $data['shop_email'] ,*/ 'address_proof' => $data['address_proof'] , 'address_proof_image' => $imageName , 'business_license_number' => $data['business_license_number'] , 'gst_number' => $data['gst_number'] , 'pan_number' => $data['pan_number']  ]);
    //             return redirect()->back()->with('success_message' , 'Shop Details Updated Successfully . ');
    //         }

    //         $sellerDetail = SellersBusinessDetails::where('seller_id' , Auth::guard('admin')->user()->seller_id)->first()->toArray();
    //     }
    //     else if($slug == "bank")
    //     {
    //         if($request->isMethod('post'))
    //         {
    //             $data = $request->all();
    //             //echo "<pre>"; print_r($data); die;

    //             $rules = [
    //                 'account_holder_name'    => 'required|regex:/^[\pL\s\-]+$/u',
    //                 'bank_name'              => 'required',
    //                 'account_number'         => 'required|numeric',
    //                 'bank_ifsc_code'         => 'required',

    //             ];
    //             $this->validate($request , $rules);

    //            //update in Seller Bank details table
    //            SellersBankDetails::where('seller_id' , Auth::guard('admin')->user()->seller_id)->update(['account_holder_name' => $data['account_holder_name']  , 'bank_name' => $data['bank_name'] , 'account_number' => $data['account_number'] ,'bank_ifsc_code' => $data['bank_ifsc_code']]);
    //             return redirect()->back()->with('success_message' , 'Bank Details Updated Successfully . ');
    //         }

    //         $sellerDetail = SellersBankDetails::where('seller_id' , Auth::guard('admin')->user()->seller_id)->first()->toArray();
    //     }
    //     $countries = Country::where('status' , 1)->get()->toArray();
    //     return view('admin.setting.update_sellers_details')->with(compact('slug', 'sellerDetail' , 'countries' ));
    // }


    public function admins($type=null)
    {
        $admins = Admin::query();
        if(!empty($type))
        {
            $admins = $admins->where('type' , $type);
            $title = ucfirst($type)."s";
        }
        else
        {
            $title = "All Admins/Sellers";
        }
        $admins = $admins->get()->toArray();
       // dd($admins);
       return view('admin.admins.admin')->with(compact('admins' , 'title'));
    }

    // public function viewSellerDetails($id)
    // {
    //     $viewsellerDetails = Admin::with('sellerPersonal' , 'sellerBusiness' , 'sellerBank')->where('id' , $id)->first();
    //     $viewsellerDetails = json_decode(json_encode($viewsellerDetails) , true);

    //     //dd($viewsellerDetails);
    //     return view('admin.admins.view-seller-details')->with(compact('viewsellerDetails'));
    // }

    public function viewSellerDetails($id)
    {
        $seller_view = SellersDetail::where('id' , $id)->first();
        //dd($seller_view);
        $seller_plan_view = Plan::where('seller_id' , $id)->first();
       $countries = Country::where('status' , 1)->get()->toArray();
       $categories = Category::where('parent_id' , '0')->where('status' ,'!=' ,'2')->get()->toArray();


        return view('admin.sellers.view-seller-details')->with(compact('countries' , 'categories' , 'seller_view' , 'seller_plan_view'));
    }


    public function updateAdminStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active")
            {
                $status = 0;
                // return redirect()->back()->with('error_message' , 'You are not allowed . ');

            }
            else
            {
                $status = 1;
            }
            Admin::where('id' , $data['admin_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'admin_id' => $data['admin_id']]);

        }
    }




    public function logout()

    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    //become a seller
    public function index()
    {
        $countries = Country::where('status' , 1)->get()->toArray();
        return view('frontend.sellers.index')->with(compact('countries'));
    }

    // public function sellerRegistration(Request $request){
    //     if ($request->isMethod('post')) {
    //         $data = $request->all();
    //         //echo "<pre>" ; print_r($data) ; die;

    //          //already commented start
    //         // $seller = new Seller();
    //         // $seller->name = $data['seller_name'];
    //         // $seller->address = $data['seller_address'];
    //         // $seller->city = $data['seller_city'];
    //         // $seller->state = $data['seller_state'];
    //         // $seller->country = $data['seller_country'];
    //         // $seller->pincode = $data['seller_pincode'];
    //         // $seller->mobile = $data['seller_mobile'];
    //         // $seller->email = $data['seller_email'];
    //         //already commented end

    //         //upload Admin Photo
    //         if($request->hasFile('seller_image'))
    //         {
    //             $image_tmp = $request->file('seller_image');
    //             if($image_tmp->isValid())
    //             {
    //                 //Get Image Extension
    //                 $extension = $image_tmp->getClientOriginalExtension();

    //                 //Generate new image name
    //                 $imageName = rand(1111,99999).'.'.$extension;
    //                 $imagepath = 'admin/images/photos/'.$imageName;

    //                 //upload the image
    //                 Image::make($image_tmp)->save($imagepath);
    //                 // $seller->image = $imageName;
    //             }
    //         }

    //          //already commented start
    //         // $seller->status = 1;
    //         // $seller->save();

    //        // $seller_id = Seller::select('id')->first()->toArray();
    //        //$seller_id  = Seller::with('sellerPersonal')->pluck('id')->first();
    //        // echo "<pre>" ; print_r($seller_id) ; die;

    //         //already commented end


    //        $now = new \DateTime();
    //        $created_at = $now->format('Y-m-d H:i:s');

    //         $seller_id = Seller::insertGetId([
    //             'name' => $data['seller_name'],
    //             'address' => $data['seller_address'],
    //             'city' => $data['seller_city'],
    //             'state' => $data['seller_state'],
    //             'country' => $data['seller_country'],
    //             'pincode' => $data['seller_pincode'],
    //             'mobile' => $data['seller_mobile'],
    //             'email' => $data['seller_email'],
    //             'image' => $imageName,
    //             'status' => 1,
    //             'created_at' => $created_at

    //         ]);


    //         $admins = new Admin();
    //         $admins->seller_id = $seller_id;
    //         $admins->name = $data['seller_name'];
    //         $admins->type =  "seller";
    //         $admins->mobile = $data['seller_mobile'];
    //         $admins->email = $data['seller_email'];
    //      $admins->password = $data['seller_password'];
    //         //upload Admin Photo
    //         if($request->hasFile('seller_image'))
    //         {
    //             $image_tmp = $request->file('seller_image');
    //             if($image_tmp->isValid())
    //             {
    //                 //Get Image Extension
    //                 $extension = $image_tmp->getClientOriginalExtension();

    //                 //Generate new image name
    //                 $imageName = rand(1111,99999).'.'.$extension;
    //                 $imagepath = 'admin/images/photos/'.$imageName;

    //                 //upload the image
    //                 Image::make($image_tmp)->save($imagepath);
    //                 $admins->image = $imageName;
    //             }
    //         }
    //         $admins->status = 1;
    //         $admins->save();
    //         $message = "You are registered successfully ";
    //         return redirect('admin/seller-bussiness')->with('success_message' , $message);

    //        //  already commented start

    //         //$message = "You are registered successfully ";
    //         // return redirect('admin/seller-bussiness')->with('success_message' , $message);
    //        // return redirect('plans')->with('success_message' , $message);

    //         //already commented end



    //     }

    //     //already commented start
    //    // store in admins Table



    //     // if ($request->isMethod('post')) {
    //     //     $data = $request->all();
    //         //echo "<pre>" ; print_r($data) ; die;


    //     //     $sellerDetails = new Admin();
    //     //     $sellerDetails->seller_id = [];
    //     //     $sellerDetails->name = $data['seller_name'];
    //     //     $sellerDetails->type =  "seller";
    //     //     $sellerDetails->mobile = $data['seller_mobile'];
    //     //     $sellerDetails->email = $data['seller_email'];
    //     //     //upload Admin Photo
    //     //     if($request->hasFile('seller_image'))
    //     //     {
    //     //         $image_tmp = $request->file('seller_image');
    //     //         if($image_tmp->isValid())
    //     //         {
    //     //             //Get Image Extension
    //     //             $extension = $image_tmp->getClientOriginalExtension();

    //     //             //Generate new image name
    //     //             $imageName = rand(1111,99999).'.'.$extension;
    //     //             $imagepath = 'admin/images/photos/'.$imageName;

    //     //             //upload the image
    //     //             Image::make($image_tmp)->save($imagepath);
    //     //             $sellerDetails->image = $imageName;
    //     //         }
    //     //     }
    //     //     $sellerDetails->status = 1;
    //     //     $sellerDetails->save();
    //     //     $message = "You are registered successfully ";
    //     //     return redirect('admin/seller-bussiness')->with('success_message' , $message);

    //     // }


    //       //already commented end

    // }

    // public function sellerBussiness(Request $request)
    // {
    //     $seller_id = Seller::with('sellerID')->get()->toArray();
    //     echo "<pre>"; print_r($seller_id); die;


    //     $seller_bussiness = SellersBusinessDetails::with('categories')->get()->toArray();
    //     $categories = Category::where('parent_id' , '0')->where('status' ,'!=' ,'2')->get()->toArray();
    //     $countries = Country::where('status' , 1)->get()->toArray();
    //   //echo "<pre>"; print_r($seller_bussiness); die;
    //     return view('frontend.sellers.seller_bussiness')->with(compact('seller_bussiness' , 'categories' , 'countries'));
    // }

    // public function sellerBussinessDetails(Request $request , $id)
    // {
    //     if ($request->isMethod('post')) {
    //         $data = $request->all();
    //         //echo "<pre>" ; print_r($data); die;

    //        // $seller_id = Seller::where('id' , Auth::guard('admin')->user()->seller_id)->first()->toArray();
    //            //    $seller_id = Seller::insertGetId();

    //             //     echo "<pre>" ; print_r($seller_id); die;
    //         $seller_bussiness = new SellersBusinessDetails();
    //          $seller_bussiness->seller_id                = $id;
    //         $seller_bussiness->shop_name                = $data['shop_name'];
    //         $seller_bussiness->category_id              = $data['shop_category'];
    //         $seller_bussiness->shop_address             = $data['shop_address'];
    //         $seller_bussiness->shop_city                = $data['shop_city'];
    //         $seller_bussiness->shop_state               = $data['shop_state'];
    //         $seller_bussiness->shop_country             = $data['shop_country'];
    //         $seller_bussiness->shop_pincode             = $data['shop_pincode'];
    //         $seller_bussiness->shop_mobile              = $data['shop_mobile'];
    //         $seller_bussiness->shop_website             = $data['shop_website'];
    //         // $seller_bussiness->shop_email               = $data['shop_name'];
    //         $seller_bussiness->address_proof            = $data['address_proof'];
    //         if($request->hasFile('address_proof_image'))
    //             {
    //                 $image_tmp = $request->file('address_proof_image');
    //                 if($image_tmp->isValid())
    //                 {
    //                     //Get Image Extension
    //                     $extension = $image_tmp->getClientOriginalExtension();

    //                     //Generate new image name
    //                     $imageName = rand(1111,99999).'.'.$extension;
    //                     $imagepath = 'admin/images/proof/'.$imageName;

    //                     //upload the image
    //                     Image::make($image_tmp)->save($imagepath);
    //                     $seller_bussiness->address_proof_image = $imageName;
    //                 }
    //             }
    //         $seller_bussiness->business_license_number  = $data['business_license_number'];
    //         $seller_bussiness->gst_number               = $data['gst_number'];
    //         $seller_bussiness->pan_number               = $data['pan_number'];

    //         $seller_bussiness->save();
    //         $message = "Your bussiness details has been saved successfully ";
    //         return redirect()->back()->with('success_message' , $message);



    //     }
    // }

    // public function plan()
    // {
    // return view('frontend.sellers.plans');
    // }


    // public function sellerDetails($slug)
    // {
    //     if ($slug == 'personal') {
    //         $categories = Category::where('parent_id' , '0')->where('status' ,'!=' ,'2')->get()->toArray();
    //         $countries = Country::where('status' , 1)->get()->toArray();
    //         return view('frontend.sellers.seller_details')->with(compact('categories' , 'countries' , 'slug'));
    //     }

    // }

}
