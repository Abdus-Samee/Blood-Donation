<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\BloodMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        return view('home')->with('user', $user);
    }

    public function list(){
        $users = User::select("*")->where("id", "!=", auth()->user()->id)->get();

        return view('list')->with('users', $users);
    }

    public function edit($id){
        $user = User::find($id);

        return view('edit')->with('user', $user);
    }

    public function update($id){
        $user = User::find($id);

        $user->name = request('name');
        $user->email = request('email');
        $user->bg = request('bg');
        $user->address = request('address');
        $user->phone = request('phone');
        $user->last_donated = request('date');

        $user->save();

        return redirect()->route('home')->with('status', 'Updated information succesfully!');
    }

    public function email($from, $to){
        $receiver = User::find($to);
        $sender = User::find($from);

        $message = 'A request for blood donation of your type. Please contact soon.';
        $name = $sender->name;
        $email = $sender->email;
        $details = [
            'message' => $message,
            'name' => $name,
            'email' => $email
        ];

        Mail::to($receiver)->send(new BloodMail($details));

        return redirect()->route('list')->with('status', 'Email sent to desired donor successfully.');
    }
}
