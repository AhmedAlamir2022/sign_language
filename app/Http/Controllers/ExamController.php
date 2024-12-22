<?php

namespace App\Http\Controllers;
use App\Models\Instructor;
use App\Models\Subject;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //function to get all the exams
    public function AllExams ()
    {
        $insts = Instructor::all();
        $subjects = Subject::all();
        $exams = Exam::latest()->get();
        return view('admin.exams.exams',compact('exams','subjects','insts'));
    }//End of function

    //function to add new exam
    public function AddExam(Request $request)
    {
        try {

            $exam = new Exam();
            $exam->name =  $request->name;
            $exam->subject_id =  $request->subject_id;
            $exam->inst_id =  $request->inst_id;
            $exam->date =  $request->date;
            $exam->save();

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

    //function to delete exam
    public function DeleteExam  (Request $request)
    {
        try {
            $exam = Exam::findOrFail($request->id)->delete();
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

    //function to to show prof exams
    public function ALLInstExams (){
        $subjects = Subject::all();
        $exams = Exam::latest()->get();
        return view('instructor.exams.exams',compact('exams','subjects'));
    }//End of function

    //function to add prof exam
    public function AddInstExam  (Request $request)
    {
        try {

            $exam = new Exam();
            $exam->name =  $request->name;
            $exam->subject_id =  $request->subject_id;
            $exam->inst_id =  Auth::guard('instructor')->user()->id;
            $exam->date =  $request->date;
            $exam->save();

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
    public function DeletePInstExam    (Request $request)
    {
        try {
            $exam = Exam::findOrFail($request->id)->delete();
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

    //function to show student exams
    public function StudentExam  (){
        $exams = Exam::latest()->get();
        return view('student.exams.exams',compact('exams',));
    }//End of function
}
