<!-- openclassV2 students template -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OpenClass</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="{{ asset('css/usersMaster.css') }}" rel="stylesheet">
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--<script src="node_modules/chartjs/dist/Chart.js"></script>-->
    
</head>
<body>

  <div class="StdTemp">
    <div class="headerBlock">
      <div class="headerBlock__logo">
        <img src="../image/openclassLogo.png" alt="">
      </div>
      <div class="headerBlock__opt">
        <div class="headerBlock__opt--each">
          <img src="../image/Heart-w.png" alt="">
        </div>
        <div class="headerBlock__opt--each">
          <img src="../image/Profile-w.png" alt="">
        </div>
      </div>
    </div>
    @yield('content')
  </div>
  
  <div class="switchBlockPC">
    <div class="switchBlockPC__btn switchBlockPC__btn--left">
      <span>Classes</span>
    </div>
    <div class="switchBlockPC__btn switchBlockPC__btn--right">
      <span>Professors</span>
    </div>
  </div>
  <div class="searchBlock">
    <!-- PC　検索部分 -->
  </div>
  <div class="switchBlock">
    <!-- PC　ランキング部分 -->
  </div>


</body>
</html>


