<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title>Sing In And Sing Up</title>
    <link href= "{{ asset('singin&singup/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Bootstrap core CSS -->
    <link href= "{{ asset('singin&singup/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--external css-->
    <link href= "{{ asset('singin&singup/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href= "{{ asset('singin&singup/css/style.css') }}" rel="stylesheet">
    <link href= "{{ asset('singin&singup/css/style-responsive.css') }}" rel="stylesheet">
    <!--custom By Monsur-->
    <link href= "{{ asset('singin&singup/css/style_one.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
        </script>

  </head>
  <body>
    <div id="login-page">
      <div class="container">
        @yield('mainContent');
 
      </div>
    </div>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.min.js"></script>
    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    
    <script type="text/javascript">

    
    
    function myFunction() {
    var x = document.getElementById("showPass");
    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
    }
    </script>
  </body>
</html>