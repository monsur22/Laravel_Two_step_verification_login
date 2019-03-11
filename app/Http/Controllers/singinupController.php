<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\verify_token;
use App\Singup;
use Mail;
use Hash;
use Validator;
use Redirect;
use Session;
use DB;
use Socialite;


class singinupController extends Controller
{
    
    public function singupEmailView(){
        return view('singin&singup.singup.email_verify');
    
        }
    public function singupEmail(Request $request){
        
        $this->Validate($request, [
            'email' => 'required',      
            'name' => 'required',      
       ]);
 
 
         if($checkemail=Singup::where('email',$request->email)->first()){
         return redirect('/singemail')->with('taken',' Email  taken ');
         //return "email_taken";
             
 
 
         }
         else{
           if( $id=verify_token::where('email',$request->email)->first()){
            $id->delete();
           }
             
        $random= new verify_token(); 
         $random->name = $request->name;
         $random->email = $request->email;
         $token=rand();
         $random->token = $token;
         $random->save();
 
         Session::put('code',$token);    
         Session::put('n',$request->name);    
         Session::put('e',$request->email);    
 
 
         $maildata=$request->toArray();
          Mail::send('singin&singup.email.email_verify',$maildata,function($massage) use ($maildata)
          {
          $massage->to($maildata['email']); 
          $massage->subject('Test Email'); 
 
          });
         return redirect('/singToken')->with('check',' Check Email ');
        
 
 
 
         }
       
    
        }
    public function singVerifyCodeView(){
        return view('singin&singup.singup.email_verify_code');
        
        }
    public function singVerifyCode(Request $request){
        if($request->token==Session('code')){

            return redirect('/singup');
        }
        else{
            return "erorr";
        }
       
            
        }
    public function singuppageView(){
        return view('singin&singup.singup.singup');
                
        }
    public function singuppage(Request $request){
        $this->Validate($request, [
            'firstname' => 'required',      
            'lastname' => 'required',      
            'pnumber' => 'required',      
            'password' => 'required ',      
            'email' => 'required |email|unique:singup_adds|max:255 ',  
 
           
    
       ]);
 
 
         $user_singup=new Singup();
         $user_singup->firstname=$request->firstname;
         $user_singup->lastname=$request->lastname;
         $user_singup->pnumber=$request->pnumber;
         $user_singup->email=$request->email;
         $user_singup->password=bcrypt($request->password);
         
         $user_singup->save();
         
 
         $delete_token=verify_token::where('email',$request->email)->first();
         $delete_token->delete();
         $request->session()->forget(['code', 'e']);
 
             
 
        // return redirect('/dashboard')->with('message',' Successfull ');
         return "success";
                    
        }
    public function forgetEmailView(){
        return view('singin&singup.forget.enter_email');
                
        }
    public function forgetEmail(Request $request){
        $this->Validate($request, [
            'email' => 'required', 
            'name' => 'required',    
       ]);
       if( $id=verify_token::where('email',$request->email)->first()){
        $id->delete();
       }
 
        
         
               $random= new verify_token();
         
         $random->name = $request->name;        
      
         $random->email = $request->email;
         $token=rand();
         $random->token = $token;
         $random->save();
 
         Session::put('code',$token);    
         Session::put('n',$request->name);    
          
         Session::put('e',$request->email);    
 
 
         $maildata=$request->toArray();
          Mail::send('singin&singup.forget.forget_email',$maildata,function($massage) use ($maildata)
          {
          $massage->to($maildata['email']); 
          $massage->subject('Test Email'); 
 
          });
         return redirect('/For-Token')->with('check',' Check Email ');
        
 
 
 

                    
        }
    public function forgetVerifyCodeView(){
        return view('singin&singup.forget.verify_code');
                    
        }
    public function forgetVerifyCode(Request $request){
        if($request->token==Session('code')){

            return redirect('/Update-Pass');
        }
        else{
            return "erorr";
        }
       
  
                        
        }
    public function forUpdatePassView(){
        return view('singin&singup.forget.update_pass');
        
                        
        }
    public function forUpdatePass(Request $request){
        $this->Validate($request, [
            'email' => 'required', 
              
       ]);
   
        $update_pass=Singup::where('email',Session('e'))->first();
         
        $update_pass->password=bcrypt($request->password);
        $update_pass->save();
        session()->forget('e');
        
        //return redirect('/doctorLogin')->with('signup','Password Successfully Changed');
        return "sucess";
                            
        }
    public function dash(){
        if(session('firstname')){
            return view('singin&singup.dashboard.master_dash');

        }
        else{
        return redirect('/login');


        }
    }
    public function loginpage(){
        return view('singin&singup.singin.login');
    
        }
        public function loginaction(Request $request){
            if($login_data=Singup::where('email',$request->email)->first()){
                if($login_data->email == $request->email && Hash::check($request->password,$login_data->password)){
                    Session::put('email',$login_data->email);
                    Session::put('firstname',$login_data->firstname);
                    Session::put('lastname',$login_data->lastname);
                    //return "welcom Dashboard";
        return redirect('/dashboard')->with('signup','Password Successfully Changed');

                    
                }
                else{
                   // return "Login Error";
        return redirect('/login');

                    
                   
                }
    
            }
            else{
            return redirect('/login')->with('message',' Erorr ');
    
            }
        
            }
            public function logout(){
                

                session()->forget('email');
               session()->forget('firstname');
                session()->forget('lastname');
              
                return redirect('/login');

            }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
    * @return \Illuminate\Http\Response
        */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
         $user->getName();
         $user->getEmail();
        

         $user_singup=new Singup();
         $user_singup->firstname=$user->getName();
         
         $user_singup->email=$user->getEmail();
         $user_singup->save();



      //   return $user->name;
      return  "success";
        
    }

}
