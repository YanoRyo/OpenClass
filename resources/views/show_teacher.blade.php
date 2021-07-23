@extends('layouts.template')

@section('content')

  <div class="showProf">
    <div class="showProf__left">
      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="professor">教員名</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span class="bold">{{$show_teacher->name}}</span>
        </div>
      </div>

      <div class="pulledTmp__img">
        <div class="pulledTmp__img__ttl">
          <label for="teacher_img">教員画像</label>
        </div>
        <div class="pulledTmp__img__show">
          <div class="pulledTmp__img__show--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="pulledTmp__img__show__data">
            <img src="{{ asset($show_teacher->image) }}" width="300" height="300" style ="border-radius:50%" alt="">
          </div>
        </div>
      </div>


      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="professor">連絡用メールアドレス</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span>{{$show_teacher->email}}</span>
        </div>
      </div>

      <div class="pulledTmp__cat">
        <div class="pulledTmp__cat__ttl">
          <span>カテゴリー</span>
        </div>
        <div class="pulledTmp__cat__checkBox">
          <div class="pulledTmp__cat__checkBox--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="pulledTmp__cat__checkBox--btn">
            @foreach($teacheies_category as $teacher_category)
            <div class="pulledTmp__cat__checkBox--btn--each">
              <span>{{$teacher_category}}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      
      <div class="pulledTmp__subj">
        
        <div class="pulledTmp__subj__ttl">
          <span>担当科目</span>
        </div>
        
        <div class="pulledTmp__subj__lists">
          <div class="pulledTmp__subj__lists--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="pulledTmp__subj__lists--list">
             @foreach($teacher_classes as $teacher_class)
            <li>
              <div class="pulledTmp__subj__lists--list--each">
                @if ($teacher_class->class_name == null)
                  <span>未登録</span>
                @else
                  <span>{{$teacher_class->class_name}}</span>
                @endif
              </div>
            </li>
            @endforeach
          </div>
        </div>
      </div>

    </div><!--showProf__left-->
    <div class="showProf__right">
      <div class="pulledTmp__rate">
        <div class="pulledTmp__rate__ttl">
          <span>総合評価</span>
        </div>
        <div class="pulledTmp__rate__value">
          <div class="pulledTmp__rate__value--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span>＜数値代入箇所＞</span>
        </div>
        <div class="pulledTmp__rate__chart">
          <span>＜チャート代入箇所＞</span>
        </div>
      </div>

      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="professor">過去アンケート数</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span>＜アンケート数代入箇所＞件</span>
        </div>
      </div>
      
      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="professor">過去コメント数</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span>＜コメント数代入箇所＞件</span>
        </div>
        <button>全て確認する</button>
      </div>
      
    </div><!--showProf__right-->
  </div><!--showProf-->

@endsection