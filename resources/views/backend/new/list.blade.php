@extends('backend.master')
@section('title')
    <title>Danh sách tin</title>
@endsection()

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý tin
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active"><a href="#">tin</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          {{--@if(Auth::user()->role_id == 1 OR Auth::user()->role_id == 4 OR Auth::user()->role_id == 2)
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tìm kiếm tài khoản</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                  <form  method="GET" enctype="multipart/form-data"  action="{{route('backend.account.index')}}">
                    {{csrf_field()}}
                    <!-- Mã -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Tên</label>
                        <select class="form-control select2" style="width: 100%;" name="code">
                          <option value="">--Họ&Tên--</option>
                          @foreach($user as $value)
                            <option value="{{$value->code}}" {{Request::get('code') == $value->code ? 'selected' : '' }} >{{$value->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- Khoa -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Khoa</label>
                        <select class="form-control select2" style="width: 100%;"  id="faculty" name="faculty" onchange="facultyFunction()">
                          <option value="">--Khoa--</option>
                            @foreach($departmentList as $value)
                                @if($value->parent == null)
                                    <option value="{{$value->id}}" {{Request::get('faculty') == $value->id ? 'selected' : ''}} >{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <!-- Ngành -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Ngành</label>
                        <select class="form-control select2" id="department" name="department" style="width: 100%;">
                            <option value="">--Ngành--</option>
                            @foreach($departmentList as $value)
                                @if($value->parent != null && Request::get('faculty') == $value->parent)
                                    <option value="{{$value->id}}" {{Request::get('department') == $value->id ? 'selected' : ''}} >{{$value->name}}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <!--Loại-->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Loại</label>
                        <select class="form-control" style="width: 100%;" name="role">
                          <option value="">--Loại--</option>
                            @foreach($roleList as $value)
                            <option value="{{$value->id}}" {{Request::get('role') == $value->id ? 'selected' : '' }} >{{$value->name}}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <!--Làm mưới-->
                    <div class="col-md-6">
                        <div class="form-group" style="margin-top: 24px;">
                            <div class="input-group">
                                <a href="{{route('backend.account.index')}}" class="btn btn-default">Làm mói</a>
                            </div>
                        </div>
                    </div>
                    <!--Tìm kiếm-->
                    <div class="col-md-6" style="text-align: -webkit-right" >
                      <div class="form-group" style="margin-top: 24px;">
                        <div class="input-group">
                          <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                      </div>
                    </div>
                  </form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          @endif--}}
          <!-- /.box -->
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Danh sách tin</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listStudent" class="table table-bordered table-hover">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Tên bài viết</th>
                      <th>Trạng thái</th>
                      <th>Người tạo</th>
                      <th>Ngày viết</th>
                      <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($newsList as $value)
                  <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>
                        <label class="switch">
                            <input type="checkbox" name="status" value="{{$value->status}}" @if($value->status == 1 ) checked @endif id="status" onchange="statusFunction()" />
                            <span class="slider round"></span>
                        </label>
                    </td>
                    <td>
                        {{$value->teacher->name}}
                    </td>
                    <td>
                        {{!empty($value->updated_at) ? $value->updated_at : ''}}
                    </td>
                    <td>
                      <a href="{{route('backend.new.edit',$value->id)}}" class="btn btn-xs btn-warning">
                          <span>
                            <i class="fa fa-edit"></i>
                            Sửa
                          </span>
                      </a>
                      <a data-id="{{$value->id}}" data-toggle="modal" data-target="#delete" class="btn btn-xs btn-danger">
                          <span>
                            <i class="fa fa-trash"></i>
                            Xóa
                          </span>
                      </a>
                        <a href="{{route('backend.new.show',$value->id)}}" data-toggle="modal" data-target="#detail" class="btn btn-xs btn-info">
                          <span>
                            <i class="fa fa-info"></i>
                            Chi tiết
                          </span>
                        </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
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
  <!-- /.content-wrapper -->

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
              'ordering'    : true,
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
          modal.find('#account_id').val(id);
      });
      // thay đổi trang thái on or off
      function statusFunction() {
          var status = $('#status').val();
          console.log(status);
          {{--$.ajax({--}}
              {{--url:"{{route('backend.department.ajax')}}",--}}
              {{--dataType: 'json',--}}
              {{--type: 'GET',--}}
              {{--data: {faculty:faculty},--}}
              {{--success:function (data) {--}}
                  {{--if (data.success){--}}
                      {{--$('#department').select2().empty();--}}
                      {{--$('#department').select2({--}}
                          {{--data: data.data,--}}
                      {{--})--}}
                  {{--}--}}
              {{--}--}}
          {{--});--}}
      }


  </script>
@endpush
