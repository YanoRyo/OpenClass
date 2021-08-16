<div class="addNewForm">
        <div class="addNewForm__head">
          <div class="addNewForm__head__ttl">
            <div class="addNewForm__head__ttl--logo">
              <img src="/images/Add-btn-w-logo.png" alt="">
            </div>
            <div class="addNewForm__head__ttl--ttl">
              <span class="txt-span">New Addition</span>
            </div>
          </div>
          <div class="addNewForm__head__space">
          </div>
        </div>
        <div class="addNewForm__wrapper">
        <div class="addNewForm__left"><!-- 左側 -->
          <form method='POST' action="{{ route('store3') }}" enctype="multipart/form-data" id="addNewForm__edit" class="addNewForm__edit">
            @csrf
            <div class="addNewForm__edit--flex">
              <div class="addNewForm__edit--tmp addNewForm__edit--flex--left">
                <label for="classID">Class ID</label>
                <input class="addNewForm__edit--input" type="text" name="class_num" id="classID" placeholder="Add Class ID.">
              </div>
              <div class="addNewForm__edit--tmp addNewForm__edit--flex--right">
                <label for="subject">Subject</label>
                <input class="addNewForm__edit--input" type="text" name="class_name" id="subject" placeholder="Add new Subject name.">
              </div>
            </div>
            <div class="addNewForm__edit--tmp">
              <label for="instractor">Instractor</label>
              <input class="addNewForm__edit--input" type="text" list="teacherList" id="teacher-name" id="instractor" name="teacher_id" placeholder="Select Instractor.">
              <datalist id="teacherList">
                @foreach($teacheies as $teacher)
                  <option data-value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
              </datalist>
              <input type="hidden" name="teacher_id" id="teacher-name-hidden">
            </div>
            <div class="addNewForm__edit--tmp">
              <label for="">Categories</label>
              <div class="addNewForm__edit--tmp--category">
                @foreach($categories as $category)
                  <div class="formTmp__cat__checkBox--btn--each">
                    <input type="checkbox" id="{{$category->id}}" name="category[]" value="{{$category->category}}">
                    <label for="{{$category->id}}">{{$category->category}}</label>
                  </div>
                @endforeach
              </div>
            </div>
          </form>
        </div>
        <div class="addNewForm__right"><!-- 右側 -->
          <div class="user__hint">
            <div class="user__hint--ttl">
              <div class="hintImg">
                <img src="/images/hint.png" alt="">
              </div>
              <span>新規授業追加のヒント</span>
            </div>
            <div class="user__hint--msg">
              <ul>
                <li>カテゴリは簡潔に１単語で表記しましょう</li>
                <li>授業の分野を細かくしすぎずに、大枠を捉えたカテゴリにすると、生徒がわかりやすくなります。</li>
                <li>カテゴリ管理で設定したカテゴリは、授業管理や教員管理の更新、追加で選択することができます。</li>
              </ul>
            </div>
          </div>
          <div class="addNewForm__submit">
            <div class="addNewForm__submit--btn">
              <button class="addNewForm__submit--btn--cancel">Cancel</button>
            </div>
            <div class="addNewForm__submit--btn">
              <input type="submit" name="submit" form="addNewForm__edit" value="Submit">
            </div>
          </div>
        </div>
        </div>
      </div>