@extends('admin.mobile.dashboard')

@section('style')
<style media="screen">
    input {
        width: 95%;
        height: 24px;
        font-size: 20px;
        padding:0 10px;
        margin-top: 10px;
    }
    
</style>
@endsection

@section('content')
<form method="POST" action="{{ url('/admin/mobile/search') }}">
    {!! csrf_field() !!}
    <input type="text" name="email">
    <button type="submit">搜索</button>
</form>
@endsection
