@extends('admin.layouts.admin')

@section('content')

    @if(count($users) > 0)
    <table>
        <thead>
            <th> ID </th>
            <th> 用户名 </th>
            <th> email </th>
            <th> 手机号 </th>
            <th> 注册时间 </th>
            <th> 更新时间 </th>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td> {{$user->id}} </td>
            <td> {{$user->name}} </td>
            <td> {{$user->email}} </td>
            <td> {{$user->phone}} </td>
            <td> {{substr($user->created_at,0,10)}} </td>
            <td> {{substr($user->updated_at,0,10)}} </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
    <div class="pagenation">
        {{$users->links()}}
    </div>

@endsection
