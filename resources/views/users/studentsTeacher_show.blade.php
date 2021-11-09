
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
  
  <div id="loadingBg"></div>
  <div id="loading">
      <div id="percent"><span id="percent-text">0</span>％</div>
      <div id="gauge"></div>
  </div>
  
  <div class="StdTemp">
    <div class="headerBlock">
      <div class="headerBlock__logo">
        <img src="/images/users/openclassLogo.png" alt="">
      </div>
      <div class="headerBlock__opt">
        <div class="headerBlock__opt--each">
          <img src="/images/users/Heart-w.png" alt="">
        </div>
        <div class="headerBlock__opt--each">
          <img src="/images/users/Profile-w.png" alt="">
        </div>
      </div>
    </div>
    <div class="categoryBlock">

    </div>
    <div class="mainBlock">
      <div id="ClassProf-detail">
        <div class="detail__infoPC">
          <div class="detail__infoPC--image">
            <img src="{{ asset($show_teacher->image) }}" alt="">
          </div>
          <div class="detail__infoPC--data">
            <div class="detail__infoPC--data--ttl">
              <div class="detail__infoPC--data--ttl--name">
                <span>{{$show_teacher->name}}</span>
              </div>
            </div>
            <div class="detail__infoPC--data--category">
            @foreach($teacheies_category as $teacher_category)
              <span>{{$teacher_category}}</span>
            @endforeach
            </div>
          </div>
        </div>
        <div class="detail__infoSP">
          <div class="detail__infoSP--img">
            <img src="{{ asset($show_teacher->image) }}" alt="">
          </div>
          <div class="detail__infoSP--ttl">
            <div class="detail__infoSP--ttl--name">
              <span>{{$show_teacher->name}}</span>
            </div>
          </div>
          <div class="detail__infoSP--category">
            @foreach($teacheies_category as $teacher_category)
              <span>{{$teacher_category}}</span>
            @endforeach
          </div>
        </div>
        <div class="detail__about">
          <div class="detail__about--ttl">
            <span>教員の一言</span>
          </div>
          <div class="detail__about--message">
            <span>こんにちは私の名前は三崎遥樹です。これからの授業全力で楽しみましょう！</span>
          </div>
        </div>
      </div>
    </div>
    <div class="rankBlock">
      <!-- PC　ランキング部分 -->
    </div>
  </div>

  <script src="../js/jquery.js"></script>
</body>
</html>

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
