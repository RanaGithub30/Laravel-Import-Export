<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use Maatwebsite\Excel\Facades\Excel;  
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class UserDetailsController extends Controller
{
    //

    public function home()
    {
           $all_details = UserDetails::orderBy('id', 'desc')->get();
           return view('user.home', compact('all_details'));
    }

    public function save($type, $id)
    {
                 return view('user.save', compact('type', 'id'));
    }

    public function postSave(Request $request, $type, $id)
    {
           if($request->isMethod('post')){
            if($type == "add"){
                $request->validate([
                    'name' => 'required|max:25',
                    'email' => 'required|email|max:50',
                    'phone' => 'required',
                    'street_address' => 'required',
                    'city' => 'required',
                    'state' => 'required|not_in:select a state',
                    'country' => 'required|not_in:select a country',
                    'image' => 'required|mimes:jpg,jpeg,png'
                ]);

                $image = $request->file('image');
                $image_name = $image->hashName();
                $image->move(public_path('images'), $image_name);

                UserDetails::create([
                     'name' => $request->name,
                     'email' => $request->email,
                     'phone' => $request->phone,
                     'street_address' => $request->street_address,
                     'city' => $request->city,
                     'state' => $request->state,
                     'country' => $request->country,
                     'profile_img' => $image_name
                ]);
            }

            else{
                $request->validate([
                    'name' => 'required|max:25',
                    'email' => 'required|email|max:50',
                    'phone' => 'required',
                    'street_address' => 'required',
                    'city' => 'required',
                    'state' => 'required|not_in:select a state',
                    'country' => 'required|not_in:select a country',
                    'image' => 'mimes:jpg,jpeg,png'
                ]);

                $previous_details = UserDetails::whereId($id)->first();

                // if, image is present, image will edited else other things will be edited..

                if($request->hasFile('image')){
                    $image = $request->file('image');
                    $image_name = $image->hashName();
                    $image->move(public_path('images'), $image_name);

                    unlink(public_path('images/').$previous_details->profile_img);

                    UserDetails::whereId($id)->update([
                          'profile_img' => $image_name,
                    ]);
                }

                UserDetails::whereId($id)->update([
                    'name' => $request->name,
                     'email' => $request->email,
                     'phone' => $request->phone,
                     'street_address' => $request->street_address,
                     'city' => $request->city,
                     'state' => $request->state,
                     'country' => $request->country,
                ]);

            }

                $request->session()->flash('create_success', 'Data Successfully Saved');
                return redirect()->route('/');
           }
           else{
                 abort(403);
           }
    }

    public function delete(Request $request, $id)
    {
            $previous_details = UserDetails::whereId($id)->first();
            unlink(public_path('images/').$previous_details->profile_img);
            UserDetails::find($id)->delete();
            $request->session()->flash('delete_data', 'Data Successfully Deleted');
            return redirect()->route('/');
    }

    public function export()
    {
            return Excel::download(new UsersExport, 'users.csv'); 
    }

    public function import_csv_page()
    {
            return view('user.import');
    }

    public function import_csv(Request $request)
    {
         if($request->isMethod('post')){
            Excel::import(new UsersImport, request()->file('file'));
            return redirect()->route('/');
         }

         else{
               abort(403);
         }
    }
}
