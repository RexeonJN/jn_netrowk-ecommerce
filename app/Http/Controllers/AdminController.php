<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function AdminLogin(Request $request){
        $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);


        $email  =   $request->post("email");
        $password = $request->post("password");

        $result = Admin::where("email",$email)->where("password",$password)->get();
        if (isset($result[0])) {
            $request->session()->put("ADMIN_ID", $result[0]->id);
            return redirect(route("admin.dashboard"));
        } else {
            return redirect()->back();
        }
    }
}
