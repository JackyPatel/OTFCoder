<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} | Register</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ Html::style('theme/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('theme/css/main.css') }}
    {{ Html::style('theme/css/skin/green-w.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('css/AdminLTE.min.css') }}
    {{ Html::style('theme/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('css/ionicons.min.css') }}
    {{ Html::style('theme/toster/toster.min.css') }}
</head>
<body class="hold-transition register-page">
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>

    <section class="login-content">
        <!-- <div class="logo text-center"><img src="{{ asset('img/app-logo.png') }}" height="70" alt=""> -->
        <h4 class="text-white register-logo">Register</h4>
        </div>
        <div class="register-box-body">

            {{ Form::open(['route'=>'register','id'=>'login_form','class'=>'login-form', 'files' => true]) }}
                <h3 class="login-head">SIGN UP</h3>

                <div class="form-group">
                    <div class="field" align="left">
                      <h3>Upload Profile</h3>
                      {{ Form::file('profile_pic', ['id' => 'imgInp']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    {{ Form::text('first_name',null,['placeholder'=>'First Name', 'class'=>'form-control', 'required']) }}
                    @if($errors->has('first_name'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    {{ Form::text('last_name',null,['placeholder'=>'Last Name', 'class'=>'form-control', 'required']) }}
                    @if($errors->has('last_name'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    {{ Form::text('email',null,['placeholder'=>'Email Id', 'class'=>'form-control', 'required']) }}
                    @if($errors->has('email'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    {{ Form::password('password',['class'=>'form-control','placeholder'=>"Password", 'required']) }}
                    @if($errors->has('password'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                    {{ Form::password('password_confirmation',['class'=>'form-control','placeholder'=>"Confirm Password"]) }}
                </div>
                <div class="form-group">
                    <label class="control-label">Phone</label>
                    {{ Form::text('phone',null,['placeholder'=>'Phone', 'class'=>'form-control']) }}
                    @if($errors->has('phone'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <div class="utility">
                        <p class="semibold-text mb-0"><a href="{{ route('login') }}">Sign In ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block">SIGN UP <i class="fa fa-sign-in fa-lg"></i></button>
                </div>
            {{ Form::close() }}
        </div>
    </section>

    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('theme/js/bootstrap.min.js') }}
    {{ Html::script('js/main.js') }}
    {{ Html::script('theme/toster/toster.min.js') }}
    {{ Html::script('theme/js/main.js') }}
    <script>
        $('form').submit(function() {
            $('#signin').html('<i class="fa fa-lg fa-pulse fa-fw fa-spinner"></i> Signing in...').prop('disabled',true);
        }); 
    </script>
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
                    "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
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
</body>
</html>