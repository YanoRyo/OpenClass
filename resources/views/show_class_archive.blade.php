@extends('layouts.template')

@section('content')
@foreach($classes as $class)
<div class="showClass">
    <div class="showClass__left">

      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="subj_name">授業科目名</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span class="bold">{{$class->class_name}}</span>
        </div>
      </div>

      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="subj_num">登録番号</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span>{{$class->class_num}}</span>
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
            @foreach($categories as $category)
            <div class="pulledTmp__cat__checkBox--btn--each">
              <span>{{$category}}</span>
            </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="prof_name">担当教員</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span class="bold">{{$class->name}}</span>
        </div>
      </div>
      
      <div class="pulledTmp__txtType">
        <div class="pulledTmp__txtType__ttl">
          <label for="prof_email">メールアドレス</label><br><!--forを変更-->
        </div>
        <div class="pulledTmp__txtType__output">
          <div class="pulledTmp__txtType__output--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <span class="bold">{{$class->email}}</span>
        </div>
      </div>

      <div class="pulledTmp__img">
        <div class="pulledTmp__img__ttl">
          <label for="prof_img">教員画像</label>
        </div>
        <div class="pulledTmp__img__show">
          <div class="pulledTmp__img__show--img">
            <img src="/images/gNav__listLogo.png" alt="">
          </div>
          <div class="pulledTmp__img__show__data">
            <img src="{{ asset($class->image) }}" alt="">
          </div>
        </div>
      </div>

      
    </div><!--showClass__left-->
    <div class="showClass__right">
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
      
    </div><!--showClass__right-->
  </div><!--showClass-->




@endforeach
@endsection