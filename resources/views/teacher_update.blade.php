@extends('layouts.template')

@section('content')
  <div class="addProf">
    <div class="addProf__add">
      <?php
        $last_url = url()->current();
        $id = substr($last_url, strrpos($last_url, '/') + 1);
      ?>
      <form method='POST' action="{{ route('update01',['id' => $id]) }}" enctype="multipart/form-data" id="addProf_form">
        @csrf
        <div class="formTmp__txtType">
          <div class="formTmp__txtType__ttl">
            <label for="professor">教員名</label><br><!--forを変更-->
          </div>
          <div class="formTmp__txtType__input">
            <div class="formTmp__txtType__input--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <input type="text" name="name" id="professor" value="{{$show_teacher->name}}"><!--idを変更-->
          </div>
        </div><!--formTmp__txtType__ttl(professor)-->

        <div class="formTmp__img">
          <div class="formTmp__img__ttl">
            <label for="teacher_img">登録画面</label>
          </div>
          <div class="formTmp__img__up">
            <div class="formTmp__img__up--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <div>
              <img src="{{ asset($show_teacher->image) }}" width="300" height="300" style ="border-radius:50%" alt="">
              <img id="profImg-preview" width="300px" height="auto">
              <input type="file" name="image" accept="image/jpeg,image/gif,image/png" id="teacher_img">
            </div>
          </div>
        </div>

        <div class="formTmp__txtType">
          <div class="formTmp__txtType__ttl">
            <label for="email">連絡用メールアドレス</label><br><!--forを変更-->
          </div>
          <div class="formTmp__txtType__input">
            <div class="formTmp__txtType__input--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <input type="email" name="email" id="email" value="{{$show_teacher->email}}"><!--idを変更-->
          </div>
        </div><!--formTmp__txtType(email)-->

        <div class="formTmp__cat">
          <div class="formTmp__cat__ttl">
            <span>カテゴリー</span>
          </div>
          <div class="formTmp__cat__checkBox">
            <div class="formTmp__cat__checkBox--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <div class="formTmp__cat__checkBox--btn">
              @foreach($teacheies_category as $teacher_category)
                <div class="pulledTmp__cat__checkBox--btn--each">
                  <span>{{$teacher_category}}</span>
                </div>
              @endforeach
            </div>
          </div>
        </div><!--formTmp__cat(category)-->
        <div class="formTmp__cat">
          <div class="formTmp__cat__ttl">
            <span>カテゴリー</span>
          </div>
          <div class="formTmp__cat__checkBox">
            <div class="formTmp__cat__checkBox--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            
            <div class="formTmp__cat__checkBox--btn">
              @foreach($all_categories as $category)
                <div class="formTmp__cat__checkBox--btn--each">
                  <input type="checkbox" id="{{$category->id}}" name="category[]" value="{{$category->category}}">
                  <label for="{{$category->id}}">{{$category->category}}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </form>
      
    </div><!--addProf__add-->
    <div class="addProf__submit">
      <div class="user__hint">
        <div class="user__hint--ttl">
          <div class="hintImg">
            <img src="/images/gNav__listLogo.png" alt="ヒントロゴ">
          </div>
          <span>教員追加のヒント</span>
        </div>
        <div class="user__hint--msg">
          <ul>
            <li>教員名は、大学のシラバスと同じものを表記しましょう。</li>
            <li>
              カテゴリは、関連するものを１つ以上選択しましょう。生徒が検索をするときに、わかりやすくなるためです。
            </li>
            <li>
              担当授業は、「授業管理」ですでに登録された授業が自動的に反映されます。
              こちらからは変更することができません。
            </li>
          </ul>
        </div>
      </div>
      <div class="formTmp__submit--btn">
        <input type="submit" name="submit" value="再登録する" form="addProf_form">
      </div>
    </div><!--addsubmit-->
  </div><!--addProf-->
@endsection