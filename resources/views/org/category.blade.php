@extends('layouts.template')

@section('content')

<div class="category-wrapper">
      <div class="addCategory">
        <form method='POST' action="{{ route('org.store1') }}" enctype="multipart/form-data" class="addCategory__form" autocomplete="off"><!--name：JQueryでsubmitするのに必要-->
         @csrf
           <div class="addCategory__form--input">
             <input type="text" name="category" id="new-category-input" placeholder="Enter Categories">
           </div>
           <button class="addCategory__form--submit" disabled><!--buttonタグ：JQueryでsubmitするのに必要-->
             <div id="actionBtn--blue--category" class="actionBtn--blue--category--disabled">
               <div class="actionBtn--blue--category--logo">
                 <img src="/images/Add-w-logo.png" alt="">
               </div>
             </div>
           </button>
        </form>
        <div class="attention-message">
        </div>
        @if(isset($alert_category))
          <p style="color:red;">{{$alert_category}}</p>
        @endif
        <div class="addCategory__added">
          <div class="addCategory__added--category">
          <form method='POST' action="/org/destroy" id="added-category-form">
              @csrf
           @foreach($categories as $category)
           <div class="category-btn-selectbox">
             <input type="checkbox" id="{{$category->id}}" name="category[]" value="{{$category->id}}">
             <label for="{{$category->id}}">{{$category->category}}</label>
             <data value="{{$category->category}}"></data>
           </div>
           @endforeach
          </form>
          </div>
          <div class="addCategory__added--delete">
            <label class="delete__btn--category" for="delete-submit">
              <div class="delete__btn--category--logo">
                <img src="/images/delet-w.png" alt="trash">
              </div>
              <div class="delete__btn--category--txt">
               <span class="btn-span">Select categories and delete.</span>
              </div>
              <input type="submit" id="delete-submit" value="delete" form="added-category-form" disabled>
            </label>
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
                <!--<h4>CSVファイルを選択してください</h4>-->
                <!--<div class="row">-->
                <!--    <div class="col-md-6">-->
                <!--    ■手順-->
 
                <!--    1. CSVで保存します。-->
 
                <!--    2. ファイルを選択し読み込んでください。-->
 
                <!--    </div>-->
                <!--</div>-->
                
                <!--<form role="form" method="post" action="import" enctype="multipart/form-data">-->
                <!--    {{ csrf_field() }}-->
                <!--    <input type="file" name="csv_file" id="csv_file">-->
                <!--    <div class="form-group">-->
                <!--        <button type="submit" class="btn btn-default btn-success">保存</button>-->
                <!--    </div>-->
                <!--</form>-->
@endsection
