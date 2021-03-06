<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <!--external css-->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('css/zabuto_calendar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/gritter/css/jquery.gritter.css') }}" />
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css')}}" rel="stylesheet">
  <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet">
  <script src="{{ asset('lib/chart-master/Chart.js')}}"></script>

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
    @yield('style')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <title>{{ config('app.name','Franco-Arabe')}}</title>
    @yield('formulaire')
    <style type="text/css">
#menu{
    height:100px;
    backgroud:yellow;
}
    body{
        margin-top: 60px;
    }
    invalid-feedback{
color:red;
    }

    .helper{
        color : red;
    }
    table{
        margin-right : 50px;
    }
    thead{
        background : blue;
        color : white;
        text-align: center;
    }
    #menu{
	height: 100%;
    width: 300px;
    color:white;
}
table a{
    color: white;
}
.dropdown{
    color: white;
}
#av{
    height: 60px;
}
    </style>


  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<body>
    <aside>
        <div id="sidebar" class="nav-collapse ">
          <!-- sidebar menu start-->
          <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
            <h5 class="centered">Sam Soffes</h5>
            <li class="mt">
              <a class="active" href="index.html">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
                </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-desktop"></i>
                <span>UI Elements</span>
                </a>
              <ul class="sub">
                <li><a href="general.html">General</a></li>
                <li><a href="buttons.html">Buttons</a></li>
                <li><a href="panels.html">Panels</a></li>
                <li><a href="font_awesome.html">Font Awesome</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-cogs"></i>
                <span>Components</span>
                </a>
              <ul class="sub">
                <li><a href="grids.html">Grids</a></li>
                <li><a href="calendar.html">Calendar</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="todo_list.html">Todo List</a></li>
                <li><a href="dropzone.html">Dropzone File Upload</a></li>
                <li><a href="inline_editor.html">Inline Editor</a></li>
                <li><a href="file_upload.html">Multiple File Upload</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-book"></i>
                <span>Extra Pages</span>
                </a>
              <ul class="sub">
                <li><a href="blank.html">Blank Page</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="lock_screen.html">Lock Screen</a></li>
                <li><a href="profile.html">Profile</a></li>
                <li><a href="invoice.html">Invoice</a></li>
                <li><a href="pricing_table.html">Pricing Table</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="404.html">404 Error</a></li>
                <li><a href="500.html">500 Error</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-tasks"></i>
                <span>Forms</span>
                </a>
              <ul class="sub">
                <li><a href="form_component.html">Form Components</a></li>
                <li><a href="advanced_form_components.html">Advanced Components</a></li>
                <li><a href="form_validation.html">Form Validation</a></li>
                <li><a href="contactform.html">Contact Form</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-th"></i>
                <span>Data Tables</span>
                </a>
              <ul class="sub">
                <li><a href="basic_table.html">Basic Table</a></li>
                <li><a href="responsive_table.html">Responsive Table</a></li>
                <li><a href="advanced_table.html">Advanced Table</a></li>
              </ul>
            </li>
            <li>
              <a href="inbox.html">
                <i class="fa fa-envelope"></i>
                <span>Mail </span>
                <span class="label label-theme pull-right mail-info">2</span>
                </a>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class=" fa fa-bar-chart-o"></i>
                <span>Charts</span>
                </a>
              <ul class="sub">
                <li><a href="morris.html">Morris</a></li>
                <li><a href="chartjs.html">Chartjs</a></li>
                <li><a href="flot_chart.html">Flot Charts</a></li>
                <li><a href="xchart.html">xChart</a></li>
              </ul>
            </li>
            <li class="sub-menu">
              <a href="javascript:;">
                <i class="fa fa-comments-o"></i>
                <span>Chat Room</span>
                </a>
              <ul class="sub">
                <li><a href="lobby.html">Lobby</a></li>
                <li><a href="chat_room.html"> Chat Room</a></li>
              </ul>
            </li>
            <li>
              <a href="google_maps.html">
                <i class="fa fa-map-marker"></i>
                <span>Google Maps </span>
                </a>
            </li>
          </ul>
          <!-- sidebar menu end-->
        </div>
      </aside>
      <!--sidebar end-->
      <section id="main-content">
        <section class="wrapper">
            <div col-lg-9>
             @yield('content')
            </div>
        </section>
      </section>
<script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>

  <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
  <script src="{{ asset('lib/jquery.scrollTo.min.js')}}"></script>
  <script src="{{ asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
  <script src="{{ asset('lib/jquery.sparkline.js')}}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('lib/common-scripts.js')}}"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter/js/jquery.gritter.js')}}'"></script>
  <script type="text/javascript" src="{{ asset('lib/gritter-conf.js')}}"></script>
  <!--script for this page-->
  <script src="{{ asset('lib/sparkline-chart.js')}}"></script>
  <script src="{{ asset('lib/zabuto_calendar.js')}}"></script>
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
