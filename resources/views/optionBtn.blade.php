
    <section class="optBtn">

      @if(\Route::currentRouteName() == "show_class")
        <?php
          $last_url = url()->current();
          $id = substr($last_url, strrpos($last_url, '/') + 1);
        ?>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              <a href="{{route('class_update',['id' => $id ])}}"><span>更新</span></a>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-delete">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- 削除ボタン --}}
              <form method="POST" action="/class/destroy/{{$id}}"  class="float-right">
                  @csrf
                  <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- アーカイブボタン --}}
              <form method="POST" action="/class/archive/{{$id}}"  class="float-right">
                  @csrf
                  <input type="submit" value="アーカイブ" class="btn btn-danger btn-sm" onclick='return confirm("アーカイブにしますか？");'>
              </form>
            </div>
          </div>
        
      @endif
      @if(\Route::currentRouteName() == "show_teacher")
        <?php
          $last_url = url()->current();
          $id = substr($last_url, strrpos($last_url, '/') + 1);
        ?>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              <a href="{{route('teacher_update',['id' => $id ])}}"><span>更新</span></a>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-delete">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- 削除ボタン --}}
              <form method="POST" action="/teacher/destroy/{{$id}}"  class="float-right">
                  @csrf
                  
                  <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- アーカイブボタン --}}
              <form method="POST" action="/teacher/archive/{{$id}}"  class="float-right">
                  @csrf
                  <input type="submit" value="アーカイブ" class="btn btn-danger btn-sm" onclick='return confirm("アーカイブにしますか？");'>
              </form>
            </div>
          </div>
        
      @endif
      @if(\Route::currentRouteName() == "show_class_archive")
        <?php
          $last_url = url()->current();
          $id = substr($last_url, strrpos($last_url, '/') + 1);
        ?>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              <a href="{{route('class_update',['id' => $id ])}}"><span>更新</span></a>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-delete">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- 削除ボタン --}}
              <form method="POST" action="/class/destroy/{{$id}}"  class="float-right">
                  @csrf
                  <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- アーカイブ解除ボタン --}}
              <form method="POST" action="/class/archive/cancel/{{$id}}"  class="float-right">
                  @csrf
                  <input type="submit" value="アーカイブ解除" class="btn btn-danger btn-sm" onclick='return confirm("アーカイブを解除しますか？");'>
              </form>
            </div>
          </div>
        
      @endif
      @if(\Route::currentRouteName() == "show_teacher_archive")
        <?php
          $last_url = url()->current();
          $id = substr($last_url, strrpos($last_url, '/') + 1);
        ?>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              <a href="{{route('teacher_update',['id' => $id ])}}"><span>更新</span></a>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-delete">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- 削除ボタン --}}
              <form method="POST" action="/teacher/destroy/{{$id}}"  class="float-right">
                  @csrf
                  
                  <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>
              </form>
            </div>
          </div>
          <div class="optBtn__btn" id="btn-upDate">
            <div class="optBtn__btn--logo">
              <img src="/images/action-btn.png" alt="">
            </div>
            <div class="optBtn__btn--name">
              {{-- アーカイブ解除ボタン --}}
              <form method="POST" action="/teacher/archive/cancel/{{$id}}"  class="float-right">
                  @csrf
                  <input type="submit" value="アーカイブ解除" class="btn btn-danger btn-sm" onclick='return confirm("アーカイブを解除しますか？");'>
              </form>
            </div>
          </div>
        
      @endif
    </section>

          