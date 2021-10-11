<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$Users = User::all();
        $Users = User::where('state', 1)
                       ->orderBy('id')
                       ->get();
        return view('Users.index', compact('Users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.User.create');
        $Users = User::all();
        return view('Users.create', compact('Users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        /*$User = new User();

        $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:Users',
        ]);

        $User->name = $request->name;
        $User->address1 = $request->address1;
        $User->phone = $request->phone;
        $User->code= $request->code;


        $User->save();

        Session::flash('created_message', 'The new User has been added');

        return redirect('/bowner/User');*/
        $this->validate($request, [
            'name' => 'required|max:255',
            // 'username' => 'required|max:255',

            'job' => 'max:255',

            'phone' => 'max:255',
            'password' => 'required|max:255',


            /*            'pricebook_id' => 'max:255',*/
        ]);
        $input = $request->only('name','username','job', 'phone', 'password','remember_token','state'
            );
            // print_r($input);
        $result = User::create($input);
        return redirect()->route('Users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $User = User::findOrFail($id);

        return view('Users.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $User = User::findOrFail($request->id);

        $this->validate($request, [
            'phone' => 'required',
        ]);

        $User->name = $request->name;
        $User->username = $request->username;
        $User->phone = $request->phone;
        $User->password= $request->password;
        $User->job= $request->job;

        $User->state= 1;

        $User->save();

        Session::flash('success', 'The new User has been updated');

      //  return redirect('Users.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new User has been updated',
    );
   return response()->json($response);
    //return redirect()->action('UserController@index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
      /*  $User = User::findOrFail($id);

        $User->delete();

        Session::flash('deleted_message', 'The User has been deleted');

        return redirect('/bowner/User');*/
        //User::find($id)->delete();
        $User = User::findOrFail($id);

        $User->state= 2;
        $User->save();

        return redirect()->route('Users.index')
            ->with('success', 'User deleted successfully');
    }
}
