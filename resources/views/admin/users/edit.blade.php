@extends('admin.layouts.admin')

@section('style')

<style media="screen">
    .jarviswidget {
        border-top: 1px solid #ccc;
    }
    footer {
        padding: 0!important;
    }
    footer button {
        margin-top: 0!important;
    }
    .onoffswitch {
        float: right;
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
                编辑用户
            </li>
        </ol>
        <!-- end breadcrumb -->


    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-pencil-square-o fa-fw "></i>
                    用户管理
                    <span>>
                        编辑用户
                    </span>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            </div>
        </div>

        <div class="jarviswidget" id="wid-idfdg6fc56" data-widget-editbutton="false" data-widget-custombutton="false">

            <!-- widget div-->
            <div>
                <!-- widget edit box -->
                <div class="jarviswidget-editbox">
                    <!-- This area used as dropdown edit box -->

                </div>
                <!-- end widget edit box -->

                <!-- widget content -->
                <div class="widget-body no-padding">

                    <form action="/admin/user/{{$user->id}}/update" method="post" id="comment-form" class="smart-form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <div class="row">
                                <div class="col col-4">
                                    <div class="row">
                                        <section class="col col-10">
                                            <label class="label">用户名</label>
                                            <label class="input state-disabled"> <i class="icon-append fa fa-user"></i>
                                                <input type="text" name="name" value="{{ $user->name }}"  disabled="disabled" >
                                            </label>
                                            @if ($errors->has('name'))
                                                <em for="name" class="invalid">{{ $errors->first('name') }}</em>
                                            @endif
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-10">
                                            <label class="label">E-mail</label>
                                            <label class="input state-disabled"> <i class="icon-append fa fa-envelope-o"></i>
                                                <input type="email" name="email" value="{{ $user->email }}"  disabled="disabled" >
                                            </label>
                                            @if ($errors->has('email'))
                                            <em for="email" class="invalid">{{ $errors->first('email') }}</em>
                                            @endif
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-10">
                                            <label class="label">密码 <em class="note">(留空不修改密码)</em></label>
                                            <label class="input"> <i class="icon-append fa fa-user"></i>
                                                <input type="password" id="password" name="password" value="{{ old('password') }}">
                                            </label>
                                            @if ($errors->has('password'))
                                            <em for="password" class="invalid">{{ $errors->first('password') }}</em>
                                            @endif
                                        </section>
                                    </div>
                                    <div class="row">
                                        <section class="col col-10">
                                            <label class="label">重复密码</label>
                                            <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            </label>
                                        </section>
                                    </div>
                                </div>
                                <div class="col col-8">
									<label class="label">用户权限</label>

                                    <h6>member</h6>
                                    <div class="progress progress-micro">
                                        <div class="progress-bar progress-bar-primary" role="progressbar" style="width: 44%;"></div>
                                    </div>
                                    <div class="row">
    									<label class="label col col-3">添加时间</label>
    									<section class="col col-4">
    										<label class="select">
    											<select name="member" class="valid">
    												<option value="0" selected="" disabled="">无</option>
    												<option value="30">一个月</option>
    												<option value="90">三个月</option>
    												<option value="180">半年</option>
    												<option value="360">一年</option>
    											</select> <i></i> </label>
    									</section>
                                        <section class="col col-5">
                                            <label class="input"> <i class="icon-append fa fa-calendar"></i>
                                                <input type="text" name="member2" placeholder="选择发布时间" class="datepicker" value="{{ $user->member ? date('y-m-d h:i:s',$user->member) : ' '  }}" data-dateformat="yy-mm-dd">
                                            </label>
                                            @if ($errors->has('member'))
                                            <em>{{ $errors->first('member') }}</em>
                                            @endif
                                        </section>
    								</div>
                                    <hr class="simple">


                                </div>
                            </div>
                        </fieldset>

                        <hr class="simple">

                        <footer>
                            <button type="submit" name="submit" class="btn btn-primary btn-block">
                                保存
                            </button>
                        </footer>

                        <div class="message">
                            <i class="fa fa-check fa-lg"></i>
                            <p>
                                Your comment was successfully added!
                            </p>
                        </div>
                    </form>

                </div>
                <!-- end widget content -->

            </div>
            <!-- end widget div -->

        </div>


    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->




@endsection

@section('script')
<script type="text/javascript">

$(function(){

    $("#aside_user").addClass("open");
    $("#aside_user_").show();
    $("#aside_user_index").addClass("active");

    $("#comment-form").validate({

        rules : {
            name : {
                required : true,
                maxlength : 20
            },
            email : {
                required : true,
                maxlength : 20
            },
            password : {
                minlength : 4,
                maxlength : 20
            },
            password_confirmation : {
                equalTo:"#password"
            }
        },

        messages : {
            name : {
                maxlength : '不能大于20位',
                minlength : '不能小于2位'
            },
            email : {
                email : '格式不正确'
            },
            password : {
                required : '请输入密码',
                maxlength : '不能大于20位',
                minlength : '不能小于2位'
            },
            password_confirmation : {
                required : '请输入密码',
                equalTo : '密码不一致'
            }
        },

        errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
        }
    });

});

</script>
@endsection
