<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aplikasi Manajemen Inventory Gudang | Login</title>

    <!-- Bootstrap -->
    <link href="{{ URL::asset("vendors/bootstrap/dist/css/bootstrap.min.css") }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset("vendors/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset("vendors/nprogress/nprogress.css") }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset("vendors/animate.css/animate.min.css") }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset("build/css/custom.min.css") }}" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ url('/login')}}">
              {{ csrf_field() }}
              <h1>Login Form</h1>
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <i> {{ $errors->first('username') }}</i>
                </div>
              @endif
              <div class="form-group">
                <input name="username" type="text" class="form-control {{ $errors->has('username') ? 'has-errors' : ''}}" placeholder="Username" required="" />
              </div>
              <div class="form-group">
                <input name="password" type="password" class="form-control {{ $errors->has('password') ? 'has-errors' : ''}}" placeholder="Password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" name="button">Log in</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
