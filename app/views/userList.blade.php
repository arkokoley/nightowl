<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>NightOwl | Users</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" media="screen" href="/css/main.css">
    <link rel="stylesheet" media="screen" href="/css/bootstrap.css">

    <!-- Favicon-->
    <link rel="shortcut icon" type="image/png" href="favicon.png">

    <!-- Javascript -->
    <script src="/js/jquery-2.js" type="text/javascript"></script>
    <script src="/js/bootstrap.js" type="text/javascript"></script>
    <script src="/js/hello.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="container-fluid" id="main-container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3">

          <div id="header" class="row text-center">
            <h1 id="site-logo">
              <a href="/">NightOwl</a>
            </h1>
          </div>

          <div id="flash">


          </div>

          <div class="row" id="main-content">
            <div class="col-md-12">
@if ($errors->any())
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{ implode('', $errors->all(message)) }}
</div>
@endif

@if (Session::has('message'))
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <p>{{ Session::get('message') }}</p>
</div>
@endif

  <hr>

  <div class="thought-list row">
    <div class="col-md-10 col-md-offset-1">
        @foreach($users as $user)
      <div class="thought ">
        <div class="thought-content text-center">
          <a href="<?php echo URL::to('/'.$user->username); ?>">{{ $user->username }}</a>
        </div>
      </div>
        @endforeach
    </div>
  </div>

  <hr>


          <div class="row" id="site-footer">
            <div class="col-md-12">
              <hr>
              <span>
                <a href="<?php echo URL::to('/about'); ?>">About</a>
              </span>
              <span>
                <a href="<?php echo URL::to('/blog'); ?>" target="_blank">Blog</a>
              </span>
            </div>
          </div>

        </div>
      </div>
    </div>


</body></html>