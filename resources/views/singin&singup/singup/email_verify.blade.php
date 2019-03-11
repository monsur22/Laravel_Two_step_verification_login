@extends('singin&singup.master_singin&up')
@section('mainContent')

    @if(Session::get('taken'))


    <script>

      $(document).ready(function(){
     
      $.alert({
                title: 'Alert!',
                content: 'This Email is Taken',
            });


        });  
    </script>

@endif


<form class="form-login" method="POST" action="{{url('/singemail/action')}}">
  {{ csrf_field() }}
    <h2 class="form-login-heading">Enter A Valid Email</h2>
    <div class="login-wrap">
      <input type="text" class="form-control" placeholder="Name" name="name" autofocus>
      <br>
      <input type="email" class="form-control" placeholder="Email" name="email" autofocus>
      <br>
      <button name="btn" class="btn btn-theme btn-block"  type="submit"> Submit</button>
      
      
      
    </div>

    
    
  </form>

@endsection