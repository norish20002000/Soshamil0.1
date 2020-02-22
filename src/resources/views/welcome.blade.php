@extends('layouts.app')
@section('content')
<div>
    <a href="{{ route('accountregister') }}">アカウント作成</a>
<div>
</div>
    <accountlist-componet></accountlist-componet>
</div>
<div class='container'>
    <top-component></top-component>
</div>

@endsection
