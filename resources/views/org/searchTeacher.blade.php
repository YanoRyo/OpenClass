@extends('layouts.template')

@section('content')
<div class="managementWrapper">

      @include('org.mgmtTeacher')
      
      <div class="mgmtList">
        <div class="mgmtList__head">
          <div class="mgmtList__head__menu">
            <div class="mgmtList__head__menu--id mgmtList__head__menu--child">
              <span class="btn-span">ID</span>
            </div>
            <div class="mgmtList__head__menu--instructor mgmtList__head__menu--child">
              <span class="btn-span">Instructor</span>
            </div>
            <div class="mgmtList__head__menu--mail mgmtList__head__menu--child">
              <span class="btn-span">Mail</span>
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
          @foreach($teachers as $teacher)
            @if ($teacher->archive_teacher == null)
          <div class="mgmtList__main__list"><!--各list-->
              <div class="mgmtList__main__list--check mgmtList__main__list--js">
                <input type="checkbox" id="class-info" name="class-name">
              </div>
              <div class="mgmtList__main__list--child mgmtList__main__list--js"><!--list見出し-->
                <div class="mgmtList__main__list--child--id mgmtList__main__list--child--cont">
                  <span class="txt-span">1011</span>
                </div>
                <div class="mgmtList__main__list--child--instructor mgmtList__main__list--child--cont">
                  <span class="txt-span">
                    @if ($teacher->name == null)
                      未登録
                      @else
                        {{$teacher->name}}
                    @endif
                  </span>
                </div>
                <div class="mgmtList__main__list--child--mail mgmtList__main__list--child--cont">
                  <span class="txt-span">
                    @if ($teacher->email == null)
                      未登録
                      @else
                        {{$teacher->email}}
                    @endif
                  </span>
                </div>
                <div class="mgmtList__main__list--child--category mgmtList__main__list--child--cont">
                  <span class="txt-span">
                    @if ($teacher->teacher_category == null)
      	              未登録
      	              @else
                        {{$teacher->teacher_category}}
                    @endif
                  </span>
                </div>
               
                  <div class="mgmtList__main__list--child--action mgmtList__main__list--child--cont">
                    <div class="actionBtn">
                      <div class="actionBtn__btn js-actionBtn__btn">
                        <button class="actionBtn__btn--display">
                          <img class="mgmt-displayBtn" src="/images/action-logo.png" alt="">
                        </button>
                        {{-- アーカイブボタン --}}
                        <form method="POST" action="/teacher/archive/{{$teacher->id}}"  class="float-right">
                            @csrf
                            {{--<input type="submit" value="アーカイブ" class="btn btn-danger btn-sm" onclick='return confirm("アーカイブにしますか？");'>--}}
                            <input type="image" class="btn mgmt-archiveBtn"  onclick='return confirm("アーカイブにしますか？");' src="/images/archive-w.png">
                        </form>
                        {{--<button class="actionBtn__btn--archive actionBtn__btn--all">
                          <img class="mgmt-archiveBtn" src="/images/archive-w.png" alt="">
                        </button>--}}
                        {{-- 編集ボタン --}}
                        <button class="actionBtn__btn--edit actionBtn__btn--all actionBtn__btn--edit--prof" id="{{$teacher->id}}">
                          <img class="mgmt-editBtn" src="/images/edit-w.png" alt="">
                        </button>
                        {{-- 削除ボタン --}}
                        <form method="POST" action="/teacher/destroy/{{$teacher->id}}"  class="float-right">
                            @csrf
                            {{--<input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("本当に削除しますか？");'>--}}
                            <input type="image" class="btn mgmt-deleteBtn" onclick='return confirm("本当に削除しますか？");' src="/images/delet-w.png">
                        </form>
                        <!--<button class="actionBtn__btn--delete actionBtn__btn--all">-->
                        <!--  <img class="mgmt-deleteBtn" src="/images/delet-w.png" alt="">-->
                        <!--</button>-->
                      </div>
                    </div>
                  </div>
               
            </div>
            
            <!--list見出し-->
            <div class="mgmtList__main__list--detail" style="display: none;"><!--list詳細-->
              <div class="mgmtList__main__list--detail--left">
                <div class="mgmtList__main__list--detail--tmp">
                  <div class="list-detail-ttl">
                    <span>ID</span>
                  </div>
                  <div class="list-detail-show">
                    <span class="txt-span teacherID">{{$teacher->id}}</span>
                  </div>
                </div>
                <div class="mgmtList__main__list--detail--tmp">
                  <div class="list-detail-ttl">
                    <span>Instructor</span>
                  </div>
                  <div class="list-detail-show">
                    <span class="txt-span">{{$teacher->name}}</span>
                  </div>
                </div>
                <div class="mgmtList__main__list--detail--tmp">
                  <div class="list-detail-ttl">
                    <span>Image</span>
                  </div>
                  <div class="list-detail-show">
                    <img class="professor-image" src="{{ asset($teacher->image) }}" alt="">
                  </div>
                </div>
                <div class="mgmtList__main__list--detail--tmp">
                  <div class="list-detail-ttl">
                    <span>Mail</span>
                  </div>
                  <div class="list-detail-show">
                    <span class="txt-span">{{$teacher->email}}</span>
                  </div>
                </div>
              </div>
              <div class="mgmtList__main__list--detail--right">
                <div class="mgmtList__main__list--detail--tmp">
                  <div class="list-detail-ttl">
                    <span>Category</span>
                  </div>
                  <div class="list-detail-show list-detail-show-category">
                    <!--foreach-->
                        <span class="category-span">{{$teacher->teacher_category}}</span>
                    <!--endforeach-->
                  </div>
                </div>
                <div class="mgmtList__main__list--detail--tmp">
                  <div class="list-detail-ttl">
                    <span>Subject in charge</span>
                  </div>
                  <div class="list-detail-show">
                    <!--foreach-->
                    <span class="txt-span inCharge">Webサイトスタイリング演習</span>
                    <!--endforeach-->
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



      
       
            
  
      
    </div>
    

    
@endsection