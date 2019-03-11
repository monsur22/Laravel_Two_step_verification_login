@extends('singin&singup.master_singin&up')
@section('mainContent')
<form class="form-login" method="POST" action="{{url('/For-Email/action')}}">
    {{ csrf_field() }}
        <h2 class="form-login-heading">Forget Password</h2>
    <div class="login-wrap">
      <input type="text" class="form-control" name="name" placeholder="Name" autofocus>
      <br>
      <input type="email" class="form-control" name="email" placeholder="Email" autofocus>
      <br>
      <button class="btn btn-theme btn-block" name="btn" type="submit"> Submit</button>
      
      
     
    </div>
  
 
  </form>
@endsection