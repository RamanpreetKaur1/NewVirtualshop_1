<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Str;
//use League\CommonMark\Extension\CommonMark\Node\Inline\Image;
// use Intervention\Image\Facades\Image;
use Image;

class BannerController extends Controller
{
    public function banners()
    {
        $banners = Banner::get()->toArray();
        //dd($banner); die;
        return view('admin.banners.banners')->with(compact('banners'));
    }

    public function updateBannerStatus(Request $request)
    {
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }
            else {
                $status = 1;
            }
            Banner::where('id' , $data['banner_id'])->update(['status' => $status]);
            return response()->json(['status' => $status , 'banner_id' => $data['banner_id']]);
        }
    }


    //Delete Banner Image
    public function deleteBanner($id)
    {
        //Find banner image with id
        $banner_Image= Banner::where('id' , $id)->first();

        //Get BannerImage path
        $banner_path = 'front/images/banner_images/';

        //check if banner exists in folder , it it exists then we are going to delete it
        if (file_exists($banner_path.$banner_Image->image)) {
            unlink($banner_path.$banner_Image->image);
        }

        //delete from banner table in DB
        Banner::where('id' , $id)->delete();

        return redirect()->back()->with('success_message' , 'Banner has been deleted successfully');

    }

    //Add Edit Bannner
    public function addEditBanner(Request $request , $id=null){
        if($id == ""){
            //Add Banner
            $banner = new Banner;
            $title = "Add Banner";
            $message = "Banner Added successfully";
        }
        else{
            //Edit Banner
            $banner = Banner::find($id);
            $title = "Edit Banner";
            $message =  "Banner updated successfully";

        }
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;

            $banner->link = Str::slug($data['link']);
            $banner->type = $data['type'];
            $banner->title = $data['title'];
            $banner->alt = $data['alt'];
            $banner->status = 1;

            if ($banner['type'] == "Slider") {
                $width = "3000";
                $height = "700";

            }else if($banner['type'] == "Fix"){
                $width = "2000";
                $height = "420";
            }

              //upload banner image
              if($request->hasFile('image'))
              {
                  $image_tmp = $request->file('image');
                  if($image_tmp->isValid())
                  {
                      //Get Image Extension
                      $extension = $image_tmp->getClientOriginalExtension();

                      //Generate new image name
                      $imageName = rand(1111,99999).'.'.$extension;
                      $imagepath = 'front/images/banner_images/'.$imageName;

                      //upload the image
                      Image::make($image_tmp)->resize($width, $height)->save($imagepath);
                      $banner->image = $imageName;
                  }
              }

              $banner->save();
              return redirect('admin/banners')->with('success_message' , $message);

        }
        return view('admin.banners.add_edit_banner')->with(compact('title' , 'banner'));
    }








}
