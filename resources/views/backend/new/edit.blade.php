@extends('backend.master')
@section('title')
    <title>Cập nhật bài viết</title>
@endsection()
@section('content')
    <div class="content-wrapper" style="min-height: 1125.8px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Cập nhật bài viết
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('backend.home')}}"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                <li><a href="{{route('backend.new.index')}}">Bài viết</a></li>
                <li class="active">Sửa</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="" style="border-top-color: #3c8dbc;"><a href="#activity" data-toggle="tab" aria-expanded="false">Thông tin</a></li>
                        </ul>
                        @include('error.messages')
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">
                                <form class="form-horizontal" action="{{route('backend.new.update',$news->id)}}" method="POST" enctype="multipart/form-data">
                                    {{ method_field('PUT') }}
                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Tên bài viết</label>
                                        <div class="col-sm-5">
                                            <input type="text"  class="form-control" name="name" id="inputName" value="{{$news->name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputType" class="col-sm-2 control-label">Ảnh</label>
                                        <div class="col-sm-10" style="margin-top: 6px">
                                            <img class="img-circle"
                                                 style="object-fit: cover; object-position: center; width: 150px;height: 150px;"
                                                 src="{{url('avatars/'.$news->image)}}" alt="{{$news->image}}">
                                            <div class="form-control" style="border: none">
                                                <input type="file" value="" name="image">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription" class="col-sm-2 control-label">Nội dung</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control textarea" rows="20" name="description" id="description" placeholder="Mô tả sơ qua về đề tài..."> {!! !empty($news->content) ? $news->content : '' !!}</textarea>
                                        </div>
                                    </div>
                                    <!--sửa-->
                                    <div class="form-group">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <div class="form-control" style="border: none">
                                                <button type="submit" class="btn btn-primary w-100">Sửa</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->
    </div>
@endsection()

@push('after-script')
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
            $('[data-mask]').inputmask()
        });
        // ngày sinh
        $(function() {
            $('input[name="birthday"]').daterangepicker({
                datepicker:true,
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'D/M/YYYY'
                }
            });
        });


        function showFields() {
            var role = $('#role').val();
            if (role == 2 || role == 4){
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
@endpush()
