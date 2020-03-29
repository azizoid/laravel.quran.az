<?php

$prayer = Cache::remember('PrayerTimes', 360, function(){

	$where = [
		'year'	=> date('Y'),
		'month'	=> date('n'),
		'day'	=> date('j'),
	];
  return DB::table('namaz')
            ->select('*')
            ->where($where)->first();
});
setlocale(LC_ALL, 'az-Latn-AZ.UTF-8');
date_default_timezone_set('Asia/Baku');
?>


<div class="d-none d-sm-block" id="app">
  <table class="table table-borderless table-sm">
    <thead class="table-dark"><tr><td align="center" colspan="4">Baki, {{ strftime("%e %B %Y") }}</td></tr></thead>
    <tbody>
    <tr>
      <td align="right">{{ $prayer->fajr }}</td>
      <td>Sübh</td>

      <td align="right">{{ $prayer->sunrise }}</td>
      <td>Günəş</td>      
    </tr>
    <tr>
      <td align="right">{{ $prayer->zuhr }}</td>	
      <td>Zöhr</td>
	  
      <td align="right">{{ $prayer->asr }}</td>	
      <td>Əsr</td>
    </tr>
    <tr>
      <td align="right">{{ $prayer->magrib }}</td>
      <td>Məğrib</td>
    
      <td align="right">{{ $prayer->isha }}</td>
      <td>İşa</td>
    </tr>
    </tbody>
  </table>
</div>