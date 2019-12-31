@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="all_wrapper_record">
	<table>
		<tr>
			<th>日付</th>
			<th>祝日</th>
			<th>出勤時間</th>
			<th>退勤時間</th>
		</tr>
		@foreach($calendar as $c)
		<tr>
			<td>{{$c->today_youbi}}</td>
			<!-- <td>{{$c->youbi}}</td> -->
			@foreach($yasumi as $y)
				@if($c->today === $y->yasumi_day)
					<td>{{$y->yasumi_name}}</td>
					@break
				@elseif($loop->last && $c->today !== $y->yasumi_day)
					<td></td>
				@endif
			@endforeach
			@foreach($working_days as $v)
				@if($c->today === $v->today)
					<td>{{$v->start_time}}</td>
					<td>{{$v->end_time}}</td>
					@break
				@elseif($loop->last && $v->today !== $c->today)
					<td></td>
					<td></td>
				@endif
			@endforeach
		</tr>
		@endforeach
	</table>
</div>
@endsection
