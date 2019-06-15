@extends('backend.master')
@section('title')
    <title>Thêm tin tức</title>
@endsection()
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý tin
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('backend.home')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
                <li ><a href="{{route('backend.new.index')}}">tin</a></li>
                <li class="active"><a href="#">Thêm</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm tin</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @include('error.messages')
                        <div class="box-body" style="">
                            <div class="row">
                                <form method="POST" action="{{route('backend.new.store')}}" enctype="multipart/form-data" role="form">
                                    <!--tên -->
                                    <div class="col-md-3">
                                        <label>Tên tin</label>
                                        <div class="form-group">
                                            <input type="text"  class="form-control" name="name" placeholder="tin IOT" >
                                        </div>
                                    </div>
                                    <!-- trạng thái -->
                                    <div class="col-md-3">
                                        <label>Trạng thái</label><br>
                                        <div class="form-group">
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="1" checked />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Ảnh</label>
                                        <div class="form-group">
                                            <div class="" required>
                                                <input type="file" class="upload"  name="image" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nội dung</label>
                                            <textarea class="form-control textarea" rows="10" name="description" id="description" placeholder="Mô tả sơ qua về đề tài..."> </textarea>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-6">
                                        <div class="form-group">
                                            <label>Người tạo<i class="fas fa-star-of-life fa-xs" style="color: red"></i></label>
                                            <select class="form-control select2" name="teacher" id="teacher" style="width: 100%;">
                                                <option value="">--Giáo viên--</option>
                                            </select>
                                        </div>
                                    </div>--}}
                                    <!--thêm-->
                                    <div class="col-md-12">
                                        <div class="form-group" style=" float: right; margin-right: 20px;">
                                            <div class="input-group">
                                                <button type="submit" name="submit" class="btn btn-primary">Thêm bài viết</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{csrf_field()}}
                                </form>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Xác nhận xóa</h4>
                        </div>
                        <form method="POST" action="{{route('backend.new.destroy','id')}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xóa không?</p>
                                <input type="hidden" name="id" id="account_id" value="" >
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Không</button>
                                <button type="submit" class="btn btn-outline">Có</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection()
@push('after-script')
    <script type="text/javascript">
        // data table
        $(function () {
            $('#example1').DataTable();
            $('#listStudent').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : false,
                'info'        : true,
                'autoWidth'   : false
            });
            $('[data-mask]').inputmask()
        });
        // select 2
        $(function () {
            $('.select2').select2()
        });
        // ngày sinh
        $(function() {
            $('input[name="startdate"]').daterangepicker({
                datepicker:true,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD/M/YYYY'
                }
            });
        });
        // láy ra id để xóa
        $('#delete').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id') ;// id này tương đương với id get ở trên xuống data-id=
            var modal =$(this);
            modal.find('#account_id').val(id);
        });


        // show các trường cần nhập của giáo viên
        function showFields() {
            var role = $('#role').val();
            if (role == 2 || role == 4 ){
                $('#contentClass').css('display','none');
                $('#contentCourse').css('display','none');
                $('#contentGroup').css('display','none');
            }
            else {
                $('#contentClass').css('display','block');
                $('#contentCourse').css('display','block');
                $('#contentGroup').css('display','block');
            }
        }

    </script>
@endpush
