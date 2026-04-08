<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    private function logAction($student_number, $action)
    {
        DB::table('logs')->insert([
            'student_number' => $student_number,
            'action' => $action,
            'created_at' => now()
        ]);
    }

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $data['created_at'] = now();
        $data['updated_at'] = now();

        DB::table('users')->insert($data);
        $this->logAction($data['student_number'], 'Student Registered');

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = DB::table('users')->where('student_number', $request->student_number)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('student_id', $user->id);
            Session::put('student_number', $user->student_number);
            $this->logAction($user->student_number, 'Student Logged In');
            return redirect('/profile');
        }
        return back();
    }

    public function showProfile()
    {
        if (!Session::has('student_id')) return redirect('/login');

        $user = DB::table('users')->where('id', Session::get('student_id'))->first();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $data = $request->except(['_token', 'student_number']);
        $data['updated_at'] = now();

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        DB::table('users')->where('id', Session::get('student_id'))->update($data);
        $this->logAction(Session::get('student_number'), 'Profile Updated');

        return back();
    }

    public function logout()
    {
        $this->logAction(Session::get('student_number'), 'Student Logged Out');
        Session::flush();
        return redirect('/login');
    }
}
