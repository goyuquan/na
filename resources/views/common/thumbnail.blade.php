
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="top:100px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    图片1上传
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form id="file_form" class="smart-form" method="POST" action="/admin/thumbnail" enctype="multipart/form-data" >
                    <input id="thumbnail_token" type="hidden" name="_token" value="{{ csrf_token() }}">

                    <fieldset>

                        <section>
                            <div class="row">
                                <div class="col col-10">
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <div class="input input-file">
            								<span class="button">
                                                <input type="file" id="thumbnail" name="thumbnail_file" onchange="this.parentNode.nextSibling.value = this.value">点击选择
                                            </span>
                                            <input type="text" placeholder="选择文件" readonly="">
            							</div>
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <input type="button" id="img_upload" class="btn btn-success btn-sm" name="name" value="     点击上传      ">
                                    @if ($errors->has('thumbnail'))
                                    <strong>{{ $errors->first('thumbnail') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </section>

                        <div class="progress progress-sm progress-striped active">
							<div id="progress" class="progress-bar bg-color-primary" role="progressbar"></div>
						</div>

                        <footer>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                关闭
                            </button>
                        </footer>
                    </form>


                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="top:100px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    图片2上传
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form id="file_form2" class="smart-form" method="POST" action="/admin/thumbnail2" enctype="multipart/form-data" >
                    <input id="thumbnail_token2" type="hidden" name="_token" value="{{ csrf_token() }}">

                    <fieldset>

                        <section>
                            <div class="row">
                                <div class="col col-10">
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <div class="input input-file">
            								<span class="button">
                                                <input type="file" id="thumbnail2" name="thumbnail_file2" onchange="this.parentNode.nextSibling.value = this.value">点击选择
                                            </span>
                                            <input type="text" placeholder="选择文件" readonly="">
            							</div>
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <input type="button" id="img_upload2" class="btn btn-success btn-sm" name="name2" value="     点击上传      ">
                                    @if ($errors->has('thumbnail2'))
                                    <strong>{{ $errors->first('thumbnail2') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </section>

                        <div class="progress progress-sm progress-striped active">
							<div id="progress2" class="progress-bar bg-color-primary" role="progressbar"></div>
						</div>

                        <footer>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">
                                关闭
                            </button>
                        </footer>
                    </form>


                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
