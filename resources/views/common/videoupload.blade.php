
<!-- Modal -->
<div class="modal fade" id="myModalv" tabindex="-1" role="dialog">
    <div class="modal-dialog" style="top:100px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    视频上传
                </h4>
            </div>
            <div class="modal-body no-padding">

                <form id="file_formv" class="smart-form" method="POST" action="/admin/video/upload/uploadstore" enctype="multipart/form-data" >
                    <input id="video_token" type="hidden" name="_token" value="{{ csrf_token() }}">

                    <fieldset>

                        <section>
                            <div class="row">
                                <div class="col col-10">
                                    <label class="input"> <i class="icon-append fa fa-lock"></i>
                                        <div class="input input-file">
            								<span class="button">
                                                <input type="file" id="video" name="file" onchange="this.parentNode.nextSibling.value = this.value">点击选择</span>
                                                <input type="text" placeholder="选择视频" readonly="">
            							</div>
                                    </label>
                                </div>
                                <div class="col col-2">
                                    <input type="button" id="video_upload" class="btn btn-success btn-sm" value="     点击上传      ">
                                    @if ($errors->has('video'))
                                    <strong>{{ $errors->first('video') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </section>

                        <div class="progress progress-sm progress-striped active">
							<div id="video_progress" class="progress-bar bg-color-primary" role="progressbar"></div>
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
