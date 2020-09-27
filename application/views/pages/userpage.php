<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pemasangan Reklame</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('vendor2/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('vendor2/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="<?= base_url('vendor2/'); ?>vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url('vendor2/'); ?>https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('vendor2/'); ?>css/landing-page.min.css" rel="stylesheet">
  <style>
    @-webkit-keyframes placeHolderShimmer {
      0% {
        background-position: -468px 0;
      }
      100% {
        background-position: 468px 0;
      }
    }

    @keyframes placeHolderShimmer {
      0% {
        background-position: -468px 0;
      }
      100% {
        background-position: 468px 0;
      }
    }

    .content-placeholder {
      display: inline-block;
      -webkit-animation-duration: 1s;
      animation-duration: 1s;
      -webkit-animation-fill-mode: forwards;
      animation-fill-mode: forwards;
      -webkit-animation-iteration-count: infinite;
      animation-iteration-count: infinite;
      -webkit-animation-name: placeHolderShimmer;
      animation-name: placeHolderShimmer;
      -webkit-animation-timing-function: linear;
      animation-timing-function: linear;
      background: #f6f7f8;
      background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee));
      background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
      background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
      -webkit-background-size: 800px 104px;
      background-size: 800px 104px;
      height: inherit;
      position: relative;
    }

    .post_data
    {
      padding:24px;
      border:1px solid #f9f9f9;
      border-radius: 5px;
      margin-bottom: 24px;
      box-shadow: 10px 10px 5px #eeeeee;
    }
  </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Pajak Reklame</a>
      <a class="btn btn-info" href="<?= base_url('Public_site/daftar_sewa');?>">Daftar Sewa Reklame</a>
      <a class="btn btn-primary" href="<?= base_url('Public_site/form_login');?>">Masuk</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Daftar sekarang untuk melakukan pemasangan reklame!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <a href="<?= base_url('Public_site/registrasi');?>">
              <button type="submit" class="btn btn-block btn-lg btn-primary">Daftar Sekarang</button>
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Layanan Cepat</h3>
            <p class="lead mb-0">Pelayanan Cepat Dan Ramah</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Terjangkau</h3>
            <p class="lead mb-0">Harga Terjangkau Dengan Pajak Minimal</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary"></i>
            </div>
            <h3>Strategis</h3>
            <p class="lead mb-0">Tempat - Tempat Strategis Menjadi Target Utama</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="container">
        <div id="load_data"></div>
        <div id="load_data_message"></div>
      </div>

      <!--<div class="row no-gutters">

        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('<?= base_url('vendor2/'); ?>img/r1.png');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Reklame</h2>
          <p class="lead mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('<?= base_url('vendor2/'); ?>img/bg-masthead.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>Reklame</h2>
          <p class="lead mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('<?= base_url('vendor2/'); ?>img/r3.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>Reklame</h2>
          <p class="lead mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        </div>
      </div>
    </div>-->
  </section>

  <!-- Testimonials -->
  <hr/><hr/>

  <!-- Call to Action -->
  <!--<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ready to get started? Sign up now!</h2>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
              </div>
              <div class="col-12 col-md-3">
                <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>-->

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('vendor2/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('vendor2/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function(){

      var limit = 7;
      var start = 0;
      var action = 'inactive';

      function lazzy_loader(limit)
      {
        var output = '';
        for(var count=0; count<limit; count++)
        {
          output += '<div class="post_data">';
          output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
          output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
          output += '</div>';
        }
        $('#load_data_message').html(output);
      }

      lazzy_loader(limit);

      function load_data(limit, start)
      {
        $.ajax({
          url:"<?php echo base_url(); ?>Public_site/fetch",
          method:"POST",
          data:{limit:limit, start:start},
          cache: false,
          success:function(data)
          {
            if(data == '')
            {
              $('#load_data_message').html('<p>No More Result Found</p>');
              action = 'active';
            }
            else
            {
              $('#load_data').append(data);
              $('#load_data_message').html("");
              action = 'inactive';
            }
          }
        })
      }

      if(action == 'inactive')
      {
        action = 'active';
        load_data(limit, start);
      }

      $(window).scroll(function(){
        if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
        {
          lazzy_loader(limit);
          action = 'active';
          start = start + limit;
          setTimeout(function(){
            load_data(limit, start);
          }, 1000);
        }
      });

    });
  </script>
</body>

</html>
