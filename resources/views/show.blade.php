@extends('app')

@section('content')

@if (!empty($out->count()))

<table id="show" class="table table-striped span9 soorah">
	<thead><tr><td colspan="2">{{ $out->links('vendor/pagination.default') }}</td></tr></thead>
	<tbody>

        @foreach($out as $v)
        <tr>
            <td align="right">
                <a href="{{ url('/', [$v->soorah_id, $v->aya_id, 't'.$v->translator_id]) }}">{{ $v->soorah_id.':'.$v->aya_id }}</a>
            </td>
            <td>{{ $v->content }} </td>
        </tr>
        @endforeach

    </tbody>
	<tfoot><tr><td colspan="2">{{ $out->links('vendor/pagination.default') }}</td></tr></tfoot>
</table>

<script src="/js/mark.min.js" charset="UTF-8"></script>
<script>
var context = document.querySelector("table#show");
var instance = new Mark(context);
instance.mark('{{ $data['query'] }}');
</script>

@else
    @include('empty')
@endif

@endsection