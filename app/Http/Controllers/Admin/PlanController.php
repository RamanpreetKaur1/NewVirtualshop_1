<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //

    // public function viewplan()
    // {
    //     return view('admin.plans.plan');
    // }

    public function viewplan($id)
    {
        $seller_plan_view = Plan::where('seller_id', $id)->first();
        // dd($seller_plan_view);

        return view('admin.seller_details.plans.update_plan')->with(compact('seller_plan_view'));
    }


    public function update_plan(Request $request, $id)
    {
        if (isset($_POST['plan_a'])) {
            $update_plan = Plan::find($id);
            // dd($update_plan);
            $update_plan->plan_name = "Plan_a";
            $update_plan->plan_value = "50";
            $update_plan->plan_limit = "4";
            $update_plan->plan_status = "1";
            $update_plan->update();
            return redirect('admin/dashboard')->with('success_message', "Your Plan is updated successfully to plan A");
        }
        if (isset($_POST['plan_b'])) {
            $update_plan = Plan::find($id);
            // dd($update_plan);

            $update_plan->plan_name = "Plan_b";
            $update_plan->plan_value = "100";
            $update_plan->plan_limit = "8";
            $update_plan->plan_status = "1";
            $update_plan->update();
            return redirect('admin/dashboard')->with('success_message', "Your Plan is updated successfully to plan B");
        }
        if (isset($_POST['plan_c'])) {
            $update_plan = Plan::find($id);
            // dd($update_plan);
            $update_plan->plan_name = "Plan_c";
            $update_plan->plan_value = "150";
            $update_plan->plan_limit = "12";
            $update_plan->plan_status = "1";
            $update_plan->update();
            return redirect('admin/dashboard')->with('success_message', "Your Plan is updated successfully to plan C");
        }
    }
}
