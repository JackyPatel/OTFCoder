@extends('layouts.app')
@section('title', '| Update User')
@section('content')
<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-user-plus'></i> Update {{$user->first_name}} @if($user['profile_pic'] != '')
            <img src="{{ asset('uploads/users').'/'.$user['profile_pic'] }}" height='100' width='100' />
          @endif</h1>
    <hr>
    {{ Form::model($user, array('route' => array('update.profile'), 'method' => 'POST', 'files' => true)) }}
    {{ Form::hidden('id', $user['id']) }}
    <div class="form-group @if ($errors->has('first_name')) has-error @endif">
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group @if ($errors->has('last_name')) has-error @endif">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group @if ($errors->has('email')) has-error @endif">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        <div class="field" align="left">
          <h3>Upload Profile</h3>
          {{ Form::file('profile_pic', ['id' => 'imgInp']) }}
        </div>
    </div>
    <div class="form-group @if ($errors->has('phone')) has-error @endif">
        {{ Form::label('phone', 'Phone') }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>
    
    {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>
@endsection
@section('style')
    { Html::style('theme/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('theme/css/main.css') }}
    {{ Html::style('theme/css/skin/green-w.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/AdminLTE.min.css') }}
    {{ Html::style('theme/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('css/ionicons.min.css') }}
    {{ Html::style('theme/toster/toster.min.css') }}
    <style type="text/css">
        input[type="file"] {
          display: block;
        }
        .imageThumb {
          max-height: 75px;
          border: 2px solid;
          padding: 1px;
          cursor: pointer;
        }
        .pip {
          display: inline-block;
          margin: 10px 10px 0 0;
        }
        .remove {
          display: block;
          background: #444;
          border: 1px solid black;
          color: white;
          text-align: center;
          cursor: pointer;
        }
        .remove:hover {
          background: white;
          color: black;
        }
    </style>
@endsection
@section('script')
    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('theme/js/bootstrap.min.js') }}
    {{ Html::script('js/main.js') }}
    {{ Html::script('theme/toster/toster.min.js') }}
    {{ Html::script('theme/js/main.js') }}
    <script type="text/javascript">
        $(document).ready(function() {
            $("#imgInp").change(function() {
              readURL(this);
            });

            function readURL(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                  var file = e.target;
                  $("<span class=\"pip\">" +
                    "<img height=150 width=150 class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "<br/><span class=\"remove\">Remove image</span>" +
                    "</span>").insertAfter("#imgInp");
                  $(".remove").click(function(){
                    $(this).parent(".pip").remove();
                    $('#imgInp').val("");
                  });
                }
                
                reader.readAsDataURL(input.files[0]);
              }
            }
        });
    </script>
@endsection