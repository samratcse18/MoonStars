<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Reward;
use Auth;
use Hash;
use DB;
class UserController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8',
        ]);
        $datas = DB::select('SELECT * FROM users ');
        $flag = false;
        foreach($datas as $data){
            if($data->email == $request->email || $data->phone == $request->phone){
                $flag = true;
            }
        }
        if($flag == false){
            if($request->password == $request->cpassword){
                $new = new User();
                $new->name=$request->name;
                $new->username=$request->username;
                $new->email=$request->email;
                $new->phone=$request->phone;
                $new->promocode=$request->promocode;
                $new->status= "active";
                $new->balance = 200;
                $new->password=Hash::make($request->password);
                $new->save();
                return redirect()->route('welcome')->with('success','Account create Successfully');
            }
            else
            {
                return redirect()->route('welcome')->with('error','Password and Confirm Password dose not match');
            }
        }
        else if($flag == true){
            return redirect()->route('welcome')->with('error','Email or Phone Number must be Unique');
        }
        
    } 
    public function doLogin(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8|max:16'
        ],
        [
            'email.required'=>'Email is Required',
            'email.email'=>'Please Enter Valid Email',
            'password.required'=>'Password is Required',
            'password.min'=>'Password Minimum 8 Characters',
            'password.max'=>'Password Maximum 16 Characters',
        ]
        );
        $status = "inactive";
        $user = User::where('email', $request->email)->where('status', $status)->first();
        $check=$request->only('email','password');

        if(Auth::guard('admin')->attempt($check)){
            return redirect()->route('admin.dashboard')->with('success','Welcome to home page');
        }
        else if($user){
            return redirect()->route('welcome')->with('error','Now You are InActive User');
        }
        else if(Auth::guard('user')->attempt($check)) {
            return redirect()->route('user.dashboard')->with('success','Welcome to home page');
        }
        else {
            return redirect()->route('welcome')->with('error','email and password invalid');
        }    
    }
    public function user_dashboard(Request $request)
    {
        $user = Auth::user();
        $balance = Auth::user()->balance;
        $deposits = DB::select('SELECT * FROM deposits WHERE UID = ?', [$user->id]);
        $withdraws = DB::select('SELECT * FROM withdraws WHERE UID = ?', [$user->id]);
        $rewards = DB::select('SELECT * FROM rewards WHERE UID = ?', [$user->id]);
        $total_deposit = 0;
        $total_withdraw = 0;
        $total_reward = 0;
        foreach($withdraws as $withdraw){
            if ($withdraw->status == "approve" || $withdraw->status == "pending")
                    {
                        $total_withdraw = intval($total_withdraw) + intval($withdraw->amount);
                    }   
        }
        foreach($deposits as $deposit){
            if ($deposit->status == "approve")
                    {
                        $total_deposit = intval($total_deposit) + intval($deposit->amount);
                    }   
        }
        foreach($rewards as $reward){
                $total_reward = intval($total_reward) + intval($reward->reward_balance); 
        }
        $total_balance = intval($balance) + intval($total_deposit) + intval($total_reward) - intval($total_withdraw);
                            
        $request->session()->put('total_withdraw', $total_withdraw);
        $request->session()->put('total_deposit', $total_deposit);
        $request->session()->put('total_reward', $total_reward);
        $request->session()->put('total_balance', $total_balance);
        return view('user.dashboard');
    }
    public function user_logout()
    {
        if(Auth::guard('user')->user())
        {
            Auth::guard('user')->logout();
        }
        return redirect()->route('welcome');
    }
    public function user_profile()
    {
        return view('user.profile');
    }
    public function user_password_change()
    {
        return view('user.password_change');
    }
    public function user_password_change_action(Request $request)
    {
        $request->validate([
            'oldpassword'=>'required|min:8|max:16',
            'password'=>'required|min:8|max:16',
            'cpassword'=>'required|min:8|max:16'
        ],
        [
            'oldpassword.required'=>'Old Password is Required',
            'oldpassword.min'=>'Old Password Minimum 8 Characters',
            'oldpassword.max'=>'Old Password Maximum 16 Characters',
            'password.required'=>'Password is Required',
            'password.min'=>'Password Minimum 8 Characters',
            'password.max'=>'Password Maximum 16 Characters',
            'cpassword.required'=>'Confirm Password is Required',
            'cpassword.min'=>'Confirm Password Minimum 8 Characters',
            'cpassword.max'=>'Confirm Password Maximum 16 Characters',
        ]
        );
        $user = Auth::user();
        if(Hash::check($request->oldpassword, $user->password))
        {
            if($request->password == $request->cpassword){
                $user->password=Hash::make($request->password);
                $user->save();
                return redirect()->route('user.password_change')->with('success','Password Change Successfully');
            }
            else{
                return redirect()->route('user.password_change')->with('error','Password and Confirm Password dose not Match');
            }
        }
        else{
            return redirect()->route('user.password_change')->with('error','Old Password dose not Match');
        }
    }
    public function user_finance(Request $request)
    {
        $user = Auth::user();
        $balance = Auth::user()->balance;
        $deposits = DB::select('SELECT * FROM deposits WHERE UID = ?', [$user->id]);
        $withdraws = DB::select('SELECT * FROM withdraws WHERE UID = ?', [$user->id]);
        $rewards = DB::select('SELECT * FROM rewards WHERE UID = ?', [$user->id]);
        $accounts = DB::select('SELECT * FROM accounts ');
        $total_deposit = 0;
        $total_withdraw = 0;
        $total_reward = 0;
        foreach($withdraws as $withdraw){
            if ($withdraw->status == "approve" || $withdraw->status == "pending")
                    {
                        $total_withdraw = intval($total_withdraw) + intval($withdraw->amount);
                    }   
        }
        foreach($deposits as $deposit){
            if ($deposit->status == "approve")
                    {
                        $total_deposit = intval($total_deposit) + intval($deposit->amount);
                    }   
        }
        foreach($rewards as $reward){
                $total_reward = intval($total_reward) + intval($reward->reward_balance); 
        }
        $total_balance = intval($balance) + intval($total_deposit) + intval($total_reward) - intval($total_withdraw);
                            
        $request->session()->put('total_withdraw', $total_withdraw);
        $request->session()->put('total_deposit', $total_deposit);
        $request->session()->put('total_reward', $total_reward);
        $request->session()->put('total_balance', $total_balance);
        return view('user.finance',compact('accounts'));
    }
    public function user_statement(Request $request)
    {
        $user = Auth::user();
        $balance = Auth::user()->balance;
        $deposits = DB::select('SELECT * FROM deposits WHERE UID = ?', [$user->id]);
        $withdraws = DB::select('SELECT * FROM withdraws WHERE UID = ?', [$user->id]);
        $rewards = DB::select('SELECT * FROM rewards WHERE UID = ?', [$user->id]);
        $total_deposit = 0;
        $total_withdraw = 0;
        $total_reward = 0;
        foreach($withdraws as $withdraw){
            if ($withdraw->status == "approve" || $withdraw->status == "pending")
                    {
                        $total_withdraw = intval($total_withdraw) + intval($withdraw->amount);
                    }   
        }
        foreach($deposits as $deposit){
            if ($deposit->status == "approve")
                    {
                        $total_deposit = intval($total_deposit) + intval($deposit->amount);
                    }   
        }
        foreach($rewards as $reward){
                $total_reward = intval($total_reward) + intval($reward->reward_balance); 
        }
        $total_balance = intval($balance) + intval($total_deposit) + intval($total_reward) - intval($total_withdraw);
                            
        $request->session()->put('total_withdraw', $total_withdraw);
        $request->session()->put('total_deposit', $total_deposit);
        $request->session()->put('total_reward', $total_reward);
        $request->session()->put('total_balance', $total_balance);
        return view('user.statement',compact('deposits','withdraws'));
    }
    public function user_deposit(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'receive_payment_number' => 'required',
            'amount' => 'required',
            'user_payment_number' => 'required',
            'transaction_no' => 'required',
        ]);
        $datas = DB::select('SELECT transaction_no FROM deposits ');
        $flag = false;
        foreach($datas as $data){
            if($data->transaction_no == $request->transaction_no){
                $flag = true;
            }
        }
            $user = Auth::user();
            if($request->amount >= "1000"){
                if($flag == false){
                    $new = new Deposit();
                    $new->UID=$user->id;
                    $new->username=$user->username;
                    $new->method=$request->method;
                    $new->receive_payment_number=$request->receive_payment_number;
                    $new->amount=$request->amount;
                    $new->user_payment_number=$request->user_payment_number;
                    $new->transaction_no=$request->transaction_no;
                    $new->requested_at=now()->format('d-m-Y');
                    $new->status= "pending";
                    $new->save();
                    return redirect()->route('user.finance')->with('success','Deposit Request Successfully Send');
                }
                else if($flag == true){
                    return redirect()->route('user.finance')->with('error','Transaction No must be Unique');
                }
            }
            else{
                return redirect()->route('user.finance')->with('error','Deposit Amount must be more then or Equal 1000');
            }
            
    } 
    public function user_withdraw(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'number_type' => 'required',
            'receive_payment_number' => 'required',
            'amount' => 'required',
            'password' => 'required|min:8|max:16',
        ]);
            $user = Auth::user();
            $balance = session('total_balance');
        if($balance >= "1200"){
            if($request->amount >= "1000"){
                if(Hash::check($request->password, $user->password)){
                    $new = new Withdraw();
                    $new->UID=$user->id;
                    $new->username=$user->username;
                    $new->method=$request->method;
                    $new->receive_payment_number=$request->receive_payment_number;
                    $new->amount=$request->amount;
                    $new->requested_at=now()->format('d-m-Y');
                    $new->status= "pending";
                    $new->save();
                    return redirect()->route('user.finance')->with('success','Withdraw Request Successfully Send');
                }
                else {
                    return redirect()->route('user.finance')->with('error','Password dose not Match');
                }
            }
            else{
                return redirect()->route('user.finance')->with('error','Withdraw Amount must be more then or Equal 1000');
            }
        }
        else{
            return redirect()->route('user.finance')->with('error','Withdraw Amount must be more then or Equal 1200 you can not withdraw initial balance 200');
        }
    } 
    public function cancel_deposit($id){
        DB::delete('delete from deposits where id = ?',[$id]);
        return redirect()->route('user.statement');
    }
    public function cancel_withdraw($id){
        DB::delete('delete from withdraws where id = ?',[$id]);
        return redirect()->route('user.statement');
    }
    public function user_task(Request $request)
    {
        $user = Auth::user();
        $balance = Auth::user()->balance;
        $deposits = DB::select('SELECT * FROM deposits WHERE UID = ?', [$user->id]);
        $withdraws = DB::select('SELECT * FROM withdraws WHERE UID = ?', [$user->id]);
        $rewards = DB::select('SELECT * FROM rewards WHERE UID = ?', [$user->id]);
        $total_deposit = 0;
        $total_withdraw = 0;
        $total_reward = 0;
        $date = 0;
        foreach($rewards as $reward){
            $date = $reward->date;
        }
        foreach($withdraws as $withdraw){
            if ($withdraw->status == "approve" || $withdraw->status == "pending")
                    {
                        $total_withdraw = intval($total_withdraw) + intval($withdraw->amount);
                    }   
        }
        foreach($deposits as $deposit){
            if ($deposit->status == "approve")
                    {
                        $total_deposit = intval($total_deposit) + intval($deposit->amount);
                    }   
        }
        foreach($rewards as $reward){
                $total_reward = intval($total_reward) + intval($reward->reward_balance); 
        }
        $total_balance = intval($balance) + intval($total_deposit) + intval($total_reward) - intval($total_withdraw);
                            
        $request->session()->put('total_withdraw', $total_withdraw);
        $request->session()->put('total_deposit', $total_deposit);
        $request->session()->put('total_reward', $total_reward);
        $request->session()->put('total_balance', $total_balance);
        return view('user.task',compact('rewards','date'));
    }
    public function claim($id)
    {
        $user = Auth::user();
        $refer_code = $user->id . $user->username;
        $refer_balance = 0;
        $flag = false;
        $promo_codes = DB::select('SELECT * FROM users WHERE promocode = ?', [$refer_code]);
        foreach($promo_codes as $promo_code){
            $referUsers = DB::select('SELECT * FROM deposits WHERE UID = ?', [$promo_code->id]);
            foreach ($referUsers as $referUser) {
                if($referUser->status == "approve"){
                    $flag = true;
                }
            }
            if($flag == true){
                $balance = 200;
                $deposits = DB::select('SELECT * FROM deposits WHERE UID = ?', [$promo_code->id]);
                $withdraws = DB::select('SELECT * FROM withdraws WHERE UID = ?', [$promo_code->id]);
                $rewards = DB::select('SELECT * FROM rewards WHERE UID = ?', [$promo_code->id]);
                $total_deposit = 0;
                $total_withdraw = 0;
                $total_reward = 0;
                foreach($withdraws as $withdraw){
                    if ($withdraw->status == "approve" || $withdraw->status == "pending")
                            {
                                $total_withdraw = intval($total_withdraw) + intval($withdraw->amount);
                            }   
                }
                foreach($deposits as $deposit){
                    if ($deposit->status == "approve")
                            {
                                $total_deposit = intval($total_deposit) + intval($deposit->amount);
                            }   
                }
                foreach($rewards as $reward){
                        $total_reward = intval($total_reward) + intval($reward->reward_balance); 
                }
                $total_balance = intval($balance) + intval($total_deposit) + intval($total_reward) - intval($total_withdraw);
                $refer_balance = $refer_balance + ($total_balance * .005);
            }
        }
        $balance = session('total_balance');
        if($balance > 100000){
            $newReward = ($balance * .055)+ $refer_balance;
        }
        else if(($balance <= 100000) && ($balance > 20000)){
            $newReward = ($balance * .050)+ $refer_balance;
        }
        else if(($balance <= 20000) && ($balance > 10000)){
            $newReward = ($balance * .045)+ $refer_balance;
        }
        else if(($balance <= 10000) && ($balance > 5000)){
            $newReward = ($balance * .04)+ $refer_balance;
        }
        else if(($balance <= 5000) && ($balance >= 1000)){
            $newReward = ($balance * .035)+ $refer_balance;
        }
        $rewards = DB::select('SELECT * FROM rewards WHERE UID = ?', [$id]);
        $new_id = null;
        $previous_balance = null;
        foreach($rewards as $reward){
            $new_id = intval($reward->UID);
            $previous_balance = intval($reward->reward_balance);
        }
        if($new_id == $id)
        {
            $new_balance = $newReward;
            $new_reward_balance = intval($previous_balance) + intval($new_balance);
            $result = DB::table('rewards')->where('UID', $id)->update(['reward_balance' => $new_reward_balance,'date'=>now()->format('d-m-Y')]);
            if($result){
                return redirect()->route('user.task')->with('success','Reward Claim Update Successful');
            }
            else{
                return redirect()->route('user.task')->with('error','Reward Claim Update dose not Successful');
            }
        }
        else if($new_id != $id){ 
            $new_reward = new Reward();
            $new_reward->UID=$user->id;
            $new_reward->username=$user->username;
            $new_reward->reward_balance=$newReward;
            $new_reward->date=now()->format('d-m-Y');
            $new_reward->save();
            return redirect()->route('user.task')->with('success','Reward Claim Successful');
        }
    } 
    public function user_plan()
    {
        return view('user.plan');
    }
    public function user_support()
    {
        return view('user.support');
    }
    public function user_refer()
    {
        return view('user.refer');
    }
    public function user_refer_list()
    {
        $user = Auth::user();
        $refer_code = $user->id . $user->username;
        $flag = false;
        $users = DB::select('SELECT * FROM users WHERE promocode = ?', [$refer_code]);
        return view('user.refer_user',compact('users'));
    }
    // public function user_payment($paymentMethod)
    // {
    //     $option = Account::where('method', $paymentMethod)->get();
    //     return response()->json($option);
        
    // }
}
