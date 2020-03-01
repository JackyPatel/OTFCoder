<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME') }} | Log in</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    {{ Html::style('theme/plugins/bootstrap/css/bootstrap.min.css') }}
    {{ Html::style('theme/css/main.css') }}
    {{ Html::style('theme/css/skin/green-w.css') }}
    {{ Html::style('css/style.css') }}
    {{ Html::style('theme/plugins/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('css/ionicons.min.css') }}
    {{ Html::style('theme/toster/toster.min.css') }}
</head>
<body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>

    <section class="login-content">
        <div class="logo text-center"><img src="{{ asset('img/app-logo.png') }}" height="70" alt="">
        <h4 class="text-white">Login</h4>
        </div>
        <div class="login-box">

            {{ Form::open(['route'=>'login','id'=>'login_form','class'=>'login-form']) }}
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
                <div class="form-group">
                    <label class="control-label">USERNAME</label>
                    {{ Form::text('email',null,['placeholder'=>'Email Id', 'class'=>'form-control']) }}
                    @if($errors->has('email'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">PASSWORD</label>
                    {{ Form::password('password',['class'=>'form-control','placeholder'=>"Password"]) }}
                    @if($errors->has('password'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="utility">
                        <!-- <div class="animated-checkbox">
                            <label class="semibold-text">
                                <input type="checkbox"><span class="label-text">Stay Signed in</span>
                            </label>
                        </div> -->
                        <p class="semibold-text mb-0"><a href="{{ route('register') }}">Sign Up ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block">SIGN IN <i class="fa fa-sign-in fa-lg"></i></button>
                </div>
            {{ Form::close() }}
        </div>
    </section>

    {{ Html::script('js/jquery.min.js') }}
    {{ Html::script('backend/js/bootstrap.min.js') }}
    {{ Html::script('js/main.js') }}
    {{ Html::script('backend/toster/toster.min.js') }}
    {{ Html::script('backend/js/main.js') }}
    <script>
        $('form').submit(function() {
            $('#signin').html('<i class="fa fa-lg fa-pulse fa-fw fa-spinner"></i> Signing in...').prop('disabled',true);
        }); 
    </script>
</body>
</html>