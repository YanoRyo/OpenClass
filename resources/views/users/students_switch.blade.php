
  <div class="switchBlockPC">
	<div @php
	$now_route = \Route::currentRouteName();
	if($now_route == "users.studentsClass_show" || $now_route == ".users.studentsClass"){
		echo'class="switchBlockPC__btn switchBlockPC__btn--left switchBlockPC__btn--active"';
	}else{
		echo'class="switchBlockPC__btn switchBlockPC__btn--left"';
	}
	@endphp>
	  <span>Classes</span>
	</div>
	<div @php
	$now_route = \Route::currentRouteName();
	if($now_route == "users.studentsTeacher" || $now_route == "users.studentsTeacher_show"){
		echo'class="switchBlockPC__btn switchBlockPC__btn--right switchBlockPC__btn--active"';
	}else{
		echo'class="switchBlockPC__btn switchBlockPC__btn--right"';
	}
	@endphp>
	  <span>Professors</span>
	</div>
  </div>