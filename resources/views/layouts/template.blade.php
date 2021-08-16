

<!-- openclassV2 template -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OpenClass</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!--<script src="node_modules/chartjs/dist/Chart.js"></script>-->
    
</head>
<body>
	
	<header>
    <div class="headerCont">
      <div class="headerCont__space">
      </div>
      <div class="headerCont__search">
        <input class="search-box font-awesome" type="search" placeholder="&#x1f50d; Search">
      </div>
      <div class="headerCont__signOut">
          <span class="btn-span">Sign out</span>
      </div>
    </div>
  </header>
	<nav class="gNav">
    <div class="gNav__serviceName">
      <div class="gNav__serviceName--img">
        <img src="/images/seviceLogo.png" alt="">
      </div>
    </div>
    <div class="gNav__list">
      <div @php
            $now_route = \Route::currentRouteName();
            if($now_route == "V2class" || $now_route == "V2teacher"){
              echo'class="gNav__list__menu gNav__list__menu--active"';
            }else{
              echo'class="gNav__list__menu"';
            }
      @endphp id="gNav-management-btn">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">management</span>
        </div>
      </div>
      <!--<div class="gNav__list--add">-->
      <!--  <div class="gNav__list--add--logo">-->
      <!--    <img class="add-logo-normal" src="/images/Add-btn-logo.png" alt="">-->
      <!--    <img class="add-logo-hover" src="/images/Add-btn-w-logo.png" alt="">-->
      <!--  </div>-->
      <!--  <div class="gNav__list--add--name">-->
      <!--    <span class="btn-span">New Addition</span>-->
      <!--  </div>-->
      <!--</div>-->
       <div @php
            $now_route = \Route::currentRouteName();
            if($now_route == "V2archiveClass" || $now_route == "V2archiveTeacher"){
              echo'class="gNav__list__menu gNav__list__menu--active gNav__list__menu--sub"';
            }else{
              echo'class="gNav__list__menu gNav__list__menu--sub"';
            }
        @endphp id="gNav-archive-btn">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Archives</span>
        </div>
      </div>
      <div id="gNav-category-btn" class="@if(url()->current() == route('V2category')) 
          gNav__list__menu gNav__list__menu--active gNav__list__menu--sub @else gNav__list__menu gNav__list__menu--sub @endif">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Category</span>
        </div>
      </div>
    </div>
    <div class="gNav__list">
      <div id="gNav-accessManagement-btn" class="@if(url()->current() == route('V2category')) 
          gNav__list__menu gNav__list__menu--active @else gNav__list__menu @endif">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Access Management</span>
        </div>
      </div>
    </div>
    <div class="gNav__list">
      <div id="gNav-QuestionnaireSettings-btn" class="@if(url()->current() == route('V2category')) 
          gNav__list__menu gNav__list__menu--active @else gNav__list__menu @endif">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Questionnaire Settings</span>
        </div>
      </div>
    </div>
  </nav>
	<main class="main">
	  @yield('content')
	</main>
	
	
</body>
</html>