	 <div class="addNewForm addNewForm--professor">
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
          <!--@if ($errors->any())-->
          <!--      <div class="alert alert-danger">-->
          <!--          <ul>-->
          <!--              @foreach ($errors->all() as $error)-->
          <!--                  <li>{{ $error }}</li>-->
          <!--              @endforeach-->
          <!--          </ul>-->
          <!--      </div>-->
          <!--  @endif-->
          <form class="upload-images p-0 border-0" method='POST' action="{{ route('org.store2') }}" enctype="multipart/form-data" id="addProf_form" autocomplete="off">
            @csrf
            <div class="addNewForm__edit--flex">
              <div class="addNewForm__edit--tmp addNewForm__edit--flex--left" id="prof-ID-js">
                <label for="classID">Professor ID  <span class="form-required">*必須</span></label>
                <input class="addNewForm__edit--input addNewForm__edit--input--ID" type="text" id="classID" placeholder="Add Prof ID." autocomplete="off">
              </div>
              <div class="addNewForm__edit--tmp addNewForm__edit--flex--right" id="prof-Name-js">
                <label for="subject">Professor name  <span class="form-required">*必須</span></label>
                <input class="addNewForm__edit--input" type="text" name="name" id="subject" placeholder="Add new Proffessor name." autocomplete="off">
              </div>
            </div>
            <div class="addNewForm__edit--tmp addNewForm__edit--flex--right" id="prof-Email-js">
              <label for="email">Mail  <span class="form-required">*必須</span></label>
              <input class="addNewForm__edit--input addNewForm__edit--input--email" type="email" name="email" id="email" placeholder="Add new Mail adress." autocomplete="off">
            </div>
            <div class="addNewForm__edit--tmp addNewForm__edit--flex--right">
              <label for="prof-image">Image</label>
              <img class="profImg-preview" src="/images/image.png" width="181px" height="136px">
              <input type="file" name="image" id="prof-image" accept="image" class="prof-image">
              <label for="prof-image" class="edit-uploadImg-btn">Upload image</label>
            </div>
            <div class="addNewForm__edit--tmp">
              <label for="">Categories  <span class="form-required">*必須</span></label>
              <div class="addNewForm__edit--tmp--category" id="prof-Category-js">
                @foreach($categories as $category)
                  <div class="category-btn-selectbox">
                    <input type="checkbox" id="{{$category->id}}" name="teacher_category[]" value="{{$category->category}}">
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
                <span>新規教員追加のヒント</span>
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
                <input type="submit" name="submit" form="addProf_form" value="Submit" id="addProf_submit" disabled>
              </div>
            </div>
          </div>
        </div>
      </div><!-- addNewForm -->