      <div class="mainHead">
        <div class="mainHead__switch">
          <div class="@if(url()->current() == route('V2archiveClass')) 
          mainHead__switch__btn mainHead__switch__btn--class mainHead__switch__btn--class--archive mainHead__switch__btn--active @else mainHead__switch__btn mainHead__switch__btn--class mainHead__switch__btn--class--archive @endif">
            <span class="btn-span">Classes</span>
          </div>
          <div class="@if(url()->current() == route('V2archiveTeacher')) 
          mainHead__switch__btn mainHead__switch__btn--prof mainHead__switch__btn--prof--archive mainHead__switch__btn--active @else mainHead__switch__btn mainHead__switch__btn--prof mainHead__switch__btn--prof--archive @endif">
            <span class="btn-span">Professors</span>
          </div>
        </div>
        <div class="mainHead__opt">
          <div class="mainHead__opt--search">
            <form action="">
              <input class="search-box font-awesome" type="search" placeholder="&#x1f50d; Search">
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
              <img src="/images/public.png" alt="">
            </div>
            <div class="mainHead__opt--tmp--name">
              <span class="btn-span">Public</span>
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
        </div>
      </div>