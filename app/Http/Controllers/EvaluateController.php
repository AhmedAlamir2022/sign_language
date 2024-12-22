<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Evaluate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EvaluateController extends Controller
{
    //function to to show inst evaluations
    public function ALLInstEvaluation  (){
        $students = User::all();
        $evaluations = Evaluate::latest()->get();
        return view('instructor.evaluations.evaluations',compact('students','evaluations'));
    }//End of function

    //function to add prof exam
    public function AddInstEvaluation  (Request $request)
    {
        try {

            $evaluation = new Evaluate();
            $evaluation->stud_id =  $request->stud_id;
            $evaluation->inst_id =  Auth::guard('instructor')->user()->id;
            $evaluation->date_from =  $request->date_from;
            $evaluation->date_to =  $request->date_to;
            $evaluation->prcentage =  $request->prcentage;
            $evaluation->feedback =  $request->feedback;
            $evaluation->save();

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

    //function to delete prof exam
    public function DeleteInstEvaluation    (Request $request)
    {
        try {
            $evaluation = Evaluate::findOrFail($request->id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }//End of function

    //function to show student Evaluations
    public function StudentEvaluations   (){
        $evaluations = Evaluate::latest()->get();
        return view('student.evaluations.myevaluations',compact('evaluations',));
    }//End of function

    //function to get all the evaluations
    public function AllEvaluations ()
    {
        $evaluations = Evaluate::latest()->get();
        return view('admin.evaluations.stud_evaluations',compact('evaluations'));
    }//End of function

    //function to delete Evaluation
    public function DeleteEvaluation  (Request $request)
    {
        try {
            $evaluation = Evaluate::findOrFail($request->id)->delete();
            $notification = array(
                'message' => trans('messages.Delete'),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }//End of function
}
