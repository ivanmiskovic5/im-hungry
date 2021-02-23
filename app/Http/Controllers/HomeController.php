<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table("users")->get();
        return view('home', ["users"=>$users]);
    }

    public function delete($id) {
        DB::table("users")->where("id", $id)->delete();
        return redirect("/");
    }

    public function add(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'oid' => ['required', 'string', 'min:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            if ($request->ajax()){
                return Response::json(array(
                    "success" => false,
                    "errors" => $validator->getMessageBag()->toArray()
                ), 400);
            }else{
                return redirect('/')->withErrors($validator)->withInput();
            }
        }else{
            User::create([
                'name' => $data['name'],
                'surname' => $data['surname'],
                'oid' => $data['oid'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            if ($request->ajax()) return Response::json(array("success" => true), 200);
            return redirect("/");
        }
    }
}
