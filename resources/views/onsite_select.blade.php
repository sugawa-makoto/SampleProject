@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="all_wrapper_onsite">
	<div class="wrapper_main_onsite">
		<div class="wrapper_select_button_onsite">
			<a href="/onsite_form" class="new_work_input_button">新規作業登録</a>
			<a href="/onsite_list" class="new_work_input_button">作業一覧</a>
		</div>
	</div>
</div>
@endsection
