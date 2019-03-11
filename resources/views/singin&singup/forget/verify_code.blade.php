@extends('singin&singup.master_singin&up')
@section('mainContent')
<form class="form-login" method="POST" action="{{url('/For-Token/action')}}">
  {{ csrf_field() }}    <h2 class="form-login-heading">Forget Password Code</h2>
    <div class="login-wrap">
      <input type="number" class="form-control" name="token" placeholder="Code" autofocus>
      <br>
       <button class="btn btn-theme btn-block" name="btn" type="submit"> Submit</button>
    
      
     
    </div>
  
 
  </form>
@endsection