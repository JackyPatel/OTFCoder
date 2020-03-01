@section('style_toster')
	<?= Html::style('theme/toster/toster.min.css') ?>
@stop
@section('script_toster')
	<?= Html::script('theme/toster/toster.min.js') ?>
@stop
@if(Session::has('message'))
	@if(Session::get('message_type'))
		<script>
	        $(document).ready(function(){
		        toastr.{{ Session::get('type') }}
		        ('{{ Session::get('message') }}');
	        });
	    </script>
    @endif
@endif