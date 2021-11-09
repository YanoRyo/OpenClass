@extends('layouts.template')

@section('content')
@foreach($classes as $class)
<div class="updateForm">
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
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
        @endif
          <form method='POST' action="{{ route('org.update02',['id' => $id]) }}" id="updateForm__edit" class="updateForm__edit" enctype="multipart/form-data">
            @csrf
            <div class="updateForm__edit--flex">
              <div class="updateForm__edit--tmp updateForm__edit--flex--left">
                <label for="classID">Class ID</label>
                <input class="updateForm__edit--input" type="text" id="classID" name="class_num" value="{{old('class_num',$class->class_num)}}">
              </div>
              <div class="updateForm__edit--tmp updateForm__edit--flex--right">
                <label for="subject">Subject</label>
                <input class="updateForm__edit--input" type="text" id="subject" name="class_name" value="{{old('class_name',$class->class_name)}}">
              </div>
            </div>
            <div class="updateForm__edit--tmp">
              <label for="instractor">Instractor</label>
              <input class="addNewForm__edit--input" type="text" list="teacherList" id="teacher-name" id="instractor" name="teacher_id" placeholder="Select Instractor.">
              <datalist id="teacherList">
               @foreach($all_teacheies as $teacher)
                  <option data-value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
              </datalist>
              <input type="hidden" name="teacher_id" id="teacher-name-hidden">
            </div>
            <div class="updateForm__edit--tmp">
              <label for="">Categories</label>
              <div class="updateForm__edit--tmp--category">
                <div class="category-btn-selectbox">
                  @foreach($all_categories as $category)
                    <div class="formTmp__cat__checkBox--btn--each category-btn-selectbox">
                      <input type="checkbox" id="{{$category->id}}" name="category[]" value="{{$category->category}}">
                      <label for="{{$category->id}}">{{$category->category}}</label>
                    </div>
                  @endforeach
                  
                </div>
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
              <span>授業追加のヒント</span>
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
      </div>
@endforeach
@endsection