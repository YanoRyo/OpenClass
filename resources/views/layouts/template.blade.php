<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OpenClass</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="icon" type="/images/headerLogo__image.png" href="/images/headerLogo__image.png">

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="node_modules/chartjs/dist/Chart.js"></script>
    
</head>
<body>

   <header>
    <div class="header_top">
      <div class="headerLogo">
        <div class="headerLogo__image">
          <img src="/images/headerLogo__image.png" alt="openclassのロゴ">
        </div>
        <div class="headerLogo__serviceName">
          <span>OpenClass</span>
        </div>
      </div>
      <div class="headerContent">
        <div class="headerContent__search">
          <input type="search" placeholder="search box">
        </div>
        <div class="headerContent__signOut">
          <button type="button">
            SignOut
          </button>
        </div>
      </div>
    </div>
    <div class="header_under">
      <div class="subHeader">
        <div class="subHeader__orgName">
          <span class="orgName">デジタルハリウッド大学</span>
        </div>
        <div class="subHeader__content">
          <!--パンくずリスト配置-->
          <p>breadcrumbs > breadcrumbs > breadcrumbs </p>
          @include('optionBtn')
        </div>
      </div>
    </div>
  </header>





    <nav class="gNav">
      <div class="gNavSticky">
      <div class="gNav__menuTop">
        <span class="ttl">システム管理</span>
      </div>

      <div
        @php
           $now_route = \Route::currentRouteName();
                if($now_route == "list_classes" || $now_route == "class" || $now_route == "show_class" || $now_route == "class_update"){
                  echo'class="gNav__list changed-bg"';
                }else{
                  echo'class="gNav__list"';
                }
        @endphp>
        <div  data-href="{{ route('list_classes')}}"
          @php
            $now_route = \Route::currentRouteName();
            if($now_route == "list_classes" || $now_route == "show_class" || $now_route == "class_update"){
              echo'class="gNav__list__menu--browsing gNav__list__menu"';
            }else{
              echo'class="gNav__list__menu"';
            }
          @endphp>
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>授業管理</span>
          </div>
        </div>
        <div data-href="{{ route('class')}}" 
         @php
            $now_route = \Route::currentRouteName();
            if($now_route == "class"){
              echo'class="gNav__list__menu--browsing gNav__list__menu gNav__list__menu--sub"';
            }else{
              echo'class="gNav__list__menu gNav__list__menu--sub"';
            }
          @endphp>
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>授業新規追加</span>
          </div>
        </div>
        <div class="gNav__list__menu gNav__list__menu--sub">
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>アーカイブ一覧</span>
          </div>
        </div>
      </div>
      <div
        @php
            $now_route = \Route::currentRouteName();
            if($now_route == "list_teachers" || $now_route == "teacher" || $now_route == "show_teacher" || $now_route == "teacher_update"){
              echo'class="gNav__list changed-bg"';
            }else{
              echo'class="gNav__list"';
            }
        @endphp>
        <div  data-href="{{ route('list_teachers')}}"
          @php
            $now_route = \Route::currentRouteName();
            if($now_route == "list_teachers" || $now_route == "show_teacher" || $now_route == "teacher_update"){
              echo'class="gNav__list__menu--browsing gNav__list__menu"';
            }else{
              echo'class="gNav__list__menu"';
            }
          @endphp>
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>教員管理</span>
          </div>
        </div>
        <div data-href="{{ route('teacher')}}" 
         @php
            $now_route = \Route::currentRouteName();
            if($now_route == "teacher"){
              echo'class="gNav__list__menu--browsing gNav__list__menu gNav__list__menu--sub"';
            }else{
              echo'class="gNav__list__menu gNav__list__menu--sub"';
            }
          @endphp>
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>教員新規追加</span>
          </div>
        </div>
        <div class="gNav__list__menu gNav__list__menu--sub">
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>アーカイブ一覧</span>
          </div>
        </div>
      </div>
      <div
        @php
            $now_route = \Route::currentRouteName();
            if($now_route == "category"){
              echo'class="gNav__list changed-bg"';
            }else{
              echo'class="gNav__list"';
            }
        @endphp>
        <div  data-href="{{ route('category')}}"
          @php
            $now_route = \Route::currentRouteName();
            if($now_route == "category"){
              echo'class="gNav__list__menu--browsing gNav__list__menu"';
            }else{
              echo'class="gNav__list__menu"';
            }
          @endphp>
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>カテゴリ管理</span>
          </div>
        </div>
      </div>
      <div class="gNav__list">
        <div class="gNav__list__menu">
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>アクセス管理</span>
          </div>
        </div>
      </div>
      <div class="gNav__list">
        <div class="gNav__list__menu">
          <div class="gNav__list__menu--logo">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="gNav__list__menu--name">
            <span>アンケート管理</span>
          </div>
        </div>
      </div>
        
        
        
        
      
    

    </div>
  </nav><!--gNav-->


    <main>
      @yield('content')
    </main>



</body>
</html>
