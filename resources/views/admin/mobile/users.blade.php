@extends('admin.mobile.dashboard')

@section('style')
<style media="screen">
    table {
        width: 100%;
    }
    table td {
        border: 1px solid #999;
        text-align: center;
    }
    .member {
        background: #334c48;
        color: #fff;
    }
    .nearby_member {
        background: #a12929;
        color: #fff;
    }
    .pagination li {
        margin-left: 0.1em;
        border: 1px solid #666;
    }
    .pagination li a,.pagination li span {
        padding: 0.5em 0.4em;

    }
</style>
@endsection

@section('content')
<table>
    <thead>
        <th>email</th>
        <th>member</th>
        <th>编辑</th>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td> {{ $user->email }} </td>

                @if ($user->member - time() > 0)
                    <td class="member">
                        {{sprintf("%.1f",($user->member - time())/86400)}}&nbsp;天
                    </td>
                @elseif ($user->member != NULL && $user->member - time() < 0)
                    <td class="nearby_member">
                        {{sprintf("%.1f",($user->member - time())/86400)}}&nbsp;天
                    </td>
                @else
                <td></td>
                @endif
                <td> <a href="/admin/user/mobile/{{ $user->id }}/edit">编辑</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
