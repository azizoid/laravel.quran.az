<?php
$metaAze    = Config::get('quranmeta.aze');
$metaRus    = Config::get('quranmeta.rus');
$translators= Config::get('quranmeta.translators')
?>

@extends('app')

@section('content')

@if ($out->count())
<div class="row">

<table id="quran" class="table table-striped table-borderless">
    <thead>
        <tr>
            <td colspan="2">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item"><a href="{{ url('/', [$data['soorah']]) }}/{{ 't'.$data['translator'].'#'.$data['ayah'] }}" class="nav-link active">{{ $metaAze[$data['soorah']] }}</a></li>

                    @foreach($translators as $k=>$v)
                        <li class="nav-item">
                        <a href="{{ url('/', [$data['soorah'], $data['ayah'], 't'.$k]) }}" class="nav-link <?php if($k==$data['translator']) echo 'disabled"';?>">{{ $v }}</a>
                        </li>
                    @endforeach
                </ul>
            </td>
        </tr>
    </thead>

	<tbody>
        <tr>
            <td>&nbsp;</td>
            <td><h2 class="text-center">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</h2></td>
        </tr>

        @foreach($out as $v)
    	<tr id="ayaRow<?=$v->aya_id;?>" rel="tooltip">
    		<td>{{ $v->soorah_id.':'.$v->aya_id }}</td>
            <td><div class="ayaText">{{ $v->content }}</div></td>
    	</tr>
        <tr>
            <td>&nbsp;</td>
            <td style="font-size:1.25em">{{ $detail->transliteration }}</td>
        </tr>
        <tr>
            <td colspan="2" style="padding:2em"><h2 class="text-right arabic"><article>{{ $detail->content }}</article></h2></td>
        </tr>
		@endforeach
	</tbody>
    <tfoot>
    <tr>
      <td colspan="2">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled"><span class="page-link">Digər ayələr</span></li>
@if(!empty($nav['prev']))
            <li class="page-item">
              <a href="{{ url('/', [$data['soorah'], $nav['prev'], 't'.$data['translator']]) }}" class="page-link">{{ $nav['prev']}}</a>
            </li>
          @endif
            <li class="page-item disabled"><a href="#" class="page-link">{{ $data['ayah'] }}</a></li>
          @if(!empty($nav['next']))
            <li class="page-item">
              <a href="{{ url('/', [$data['soorah'], $nav['next'], 't'.$data['translator']]) }}" class="page-link">{{ $nav['next'] }}</a></li>
          @endif
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

</div>
@else
@include('empty')
@endif

@endsection
