@extends('layouts.template')

@section('content')

<div class="listClass">
    <div class="listClass__header">
      <table class="listClass__header--table">
        <tr>
          <th class="class-num">クラスID</th>
          <th class="class-name">授業科目</th>
          <th class="class-prof">担当教員</th>
          <th class="class-category">カテゴリ</th>
        </tr>
      </table>
    </div>
    <div class="listClass__mainTable">
      <table class="listClass__mainTable__list">
        <!--@foreach($classes as $class)-->
        @if ($class->archive_class == "1")
          <tbody class="listClass__mainTable__list--each">
            <tr class="list-href" data-href="{{ route('show_class_archive',['id' => $class->id])}}">
              <td class="class-num-get">
                <div>
                  @if ($class->class_num == null)
                  未登録
                  @else
                    {{$class->class_num}}
                  @endif
                </div>
              </td>
              <td class="class-name-get">
                <div>
                  @if ($class->class_name == null)
                  未登録
                  @else
                    {{$class->class_name}}
                  @endif
                </div>
              </td>
              <td class="class-prof-get">
                <div>
                   @if ($class->name == null)
  	              未登録
  	              @else
                    {{$class->name}}
                  @endif
                </div>
              </td>
              <td class="class-category-get">
                <div>
                  @if ($class->category == null)
                  未登録
                  @else
                    {{$class->category}}
                  @endif
                </div>
              </td>
            </tr>
          </tbody>
        @endif
        
        <!--@endforeach-->
      </table>
    </div>
  </div>
  
@endsection