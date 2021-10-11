<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Expense;
use App\Client;
use App\Supplier;

use App\Transaction;

// use App\Items_store;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
             // return view('expenses.ReceiveCash');

     }

     public function ReceiveCash(Request $request)
     {
       if(isset($request->id)){
         $Transaction=Transaction::where('id','=',$request->id)->get();
// if($Transaction[0]->expense_type==2){
$client=Client::where('account_id','=',$Transaction[0]->account_id)->get();
// print_r($client);
$Transaction[0]->client_id=$client[0]->id;
// }
// }else{


$clients = DB::table('clients')
            ->join('accounts', 'accounts.id', '=', 'clients.account_id')
            ->select('clients.*', 'clients.name', 'clients.id','accounts.opening_balance')
            ->get();
                     // }
       }else{

$Transaction='';
$clients = DB::table('clients')
            ->join('accounts', 'accounts.id', '=', 'clients.account_id')
            ->select('clients.*', 'clients.name', 'clients.id','accounts.opening_balance')
            ->get();
                 }
                 // print_r($Transaction);
             return view('expenses.ReceiveCash',compact('clients','Transaction'));

       // return view('expenses.CashExchange');

     }
     public function addReceiveCash(Request $request)
     {

               $Client = Client::findOrFail($request->client);
               $new_balance= $Client->balance-$request->amount;

               // Make sure you've got the Page model
               if($Client) {
                   $Client->balance = $new_balance;
                 $Client->save();
                 // create transaction
                 $trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;

                 $transaction = new Transaction();

                 $transaction->account_id = $Client->account_id;
                 ////////after transaction
                 $transaction->account_balance = $Client->balance;
                 $transaction->trans_id =$trans_no;
                 $transaction->type =3;

                 $transaction->depit =$request->amount ;
                 $transaction->credit = 0;


                 $transaction->save();
               }
               $response = array(
                 'status' => 'success',
                 'msg' => 'The new payment has been created',
               );
               return response()->json($response);
     }
     public function updateReceiveCash(Request $request)
     {

               $Client = Client::findOrFail($request->client);
               // $new_balance= $Client->balance-$request->amount;
               $transaction = Transaction::findOrFail($request->id);

               if($transaction->depit!=$request->amount){
                 $diff=$transaction->depit-$request->amount;
                 $new_balance= $Client->balance+$diff;

               }else{
                 $new_balance= $Client->balance-0;

               }
               // Make sure you've got the Page model
               if($Client) {
                   $Client->balance = $new_balance;
                 $Client->save();
                 // create transaction
                 // $trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;

                 // $transaction = new Transaction();

                 $transaction->account_id = $Client->account_id;
                 ////////after transaction
                 $transaction->account_balance = $Client->balance;
                 // $transaction->trans_id =$trans_no;
                 $transaction->type =3;

                 $transaction->depit =$request->amount ;
                 $transaction->credit = 0;


                 $transaction->save();
               }
               $response = array(
                 'status' => 'success',
                 'msg' => 'The new payment has been created',
               );
               return response()->json($response);
     }
     public function ExpenseScreen()
     {

$expenses_type=['',
            'مصروفات',
            'حساب موردين',
            'نثريات',
            'خصومات',
            'اصول'];  
       $suppliers = DB::table('transactions')
                   // ->join('transactions', 'accounts.id', '=', 'transactions.account_id')
                    // ->leftjoin('suppliers','suppliers.account_id' , '=', 'accounts.id')
                   ->select('transactions.*','transactions.account_balance as balance','transactions.id as trans_id','transactions.credit','transactions.type','transactions.expense_type')
                   ->where('transactions.type', '=', 4)
                   ->where('transactions.state', '=', 1)
                   ->orderBy('id','desc')
                   // ->sum('transactions.amount');
                    // ->where('accounts.type', '=', 'supplier')
                   ->get();
                   foreach ($suppliers as  $supplier) {
 $supplier->expense_type2='';
                     if($supplier->account_id!=0){
                       $account=DB::table('accounts')
                        ->where('accounts.id', '=', $supplier->account_id)
->get();

// print_r($account[0]);
$supplier->account_name=$account[0]->account_name;
$supplier->expense_name='';

                     }else {
                

$account2 = DB::table('expenses')->select('name')->where('id', '=', $supplier->expense_id)->where('type', '=', $supplier->expense_type)->value('name');
// echo($account2);

$supplier->expense_name=$account2;
$supplier->account_name='';

                     }

                     $supplier->expense_type2= $expenses_type[$supplier->expense_type];

                   }
// print_r($suppliers);
             return view('expenses.ExpenseScreen',compact('suppliers'));

     }
     public function PaymentScreen()
     {
       $clinets = DB::table('accounts')
                   ->join('transactions', 'accounts.id', '=', 'transactions.account_id')
                    // ->leftjoin('suppliers','suppliers.account_id' , '=', 'accounts.id')
                   ->select('accounts.account_name as name','transactions.account_balance as balance','transactions.id as trans_id','accounts.id' ,'transactions.depit','transactions.type')
                   ->where('transactions.type', '=', 3)
                   ->where('transactions.state', '=', 1)
                   ->orderBy('id','desc')
                   // ->sum('transactions.amount');
                    // ->where('accounts.type', '=', 'supplier')
                   ->get();
                   foreach ($clinets as  $clinet) {
                     // $total_pay=
                     $total_pay = DB::table('transactions')->select(\DB::raw('SUM(depit) as total_val'))
                              ->where('type',3)
                                ->where('account_id',$clinet->id)
                              ->groupBy('account_id')
                              // ->orderBy('loan_type')
                              ->get();
                               $clinet->total_pay=$total_pay[0]->total_val;
                   }
             return view('expenses.PaymentScreen',compact('clinets'));
       // return view('expenses.PaymentScreen');

     }
     public function DefineExpenses()
     {
       return view('expenses.defineExpenses');

     }

     public function addDefineExpenses()
     {
       // return view('Expenses.defineExpenses');
       return view('expenses.defineExpenses');

     }
       public function CashExchange(Request $request)
       {
         if(isset($request->id)){
           $Transaction=Transaction::where('id','=',$request->id)->get();
if($Transaction[0]->expense_type==2){
  $supplier=Supplier::where('account_id','=',$Transaction[0]->account_id)->get();
$Transaction[0]->supplier_id=$supplier[0]->id;
}
// }else{


           $suppliers = DB::table('suppliers')
                       ->join('accounts', 'accounts.id', '=', 'suppliers.account_id')
                       ->select('suppliers.*', 'suppliers.name','suppliers.id','accounts.opening_balance')
                       // ->where('accounts.id','=',$request->id)
                       ->get();
                       $expenses = Expense::all();

         
                       // }
         }else{

 $Transaction='';
         $suppliers = DB::table('suppliers')
                     ->join('accounts', 'accounts.id', '=', 'suppliers.account_id')
                     ->select('suppliers.*', 'suppliers.name', 'suppliers.id','accounts.opening_balance')
                     ->get();
                     $expenses = Expense::all();

                   }
                   // print_r($Transaction);
               return view('expenses.CashExchange',compact('suppliers','Transaction','expenses','expenses4','expenses2'));
         // return view('expenses.CashExchange');

       }
       public function addCashExchange(Request $request)
       {
         $account_id=0;
                  if($request->supplier!=0){
                          $Supplier = Supplier::findOrFail($request->supplier);
                          $new_balance= $Supplier->balance-$request->amount;

                           $Supplier->balance = $new_balance;
                         $Supplier->save();
                         $account_id=$Supplier->account_id;
                 }
                   // create transaction
                   $trans_no=Transaction::select('trans_id')->orderBy('trans_id', 'desc')->first()['num']+1;

                   $transaction = new Transaction();

                   $transaction->account_id = $account_id;
                   ////////after transaction
                   if($request->supplier!=0){
                   $transaction->account_balance = $Supplier->balance;
}
                   $transaction->trans_id =$trans_no;
                   /// صرف نقديه
                   $transaction->type =4;
                   $transaction->expense_type=$request->expense_type;
                   $transaction->expense_id=$request->expense;

                   $transaction->credit=$request->amount ;
                   $transaction->depit = 0;


                   $transaction->save();

                 $response = array(
                   'status' => 'success',
                   'msg' => 'The new exchange has been created',
                 );
                 return response()->json($response);
       }
       public function updateCashExchange(Request $request)
       {
         $account_id=0;
         $transaction=Transaction::findOrFail($request->id);

         if($request->supplier!=0){
                 $Supplier = Supplier::findOrFail($request->supplier);
                 if($transaction->credit!=$request->amount){
                   $diff=$transaction->credit-$request->amount;
                   $new_balance= $Supplier->balance+$diff;

                 }else{
                   $new_balance= $request->balance-0;

                 }

                  $Supplier->balance = $new_balance;
                $Supplier->save();
                $account_id=$Supplier->account_id;
        }
         // update transaction
         // $transaction = new Transaction();

         $transaction->account_id = $account_id;
         ////////after transaction
         if($request->supplier!=0){
         $transaction->account_balance = $Supplier->balance;
}
         // $transaction->trans_id =$trans_no;
         /// صرف نقديه
         $transaction->type =4;
         $transaction->expense_type=$request->expense_type;
         $transaction->expense_id=$request->expense;

         $transaction->credit=$request->amount ;
         $transaction->depit = 0;


         $transaction->save();



                 $response = array(
                   'status' => 'success',
                   'msg' => 'The new exchange has been created',
                 );
                 return response()->json($response);
       }
       public function destroy( $id)
       {

           $Transaction = Transaction::findOrFail($id);

           $Transaction->state= 2;
           $Transaction->save();

           return redirect()->back()
               ->with(array('success'=>'expense created successfully'));
                    }
    public function store(Request $request)
    {
        //
        /*$Item = new Item();

        $this->validate($request, [
            'phone' => 'required|digits_between:9,11|unique:Items',
        ]);

        $Item->name = $request->name;
        $Item->address1 = $request->address1;
        $Item->phone = $request->phone;
        $Item->code= $request->code;


        $Item->save();

        Session::flash('created_message', 'The new Item has been added');

        return redirect('/bowner/Item');*/
        $this->validate($request, [
            'name' => 'required|max:255',
            'type' => 'max:255',


            /*            'pricebook_id' => 'max:255',*/
        ]);
        $input = $request->only('name',
            'type',1
            );
            $Expenses = Expense::where('state', 1)
                           ->orderBy('id')
                           ->get();
        $result = Expense::create($input);

        // return view('expenses.defineExpenses');

        return redirect()->back()
        //
        //
            ->with(array('success'=>'expense created successfully'));
    }

}
