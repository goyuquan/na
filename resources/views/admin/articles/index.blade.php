@extends('admin.layouts.admin')

@section('title','创建')
@section('description','title_description')
@section('keywords','title_keywords')

@section('style')
<link rel="stylesheet" href="/css/admin/table.css">
@endsection

@section('content')

<div class="breadcrumb container">
    <a href="{{url('/admin/index')}}">后台首页</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <a href="{{url('/admin/index')}}">文章管理</a>
        <i class="fa fa-angle-right" aria-hidden="true"></i>
    <span>文章管理</span>
</div>

<div class="main_wrap container">
    <div class="content_wrap">
        @if (count($articles) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>标题</th>
                            <th>缩略图</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td><a href="/article/{{ $article->id }}"> {{str_limit($article->title,50)}} </a></td>
                            <td>{{ substr($article->published_at,1,10) }}</td>
                            <td>
                                <a href="/admin/article/{{ $article->id }}/edit">编辑 </a>
                                <a href="/admin/article/{{ $article->id }}/destroy" class="del">删除 </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            {{ $articles->links() }}
        @endif
    </div>
</div>

@endsection

@section('script')
<script src="{{url('/js/jquery-1.12.3.min.js')}}"></script>
<script type="text/javascript">
$(".del").click(function(e){
    var r=confirm("确认删除");
    if (r==false) {
        e.preventDefault();
    }
});
</script>

@endsection
