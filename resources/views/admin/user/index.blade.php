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
            <td>
                <a href="{{url('/admin/user/edit/'.$user->id)}}">编辑</a>
                <a class="del" href="{{url('/admin/user/delete/'.$user->id)}}">删除</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    @endif
    <div class="pagenation">
        {{$users->links()}}
    </div>

@endsection

@section('script')
<script type="text/javascript">
$(function(){
    $(".del").click(function(e){
        var r=confirm("确认删除");
        if (r==false) {
            e.preventDefault();
        }
    });
});
</script>
@endsection
