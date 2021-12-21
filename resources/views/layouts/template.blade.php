

<!-- openclass template -->

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OpenClass</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="{{ asset('css/orgMaster.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/org-test.js') }}"></script>
<script src="{{ asset('js/org.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<script src="node_modules/chartjs/dist/Chart.js"></script>
    
</head>
<body>
	<header>
    <div class="headerCont">
      <div class="headerCont__space">
      </div>
      <div class="headerCont__search">
        <form method="GET" action="{{route('org.searchAll')}}" class="form-inline my-2 my-lg-0">
          @csrf
          <input class="search-box font-awesome" name="search" type="search" placeholder="&#x1f50d; Search">
        </form>
      </div>
      <!--<div class="headerCont__signOut">-->
      <!--    <span class="btn-span">Sign out</span>-->
      <!--</div>-->
      @guest
          @if (Route::has('login'))
              <div class="top-right links">
                  @auth

                  @else
                      <a href="{{ route('login') }}">Login</a>

                      @if (Route::has('register'))
                          <a href="{{ route('register') }}">Register</a>
                      @endif
                  @endauth
              </div>
          @endif
      @else
          
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
          </div>
         
      @endguest
        
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
            if($now_route == "org.class" || $now_route == "org.teacher" || $now_route == "org.updateTeacher" || $now_route == "org.updateClass"){
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
            if($now_route == "org.archiveClass" || $now_route == "org.archiveTeacher"){
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
      <div @php
            $now_route = \Route::currentRouteName();
            if($now_route == "org.category"){
              echo'class="gNav__list__menu gNav__list__menu--active gNav__list__menu--sub"';
            }else{
              echo'class="gNav__list__menu gNav__list__menu--sub"';
            }
        @endphp id="gNav-category-btn">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Category</span>
        </div>
      </div>
    </div>
    <div class="gNav__list">
      <div @php
            $now_route = \Route::currentRouteName();
            if($now_route == "org.category"){
              echo'class="gNav__list__menu gNav__list__menu--active"';
            }else{
              echo'class="gNav__list__menu"';
            }
        @endphp id="gNav-accessManagement-btn">
        <div class="gNav__list__menu--logo">
          <img src="/images/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Access Management</span>
        </div>
      </div>
    </div>
    <div class="gNav__list">
      <div @php
            $now_route = \Route::currentRouteName();
            if($now_route == "org.category"){
              echo'class="gNav__list__menu gNav__list__menu--active"';
            }else{
              echo'class="gNav__list__menu"';
            }
        @endphp id="gNav-QuestionnaireSettings-btn">
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