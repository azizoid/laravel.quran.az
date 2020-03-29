<?php
header('Access-Control-Allow-Origin: your-host');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: your-methods like POST,GET');
header('Access-Control-Allow-Headers: content-type or other');
header('Content-Type: application/json');
?>
@yield('content')

<script src="{{ asset('js/app.js') }}" defer></script>
