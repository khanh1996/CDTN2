@extends('backend.master')
@section('title')
    <title>Thêm đề tài</title>
@endsection()
@section('content')
    <div class="content-wrapper">r
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Quản lý Đề tài
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('backend.home')}}"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active"><a href="{{route('backend.research.index')}}">Đề tài</a></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thêm Đề tài</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                        @include('error.messages')
                        <div class="box-body" style="">
                            <div class="row">
                                <form type="" enctype="multipart/form-data" method="POST" action="{{route('backend.research.store')}}">
                                    <!-- Tên Đề tài-->
                                    <div class="col-md-6">
                                        <label>Đề tài</label>
                                        <div class="form-group">
                                            <input type="text" required class="form-control" name="name" placeholder="Nghiên cứu IOT">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Trạng thái</label><br>
                                        <div class="form-group">
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="1" checked />
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Số lượng người tham gia</label><br>
                                            <input required class="form-control" type="number"  name="quanlity" id="quanlity" value="10" min="10" max="30" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Thời gian</label>
                                        <div class="form-group">
                                            <input required class="form-control" required type="text" name="time" value=""/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mô tả</label>
                                            <textarea required class="form-control textarea" rows="10" name="description" id="description" placeholder="Mô tả sơ qua về đề tài..."> </textarea>
                                        </div>
                                    </div>
                                    <!--thêm-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <button type="submit" class="btn btn-primary">Thêm</button>
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
            <!-- /.row -->
            <!--Phần Chi tiết-->
            <div class="modal fade modal-ajax" id="detail">
                <div class="modal-dialog">
                    <div class="modal-content">

                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Xác nhận xóa</h4>
                        </div>
                        <form method="POST" action="{{route('backend.research.destroy','id')}}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xóa không?</p>
                                <input type="hidden" name="id" id="subject_id" value="" >
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
            })
        });
        // select 2
        $(function () {
            $('.select2').select2()
        });

        // láy ra id để xóa
        $('#delete').on('show.bs.modal',function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id') ;// id này tương đương với id get ở trên xuống data-id=
            var modal =$(this);
            modal.find('#subject_id').val(id);
        });
        // thời gian đăng ký và kết thúc
        $(function() {
            $('input[name="time"]').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'DD/M/YYYY'
                }
            });
        });
        //lọc giáo viên qua ngành
        {{--function teacherFunction() {--}}
            {{--// lấy ra giáo viên thuộc khoa chọn--}}
            {{--var department = $('#department').val();--}}
            {{--$.ajax({--}}
                {{--url:"{{route('backend.user.ajax')}}",--}}
                {{--dataType: 'json',--}}
                {{--type: 'GET',--}}
                {{--data: {department:department},--}}
                {{--success:function (data) {--}}
                    {{--if (data.success){--}}
                        {{--$('#teacher').select2().empty();--}}
                        {{--$('#teacher').select2({--}}
                            {{--data: data.data,--}}
                        {{--});--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--}--}}
    </script>
@endpush
