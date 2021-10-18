


          <!--<span class="bold">{{$show_teacher->name}}</span>-->
       
          <!--  <img src="{{ asset($show_teacher->image) }}" width="300" height="300" style ="border-radius:50%" alt="">-->
          
          <!--<span>{{$show_teacher->email}}</span>-->
      
          <!--  @foreach($teacheies_category as $teacher_category)-->
          <!--  <div class="pulledTmp__cat__checkBox--btn--each">-->
          <!--    <span>{{$teacher_category}}</span>-->
          <!--  </div>-->
          <!--  @endforeach-->
          
          <!--   @foreach($teacher_classes as $teacher_class)-->
          <!--  <li>-->
          <!--    <div class="pulledTmp__subj__lists--list--each">-->
          <!--      @if ($teacher_class->class_name == null)-->
          <!--        <span>未登録</span>-->
          <!--      @else-->
          <!--        <span>{{$teacher_class->class_name}}</span>-->
          <!--      @endif-->
          <!--    </div>-->
          <!--  </li>-->
          <!--  @endforeach-->



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
                <img src="{{ asset($show_teacher->image) }}" alt="">
              </div>
            </div>
            <div class="showTemp__top--left">
              <div class="showTemp__top--left--top">
                <div class="showTemp__subjProf--name">
                  <span class="showTemp-ttl">{{$show_teacher->name}}</span>
                </div>
              </div>

              <div class="showTemp__top--left--center">
                <div class="showTemp__category">
                  @foreach($teacheies_category as $teacher_category)
                  <div class="showTemp__category--each">
                    <span>{{$teacher_category}}</span>
                  </div>
                  @endforeach
                </div>
              </div>

              <div class="showTemp__top--left--bottom">

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="ListRanking">

      </div>

    </div>
  </main>

  <script src="../js/jquery.js"></script>
</body>
</html>


