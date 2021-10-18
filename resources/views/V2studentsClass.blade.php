


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
          <!--  <a href="{{ route('V2studentsClass_show',['id' => $class->id])}}">授業show</a>-->
          <!--@endif-->
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
    <div class="StdList_tmp">
      <div class="categoryList">
        <div class="categoryList__ttl">
          <span>Categories</span>
        </div>
        <div class="categoryList__gradient">
  
        </div>
        <div class="categoryList__list">
          @foreach($categories as $all_category)
          <div class="categoryList__list--each">
            <span>{{$all_category->category}}</span>
          </div>
          @endforeach
          <div class="categoryList__list--each--lastSpace">

          </div>
        </div>
      </div>

      <div class="mainList">
        
        @foreach($categories as $all_category)
        <div class="mainList__each"><!-- カテゴリー別 foreach -->
          <div class="mainList__each--categoryName">
            <span>{{$all_category->category}}</span>
          </div>
          <div class="mainList__each--sbjProfCard">
            @foreach($classes as $class)
            @if ($class->archive_class == null)
            @if ($class->category == $all_category->category)
              <div class="sbjProfCard"  data-url="{{ route('V2studentsClass_show',['id' => $class->id])}}">
                <data value="{{$class->class_num}}"></data>
                <data value="{{$class->class_name}}"></data>
                <div class="sbjProfCard__profImage">
                  <img src="/images/users/profImage.png" alt="">
                </div>
                <div class="sbjProfCard__info">
                  <div class="sbjProfCard__info__top">
                    <div class="sbjProfCard__info__top--val">
                      <div class="sbjProfCard__info__top--val--pentagon">
                        <span>4.4</span>
                      </div>
                    </div>
                    <div class="sbjProfCard__info__top--name">
                      <span>{{$class->class_name}}</span>
                    </div>
                  </div>
                  <div class="sbjProfCard__info__bottom">
                    <span class="category-type-hidden" style="display:none">{{$class->category}}</span>
                  </div>
                </div>
              </div>
            @endif
            @endif
            @endforeach
          </div>
        </div><!-- カテゴリー別 foreach -->
        @endforeach
        
      </div>

      <div class="ListRanking">

      </div>

    </div>
  </main>

</body>
</html>


