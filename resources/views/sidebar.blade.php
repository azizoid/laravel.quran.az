<?php
$rnd = Cache::remember('randomAya', 15, function(){
  return DB::table('qurans')
            ->select('id', 'soorah_id', 'aya_id', 'translator_id', 'content')
            ->where('translator_id', '<>', 3)
            ->inRandomOrder()
            ->first();
});
if($rnd->translator_id==3){
  $metaFull = Config::get("quranmeta.rus.{$rnd->soorah_id}");
}else{
  $metaFull = Config::get("quranmeta.aze.{$rnd->soorah_id}");
}
?>

<div class="card">
  <div class="card-header">NAMAZ TƏQVİMİ</div>
  
  <div class="card-body text-center">
    <h6 class="card-title">www.<a href="https://nam.az" class="btn btn-danger" target="_blank">NAM.AZ</a></h6>
  </div>
  
</div>

<hr/>

<div class="card">
  <div class="card-header">BİR AYƏ</div>
  
  <div class="card-body">
    <h6 class="card-title text-muted">{{ $metaFull }}, {{ $rnd->aya_id }}</h6>
    <h6 class="card-title"><a href="{!! url('/', [$rnd->soorah_id, 't'.$rnd->translator_id]) !!}?rnd#{{ $rnd->aya_id }}">{{ $rnd->content }}</a></h6>
  </div>
  
</div>

<hr/>

<div class="card panel-primary">
  <div class="card-body">
    <div class="sharethis-inline-share-buttons"></div>
  </div>
</div>

<hr/>

<div class="card">
  <div class="card-header">BİZƏ QOŞUL</div>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=10177953140";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <div class="fb-page" data-href="https://www.facebook.com/quranaz/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/quranaz/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/quranaz/">quran.az</a></blockquote></div>
</div>