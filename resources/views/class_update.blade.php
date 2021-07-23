@extends('layouts.template')

@section('content')
  <div class="addClass">
    <div class="addClass__form">
      <form method='POST' action="{{ route('update') }}" enctype="multipart/form-data" id="addClass_form">
        @csrf
        <div class="formTmp__txtType">
          <div class="formTmp__txtType__ttl">
            <label for="class-name">授業科目</label><br><!--forを変更-->
          </div>
          <div class="formTmp__txtType__input">
            <div class="formTmp__txtType__input--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <input type="text" name="class_name" id="class-name" value="{{$class->class_name}}">
          </div>
        </div>

        <div class="formTmp__txtType">
          <div class="formTmp__txtType__ttl">
            <label for="class-num">登録番号</label><br><!--forを変更-->
          </div>
          <div class="formTmp__txtType__input">
            <div class="formTmp__txtType__input--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <input type="text" name="class_num" id="class-num" value="{{$class->class_num}}">
          </div>
        </div>
        
        <div class="formTmp__cat">
          <div class="formTmp__cat__ttl">
            <span>カテゴリー</span>
          </div>
          <div class="formTmp__cat__checkBox">
            <div class="formTmp__cat__checkBox--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            
            <div class="formTmp__cat__checkBox--btn">
             @foreach($categories as $category)
            <div class="pulledTmp__cat__checkBox--btn--each">
              <span>{{$category}}</span>
            </div>
            @endforeach
            </div>
          </div>
        </div>
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
        
        <div class="formTmp__txtType">
          <div class="formTmp__txtType__ttl">
            <label for="teacher-name">担当教員</label><br>
          </div>
          <div class="formTmp__txtType__input">
            <div class="formTmp__txtType__input--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            <input type="text" id="teacher-name" name="teacher_name" list="example" value="{{$class->name}}">
            <datalist id="example">
            </datalist>
          </div>
        </div>
        <div class="formTmp__txtType">
          <div class="formTmp__txtType__ttl">
            <label for="teacher-name">担当教員</label><br>
          </div>
          <div class="formTmp__txtType__input">
            <div class="formTmp__txtType__input--img">
              <img src="/images/gNav__listLogo.png" alt="">
            </div>
            
            <input type="text" list="teacherList" id="teacher-name"  placeholder="教員を選択" spellcheck=”false”>
            <datalist id="teacherList">
            @foreach($all_teacheies as $teacher)
              <option data-value="{{$teacher->id}}">{{$teacher->name}}</option>
            @endforeach
            </datalist>
            <input type="hidden" name="teacher_id" id="teacher-name-hidden">
          </div>
        </div>
      </form>
    </div><!--addClass__display-->
    <div class="addClass__submit">
      <div class="user__hint">
        <div class="user__hint--ttl">
          <div class="hintImg">
            <img src="/images/gNav__listLogo.png" alt="ヒントロゴ">
          </div>
          <span>カテゴリのヒント</span>
        </div>
        <div class="user__hint--msg">
          <ul>
            <li>授業科目・登録番号は、大学のシラバスと同じものを表記しましょう。</li>
            <li>カテゴリは、関連するものを１つ以上選択しましょう。生徒が検索する時に、わかりやすくなるためです。</li>
            <li>担当教員は、「教員管理」ですでに登録された教員飲み追加することができます。</li>
            <li>メールアドレスや教員の画像は、自動的に反映されます。</li>
          </ul>
        </div>
      </div>
      <div class="formTmp__submit--btn">
        <input type="submit" name="submit" value="登録する" form="addClass_form">
      </div>
    </div><!--addClass__submit-->
    <div>
      </form>
    </div>
  </div><!--addClass-->

@endsection


