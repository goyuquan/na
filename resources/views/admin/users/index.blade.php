@extends('admin.layouts.admin')

@section('style')

<style media="screen">
table th,table td {
    text-align: center;
}
table thead {
    border-top: 1px solid #ccc;
}
</style>

@endsection

@section('content')


<!-- MAIN PANEL -->
<div id="main" role="main">


    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>
                控制台
            </li>
            <li>
                内容管理
            </li>
        </ol>


</div>


<div id="content">

    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-4 col-lg-4">
            <h1 class="page-title txt-color-blueDark"><!-- PAGE HEADER --><i class="fa-fw fa fa-file-o"></i> 用户管理 <span>&gt;
                用户列表 </span></h1>
            </div>

            <div class="col-xs-12 col-sm-9 col-md-8 col-lg-8">
                <!-- sparks -->
                <ul id="sparks">
                    <li class="sparks-info">
                        <h5> 全部用户
                            <span class="txt-color-blue"> <i class="fa fa-group"></i>&nbsp;{{$users->count()}}</span>
                        </h5>
                    </li>
                    <li class="sparks-info">
                        <h5> 会员 <span class="txt-color-purple"><i class="fa fa-shield"></i>&nbsp;{{$users->count() - $users->where('member','')->count() - 1}}</span></h5>
                    </li>
                </ul>
                <!-- end sparks -->
            </div>
            <!-- end col -->

        </div>

        <div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-erysy">

            <!-- widget div-->
            <div>

                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">
                    @if (count($users) > 0)

                    <table id="user_table" class="table table-striped table-bordered smart-form">
                        <thead>
                            <tr>
                                <th>
                                    <label class="checkbox"> <input type="checkbox" name="checkbox-inline"> <i></i>
                                    </label>
                                </th>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>email</th>
                                <th>member</th>
                                <th> 创建时间 </th>
                                <th> 更新时间 </th>
                                <th style="width:40px">操作</th>
                            </tr>
                            <tr class="second">
                                <td> </td>
                                <td> </td>
                                <td>
                                    <label class="input">
                                        <input type="text" name="search_platform" value="查找用户名" class="search_init">
                                    </label>
                                </td>
                                <td>
                                    <label class="input">
                                        <input type="text" name="search_version" value="查找email" class="search_init">
                                    </label>
                                </td>
                                <td ><i class="fa fa-fw fa-clock-o txt-color-green" style="font-size: 24px; line-height: 32px;"></i></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr class="odd gradeX">
                                <td>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox-inline"> <i></i>
                                    </label>
                                </td>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}
                                    @if ((time() - strtotime($user->created_at))/86400 < 7)
                                    <i class="fa fa-flag txt-color-red"></i>
                                    @endif
                                </td>
                                <td>{{ $user->email }} </td>
                                @if ($user->member - time() > 0)
                                    <td class="success">
                                        <strong class="txt-color-greenDark"> &nbsp;
                                        {{sprintf("%.1f",($user->member - time())/86400)}}&nbsp;天
                                        </strong>
                                    </td>
                                @elseif ($user->member != NULL && $user->member - time() < 0)
                                    <td class="danger">
                                        <strong class="txt-color-greenDark"> &nbsp;
                                        {{sprintf("%.1f",($user->member - time())/86400)}}&nbsp;天
                                        </strong>
                                    </td>
                                @else
                                    <td></td>
                                @endif

                                <td>{{ substr($user->created_at,0,10) }}</td>
                                <td>{{ substr($user->updated_at,0,10) }}</td>
                                <td class="hidden-xs hidden-sm">
                                    <div class="btn-group">
                                    <a href="/admin/user/{{ $user->id }}/edit"> <i class="fa fa-edit" style="font-size:24px;"></i>
                                    </a>
                                    <a href="/admin/user/{{ $user->id }}/destroy" class="destroy"> <i class="fa fa-times" style="font-size:24px;"></i>
                                    </a>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>


    </div>
</div>


@endsection

@section('script')
<script src="/js/plugin/datatables/jquery.dataTables-cust.min.js"></script>
<script src="/js/plugin/datatables/ColReorder.min.js"></script>
<script src="/js/plugin/datatables/FixedColumns.min.js"></script>
<script src="/js/plugin/datatables/ColVis.min.js"></script>
<script src="/js/plugin/datatables/ZeroClipboard.js"></script>
<script src="/js/plugin/datatables/media/js/TableTools.min.js"></script>
<script src="/js/plugin/datatables/DT_bootstrap.js"></script>

<script type="text/javascript">
$(function(){

    $("#aside_user").addClass("open");
    $("#aside_user_").show();
    $("#aside_user_index").addClass("active");


    /* Add the events etc before DataTables hides a column */
    $("#user_table thead input").keyup(function() {
        oTable.fnFilter(this.value, oTable.oApi._fnVisibleToColumnIndex(oTable.fnSettings(), $("thead input").index(this)));
    });

    $("#user_table thead input").each(function(i) {
        this.initVal = this.value;
    });
    $("#user_table thead input").focus(function() {
        if (this.className == "search_init") {
            this.className = "";
            this.value = "";
        }
    });
    $("#user_table thead input").blur(function(i) {
        if (this.value == "") {
            this.className = "search_init";
            this.value = this.initVal;
        }
    });


    var oTable = $('#user_table').dataTable({
        "sDom" : "<'dt-top-row'><'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        //"sDom" : "t<'row dt-wrapper'<'col-sm-6'i><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'>>",
        "oLanguage" : {
            "sSearch" : "Search all columns:"
        },
        "bSortCellsTop" : true
    });


    /* TABLE TOOLS */
    $('#datatable_tabletools').dataTable({
        "sDom" : "<'dt-top-row'Tlf>r<'dt-wrapper't><'dt-row dt-bottom-row'<'row'<'col-sm-6'i><'col-sm-6 text-right'p>>",
        "oTableTools" : {
            "aButtons" : ["copy", "print", {
                "sExtends" : "collection",
                "sButtonText" : 'Save <span class="caret" />',
                "aButtons" : ["csv", "xls", "pdf"]
            }],
            "sSwfPath" : "js/plugin/datatables/media/swf/copy_csv_xls_pdf.swf"
        },
        "fnInitComplete" : function(oSettings, json) {
            $(this).closest('#dt_table_tools_wrapper').find('.DTTT.btn-group').addClass('table_tools_group').children('a.btn').each(function() {
                $(this).addClass('btn-sm btn-default');
            });
        }
    });

    //角色删除确认
    $('.destroy').click(function(e) {
        var $this = $(this);
        $.destroyURL = $this.attr('href');
        $.destroyMSG = $this.data('logout-msg');

        // ask verification
        $.SmartMessageBox({
            title : "<i class='fa fa-exclamation-triangle txt-color-orangeDark'></i> 危险操作 !",
            content : $.destroyMSG || "删除用户会影响到关联用户",
            buttons : '[取消][确认删除]'

        }, function(ButtonPressed) {
            if (ButtonPressed == "确认删除") {
                $.root_.addClass('animated fadeOutDown');
                category_destroy();
            }

        });
        e.preventDefault();
    });

    function category_destroy() {
        window.location = $.destroyURL;
    }

});


</script>

@endsection
