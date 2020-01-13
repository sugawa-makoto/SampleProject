@extends('layouts.common')
<!-- cssの追加 -->
@section('css')

@endsection
<!-- コンテンツ領域 -->
@section('content')
<div class="all_wrapper_shift">
	<table>
		<tr>
			<th>日付/氏名</th>
			@foreach($calendar as $c)
				<th>{{$c->today_youbi}}</th>
			@endforeach
		</tr>
		@foreach($calendar as $c)
		<tr>
			<td><a href="shift_detail/{{$c->id}}">ココにスタッフの名前の配列を入れる</a></td>
			@foreach($calendar as $c)
				<td><a href="shift_detail/{{$c->id}}">ココに時間表示が入ってくる</a></td>
			@endforeach
		</tr>
		@endforeach
	</table>
</div>



<table border="1" cellspacing="1" cellpadding="3">
<caption>秋の中間テスト結果</caption>
<colgroup>
<col style="width: 150px">
<col span="3" style="width: 100px">
</colgroup>
<tbody>
<tr><th>氏名</th><th>国語</th><th>理科</th><th>社会</th></tr>
<tr><td>山田　太郎</td><td>98</td><td>62</td><td>87</td></tr>
<tr><td>鈴木　花子</td><td>85</td><td>71</td><td>58</td></tr>
<tr><td>斉藤　一郎</td><td>66</td><td>65</td><td>52</td></tr>
</tbody>
</table>
@endsection
