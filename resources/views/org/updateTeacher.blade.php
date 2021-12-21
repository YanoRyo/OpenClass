@extends('layouts.template')

@section('content')
	<!--アップデートフォーム-->
      <div class="updateForm updateForm--professor" style="right:0">
        <div class="updateForm__head">
          <div class="updateForm__head__ttl">
            <div class="updateForm__head__ttl--logo">
              <img src="/images/edit-w.png" alt="">
            </div>
            <div class="updateForm__head__ttl--ttl">
              <span class="txt-span">Edit Infomation</span>
            </div>
          </div>
          <div class="updateForm__head__space">
          </div>
        </div>
        <?php
          $last_url = url()->current();
          $id = substr($last_url, strrpos($last_url, '/') + 1);
        ?>
        <div class="updateForm__wrapper">
          <div class="updateForm__left"><!-- 左側 -->
          
          <form method='POST' action="{{ route('org.update01',['id' => $id]) }}" enctype="multipart/form-data" id="updateForm__edit" class="addNewForm__edit--input">
            @csrf
            <div class="updateForm__edit--flex">
              <div class="updateForm__edit--tmp updateForm__edit--flex--left">
                <label for="classID">Professor ID  <span class="form-required">*必須</span></label>
                <input class="updateForm__edit--input addNewForm__edit--input--ID" type="text" id="classID" value="1011">
              </div>
              <div class="updateForm__edit--tmp updateForm__edit--flex--right" id="prof-Name-js">
                <label for="subject">Professor name  <span class="form-required">*必須</span></label>
                <input class="updateForm__edit--input addNewForm__edit--input addNewForm__edit--input--name" type="text" id="subject" name="name" value="{{$show_teacher->name}}">
              </div>
            </div>
            <div class="updateForm__edit--tmp updateForm__edit--flex--right">
              <label for="mail">Mail  <span class="form-required">*必須</span></label>
              <input class="updateForm__edit--input addNewForm__edit--input--email" type="email" id="" name="email" value="{{$show_teacher->email}}">
            </div>
            <div class="updateForm__edit--tmp updateForm__edit--flex--right">
              <label for="prof-image">Image</label>
              @if(is_null($show_teacher->image))
                <img class="profImg-preview" src="{{ asset('images/null_image.png') }}" width="181px" height="136px">
              @else
                <img class="profImg-preview" src="{{ asset($show_teacher->image) }}" width="181px" height="136px">
              @endif
              <input type="file" name="image" id="prof-image" accept="image/jpeg,image/gif,image/png" class="prof-image">
              <label for="prof-image" class="edit-uploadImg-btn">Upload image</label>
            </div>
            <div class="updateForm__edit--tmp">
              <label for="">Categories  <span class="form-required">*必須</span></label>
              <data class="updateForm__date--category" value="{{$show_teacher->teacher_category}}"></data>
              <div class="updateForm__edit--tmp--category" id="prof-Category-js">
                @foreach($all_categories as $category)
                  <div class="category-btn-selectbox">
                    <input type="checkbox" id="{{$category->id}}" name="teacher_category[]" value="{{$category->category}}" class="category-btn-selectbox-js">
                    <label for="{{$category->id}}">{{$category->category}}</label>
                  </div>
                @endforeach
              </div>
            </div>
          </form>
          </div>
          <div class="updateForm__right"><!-- 右側 -->
            <div class="user__hint">
              <div class="user__hint--ttl">
                <div class="hintImg">
                  <img src="/images/hint.png" alt="">
                </div>
                <span>教員追加のヒント</span>
              </div>
              <div class="user__hint--msg">
                <ul>
                  <li>カテゴリは簡潔に１単語で表記しましょう</li>
                  <li>授業の分野を細かくしすぎずに、大枠を捉えたカテゴリにすると、生徒がわかりやすくなります。</li>
                  <li>カテゴリ管理で設定したカテゴリは、授業管理や教員管理の更新、追加で選択することができます。</li>
                </ul>
              </div>
            </div>
            <div class="updateForm__submit">
              <div class="updateForm__submit--btn">
                <button class="updateForm__submit--btn--cancel">Cancel</button>
              </div>
              <div class="updateForm__submit--btn">
                <input type="submit" name="submit" form="updateForm__edit" value="Submit" id="updateForm_submit" style="opacity:1;box-shadow:0px 3px 10px 0px rgba(0, 60, 111, 0.2)">
              </div>
            </div>
          </div>
        </div>
      </div><!-- updateForm -->

      <!--追加-->
@endsection