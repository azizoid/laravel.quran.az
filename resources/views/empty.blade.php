@extends('app')

@section('content')

<div class="clearfix">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center">
      <li class="breadcrumb-item active">Oxu:</li>
      <li class="breadcrumb-item "><a href="/36">Ya-sin surəsi</a></li>
      <li class="breadcrumb-item "><a href="/55">Ər-Rəhman surəsi</a></li>
      <li class="breadcrumb-item "><a href="/67">Əl-Mülk surəsi</a></li>
      <li class="breadcrumb-item "><a href="/2/255">Ayətul-Kürsi</a></li>
    </ol>
  </nav>

</div>

<div class="clearfix">

  <h6 class="alert alert-danger">
    {{ $data['query'] }} kəlməsi tapılmayıb
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </h6>
  <h5 class="alert alert-success text-right">Axtarışınızın <strong>uğurlu</strong> olması üçün aşağıdakı <strong>qaydalara</strong> riayət edin</h5>

  <table class="" cellpadding="10">
    <tr>
      <td></td>
      <td>Saytdan istifadə qaydaları: <code>quran.az/96/1</code></td>
    </tr>
    <tr>
      <td class="text-right align-top">Hərf səhvləri: </td>
      <td>Axtarış zamanı etdiyiniz qrammatik səhvlər sözlərin tapılmamasına səbəb ola bilər: <br/>Məsələn: <code>mekke</code> əvəzinə <code>Məkkə</code> sözünü axtarın</td>
    </tr>
    <tr>
      <td class="text-right align-top">Fərqli söz və kəlmələr:</td>
      <td>Axtardığınız fikir tərcümədə olmaya bilər: <br/>Əlbəttə ki <code>namazı necə qılmaq lazımdır</code> cümləsi tərcümədə rast gəlinmir;</td>
    </tr>
    <tr>
      <td>Fərqli tərcümələr:</td>
      <td>Müəlliflərdən qaynaqlanaraq tərcümələrdəki sözlər və fikirlər dəyişik ola bilər;</td>
    </tr>
  </table>

</div>

@endsection