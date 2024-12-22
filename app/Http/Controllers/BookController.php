<?php

namespace App\Http\Controllers;
use App\Http\Traits\AttachFilesTrait;
use App\Models\Book;
use App\Models\Instructor;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use AttachFilesTrait;

    //function to get all the books
    public function AllBooks  ()
    {
        $books = Book::latest()->get();
        return view('admin.materials.books',compact('books'));
    }//End of function

    //function to download book for administration
    public function DownloadBook ($filename)
    {
        return response()->download(public_path('Attachments/Books/'.$filename));
    }//End of function

    //function to show prof books
    public function InstBooks  ()
    {
        $subjects = Subject::all();
        $books = Book::latest()->get();
        return view('instructor.material.books',compact('books','subjects'));
    }//End of function

    //function to show student books
    public function StudentBook   ()
    {
        $subjects = Subject::all();
        $insts = Instructor::all();
        $books = Book::latest()->get();
        return view('student.material.books',compact('books','subjects','insts'));
    }//End of function

    //function to add book for prof
    public function AddInstBook(Request $request)
    {
        try {

            $book = new Book();
            $book->name =  $request->name;
            $book->subject_id =  $request->subject_id;
            $book->inst_id =  Auth::guard('instructor')->user()->id;
            $book->file =  $request->file('file')->getClientOriginalName();
            $book->save();
            $this->uploadFile($request,'file','Books');

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

    //function to download book for prof
    public function DownloadInstBook ($filename)
    {
        return response()->download(public_path('Attachments/Books/'.$filename));
    }//End of function

    //function to download book for student
    public function DownloadStudBook ($filename)
    {
        return response()->download(public_path('Attachments/Books/'.$filename));
    }//End of function

    //function to delete book for prof
    public function DeleteInstBook  (Request $request)
    {
        try {
            $this->deleteFile($request->file);
            $books = Book::findOrFail($request->id)->delete();
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
}
