@extends('backend.master')
@section('title')
    <title>Danh sách đề tài</title>
@endsection()
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý đề tài
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('backend.home')}}"><i class="fa fa-dashboard"></i>Trang chủ</a></li>
        <li class="active"><a href="#">đề tài</a></li>
      </ol>
    </section>
    @include('error.messages')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- /.box -->
          <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Danh sách Đề tài </h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listSubject" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Đề tài</th>
                    <th>Trạng thái</th>
                    <th>Thời gian</th>
                    <th>Số lượng</th>
                    <th>Người tạo</th>
                    <th>Tác vụ</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($researchList as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" name="status" value="{{$value->status}}" @if($value->status == 1 ) checked @endif id="status" onchange="statusFunction()" />
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>{{!empty($value->starttime) ? date('d/m/Y - d/m/Y',$value->starttime) : ''}}</td>
                        <td>{{$value->quantily}}</td>
                        <td>{{$value->teacher->name}}</td>
                        <td>
                            <a href="{{route('backend.research.edit',$value->id)}}" class="btn btn-xs btn-warning">
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
                            <a href="{{route('backend.research.show',$value->id)}}" data-toggle="modal" data-target="#detail" class="btn btn-xs btn-info">
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
        <!--Phần xóa-->
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
  <!-- /.content-wrapper -->

@endsection()
@push('after-script')
  <script type="text/javascript">
      // data table
      $(function () {
          $('#example1').DataTable();
          $('#listSubject').DataTable({
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
          modal.find('#subject_id').val(id);
      });

      // lọc ngành khi click khoa

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
