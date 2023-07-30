<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdraw;
use App\Models\Account;
use Auth;
use Hash;
use DB;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        return view('admin.dashboard');
    }
    public function admin_logout()
    {   
        if(Auth::guard('admin')->user()){
            Auth::guard('admin')->logout();
        }
        return redirect()->route('welcome');
    }
    public function admin_statement()
    {
        $deposits = DB::select('SELECT * FROM deposits');
        $withdraws = DB::select('SELECT * FROM withdraws');
        $total_deposit = 0;
        $total_withdraw = 0;
        foreach($withdraws as $withdraw){
            if ($withdraw->status == "approve")
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
        $total_balance =intval($total_deposit) - intval($total_withdraw);
        return view('admin.statement',compact('deposits','withdraws','total_deposit','total_withdraw','total_balance'));
    }
    public function admin_password_change()
    {
        return view('admin.password_change');
    }
    public function admin_password_change_action(Request $request)
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
                return redirect()->route('admin.password_change')->with('success','Password Change Successfully');
            }
            else{
                return redirect()->route('admin.password_change')->with('error','Password and Confirm Password dose not Match');
            }
        }
        else{
            return redirect()->route('admin.password_change')->with('error','Old Password dose not Match');
        }
    }
    public function admin_profile()
    {
        return view('admin.profile');
    }
    public function deposit_approve($id){
        $new = Deposit::findOrFail($id);
        $new->action_at=now()->format('d-m-Y');
        $new->status="approve";
        $new->save();
        return redirect()->route('admin.statement');
    }
    public function deposit_rejected($id){
        $new = Deposit::findOrFail($id);
        $new->action_at=now()->format('d-m-Y');
        $new->status="rejected";
        $new->save();
        return redirect()->route('admin.statement');
    }
    public function withdraw_approve($id){
        $new = Withdraw::findOrFail($id);
        $new->action_at=now()->format('d-m-Y');
        $new->status="approve";
        $new->save();
        return redirect()->route('admin.statement');
    }
    public function withdraw_rejected($id){
        $new = Withdraw::findOrFail($id);
        $new->action_at=now()->format('d-m-Y');
        $new->status="rejected";
        $new->save();
        return redirect()->route('admin.statement');
    }
    public function admin_user_list()
    {
        $users = DB::select('SELECT * FROM users');
        return view('admin.user_list',compact('users'));
    }
    public function user_active($id){
        $new = User::findOrFail($id);
        $new->status="active";
        $new->save();
        return redirect()->route('admin.user_list');
    }
    public function user_inactive($id){
        $new = User::findOrFail($id);
        $new->status="inactive";
        $new->save();
        return redirect()->route('admin.user_list');
    }
    public function user_details(Request $request,$id)
    {
        // $device_id = $request->header('User-Agent');
        $users = DB::select("SELECT * FROM users WHERE id = $id");
        $deposits = DB::select("SELECT * FROM deposits WHERE UID = $id");
        $withdraws = DB::select("SELECT * FROM withdraws WHERE UID = $id");
        $rewards = DB::select("SELECT * FROM rewards WHERE UID = $id");
        $total_deposit = 0;
        $total_withdraw = 0;
        $total_reward = 0;
        foreach($users as $user){
                $balance = $user->balance;  
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
        return view('admin.user_details');
    }
    public function bank_account()
    {
        return view('admin.bank_account');
    }
    public function bankAccount(Request $request)
    {
        $request->validate([
            'method' => 'required',
            'account' => 'required',
        ]);
        $datas = DB::select('SELECT * FROM accounts ');
        $flag = false;
        foreach($datas as $data){
            if($data->account == $request->account && ($data->method == $request->method)){
                $flag = true;
            }
        }
        if($flag == false){
                $new = new Account();
                $new->method=$request->method;
                $new->account=$request->account;
                $new->save();
                return redirect()->route('admin.bank_account')->with('success','Account Added Successfully');
        }
        else if($flag == true){
            return redirect()->route('admin.bank_account')->with('error','Method and Account Number must be Unique');
        }
    }
    public function bank_account_list()
    {
        $accounts = DB::select('SELECT * FROM accounts ');
        return view('admin.bank_account_list',compact('accounts'));
    }
    public function bank_account_list_delete($id){
        DB::delete('delete from accounts where id = ?',[$id]);
        return redirect()->route('admin.bank_account_list')->with('success','Delete Account Successfully');;
    }
}
