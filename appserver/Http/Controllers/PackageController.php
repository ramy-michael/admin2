<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Package;
use App\Account;
use App\Transaction;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$Packages = Package::all();
        $Packages = Package::where('state', 1)
                       ->orderBy('id')
                       ->get();
        return view('Packages.index', compact('Packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Package.create');
        $Packages = Package::all();
        return view('Packages.create', compact('Packages'));

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
        $package = new Package();

        // $this->validate($request, [
        //     'phone' => 'required|digits_between:9,11|unique:suppliers',
        // ]);

        $package->name = $request->name;
        $package->weight = $request->weight;

        $package->quantity = $request->quantity;


        $package->save();


        return redirect()->route('Packages.index')
            ->with('success', 'Package created successfully');
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
        $Package = Package::findOrFail($id);

        return view('Packages.edit', compact('Package'));
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
        $package = Package::findOrFail($request->id);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $package->name = $request->name;
        $package->weight = $request->weight;

        $package->quantity = $request->quantity;

        // $Package->state= 1;

        $package->save();

        Session::flash('success', 'The new Package has been updated');

      //  return redirect('Packages.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new Package has been updated',
    );
   return response()->json($response);
    //return redirect()->action('PackageController@index');

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
      /*  $Package = Package::findOrFail($id);

        $Package->delete();

        Session::flash('deleted_message', 'The Package has been deleted');

        return redirect('/bowner/Package');*/
        //Package::find($id)->delete();
        $Package = Package::findOrFail($id);

        $Package->state= 2;
        $Package->save();

        return redirect()->route('Packages.index')
            ->with('success', 'Package deleted successfully');
    }
}
