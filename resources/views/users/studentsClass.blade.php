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
      <!-- カテゴリー部分 -->
      <div class="categoryBlock__ttl">
        <span>categories</span>
      </div>
      <div class="categoryBlock__list">
        @foreach($categories as $all_category)
        <div class="categoryBlock__list--each" data-categoryID="{{$all_category->category}}">
          <span>{{$all_category->category}}</span>
        </div>
        @endforeach
      </div>
    </div>
    <div class="mainBlock">
      <!-- SP PCのメイン部分 -->
      @foreach($categories as $all_category)
      <div class="listLine" id="{{$all_category->category}}">
        <div class="listLine__categoryTtl">
          <span>{{$all_category->category}}</span>
        </div>
        <div class="listLine__cardBlock">
          @foreach($classes as $class)
          <div class="listLine__cardBlock--each">
            <data class="js-bigCat-span" value="{{$all_category->category}}"></data>
            <div class="sbjProfCard">
              <div class="sbjProfCard__profImage">
                <img src="/images/users/profImage.png" alt=""><!--未完成-->
              </div>
              <div class="sbjProfCard__info">
                <div class="sbjProfCard__info__top">
                  <div class="sbjProfCard__info__top--val">
                    <div class="sbjProfCard__info__top--val--pentagon">
                      <span>4.4</span><!--未完成-->
                    </div>
                  </div>
                  <div class="sbjProfCard__info__top--name">
                    <span>{{$class->class_name}}</span>
                  </div>
                </div>
                <div class="sbjProfCard__info__bottom">
                  <data class="js-category-span" value="{{$class->category}}" data-categorytype="1"></data><!--授業のカテゴリができてないから表示されない-->
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </div>
    <div class="rankBlock">
      <!-- PC　ランキング部分 -->
    </div>
  </div>
</body>
</html>


  <!-- @foreach($classes as $class)-->
          <!--@if ($class->archive_class == null)-->
          
          <!--  <h1>{{$class->class_num}}</h1>-->
          <!--  <h1>{{$class->class_name}}</h1>-->
          <!--  <h1>{{$class->name}}</h1>-->
          <!--  <h1>{{$class->category}}</h1>-->
              
          <!--  <p>{{$class->class_num}}</p>-->
          <!--  <p>{{$class->class_name}}</p>-->
          <!--  <p>{{$class->email}}</p>-->
          <!--  <p>{{$class->category}}</p>-->
          <!--  <a href="{{ route('class.studentsClass_show',['id' => $class->id])}}">授業show</a>-->
          <!--@endif-->
          <!--@endforeach-->