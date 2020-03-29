<?php
$rnd = Cache::remember('randomAya', 15, function(){
  return DB::table('qurans')->select('id', 'soorah_id', 'aya_id', 'translator_id', 'content')->inRandomOrder()->first();
});
?>

<div class="card">
  <div class="card-header">BİR AYƏ</div>
  <div class="card-body">
    <h6 class="card-title text-muted">{{ $rnd->content }}</h6>
  </div>
  <div class="card-footer text-right"><a href="{!! url('/', [$rnd->soorah_id, 't'.$rnd->translator_id]) !!}?rnd#{{ $rnd->aya_id }}">Surə {{ $rnd->soorah_id }}, ayə {{ $rnd->aya_id }}</a></div>
</div>

<hr/>

<div class="card">
  <div class="card-body">

  </div>
</div>

<hr/>

<div class="card">
  <div class="card-header">BİZƏ QOŞUL</div>
  
</div>