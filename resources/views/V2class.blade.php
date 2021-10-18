@extends('layouts.template')

@section('content')
<div class="managementWrapper">

      @include('V2mgmtClass')
      
      <div class="mgmtList">
        <div class="mgmtList__head">
          <div class="mgmtList__head__menu">
            <div class="mgmtList__head__menu--id mgmtList__head__menu--child">
              <span class="btn-span">ID</span>
            </div>
            <div class="mgmtList__head__menu--subject mgmtList__head__menu--child">
              <span class="btn-span">Subject</span>
            </div>
            <div class="mgmtList__head__menu--instructor mgmtList__head__menu--child">
              <span class="btn-span">Instructor</span>
            </div>
            <div class="mgmtList__head__menu--category mgmtList__head__menu--child">
              <span class="btn-span">Category</span>
            </div>
            <div class="mgmtList__head__menu--action mgmtList__head__menu--child">
              <span class="btn-span">action</span>
            </div>
          </div>
        </div>

        <div class="mgmtList__main">
          
            @foreach($classes as $class)
            @if ($class->archive_class == null)
            <div class="mgmtList__main__list"><!--各list-->
              <div class="mgmtList__main__list--check mgmtList__main__list--js">
                <input type="checkbox" id="class-info" name="class-name">
              </div>
              <div class="mgmtList__main__list--child mgmtList__main__list--js"><!--list見出し-->
                <div class="mgmtList__main__list--child--id mgmtList__main__list--child--cont">
                  <span class="txt-span">{{$class->class_num}}</span>
                </div>
                <div class="mgmtList__main__list--child--subject mgmtList__main__list--child--cont">
                  <span class="txt-span">{{$class->class_name}}</span>
                </div>
                <div class="mgmtList__main__list--child--instructor mgmtList__main__list--child--cont">
                  <span class="txt-span">{{$class->name}}</span>
                </div>
                <div class="mgmtList__main__list--child--category mgmtList__main__list--child--cont">
                  <span class="txt-span">{{$class->category}}</span>
                </div>
                <div class="mgmtList__main__list--child--action mgmtList__main__list--child--cont">
                  <div class="actionBtn">
                    <div class="actionBtn__btn js-actionBtn__btn">
                      <button class="actionBtn__btn--display">
                        <img class="mgmt-displayBtn" src="/images/action-logo.png" alt="">
                      </button>
                      {{-- アーカイブボタン --}}
                      <form method="POST" action="/class/archive/{{$class->id}}"  class="float-right">
                          @csrf
                          {{--<input type="submit" value="アーカイブ"  onclick='return confirm("アーカイブにしますか？");'>--}}
                          <input type="image" class="btn mgmt-archiveBtn"  onclick='return confirm("アーカイブにしますか？");' src="/images/archive-w.png">
                      </form>
                      {{--<button class="actionBtn__btn--archive actionBtn__btn--all">
                        <img class="mgmt-archiveBtn" src="/images/archive-w.png" alt="">
                      </button>--}}
                      {{-- 編集ボタン --}}
                      <button class="actionBtn__btn--edit actionBtn__btn--all actionBtn__btn--edit--class" id="{{$class->id}}">
                        <img class="mgmt-editBtn" src="/images/edit-w.png" alt="">
                      </button>
                      <!--<button class="actionBtn__btn--delete actionBtn__btn--all">-->
                      <!--  <img class="mgmt-deleteBtn" src="/images/delet-w.png" alt="">-->
                      <!--</button>-->
                      {{-- 削除ボタン --}}
                      <form method="POST" action="/class/destroy/{{$class->id}}"  class="float-right">
                          @csrf
                          {{--<input type="submit" value="削除"  onclick='return confirm("本当に削除しますか？");'>--}}
                          <input type="image" class="btn mgmt-deleteBtn" onclick='return confirm("本当に削除しますか？");' src="/images/delet-w.png">
                      </form>
                    </div>
                  </div>
                </div>
              </div><!--list見出し-->
              <div class="mgmtList__main__list--detail" style="display: none;"><!--list詳細-->
                <div class="mgmtList__main__list--detail--left">
                  <div class="mgmtList__main__list--detail--tmp">
                    <div class="list-detail-ttl">
                      <span>ID</span>
                    </div>
                    <div class="list-detail-show">
                      <span class="txt-span">{{$class->class_num}}</span>
                    </div>
                  </div>
                  <div class="mgmtList__main__list--detail--tmp">
                    <div class="list-detail-ttl">
                      <span>Subject</span>
                    </div>
                    <div class="list-detail-show">
                      <span class="txt-span">{{$class->class_name}}</span>
                    </div>
                  </div>
                  <div class="mgmtList__main__list--detail--tmp">
                    <div class="list-detail-ttl">
                      <span>Instructor</span>
                    </div>
                    <div class="list-detail-show">
                      <span class="txt-span">{{$class->name}}</span>
                    </div>
                  </div>
                  <div class="mgmtList__main__list--detail--tmp">
                    <div class="list-detail-ttl">
                      <span>Mail</span>
                    </div>
                    <div class="list-detail-show">
                      <span class="txt-span">{{$class->email}}</span>
                    </div>
                  </div>
                  <div class="mgmtList__main__list--detail--tmp">
                    <div class="list-detail-ttl">
                      <span>Category</span>
                    </div>
                    <div class="list-detail-show list-detail-show-category">
                      
                      <data class="js-category-span" style="display: none;" value="{{$class->category}}"></data>
                      {{--<span class="category-span">{{$class->category}}</span>--}}
                     
                    </div>
                  </div>
                </div>
                <div class="mgmtList__main__list--detail--right">
                  <div class="mgmtList__main__list--detail--tmp">
                    <div class="list-detail-ttl">
                      <span>Evaluation</span>
                    </div>
                    <div class="list-detail-show">
                      <span class="txt-span">4.4</span>
                    </div>
                  </div>
                  <div class="mgmtList__main__list--detail--graphTmp">
  
                  </div>
                  <div class="flex">
                    <div class="mgmtList__main__list--detail--tmp">
                      <div class="list-detail-ttl">
                        <span>Number of questionnaires</span>
                      </div>
                      <div class="list-detail-show">
                        <span class="txt-span">312</span>
                      </div>
                    </div>
                    <div class="mgmtList__main__list--detail--tmp">
                      <div class="list-detail-ttl">
                        <span>Number of comments</span>
                      </div>
                      <div class="list-detail-show">
                        <span class="txt-span">113</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!--class詳細-->
              
          
            </div><!--各list-->
            @endif
            @endforeach
          
          <div class="mgmtList--underSpace"></div>
        </div>
      </div><!--mgmtList-->


        @include('V2addClass')
           
       @include('V2management_filter')
      
    </div>
    
@endsection