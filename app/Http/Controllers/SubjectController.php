<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::latest()->get();
        return view('admin.Subjects.Subjects',compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            Subject::insert([
                'name' => $request->name,
                'created_at' => Carbon::now(),
            ]);
            $notification = array(
                'message' => trans('messages.success'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        try {
            $subject_id = $request->id;
            Subject::findOrFail($subject_id)->update([
                'name' => $request->name,
            ]);
            $notification = array(
                'message' => trans('messages.Update'),
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $subject = Subject::findOrFail($request->id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
