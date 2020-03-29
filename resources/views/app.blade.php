<!DOCTYPE html>
<html lang="az">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    {!! SEO::generate(true) !!}
    <meta property="fb:app_id" content="10177953140" />

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WZ9GX3M');</script>
    <!-- End Google Tag Manager -->

    <link rel="stylesheet" href="/css/app.css" />
  </head>

  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WZ9GX3M"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light " style="background-color: #e3f2fd;">
      <div class="container ">
        <div class="d-flex justify-content-between">
          <a href="/" class="navbar-brand d-flex align-items-center text-muted">Quran.az</a>
        </div>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a href="http://azerislam.com/index.php?lngs=aze&cats=2" class="nav-link" target="_blank">Yazılar</a>
            </li>
            <li class="nav-item">
              <a href="https://www.nam.az" class="nav-link" target="_blank">Nam.az <span class="badge badge-danger">yeni</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="clearfix" id="ornament">&nbsp;</div>

    <div class="container"><div class="row">
      <div class="col-sm-7">@include('form')</div>
      <!-- <div class="col-sm-4">@include('nmz')</div> -->
      <div class="col-sm-4">
          <div class="d-none d-sm-block" id="prayer">
            <Namaz v-bind:prayers="prayers,location,tarix" />
          </div>
      </div>

      <article class="col-sm-12 col-md-7"><br/>@yield('content')</article>

      <sidebar class="col-sm-12 col-md-4"><br/>@include('sidebar')</sidebar>
      
    </div></div>

    <div class="clearfix"><br/><br/><br/></div>
    <footer class="footer">
      <div class="container text-muted">
        &copy; 2003-<?=date('Y');?> &nbsp;/&nbsp;
        <a href="https://www.quran.az">Quran.az</a> &nbsp;/&nbsp;
        <a href="https://www.nam.az">Nam.az</a> &nbsp;/&nbsp;
      </div>
    </footer>

    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>
