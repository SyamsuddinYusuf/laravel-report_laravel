<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Bootstrap slider with Text Animation</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
<!-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css'><link rel="stylesheet" href="./style.css"> -->



  <!-- Bootstrap 3.3.7 --> 
  <!-- {{ URL::asset('assets/css/bootstrap.min.css') }} -->
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css"> -->
  <link rel="stylesheet" href="{{url('assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('assets/dist/css/skins/_all-skins.min.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{url('assets/bower_components/morris.js/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{url('assets/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <style>
    div.item {
        position: fixed;
        margin-left: 10px;
        margin-right: 10px;
        margin-top: 10px;
        margin-bottom: 100px;
    }
    div.carousel-caption{
        top: 10px;
    }
   
    </style>




</head>
<body>
<!-- partial:index.partial.html -->
<header>
  <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Brand</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="carousel" data-interval="10000">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="https://i.postimg.cc/wTBDN2JW/1.jpg" alt="...">
        <div class="carousel-caption">
          <h2 class="animated bounceInRight" style="animation-delay: 1s">We Are Reliable</h2>
          <h3 class="animated bounceInLeft" style="animation-delay: 2s">Lorem ipsum dolor sit amet.</h3>
        </div>
      </div>

      <!-- BAR CHART -->
      <div class="item">
        <br>
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <!-- <li class="active"><a href="#pl_chart" data-toggle="tab">Area</a></li> -->
              <!-- <li><a href="#sales-chart" data-toggle="tab">Donut</a></li> -->
              <li class="pull-left header"><i class="fa fa-inbox"></i> GRAFIK JUMLAH CONTAINER DALAM KAPAL</li>
            </ul>
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" margin-top="100px;" id="pl_chart" style="position: relative; height: 600px; width: 800px; text-align: center;"></div>
              <!-- <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div> -->
            </div>
        <div class="carousel-caption">
          <h2 style="color:#FFFF00;" margin-bottom="10px;" class="animated slideInDown" style="animation-delay: 1s">GRAFIK JUMLAH CONTAINER DALAM KAPAL </h2>
          <!-- <h3 class="animated slideInRight" style="animation-delay: 2s">Lorem ipsum dolor sit amet.</h3> -->
        </div>
      </div>


       <!-- BAR CHART js -->
       <div class="item">
        <br> 
        <div class="chart">
                <canvas id="barjs" style="height:500px"></canvas>
              </div>

        <div class="carousel-caption">
          <h2 class="animated zoomIn" style="animation-delay: 1s">Best Customer Support</h2>
          <h3 class="animated zoomIn" style="animation-delay: 2s">Lorem ipsum dolor sit amet.</h3>
        </div>
      </div>

       <!-- BAR CHART js sql-->
       <div class="item">
        <br> 
        <div class="chart">
                <canvas id="barjssql" style="height:500px"></canvas>
              </div>

        <div class="carousel-caption">
          <h2 style="color:#05cff2;" class="animated zoomIn" style="animation-delay: 1s">DASHBOARD JUMLAH CONTAINER DALAM KAPAL TAHUN 2019</h2>
          <!-- <h3 style="color:#05cff2;"  class="animated zoomIn" style="animation-delay: 2s">TAHUN 2019</h3> -->
        </div>
      </div>

 <!-- line CHART js sql 2-->
 <div class="item">
        <br> 
        <div class="chart">
                <canvas id="sql" style="height:250px"></canvas>
              </div>

        <div class="carousel-caption">
          <h2 style="color:#c5c7c5;" class="animated zoomIn" style="animation-delay: 1s">DASHBOARD JUMLAH CONTAINER</h2>
           </div>
      </div>


      

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

</header>




<!-- partial -->
  <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script> -->
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script> -->



<!-- jQuery 3 -->
<script src="{{url('assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{url('assets/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="{{url('assets/bower_components/raphael/raphael.min.js')}}"></script>
<script src="{{url('assets/bower_components/morris.js/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{url('assets/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{url('assets/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('assets/dist/js/demo.js')}}"></script>


<!-- ChartJS -->
<script src="{{url('assets/bower_components/chart.js/Chart.js')}}"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->

<!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script> -->


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<!-- chart pl -->
<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script> -->




<!-- CHART -->
<script>

function parseSVG(s) {
        var div= document.createElementNS('http://www.w3.org/1999/xhtml', 'div');
        div.innerHTML= '<svg xmlns="http://www.w3.org/2000/svg">'+s+'</svg>';
        var frag= document.createDocumentFragment();
        while (div.firstChild.firstChild)
            frag.appendChild(div.firstChild.firstChild);
        return frag;
    }

//BAR CHART
  Morris.Bar({
      element: 'pl_chart',
      data: {!! $pl2->toJson() !!}, 
      xkey: 'BULAN',
      ykeys: ['JumlahPL'],
      labels: ['BULAN'],
      hideHover: 'auto',
      resize: true,
      barRatio: 0.4,
      xLabelAngle: 35,
                         
  });




// bar chart js
var ctx1 = document.getElementById("barjs");
ctx1.height = 100;
var barjs = new Chart(ctx1, {
type: 'bar',
data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
    }]
},
options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero:true
            }
        }],
        xAxes: [{
            barPercentage: 0.4
        }]
    }
}
});



//bar chart js sql
var numberWithCommas = function(x) {
   return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

var url = "{{url('slider2')}}";
var BULAN = new Array();
var JumlahPL = new Array();
$(document).ready(function(){
  $.get(url, function(response){
    response.forEach(function(data){
      BULAN.push(data.BULAN);
      JumlahPL.push(data.JumlahPL);
    });
    var ctx = document.getElementById("barjssql").getContext('2d');
    ctx.canvas.width = 800;
    ctx.canvas.height = 300;
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels:BULAN,
        datasets: [{
          label: 'Info Jumlah PL',
          data: JumlahPL,
          // borderWidth: 1, 
          backgroundColor:  [
            // 'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            // 'rgba(255, 206, 86, 1)',
            // 'rgba(75, 192, 192, 1)',
            // 'rgba(153, 102, 255, 1)',
            // 'rgba(255, 159, 64, 1)'
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)'
          ],
          borderColor: [
            // 'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
            // 'rgba(255, 206, 86, 1)',
            // 'rgba(75, 192, 192, 1)',
            // 'rgba(153, 102, 255, 1)',
            // 'rgba(255, 159, 64, 1)'
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(54, 162, 235, 1)'
                              
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 70,
            bottom: 10
          }
        },

        scales: {
         xAxes: [{
            stacked: true,
            gridLines: {
               display: false
            },
         }],
         yAxes: [{
            stacked: true,
            ticks: {
              beginAtZero:true,
               callback: function(value) {
                  return numberWithCommas(value);
               },
            },
         }],
      }, // scales

      legend: {
         display: true
      },
      plugins: {
         datalabels: {
          color: 'white',
						display: function(context) {
							return context.dataset.data[context.dataIndex] > 15;
						},
						font: {
							weight: 'bold'
						},
						formatter: Math.round
         }
      }
      },
      
    });
  });
});


 //Create the line chart
var url2 = "{{url('slider3')}}";
var BULAN2 = new Array();
var JumlahPL2 = new Array();
$(document).ready(function(){
  $.get(url2, function(response){
    response.forEach(function(data){
      BULAN2.push(data.BULAN_KEBERANGKATAN_KAPAL);
      JumlahPL2.push(data.JUMLAH_CONTAINER);
    });
    var ctx2 = document.getElementById("sql").getContext('2d');
    ctx2.canvas.width = 800;
    ctx2.canvas.height = 300;
    var myLineChart = new Chart(ctx2, {
        type: 'line',
        data: {
          labels:BULAN,
          datasets: [{
            label: 'Jumlah Container Per Bulan',
            data: JumlahPL2
          }]
      },
      options: {
        responsive: true,
        layout: {
          padding: {
            left: 10,
            right: 10,
            top: 70,
            bottom: 10
          }
        },
      }
    });
  });
});
</script>




</body>
</html>