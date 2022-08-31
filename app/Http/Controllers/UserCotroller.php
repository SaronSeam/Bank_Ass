<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class UserCotroller extends Controller
{
    //
    
    public function option(){
      
          $banks = DB::select('select * from bank');
          $show = DB::select('select *from bank');
          return view('admin.setbank',compact('banks','show'));
         
      }
      public function sumincome(){
     
        return  DB::select('SELECT * FROM `tbl_income` WHERE date >= "2022-06-25" AND date <="2022-06-26"');
      
    }

    public function report(){

        $total = DB::select('SELECT SUM(amount) AS amount FROM tbl_exspense');
        $total1 = DB::select('SELECT SUM(amount) AS amount FROM tbl_income');
        return view('report',compact('total','total1'));
    
    }
    
    public function income(Request $req){
        $banks = DB::select('select *from bank');
         $shincome = DB::table('tbl_income')->paginate(5);
         $total = DB::select('SELECT SUM(amount) AS amount FROM tbl_income');

        return view('admin.income',compact('banks','shincome','total'));
       
    }
   
    public function expense(Request $req){
        $banks = DB::select('select *from bank');
         $shincome = DB::table('tbl_exspense')->paginate(5);
         $total = DB::select('SELECT SUM(amount) AS amount FROM tbl_exspense');

        return view('admin.expense',compact('banks','shincome','total'));
       
    }
    public function setexpense (Request $req){
        $bank = $req ->input('bank');
        $amount = $req ->input('amount');
        $des = $req ->input('des');
        $date= $req ->input('date');
        DB::table('tbl_exspense') -> insert([
            'bank' => $bank,
            'amount' => $amount,
            'description'=>$des,
            'date'=>$date
        ]);
    }
    public function setincome (Request $req){
        $bank = $req ->input('bank');
        $amount = $req ->input('amount');
        $des = $req ->input('des');
        $date= $req ->input('date');
        DB::table('tbl_income') -> insert([
            'bank' => $bank,
            'amount' => $amount,
            'description'=>$des,
            'date'=>$date
        ]);
    }
      public function setbank (Request $req){
        $bank = $req ->input('bank');
        $accnum = $req ->input('accnum');
        $accname = $req ->input('accname');
       

        DB::table('bank') -> insert([
            'bank_name' => $bank,
            'acc_num' => $accnum,
            'acc_name' => $accname,
           
        ]);
    }

       //login
    public function CheckLogin(Request $rq){
       
        $username = $rq->input('username');
        $password = $rq->input('password');
       // echo $username." ".$password;

        //select form table
        
       $sql = DB::select("select * from tbl_users WHERE username=? AND password=?",[$username,$password]);
      
        foreach($sql as $sqls)
        {
            $user=$sqls->username;
            $pass=$sqls->password;
            // session()->put('username',$user);
            // session()->put('password',$pass);
         
           //echo $user." ".$pass;
          }

           if($username == $user && $password==$pass){ 
            echo 1;
          //  return redirect("admin.index");
           }
        //    else echo "error";     
    }


    public function Updatein(Request $rq){
        $id = $rq->input("id");
        $newbank = $rq->input("newbank");
        $newamount = $rq->input("newamount"); 
        $newdes = $rq->input('newdes');
        $newdate = $rq->input("newdate");
       
        // echo $id."". $newname." ".$newbankname." ".$newbalence." ".$newdate." ".$newdescrip;
       
        DB::table('tbl_income')
              ->where('id', [$id])
             ->update([
            
             'bank'=>$newbank,
             'amount'=>$newamount,
             'description'=>$newdes,
             'date'=>$newdate,
             
            
            ]);
            echo "update succeful";
     }
     public function Updateex(Request $rq){
        $idx = $rq->input("idx");
        $newbankx = $rq->input("newbankx");
        $newamountx = $rq->input("newamountx"); 
        $newdesx = $rq->input('newdesx');
        $newdatex = $rq->input("newdatex");
       
        // echo $id."". $newname." ".$newbankname." ".$newbalence." ".$newdate." ".$newdescrip;
       
        DB::table('tbl_exspense')
              ->where('id', [$idx])
             ->update([
             'bank'=>$newbankx,
             'amount'=>$newamountx,
             'description'=>$newdesx,
             'date'=>$newdatex,
             
            
            ]);
            echo "update succeful";
     }
     public function Deletein(Request $data){
        $id =$data->input('id');
           DB::table('tbl_income')->where('id',[$id])->delete();
    

    }
    public function Deleteex(Request $data){
        $id =$data->input('id');
           DB::table('tbl_exspense')->where('id',[$id])->delete();
    

    }
}
