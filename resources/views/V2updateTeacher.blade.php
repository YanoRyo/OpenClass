@extends('layouts.template')

@section('content')
	<!--アップデートフォーム-->
      <div class="updateForm updateForm--professor">
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
          <form method='POST' action="{{ route('update01',['id' => $id]) }}" enctype="multipart/form-data" id="updateForm__edit">
            @csrf
            <div class="updateForm__edit--flex">
              <div class="updateForm__edit--tmp updateForm__edit--flex--left">
                <label for="classID">Professor ID</label>
                <input class="updateForm__edit--input" type="text" id="classID" value="1011">
              </div>
              <div class="updateForm__edit--tmp updateForm__edit--flex--right">
                <label for="subject">Professor name</label>
                <input class="updateForm__edit--input" type="text" id="subject" name="name" value="{{$show_teacher->name}}">
              </div>
            </div>
            <div class="updateForm__edit--tmp updateForm__edit--flex--right">
              <label for="mail">Mail</label>
              <input class="updateForm__edit--input" type="text" id="" name="email" value="{{$show_teacher->email}}">
            </div>
            <div class="updateForm__edit--tmp updateForm__edit--flex--right">
              <label for="prof-image">Image</label>
              <img class="profImg-preview" src="{{ asset($show_teacher->image) }}" width="181px" height="136px">
              <input type="file" name="image" id="prof-image" accept="image/jpeg,image/gif,image/png" class="prof-image">
              <label for="prof-image" class="edit-uploadImg-btn">Upload image</label>
            </div>
            <div class="updateForm__edit--tmp">
              <label for="">Categories</label>
              <div class="updateForm__edit--tmp--category">
                @foreach($all_categories as $category)
                  <div class="category-btn-selectbox">
                    <input type="checkbox" id="{{$category->id}}" name="category[]" value="{{$category->category}}">
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
                <input type="submit" name="submit" form="updateForm__edit" value="Submit">
              </div>
            </div>
          </div>
        </div>
      </div><!-- updateForm -->

      <!--追加-->
@endsection