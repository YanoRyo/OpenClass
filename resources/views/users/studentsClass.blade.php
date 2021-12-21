<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OpenClass</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="{{ asset('css/usersMaster.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<!--<script src="node_modules/chartjs/dist/Chart.js"></script>-->


</head>
<body>
  <!--<div id="loadingBg"></div>-->
  <!--<div id="loading">-->
  <!--    <div id="percent"><span id="percent-text">0</span>％</div>-->
  <!--    <div id="gauge"></div>-->
  <!--</div>-->
  
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
          <span class="categoryBlock__list--each--span">{{$all_category->category}}</span>
        </div>
        @endforeach
        <div class="categoryBlock__list--each" data-categoryid="other">
          <span class="categoryBlock__list--each--span">未登録カテゴリー</span>
        </div>
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
            <div class="sbjProfCard sbjProfCard-class-js" data-classid="{{$class->id}}">
              <div class="sbjProfCard__profImage">
                @if($class->image == null)
                <img src="{{ asset('images/null_image.png') }}" alt="">
                @else
                <img src="{{ asset($class->image) }}" alt="">
                @endif
              </div>
              <div class="sbjProfCard__info">
                <div class="sbjProfCard__info__top">
                  <div class="sbjProfCard__info__top--val">
                    <div class="sbjProfCard__info__top--val--pentagon">
                      @foreach($datas as $data)
                      @if($data->class_id == $class->id)
                      <div class="data-average-each" hidden>
                        <span class="data-average-each-1">{{$data->que_1}}</span>
                        <span class="data-average-each-2">{{$data->que_2}}</span>
                        <span class="data-average-each-3">{{$data->que_3}}</span>
                        <span class="data-average-each-4">{{$data->que_4}}</span>
                        <span class="data-average-each-5">{{$data->que_5}}</span>
                      </div>
                      @endif
                      @endforeach
                      <span class="evaluation-js evaluation-js-users">ー</span><!--未完成-->
                    </div>
                  </div>
                  <div class="sbjProfCard__info__top--name">
                    <span>{{$class->class_name}}</span>
                  </div>
                </div>
                <div class="sbjProfCard__info__bottom">
                  <data class="js-category-span" value="{{$class->category}}" data-categorytype="0"></data>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
      <div class="listLine" id="other">
        <div class="listLine__categoryTtl">
          <span>未登録カテゴリー</span>
        </div>
        <div class="listLine__cardBlock">
          @foreach($classes as $class)
          <div class="listLine__cardBlock--each">
            <data class="js-bigCat-span" value="その他"></data>
            <div class="sbjProfCard sbjProfCard-class-js" data-classid="{{$class->id}}">
              <div class="sbjProfCard__profImage">
                @if($class->image == null)
                <img src="{{ asset('images/null_image.png') }}" alt="">
                @else
                <img src="{{ asset($class->image) }}" alt="">
                @endif
              </div>
              <div class="sbjProfCard__info">
                <div class="sbjProfCard__info__top">
                  <div class="sbjProfCard__info__top--val">
                    <div class="sbjProfCard__info__top--val--pentagon">
                      @foreach($datas as $data)
                      @if($data->class_id == $class->id)
                      <div class="data-average-each" hidden>
                        <span class="data-average-each-1">{{$data->que_1}}</span>
                        <span class="data-average-each-2">{{$data->que_2}}</span>
                        <span class="data-average-each-3">{{$data->que_3}}</span>
                        <span class="data-average-each-4">{{$data->que_4}}</span>
                        <span class="data-average-each-5">{{$data->que_5}}</span>
                      </div>
                      @endif
                      @endforeach
                      <span class="evaluation-js evaluation-js-users">ー</span><!--未完成-->
                    </div>
                  </div>
                  <div class="sbjProfCard__info__top--name">
                    <span>{{$class->class_name}}</span>
                  </div>
                </div>
                <div class="sbjProfCard__info__bottom">
                  <data class="js-category-span" value="{{$class->category}}" data-categorytype="0"></data>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    
    <div class="rankBlock">
      <!-- PC　ランキング部分 -->
    </div>
    
    @include('users.students_switch')
    <div class="searchBlock">
          <img src="/images/users/openclassLogo.png" alt="">
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
          <!--  <p>{{$class->id}}</p>-->
          <!--  <a href="{{ route('users.studentsClass_show',['id' => $class->id])}}">授業show</a>-->
          <!--@endif-->
          <!--@endforeach-->