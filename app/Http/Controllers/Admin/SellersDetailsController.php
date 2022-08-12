<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Category;
use App\Models\SellersDetail;
use Image;
use Illuminate\Support\Facades\File;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;

class SellersDetailsController extends Controller
{
    public function index(){
         $countries = Country::where('status' , 1)->get()->toArray();
        $categories = Category::where('parent_id' , '0')->where('status' ,'!=' ,'2')->get()->toArray();
        // return view('admin.seller_details.index')->with(compact( 'categories' , 'countries'));
        // return view('admin.seller_details.seller_registration')->with(compact( 'categories' , 'countries'));
         return view('admin.seller_details.seller_register')->with(compact('categories', 'countries'));
    }

    public function sellerRegistration(Request $request)
    {
        if ($request->isMethod('post')) {
        $data = $request->all();
        //echo "<pre>" ; print_r($data) ; die;
        $request->validate([
            'seller_name' => 'required',
                'seller_email' => 'required',
                'seller_password' => 'required',
                'seller_mobile' => 'required|numeric',
                'seller_city' => 'required',
                'seller_state' => 'required',
                'seller_country' => 'required',
                'seller_pincode' => 'required',
                'seller_address' => 'required',
                'seller_image' => 'required',
                'shop_name' => 'required',
                'shop_mobile' => 'required|numeric',
                'shop_logo' => 'required',
                'shop_banner' => 'required',
                'shop_address' => 'required',
                'shop_city' => 'required',
                'shop_state' => 'required',
                'shop_country' => 'required',
                'shop_pincode' => 'required',
                'shop_category' => 'required',
                'address_proof' => 'required',
                'address_proof_image' => 'required',
                'account_holder_name' => 'required',
                'account_number' => 'required',
                'bank_name' => 'required',
                'bank_ifsc_code' => 'required',
            ]);
           // upload seller's Photo
            if($request->hasFile('seller_image'))
            {
                $image_tmp = $request->file('seller_image');
                if($image_tmp->isValid())
                {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate new image name
                        $imageName = rand(1111,99999).'.'.$extension;
                        $imagepath = 'admin/images/photos/'.$imageName;
                        //upload the image
                        Image::make($image_tmp)->save($imagepath);
                        // $seller->image = $imageName;
                }
            }

            // upload Shop Banner
            if($request->hasFile('shop_banner'))
            {
                $image_tmp = $request->file('shop_banner');
                if($image_tmp->isValid())
                {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate new image name
                        $shop_banner = rand(1111,99999).'.'.$extension;
                        $imagepath = 'admin/images/shop_banners/'.$shop_banner;
                        //upload the image
                        Image::make($image_tmp)->save($imagepath);
                        // $seller->image = $imageName;
                }
            }

            // upload shop_logo
            if($request->hasFile('shop_logo'))
            {
                $image_tmp = $request->file('shop_logo');
                if($image_tmp->isValid())
                {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate new image name
                        $shop_logo = rand(1111,99999).'.'.$extension;
                        $imagepath = 'admin/images/shop_logo/'.$shop_logo;
                        //upload the image
                        Image::make($image_tmp)->save($imagepath);
                        // $seller->image = $imageName;
                }
            }

            //upload seller's proof Photo
                if($request->hasFile('address_proof_image'))
                {
                    $image_tmp = $request->file('address_proof_image');
                    if($image_tmp->isValid())
                    {
                        //Get Image Extension
                        $extension = $image_tmp->getClientOriginalExtension();
                        //Generate new image name
                        $address_proof = rand(1111,99999).'.'.$extension;
                        $imagepath = 'admin/images/proof/'.$address_proof;
                        //upload the image
                        Image::make($image_tmp)->save($imagepath);
                    }
                }
                else if(!empty($data['current_addressProof_image']))
                {
                    $address_proof = $data['current_addressProof_image'];
                }
                else{
                    $address_proof = "";
                }




            $seller_details = new SellersDetail();
            $seller_details->seller_name = $data['seller_name'];
            $seller_details->seller_address = $data['seller_address'];
            $seller_details->seller_city = $data['seller_city'];
            $seller_details->seller_state = $data['seller_state'];
            $seller_details->seller_country = $data['seller_country'];
            $seller_details->seller_pincode = $data['seller_pincode'];
            $seller_details->seller_mobile = $data['seller_mobile'];
            $seller_details->seller_email = $data['seller_email'];
            $seller_details->password = Hash::make($data['seller_password']);
            $seller_details->seller_image = $imageName;
            $seller_details->status =   1;
            $seller_details->shop_name = $data['shop_name'];
            $seller_details->shop_mobile = $data['shop_mobile'];
            $seller_details->shop_banner = $shop_banner;
            $seller_details->shop_logo = $shop_logo;
            $seller_details->shop_address = $data['shop_address'];
            $seller_details->shop_city = $data['shop_city'];
            $seller_details->shop_state = $data['shop_state'];
            $seller_details->shop_country = $data['shop_country'];
            $seller_details->shop_pincode = $data['shop_pincode'];
            $seller_details->shop_category = $data['shop_category'];
            $seller_details->address_proof = $data['address_proof'];
            $seller_details->address_proof_image = $address_proof;
            $seller_details->account_holder_name = $data['account_holder_name'];
            $seller_details->account_number = $data['account_number'];
            $seller_details->bank_name = $data['bank_name'];
            $seller_details->bank_ifsc_code = $data['bank_ifsc_code'];
           // $seller_details->plan_id = $seller_plans->id;
            $seller_details->save();
            $seller_details->id;

            if(isset($_POST['plan_a']))
            {
               $seller_plans = new Plan();
               $seller_plans->seller_id =$seller_details->id;
               $seller_plans->plan_name = "Plan_a";
               $seller_plans->plan_value = "50";
               $seller_plans->plan_limit = "4";
               $seller_plans->plan_status = "1";
               $seller_plans->save();
               $seller_plans->id;
               //echo "<pre>" ; print_r($seller_plans); die;
            }
            else if(isset($_POST['plan_b']))
            {
                $seller_plans = new Plan();
                $seller_plans->seller_id =$seller_details->id;

                $seller_plans->plan_name = "Plan_b";
                $seller_plans->plan_value = "100";
                $seller_plans->plan_limit = "8";
                $seller_plans->plan_status = "1";
                $seller_plans->save();
                $seller_plans->id;
            }
           else if(isset($_POST['plan_c'])){
                $seller_plans = new Plan();
                $seller_plans->seller_id =$seller_details->id;
                $seller_plans->plan_name = "Plan_c";
                $seller_plans->plan_value = "150";
                $seller_plans->plan_limit = "12";
                $seller_plans->plan_status = "1";
                $seller_plans->save();
                $seller_plans->id;
            }


            $admins = new Admin();
            $admins->seller_id = $seller_details->id;
            $admins->name = $data['seller_name'];
            $admins->type =  "seller";
            $admins->mobile = $data['seller_mobile'];
            $admins->email = $data['seller_email'];
            $admins->password = Hash::make($data['seller_password']);
            //upload Admin Photo
            if($request->hasFile('seller_image'))
            {
                $image_tmp = $request->file('seller_image');
                if($image_tmp->isValid())
                {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate new image name
                    $imageName = rand(1111,99999).'.'.$extension;
                    $imagepath = 'admin/images/photos/'.$imageName;

                    //upload the image
                    Image::make($image_tmp)->save($imagepath);
                    $admins->image = $imageName;
                }
            }
            $admins->status = 1;
            $admins->save();
            $message = "You are registered successfully ";
            return redirect('admin/login')->with('success_message' , $message);
        }
    }


    public function sellerview($id)
    {

       $seller_view = SellersDetail::where('id' , $id)->first();
        //dd($seller_view);
        $seller_plan_view = Plan::where('seller_id' , $id)->first();
       $countries = Country::where('status' , 1)->get()->toArray();
       $categories = Category::where('parent_id' , '0')->where('status' ,'!=' ,'2')->get()->toArray();


        return view('admin.seller_details.view-seller-details')->with(compact('countries' , 'categories' , 'seller_view' , 'seller_plan_view'));
    }

    public function sellerupdate(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
         //echo "<pre>"; print_r($data); die;

            //upload Seller's Photo
            if ($request->hasFile('seller_image')) {
                $image_tmp = $request->file('seller_image');
                if ($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate new image name
                    $sellerImage = rand(1111, 99999) . '.' . $extension;
                    $imagepath = 'admin/images/photos/' . $sellerImage;

                    //upload the image
                    Image::make($image_tmp)->save($imagepath);
                }
            } else if (!empty($data['current_seller_image'])) {
                $sellerImage = $data['current_seller_image'];
            } else {
                $sellerImage = "";
            }



            // //update in Admins table
            // Admin::where('id', Auth::guard('admin')->user()->id)->update([
            //     'name' => $data['seller_name'],
            //     'mobile' => $data['seller_mobile'],
            //     'image' => $sellerImage

            // ]);

            //upload address_proof_image
            if ($request->hasFile('address_proof_image')) {
                $image_tmp = $request->file('address_proof_image');
                if ($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate new image name
                    $address_proof = rand(1111, 99999) . '.' . $extension;
                    $imagepath = 'admin/images/proof//' . $address_proof;

                    //upload the image
                    Image::make($image_tmp)->save($imagepath);
                }
            } else if (!empty($data['current_address_proof_image'])) {
                $address_proof = $data['current_address_proof_image'];
            } else {
                $address_proof = "";
            }



            if ($request->hasFile('shop_banner')) {
                $image_tmp = $request->file('shop_banner');
                if ($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate new image name
                    $shop_banner = rand(1111, 99999) . '.' . $extension;
                    $imagepath = 'admin/images/shop_banners/' . $shop_banner;
                    //echo $imagepath; die;

                    //upload the image
                    Image::make($image_tmp)->save($imagepath);
                    // $seller->image = $imageName;
                }

            }
            else if (!empty($data['current_shop_banner'])) {
                $shop_banner = $data['current_shop_banner'];
            } else {
                $shop_banner = "";
            }

            if ($request->hasFile('shop_logo')) {
                $image_tmp = $request->file('shop_logo');
                if ($image_tmp->isValid()) {
                    //Get Image Extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generate new image name
                    $shop_logo = rand(1111, 99999) . '.' . $extension;
                    $imagepath = 'admin/images/shop_logo/' . $shop_logo;

                    if(File::exists($imagepath))
                    {
                        File::delete($imagepath);
                    }
                    //upload the image
                    Image::make($image_tmp)->save($imagepath);
                    // $seller->image = $imageName;
                }
            }
            else if (!empty($data['current_shop_logo'])) {
                $shop_logo = $data['current_shop_logo'];
            } else {
                $shop_logo = "";
            }


            SellersDetail::where('id', Auth::guard('admin')->user()->seller_id)->update([
                'seller_name' => $data['seller_name'],
                'seller_address' => $data['seller_address'],
                'seller_city' => $data['seller_city'],
                'seller_state' => $data['seller_state'],
                'seller_country' => $data['seller_country'],
                'seller_pincode' => $data['seller_pincode'],
                'seller_mobile' => $data['seller_mobile'],
                'seller_email' => $data['seller_email'],
                // 'seller_password' => Hash::make($data['seller_password']),
                'seller_image' => $sellerImage,
                'status' => 1,
                'shop_name' => $data['shop_name'],
                'shop_mobile' => $data['shop_mobile'],
                'shop_banner' => $shop_banner,
                'shop_logo'  => $shop_logo,
                'shop_address' => $data['shop_address'],
                'shop_category' => $data['shop_category'],
                'shop_city' => $data['shop_city'],
                'shop_state' => $data['shop_state'],
                'shop_country' => $data['shop_country'],
                'shop_pincode' => $data['shop_pincode'],
                'shop_category' => $data['shop_category'],
                'address_proof' => $data['address_proof'],
                'address_proof_image' => $address_proof,
                'account_holder_name' => $data['account_holder_name'],
                'account_number' => $data['account_number'],
                'bank_name' => $data['bank_name'],
                'bank_ifsc_code' => $data['bank_ifsc_code'],

                'updated_at' => Carbon::now(),
            ]);
            return redirect()->back()->with('success_message', 'Updated Successfully');
        }
    }

    public function plan()
    {
    return view('frontend.sellers.plans');
    }
}
