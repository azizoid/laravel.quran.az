<?php
$metaAze    = Config::get('quranmeta.aze');
$metaRus    = Config::get('quranmeta.rus');
$translators= Config::get('quranmeta.translators');

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
                <li class="nav-item"><a href="{{ url('/', [$data['soorah']]) }}" class="nav-link active">{{ $metaAze[$data['soorah']] }}</a></li>

                @foreach($translators as $k=>$v)
                    <li class="nav-item">
                    <a href="{{ url('/', [$data['soorah'], 't'.$k]) }}" class="nav-link <?php if($k==$data['translator']) echo 'disabled"';?>">{{ $v }}</a>
                    </li>
                @endforeach
            </ul>
        </td>
        <td>&nbsp;</td>
    </tr>
    </thead>
	<tbody>
        @if ($data['soorah'] != 9)
        <tr><td>&nbsp;</td><td><h2 class="text-center">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</h2></td><td>&nbsp;</td></tr>
        @endif

        @foreach($out as $v)
        <tr id="{{ $v->aya_id }}">
          <td class="text-right">{{ $v->aya_id }}</td>
          <td>{{ $v->content }} <a href="{{ url('/', [$v->soorah_id, $v->aya_id, 't'.$v->translator_id ]) }}" title="{{ $v->content }}"><i class="fas fa-link"></i></a></td>
          <td>&nbsp;</td>
        </tr>
        @endforeach

    </tbody>
</table>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
@else
@include('empty')
@endif

@endsection
