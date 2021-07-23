@extends('layouts.template')

@section('content')
  <div class="addCategory">
    <div class="addCategory__display">
      <div class="addCategory__display--ttl">
        <div class="categoryImg">
          <img src="/images/gNav__listLogo.png" alt="カテゴリロゴ">
        </div>
        <span>現在のカテゴリ</span>
      </div>
      <div class="addCategory__display__box">
        @foreach($categorys as $category)
        <div class="addCategory__display__box--each">
          <span>{{$category->category}}</span>
        </div>
        @endforeach
      </div>
    </div><!--addCategory__display-->

    <div class="addCategory__add">
      <form method='POST' action="{{ route('store1') }}" enctype="multipart/form-data">
        @csrf
        <label class="addForm--ttl" for="category">カテゴリ追加</label><br>
        <div class="addForm__block">
          <div class="addForm__block--txt">
            <input type="text" name="category" id="category" placeholder="授業カテゴリを追加">
          </div>
          <div class="addForm__block--btn">
            <input type="image" src="/images/plus.png" alt="登録する" width="26px" height="26px">
          </div>
        </div>
      </form>
      <div class="user__hint">
        <div class="user__hint--ttl">
          <div class="hintImg">
            <img src="/images/gNav__listLogo.png" alt="ヒントロゴ">
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
    </div><!--addCategory__add-->
  </div><!--addCategory-->
@endsection
