


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
          @foreach($teacheies as $teacher)
          <div class="listLine__cardBlock--each">
            <data class="js-bigCat-span" value="{{$all_category->category}}"></data>
            <div class="sbjProfCard">
              <div class="sbjProfCard__profImage">
                <img src="{{ asset($teacher->image) }}" alt="">
              </div>
              <div class="sbjProfCard__info">
                <div class="sbjProfCard__info__top">
                  <div class="sbjProfCard__info__top--name">
                    <span>{{$teacher->name}}</span>
                  </div>
                </div>
                <div class="sbjProfCard__info__bottom">
                  <data class="js-category-span" value="{{$teacher->teacher_category}}" data-categorytype="0"></data>
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


          <!--@foreach($teacheies as $teacher)-->
          <!--  @if ($teacher->archive_teacher == null)-->
          
          <!--          @if ($teacher->name == null)-->
          <!--            未登録-->
          <!--            @else-->
          <!--              <h5>{{$teacher->name}}</h5>-->
          <!--          @endif-->
                  
          <!--          @if ($teacher->email == null)-->
          <!--            未登録-->
          <!--            @else-->
          <!--              <h5>{{$teacher->email}}</h5>-->
          <!--          @endif-->
                  
          <!--          @if ($teacher->teacher_category == null)-->
      	   <!--           未登録-->
      	   <!--           @else-->
          <!--              <h5>{{$teacher->teacher_category}}</h5>-->
          <!--          @endif-->
          <!--          @if ($teacher->image == null)-->
      	   <!--           未登録-->
      	   <!--           @else-->
          <!--              <img src="{{ asset($teacher->image) }}" alt=""width="100" height="100">-->
          <!--          @endif-->
          <!--          <a href="{{ route('V2studentsTeacher_show',['id' => $teacher->id])}}">先生show</a>-->
                  
         
          <!--@endif-->
          <!--@endforeach-->
          
          

         
          