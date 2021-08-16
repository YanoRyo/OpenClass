@extends('layouts.template')

@section('content')

<div class="category-wrapper">
      <div class="addCategory">
        <form method='POST' action="{{ route('store1') }}" enctype="multipart/form-data" class="addCategory__form" autocomplete="off"><!--name：JQueryでsubmitするのに必要-->
         @csrf
           <div class="addCategory__form--input">
             <input type="text" name="category" id="teacher_img" placeholder="Enter Categories">
           </div>
           <button class="addCategory__form--submit"><!--buttonタグ：JQueryでsubmitするのに必要-->
             <div class="actionBtn--blue--category">
               <div class="actionBtn--blue--category--logo">
                 <img src="/images/Add-w-logo.png" alt="">
               </div>
             </div>
           </button>
        </form>
        <div class="addCategory__added">
          <div class="addCategory__added--category">
           @foreach($categories as $category)
           <div class="category-btn-selectbox">
             <input type="checkbox" id="{{$category->id}}" name="category" value="{{$category->category}}">
             <label for="{{$category->id}}">{{$category->category}}</label>
           </div>
           @endforeach
          </div>
          <div class="addCategory__added--delete">
            <button class="delete__btn--category">
              <div class="delete__btn--category--logo">
                <img src="/images/delet-w.png" alt="trash">
              </div>
              <div class="delete__btn--category--txt">
               <span class="btn-span">Select categories and delete.</span>
              </div>
           </button>
          </div>
        </div>
      </div>
      <div class="application-hint">

        <div class="user__hint">
          <div class="user__hint--ttl">
            <div class="hintImg">
              <img src="/images/hint.png" alt="">
            </div>
            <span>カテゴリのヒント</span>
          </div>
          <div class="user__hint--msg">
            <ul>
              <li>カテゴリは簡潔に１単語で表記しましょう</li>
              <li>授業の分野を細かくしすぎずに、大枠を捉えたカテゴリにすると、生徒がわかりやすくなります。</li>
              <li>カテゴリ管理で設定したカテゴリは、授業管理や教員管理の更新、追加で選択することができます。</li>
            </ul>
          </div>
        </div>

      </div>
    </div>
    
@endsection