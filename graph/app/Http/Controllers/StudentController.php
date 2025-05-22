<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;



class StudentController extends Controller
{

    public function registerForm(){
        return view("registerForm");
    }

     public function registerStudent(Request $request){
        $request -> validate([
            "fname" => 'required|string',
            "lname" => 'required|string',
            "addr" => 'required|string',
            "bday" => 'required|date',
            "photo" => 'required|string',
            "email" => 'required|email|unique:students,email',
            "pwd" => 'required|string',
        ]);

        $bday = Carbon::parse($request->bday);
         $age = $bday->age;

        Student::create([
            "fname" => $request->fname,
            "lname" => $request->lname,
            "addr" => $request->addr,
            "bday" => $request->bday,
            "age" => $age,
            "photo" => $request->photo,
            "email" => $request->email,
            "pwd" =>Hash::make($request->pwd),
        ]);

        if($request->receipt != null){
             $student = Student::all()->last();
            return view("receipt", compact('student'));
        }

        return redirect("index");
    }

    public function index(){
        if(!Session::has("email")){
            return redirect()->route("loginForm");
        }
    $search = $request->input('search');

    $students = Student::when($search, function ($query, $search) {
        return $query->where('fname', 'like', "%{$search}%")
                     ->orWhere('lname', 'like', "%{$search}%")
                     ->orWhere('email', 'like', "%{$search}%");
            })->get();


        $logs = Log::all();

        return view("index", compact('students', 'logs'));
    }

    public function loginForm(){
        return view("loginForm");
    }

    public function loginStudent(Request $request){
        $request->validate([
            "email" => 'required',
            "pwd" => 'required',
        ]);

        $student = Student::where("email", $request->email)->first();

        if($student && Hash::check($request->pwd, $student->pwd)){
            Session::put("email", $request->email);

            $timeIn = now();
            $lateThreshold = Carbon::createFromTime(8, 0, 0);
            $remarks = $timeIn->greaterThan($lateThreshold) ? "Late" : "On time";

            Log::create([
                "name" => $student->fname,
                "in" => $timeIn->format("H:i:s"),
                "out" => null,
                "date" => $timeIn->toDateString(),
                "remarks" =>$remarks
            ]);
            return redirect("index");

        }
        return redirect("loginForm");
    }

     public function logout(){
        $email = Session::get("email");

        $student = Student::where("email", $email)->first();

        if($student){
            $log = Log::where("name", $student->fname)->whereDate("date", Carbon::today())->whereNull("out")->latest()->first();
            if($log){
                $log->update([
                    "out" => Carbon::now()->format("H:i:s")
                ]);
            }
        }
        Session::forget("email");

        return redirect()->route('loginForm');
    }

     public function editForm($id){
        $student = Student::find($id);
        return view("editForm", compact("student"));
    }

     public function editStudent(Request $request){
         $request -> validate([
            "fname" => 'required|string',
            "lname" => 'required|string',
            "addr" => 'required|string',
            "bday" => 'required|date',
            "photo" => 'required|string',
            "email" => 'required',
            "pwd" => 'required|string',
        ]);

        $bday = Carbon::parse($request->bday);
        $age = $bday->age;

        $student = Student::findOrFail($request->id);
        $student->update([
             "fname" => $request->fname,
            "lname" => $request->lname,
            "addr" => $request->addr,
            "bday" => $request->bday,
            "age" => $age,
            "photo" => $request->photo,
            "email" => $request->email,
            "pwd" =>Hash::make($request->pwd),
        ]);

         return redirect("index");
    }

    public function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect("index");
    }
    
}

// public function up()
//     {
//         Schema::table('users', function (Blueprint $table) {
//             // Add a new column
//             $table->string('nickname')->nullable();

//             // Modify a column (requires doctrine/dbal)
//             // $table->string('email', 150)->change();

//             // Drop a column
//             // $table->dropColumn('nickname');
//         });
//     }
