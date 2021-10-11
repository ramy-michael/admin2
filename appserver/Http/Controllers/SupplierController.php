<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Supplier;
use App\Account;
use App\Transaction;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$suppliers = Supplier::all();
        $suppliers = Supplier::where('state', 1)
                       ->orderBy('id','desc')
                       ->get();
        return view('Suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.supplier.create');
        $suppliers = Supplier::all();
        return view('Suppliers.create', compact('suppliers'));

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
        $account = new Account();

        // $this->validate($request, [
        //     'phone' => 'required|digits_between:9,11|unique:suppliers',
        // ]);

        $account->account_name = $request->name;
        $account->type = 'supplier';
        $account->opening_balance = $request->balance;


        $account->save();

        $transaction = new Transaction();

        // $this->validate($request, [
        //     'phone' => 'required|digits_between:9,11|unique:suppliers',
        // ]);
//open balnce to supplier
//safe account
        $transaction->account_id = $account->id;
        $transaction->depit =0 ;
        $transaction->credit =$request->balance ;


        $transaction->save();
        //supplier account
        $transaction = new Transaction();

        $transaction->account_id = $account->id;
        $transaction->depit =$request->balance ;
        $transaction->credit = 0;


        $transaction->save();
        $this->validate($request, [
            'name' => 'required|max:255',
            'address1' => 'max:255',

            'phone' => 'max:255',
            'code' => 'max:255',
            'balance' => 'max:255',


            /*            'pricebook_id' => 'max:255',*/
        ]);
        $input = $request->only('name',
            'address1', 'phone', 'code','balance','state'
            );
          // print_r($input );
          $input['account_id']=$account->id;
        $result = Supplier::create($input);
        return redirect()->route('Suppliers.index')
            ->with('success', 'تم اضافه موردبنجاح');
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
        $supplier = Supplier::findOrFail($id);

        return view('Suppliers.edit', compact('supplier'));
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
        $supplier = Supplier::findOrFail($request->id);

        $this->validate($request, [
            'phone' => 'required',
        ]);

        $supplier->name = $request->name;
        $supplier->address1 = $request->address1;
        $supplier->phone = $request->phone;
        $supplier->code= $request->code;
        $supplier->balance= $request->balance;

        $supplier->state= 1;

        $supplier->save();

        Session::flash('success', 'The new supplier has been updated');

      //  return redirect('Suppliers.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new supplier has been updated',
    );
   return response()->json($response);
    //return redirect()->action('SupplierController@index');

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
      /*  $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        Session::flash('deleted_message', 'The supplier has been deleted');

        return redirect('/bowner/supplier');*/
        //Supplier::find($id)->delete();
        $supplier = Supplier::findOrFail($id);

        $supplier->state= 2;
        $supplier->save();

        return redirect()->route('Suppliers.index')
            ->with('success', 'supplier deleted successfully');
    }
}
