<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserInterest;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendMailJob;

class UserController extends Controller
{


    /**
     * Display a user add form.
     *
     * @return view
     */
    public function home()
    {
         return view('welcome');
    }

    public function save(Request $request)
    {
        // request validate
        $this->validate($request,[
            'name'=>'required|string',
            'email' => 'required|string|email|unique:users',
			'password' => 'required|string|min:3|max:50',
            'interest' => 'required|array',
         ]);
        $name = $request->get('name');
        $email= $request->get('email');

        // save the data on user table
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'status' => 1,
            'password' => Hash::make($request->get('password'))
        ]);
      // get all role from roles table
       $roles = Role::pluck('id')->toArray();
       //attach all role to user
       $attach = $user->roles()->attach($roles);
      // $attach1 = $user->interests()->attach($request->get('interest'));

        foreach($request->get('interest') as $interest) {
            UserInterest::create([
                'user_id' => $user->id,
                'interest' => $interest
            ]);
        }
        //data set welcome email
       $details['to'] = 'vikashks101989@gmail.com';
       $details['name'] = $request->get('name');
       $details['subject'] = 'Welcome text message';
       $details['message'] = 'You are member of this organization.';
       //send message via job and queue
       SendMailJob::dispatch($details)->delay(now()->addMinutes(1));
       return back()->with('message','User Added Successfully!');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userlist()
    {
        $users = User::with('interests')->get();
        return view('user_list', compact('users'));
    }
}
