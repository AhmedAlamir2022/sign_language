<?php

namespace App\Http\Controllers;
use App\Models\Prodcast;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProdcastController extends Controller
{
    //function to show Prodcasts for inst
    public function InstProdcasts  ()
    {
        $prodcasts = Prodcast::latest()->get();
        return view('instructor.prodcasts.prodcasts',compact('prodcasts'));
    }//End of function

    //function to add prodcast for inst
    public function AddInstProdcast(Request $request)
    {
        try {

            $prodcast = new Prodcast();
            $prodcast->title =  $request->title;
            $prodcast->inst_id =  Auth::guard('instructor')->user()->id;
            $prodcast->interviwer =  $request->interviwer;
            $prodcast->quest =  $request->quest;
            $prodcast->url =  $request->url;
            $prodcast->save();

            $notification = array(
                'message' => trans('messages.success'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to delete prodcast for inst
    public function DeleteInstProdcast  (Request $request)
    {
        try {
            $prodcast = Prodcast::findOrFail($request->id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to show Prodcasts for students
    public function StuProdcasts   ()
    {
        $prodcasts = Prodcast::latest()->get();
        return view('student.prodcasts.prodcasts',compact('prodcasts'));
    }//End of function

    //function to show Prodcasts for Admin
    public function AdminProdcasts    ()
    {
        $prodcasts = Prodcast::latest()->get();
        return view('admin.prodcasts.prodcasts',compact('prodcasts'));
    }//End of function
}
