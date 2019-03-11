@extends('singin&singup.master_singin&up')
@section('mainContent')

<form class="form-login" method="POST" action="{{url('/singToken/action')}}">
  {{ csrf_field() }}

    <h2 class="form-login-heading">Enter Varification Code</h2>
    <div class="login-wrap">
        <h3 class="text-center text-success">{{ Session::get('check') }}</h3>
      <input type="number" name="token" class="form-control" placeholder="Code" autofocus>
      <br>
       <button class="btn btn-theme btn-block" name="btn" type="submit"> Submit</button>
    
      
     
    </div>
  
 
  </form>
@endsection