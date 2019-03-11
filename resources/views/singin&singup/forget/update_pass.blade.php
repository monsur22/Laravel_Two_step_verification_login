@extends('singin&singup.master_singin&up')
@section('mainContent')
<form class="form-login" method="POST" action="{{url('/Update-Pass/action')}}">
  {{csrf_field()}}
    <h2 class="form-login-heading">Forget Password</h2>
    <div class="login-wrap">
      
      <input type="email" class="form-control" name="email" placeholder="Email" value="{{Session('e')}}" readonly autofocus>
    
      <br>
      
      
           <input type="password" class="form-control" name="password" placeholder="New Password" id="showPass" >
           <span toggle="#password-field" class="fa fa-lg fa-eye field-icon toggle-password"  onclick="myFunction()"></span>
           <br>
      
           
        
      <br>
      <button class="btn btn-theme btn-block" name="btn" type="submit"> Update </button>
      
      
      
    </div>
  
 
  </form>
@endsection