  <div class="filterMW">
    <div class="filterMW__head">

    </div>
    <div class="filterMW__main">
      <div class="filterMW__main--category">
        @foreach($categories as $category)
        <div class="category-btn-selectbox">
          <input type="checkbox" id="Filter{{$category->id}}" name="filterMW-category" value="{{$category->category}}">
          <label for="{{$category->id}}">{{$category->category}}</label>
        </div>
        
        @endforeach
      </div>
      <div class="filterMW__main--reset">
        <div class="filterMW__main--reset--btn">
          <span class="btn-span">All clear</span>
        </div>
      </div>
    </div>
  </div>