@extends('layouts.template')

@section('content')
<div class="managementWrapper">

      @include('org.mgmtClass')
      
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
                      <form method="POST" action="/org/archive1/{{$class->id}}"  class="float-right">
                          @csrf
                          {{--<input type="submit" value="アーカイブ"  onclick='return confirm("アーカイブにしますか？");'>--}}
                          <input type="image" class="btn mgmt-archiveBtn"  onclick='return confirm("アーカイブにしますか？");' src="/images/archive-w.png">
                      </form>
                      {{--<button class="actionBtn__btn--archive actionBtn__btn--all">
                        <img class="mgmt-archiveBtn" src="/images/archive-w.png" alt="">
                      </button>--}}
                      {{-- 編集ボタン --}}
                      <button class="actionBtn__btn--edit actionBtn__btn--all actionBtn__btn--edit--class" id="Class{{$class->id}}">
                        <img class="mgmt-editBtn" src="/images/edit-w.png" alt="">
                      </button>
                      <!--<button class="actionBtn__btn--delete actionBtn__btn--all">-->
                      <!--  <img class="mgmt-deleteBtn" src="/images/delet-w.png" alt="">-->
                      <!--</button>-->
                      {{-- 削除ボタン --}}
                      <form method="POST" action="/org/destroy1/{{$class->id}}"  class="float-right">
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
                      <span class="txt-span evaluation-js">--</span>
                    </div>
                  </div>
                  <div class="mgmtList__main__list--detail--graphTmp"> 
                  <div class="canvas" data-classid="{{$class->id}}"> 
                    <canvas id="myRaderChart{{$class->id}}" style="width:350px; height:250px;"></canvas>
                    <div class="data-average" hidden>
                      @foreach($datas as $data)
                      @if($data->class_id == $class->id)
                      <div class="data-average-each">
                        <span class="data-average-each-1">{{$data->que_1}}</span>
                        <span class="data-average-each-2">{{$data->que_2}}</span>
                        <span class="data-average-each-3">{{$data->que_3}}</span>
                        <span class="data-average-each-4">{{$data->que_4}}</span>
                        <span class="data-average-each-5">{{$data->que_5}}</span>
                      </div>
                      {{$data->comment}}
                      @endif
                      @endforeach
                    </div>
                    <div class="canvas__ques">
                      <ol>
                        <span>Question</span>
                        <li>この授業を誰かに勧めたいと思いますか？</li>
                        <li>「授業の内容」と「シラバスの内容」は概ね一致していましたか？</li>
                        <li>この授業を行なっている教員と授業をするのは楽しいですか？</li>
                        <li>この授業は簡単でしたか？</li>
                        <li>この授業のペースは他の授業のペースに比べてちょうどよかったですか？</li>
                      </ol>
                    </div>
                  </div>
                  </div>
                  <div class="flex">
                    <div class="mgmtList__main__list--detail--tmp">
                      <div class="list-detail-ttl">
                        <span>Number of questionnaires</span>
                      </div>
                      <div class="list-detail-show">
                        <span class="txt-span numOfQueAbout">--</span>
                      </div>
                    </div>
                    <div class="mgmtList__main__list--detail--tmp">
                      <div class="list-detail-ttl">
                        <span>Number of comments</span>
                      </div>
                      <div class="list-detail-show numOfComment-js">
                        <span class="txt-span">--</span>
                        <div hidden>
                        @foreach($datas as $data)
                        @if($data->class_id == $class->id)
                          @if($data->if_text1 == null or $data->if_text2 == null)
                          @else
                          <span class="comment-js">{{$data->if_text1}}なところを直せば、{{$data->if_text2}}と思う...。</span><br>
                          @endif
                          @if($data->better_text == null)
                          @else
                          <span class="comment-js">{{$data->better_text}}は他の授業よりも最高！</span><br>
                          @endif
                          @if($data->comment == null)
                          @else
                          <span class="comment-js">{{$data->comment}}</span><br>
                          @endif
                        @endif
                        @endforeach
                        </div>
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

      

        @include('org.addClass')
           
       @include('org.management_filter')
      
    </div>
    
    
@endsection