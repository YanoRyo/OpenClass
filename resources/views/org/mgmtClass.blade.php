      <div class="mainHead">
        <div class="mainHead__switch">
          <div class="mainHead__switch__btn mainHead__switch__btn--class
          @php $now_route = \Route::currentRouteName();
            if($now_route == "org.class"){
              echo'mainHead__switch__btn--active';
            }
          @endphp">
            <span class="btn-span">Classes</span>
          </div>
          <div class="mainHead__switch__btn mainHead__switch__btn--prof
          @php $now_route = \Route::currentRouteName();
            if($now_route == "org.teacher"){
              echo'mainHead__switch__btn--active';
            }
          @endphp">
            <span class="btn-span">Professors</span>
          </div>
        </div>
        <div class="mainHead__opt">
          <div class="mainHead__opt--search">
            <form method="GET" action="{{route('org.searchClass')}}" class="form-inline my-2 my-lg-0">
            	@csrf
              <input class="search-box font-awesome" type="search" name="search" placeholder="&#x1f50d; Search">
            </form>
          </div>
          <div class="mainHead__opt--filter">
            <div class="mainHead__opt--filter--name">
              <span class="btn-span">Filter</span>
            </div>
            <div class="filter-logo">
              <img src="/images/filter.png" alt="">
            </div>
          </div>
          <div class="mainHead__opt--tmp">
            <div class="mainHead__opt--tmp--logo">
              <img src="/images/archive.png" alt="">
            </div>
            <div class="mainHead__opt--tmp--name">
              <span class="btn-span">Archive</span>
            </div>
          </div>
          <div class="mainHead__opt--tmp">
            <div class="mainHead__opt--tmp--logo">
              <img src="/images/delete.png" alt="">
            </div>
            <div class="mainHead__opt--tmp--name">
              <span class="btn-span">Delete</span>
            </div>
          </div>
          <div class="mainHead__opt--add mainHead__opt--add--newaddition">
            <div class="mainHead__opt--add--logo">
              <img src="/images/Add-w-logo.png" alt="">
            </div>
          </div>
        </div>
      </div>