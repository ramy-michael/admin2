<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Client;
use App\Account;
use App\Transaction;
class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$Clients = Client::all();
        $Clients = Client::where('state', 1)
                       ->orderBy('id')
                       ->get();
        return view('Clients.index', compact('Clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view('bowner.Client.create');
        $Clients = Client::all();
        return view('Clients.create', compact('Clients'));

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

        $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:suppliers',
            'name' => 'required',
            'code' => 'required'

        ]);

        $account->account_name = $request->name;
        $account->type = 'client';
        $account->opening_balance = $request->balance;


        $account->save();

$trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;


        $transaction = new Transaction();

        // $this->validate($request, [
        //     'phone' => 'required|digits_between:9,11|unique:suppliers',
        // ]);
//open balnce to supplier
//safe account
        $transaction->account_id = $account->id;
        $transaction->trans_id =$trans_no;
        $transaction->depit =$request->balance ;
        $transaction->credit =0 ;


        $transaction->save();
        //supplier account
        $transaction = new Transaction();

        $transaction->account_id = $account->id;
        $transaction->trans_id =$trans_no;
        $transaction->depit =0 ;
        $transaction->credit = $request->balance;


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
            $input['account_id']=$account->id;

        $result = Client::create($input);
        return redirect()->route('Clients.index')
            ->with('success', 'Customer created successfully');
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
        $Client = Client::findOrFail($id);

        return view('Clients.edit', compact('Client'));
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
        $Client = Client::findOrFail($request->id);

        $this->validate($request, [
            'phone' => 'required',
        ]);

        $Client->name = $request->name;
        $Client->address1 = $request->address1;
        $Client->phone = $request->phone;
        $Client->code= $request->code;
        $Client->balance= $request->balance;

        $Client->state= 1;

        $Client->save();

        Session::flash('success', 'The new Client has been updated');

      //  return redirect('Clients.index');
      $response = array(
        'status' => 'success',
        'msg' => 'The new Client has been updated',
    );
   return response()->json($response);
    //return redirect()->action('ClientController@index');

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
      /*  $Client = Client::findOrFail($id);

        $Client->delete();

        Session::flash('deleted_message', 'The Client has been deleted');

        return redirect('/bowner/Client');*/
        //Client::find($id)->delete();
        $Client = Client::findOrFail($id);

        $Client->state= 2;
        $Client->save();

        return redirect()->route('Clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
