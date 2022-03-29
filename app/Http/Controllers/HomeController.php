<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home() {
        $data = Student::get();
        return view('home',compact('data'));
    }

    public function create() {
        return view('create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|min:8',
            'roll' => 'required|int',
            'email' => 'required|email|unique:students,email'
        ]);

        Student::create([
            'name' => $request->input('name'),
            'roll' => $request->input('roll'),
            'email' => $request->input('email'),
        ]);
        session()->flash('message','Data created successful');
        return redirect()->route('home');
    }

    public function edit($id) {
        $data = Student::find($id);
        return view('edit',compact('data'));
    }

    public function update(Request $request,$id) {
        $request->validate([
            'name' => 'required|min:8',
            'roll' => 'required|int',
            'email' => 'required|email'
        ]);

        Student::find($id)->update([
            'name' => $request->input('name'),
            'roll' => $request->input('roll'),
            'email' => $request->input('email')
        ]);
        session()->flash('message','Data update successful');
        return redirect()->route('home');
    }

    public function destroy($id) {
        Student::find($id)->delete();
        session()->flash('message','Data delete successful');
        return redirect()->back();
    }
}
