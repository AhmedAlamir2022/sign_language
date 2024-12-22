<?php

namespace App\Http\Controllers;
use App\Models\Video;
use App\Models\Instructor;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VideoController extends Controller
{

    //function to get all the Videos for admin
    public function AllVideos   ()
    {
        $videos = Video::latest()->get();
        return view('admin.materials.videos',compact('videos'));
    }//End of function

    //function to show prof videos
    public function InstVideos  ()
    {
        $subjects = Subject::all();
        $videos = Video::latest()->get();
        return view('instructor.material.videos',compact('videos','subjects'));
    }//End of function

    //function to add video for prof
    public function AddInstVideo(Request $request)
    {
        try {

            $video = new Video();
            $video->name =  $request->name;
            $video->subject_id =  $request->subject_id;
            $video->inst_id =  Auth::guard('instructor')->user()->id;
            $video->url =  $request->url;
            $video->save();

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

    //function to delete video for prof
    public function DeleteInstVideo  (Request $request)
    {
        try {
            $videos = Video::findOrFail($request->id)->delete();
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

    //function to show student videos
    public function StudentVideos()
    {
        $subjects = Subject::all();
        $insts = Instructor::all();
        $videos = Video::latest()->get();
        return view('student.material.videos',compact('videos','subjects','insts'));
    }//End of function

}
