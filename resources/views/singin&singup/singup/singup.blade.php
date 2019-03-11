@extends('singin&singup.master_singin&up')
@section('mainContent')
<form class="form-login" method="POST" action="{{url('/singup/action')}}">
  {{ csrf_field() }}

    <h2 class="form-login-heading">sign up now</h2>
    <div class="login-wrap">
      <input type="text" class="form-control" name="firstname" placeholder="First Name" autofocus>
    
      <br>
      <input type="text" class="form-control" name="lastname" placeholder="Last Name" autofocus>
      <br>
    <input type="email" class="form-control" name="email" placeholder="Email" value="{{Session('e')}}" readonly   autofocus>
    
      <br>
      <input type="number" class="form-control" name="pnumber" placeholder="Phone Number" autofocus>
    
      <br>
      
           <input type="password" class="form-control" name="password" placeholder="Password" id="showPass" >
           <span toggle="#password-field" class="fa fa-lg fa-eye field-icon toggle-password"  onclick="myFunction()"></span>
          
      
          
        
      <br>
      <button class="btn btn-theme btn-block" name="btn" type="submit"><i class="fa fa-lock"></i> SIGN UP</button>
      
      
      
    </div>
  
 
  </form>
@endsection