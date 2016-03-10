@extends('admin.mobile.dashboard')

@section('style')
<style media="screen">
    table {
        width: 100%;
    }
    table td {
        border: 1px solid #999;
    }
    .member {
        background: #334c48;
        color: #fff;
    }
    .nearby_member {
        background: #a12929;
        color: #fff;
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
        @if ($user)
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
        @endif
    </tbody>
</table>
@endsection
