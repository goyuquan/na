@extends('admin.mobile.dashboard')

@section('style')
<style media="screen">
    label {
        display: inline-block;
        width: 30%;
        height: 2em;
        margin-top: 1em;
    }
    input {
        display: inline-block;
        width: 65%;
        height: 2em;
    }
    select {
        display: inline-block;
        width: 6em;
        height: 3em;
    }
</style>
@endsection

@section('content')
<form action="/admin/user/mobile/{{$user->id}}/update" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <label for="name">用户名</label>
    <input type="text" name="name" value="{{ $user->name }}"  disabled="disabled" >
    <label for="email">email</label>
    <input type="email" name="email" value="{{ $user->email }}"  disabled="disabled" >

    <label class="label">密码</label>
    <input type="password" id="password" name="password" value="{{ old('password') }}">
    <label class="label">重复密码</label>
    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">

    <label for="member">添加时间</label>
    <select name="member">
        <option value="0" selected="" disabled="">无</option>
        <option value="30">一个月</option>
        <option value="90">三个月</option>
        <option value="180">半年</option>
        <option value="360">一年</option>
    </select>
    <br>
    <label for="member2">到期时间</label>
    <input type="text" name="member2" value="{{ $user->member ? date('y-m-d h:i:s',$user->member) : ' '  }}" data-dateformat="yy-mm-dd">

    <button type="submit" name="submit"> 保存 </button>
</form>
@endsection
