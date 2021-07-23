
    <section class="optBtn">

      @if(\Route::currentRouteName() == "show_class")
        <?php
          $uri = url()->current();
          $last_url = substr($uri, strrpos($uri, '/') + 1);
        ?>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              <a href="{{route('class_update',['id' => $last_url ])}}"><span>更新</span></a>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-delete">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- 削除ボタン --}}
              <form method="POST" action="/destroy/{{$last_url}}"  class="float-right">
                  @csrf
                  
                  <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </div>
          </div>
        
      @endif
    </section>

          