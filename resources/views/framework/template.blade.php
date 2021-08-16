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
        <img src="../image/seviceLogo.png" alt="">
      </div>
    </div>
    <div class="gNav__list">
      <div class="gNav__list__menu">
        <div class="gNav__list__menu--logo">
          <img src="../image/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">management</span>
        </div>
      </div>
      <div class="gNav__list--add">
        <div class="gNav__list--add--logo">
          <img class="add-logo-normal" src="../image/Add-btn-logo.png" alt="">
          <img class="add-logo-hover" src="../image/Add-btn-w-logo.png" alt="">
        </div>
        <div class="gNav__list--add--name">
          <span class="btn-span">New Addition</span>
        </div>
      </div>
      <div class="gNav__list__menu gNav__list__menu--sub">
        <div class="gNav__list__menu--logo">
          <img src="../image/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Archives</span>
        </div>
      </div>
      <div class="gNav__list__menu gNav__list__menu--sub">
        <div class="gNav__list__menu--logo">
          <img src="../image/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Category</span>
        </div>
      </div>
    </div>
    <div class="gNav__list">
      <div class="gNav__list__menu">
        <div class="gNav__list__menu--logo">
          <img src="../image/list-logo.png" alt="">
        </div>
        <div class="gNav__list__menu--name">
          <span class="btn-span">Access Management</span>
        </div>
      </div>
    </div>
    <div class="gNav__list">
      <div class="gNav__list__menu">
        <div class="gNav__list__menu--logo">
          <img src="../image/list-logo.png" alt="">
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
	
	
	
	
	<script src="../js/jquery.js"></script>
</body>
</html>