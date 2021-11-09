
<!--@foreach($classes as $class)-->

<!--          <span class="bold">{{$class->class_name}}</span>-->
       
<!--          <span>{{$class->class_num}}</span>-->
        
<!--            @foreach($categories as $category)-->
<!--            <div class="pulledTmp__cat__checkBox--btn--each">-->
<!--              <span>{{$category}}</span>-->
<!--            </div>-->
<!--            @endforeach-->
          
<!--          <span class="bold">{{$class->name}}</span>-->
        
<!--          <span class="bold">{{$class->email}}</span>-->
      
<!--            <img src="{{ asset($class->image) }}" alt=""width="100" height="100">-->
        
<!--@endforeach-->

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

  <header class="header">
    <div class="header__logo">
      <span>Open Class</span>
    </div>
    <div class="header__search">
      <input type="search">
    </div>
    <div class="header__opt">
      <div class="header__opt--btn">
        <div class="header__opt--btn--heart">
          <img src="/images/users/Heart-w.png" alt="">
        </div>
      </div>
      <div class="header__opt--btn">
        <div class="header__opt--btn--profile">
          <img src="/images/users/Profile-w.png" alt="">
        </div>
      </div>
    </div>
  </header>

  <main>
    <div class="Stdshow_tmp">
      <div class="rightCont">

      </div>

      <div class="showWrapper">
        <div class="showTemp">
          <div class="showTemp__top">
            <div class="showTemp__top--right">
              <div class="showTemp--profImage">
                <img src="{{ asset($class->image) }}" alt="">
              </div>
            </div>
            <div class="showTemp__top--left">
              <div class="showTemp__top--left--top">
                <div class="showClass__subj">
                  <div class="sbjProfCard__info__top--val">
                    <div class="sbjProfCard__info__top--val--pentagon">
                      <span>4.4</span>
                    </div>
                  </div>
                  <div class="showTemp__subjProf--name">
                    <span class="showTemp-ttl">{{$class->class_name}}</span>
                  </div>
                </div>
              </div>

              <div class="showTemp__top--left--center">
                <div class="showTemp__category">
                  @foreach($categories as $category)
                  <div class="showTemp__category--each">
                    <span>{{$category}}</span>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="showTemp__top--left--bottom">
                <div class="showClass__profName">
                  <span>担当教員:</span>
                  <span class="profName-data">{{$class->name}}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ListRanking">

      </div>

    </div>
  </main>


</body>
</html>


