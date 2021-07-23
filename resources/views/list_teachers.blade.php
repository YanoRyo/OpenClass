@extends('layouts.template')

@section('content')



  <div class="listProf">
    <div class="listProf__header">
      <table class="listProf__header--table">
        <tr>
          <th class="prof-name">教員名</th>
          <th class="prof-email">連絡用メールアドレス</th>
          <th class="prof-category">担当カテゴリ</th>
        </tr>
      </table>
    </div>
    <div class="listProf__mainTable">
      <table class="listProf__mainTable__list">
        @foreach($teachers as $teacher)
        <tbody class="listProf__mainTable__list--each">
          <tr class="list-href" data-href="{{ route('show_teacher',['id' => $teacher->id])}}">
            <td class="prof-name-get">
              <div>
                @if ($teacher->name == null)
                未登録
                @else
                  {{$teacher->name}}
                @endif
              </div>
            </td>
            <td class="prof-email-get">
              <div>
                @if ($teacher->email == null)
                未登録
                @else
                  {{$teacher->email}}
                @endif
              </div>
            </td>
            <td class="prof-category-get">
              <div>
                @if ($teacher->teacher_category == null)
	              未登録
	              @else
                  {{$teacher->teacher_category}}
                @endif
              </div>
            </td>
          </tr>
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
  
  




@endsection