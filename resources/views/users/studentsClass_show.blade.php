

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>OpenClass.</title>
<link rel="icon" href="/images/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link href="{{ asset('css/usersMaster.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
<!--<script src="node_modules/chartjs/dist/Chart.js"></script>-->

</head>
<body>
  <!--@foreach($classes as $class)-->


<!--@endforeach-->
    <div class="StdTemp">
    <div class="headerBlock">
      <div class="headerBlock__logo">
        <img src="/images/users/logo_students.png" alt="">
      </div>
      <div class="headerBlock__opt">
        <div class="headerBlock__opt--each">
          <img src="/images/users/Heart-w.png" alt="">
        </div>
        <div class="headerBlock__opt--each">
          <img src="/images/users/Profile-w.png" alt="">
        </div>
      </div>
    </div>
    <div class="categoryBlock">

    </div>
    <div class="mainBlock">
      <div id="ClassProf-detail">
        <div class="detail__infoPC">
          <div class="detail__infoPC--image">
            @if($class->image == null)
            <img src="{{ asset('images/null_image.png') }}" alt="">
            @else
            <img src="{{ asset($class->image) }}" alt="">
            @endif
          </div>
          <div class="detail__infoPC--data">
            <div class="detail__infoPC--data--ttl">
              <div class="detail__infoPC--data--ttl--pentagon  detail__pentagon--js">
                <div class="data-average" hidden>
                  @foreach($datas as $data)
                  <div class="data-average-each">
                    <span class="data-average-each-1">{{$data->que_1}}</span>
                    <span class="data-average-each-2">{{$data->que_2}}</span>
                    <span class="data-average-each-3">{{$data->que_3}}</span>
                    <span class="data-average-each-4">{{$data->que_4}}</span>
                    <span class="data-average-each-5">{{$data->que_5}}</span>
                  </div>
                  @endforeach
                </div>
                <span class='evaluation-js'>???</span>
              </div>
              <div class="detail__infoPC--data--ttl--name">
                <span>{{$class->class_name}}</span>
              </div>
            </div>
            <div class="detail__infoPC--data--category">
              @foreach($categories as $category)
              <span>{{$category}}</span>
              @endforeach
            </div>
            <div class="detail__infoPC--data--inCharge">
              <span>???????????????</span><span class="name-inCharge">{{$class->name}}</span>
            </div>
          </div>
        </div>
        <div class="detail__infoSP">
          <div class="detail__infoSP--img">
            @if($class->image == null)
            <img src="{{ asset('images/null_image.png') }}" alt="">
            @else
            <img src="{{ asset($class->image) }}" alt="">
            @endif
          </div>
          <div class="detail__infoSP--ttl">
            <div class="detail__infoSP--ttl--pentagon detail__pentagon--js">
                <div class="data-average" hidden>
                  @foreach($datas as $data)
                  
                  <div class="data-average-each">
                    <span class="data-average-each-1">{{$data->que_1}}</span>
                    <span class="data-average-each-2">{{$data->que_2}}</span>
                    <span class="data-average-each-3">{{$data->que_3}}</span>
                    <span class="data-average-each-4">{{$data->que_4}}</span>
                    <span class="data-average-each-5">{{$data->que_5}}</span>
                  </div>
                  
                  @endforeach
                </div>
              <span class="evaluation-js">???</span>
            </div>
            <div class="detail__infoSP--ttl--name">
              <span>{{$class->class_name}}</span>
            </div>
          </div>
          <div class="detail__infoSP--category">
            @foreach($categories as $category)
            <span>{{$category}}</span>
            @endforeach
          </div>
          <div class="detail__infoSP--inCharge">
            <span>???????????????</span><span class="name-inCharge">{{$class->name}}</span>
          </div>
        </div>
        <div class="detail__value">
          <div class="detail__value--top">
            <span>???????????????
              <div class="detail__pentagon--js" style="display:inline">
                <div class="data-average" hidden>
                  @foreach($datas as $data)
                  
                  <div class="data-average-each">
                    <span class="data-average-each-1">{{$data->que_1}}</span>
                    <span class="data-average-each-2">{{$data->que_2}}</span>
                    <span class="data-average-each-3">{{$data->que_3}}</span>
                    <span class="data-average-each-4">{{$data->que_4}}</span>
                    <span class="data-average-each-5">{{$data->que_5}}</span>
                  </div>
                  
                  @endforeach
                </div>
              <span class="evaluation-js">???</span>
            </div>
            </span>
          </div>
          <div class="detail__value--graph">
            <div class="detail__value--graph--pentagon">
              <div class="canvas" data-classid="5"> 
                    <canvas id="myRaderChart5" style="width:350px; height:250px;"></canvas>
                    <div class="data-average" hidden>
                      @foreach($datas as $data)
                      @if($data->class_id == $class->id)
                      <div class="data-average-each">
                        <span class="data-average-each-1">{{$data->que_1}}</span>
                        <span class="data-average-each-2">{{$data->que_2}}</span>
                        <span class="data-average-each-3">{{$data->que_3}}</span>
                        <span class="data-average-each-4">{{$data->que_4}}</span>
                        <span class="data-average-each-5">{{$data->que_5}}</span>
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
            </div>
            <div class="detail__value--graph--question">
              <div class="easy-mark">
                <div class="mark">
                  <span>?</span>
                </div>
                <span>Question</span>
              </div>
              <ol>
                
                <li>?????????????????????????????????????????????????????????</li>
                <li>??????????????????????????????????????????????????????????????????????????????????????????</li>
                <li>????????????????????????????????????????????????????????????????????????????????????</li>
                <li>????????????????????????????????????</li>
                <li>???????????????????????????????????????????????????????????????????????????????????????????????????</li>
              </ol>
            </div>
          </div>
          <div class="detail__value--comment">
            <span>????????????1</span>
            <div class="detail__value--comment--list">
              <ul>
                @foreach($datas as $data)
                @if($data->if_text1 == null or $data->if_text2 == null)
                
                @else
                <li class="detail__value--comment--list--each">{{$data->if_text1}}?????????????????????{{$data->if_text2}}????????????</li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
          <div class="detail__value--comment">
            <span>????????????2</span>
            <div class="detail__value--comment--list">
              <ul>
                @foreach($datas as $data)
                @if($data->better_text == null)
                
                @else
                <li class="detail__value--comment--list--each">{{$data->better_text}}?????????????????????????????????</li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
          <div class="detail__value--comment">
            <span>???????????????</span>
            <div class="detail__value--comment--list">
              <ul>
                @foreach($datas as $data)
                @if($data->comment == null)
                

                @else
                <li class="detail__value--comment--list--each">{{$data->comment}}</li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="rankBlock">
      <!-- PC???????????????????????? -->
    </div>
  </div>
  
  @include('users.students_switch')
  <div class="searchBlock">
        <img src="/images/users/openclassLogo.png" alt="">
  </div>
                
               

</body>
</html>


