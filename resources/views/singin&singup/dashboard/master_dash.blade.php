<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="{{asset('singin&singup/img/favicon.png')}}" rel="icon">
  <link href="{{asset('singin&singup/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('singin&singup/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{asset('singin&singup/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('singin&singup/css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('singin&singup/lib/gritter/css/jquery.gritter.css')}}" />
  <!-- Custom styles for this template -->
  <link href="{{asset('singin&singup/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('singin&singup/css/style-responsive.css')}}" rel="stylesheet">
  <script src="{{asset('singin&singup/lib/chart-master/Chart.js')}}"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
    

  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    @include('singin&singup.dashboard.includes.header')
   
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
      @include('singin&singup.dashboard.includes.slideber')
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
       <!--main content end-->
       @yield('mainContent')

      </section>
    <!--footer start-->
    @include('singin&singup.dashboard.includes.footer')
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="{{asset('singin&singup/lib/jquery/jquery.min.js')}}"></script>

  <script src="{{asset('singin&singup/lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{asset('singin&singup/lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{asset('singin&singup/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{asset('singin&singup/lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{asset('singin&singup/lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{asset('singin&singup/lib/gritter/js/jquery.gritter.js')}}"></script>
  <script type="text/javascript" src="{{asset('singin&singup/lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{asset('singin&singup/lib/sparkline-chart.js')}}"></script>
  <script src="{{asset('singin&singup/lib/zabuto_calendar.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
