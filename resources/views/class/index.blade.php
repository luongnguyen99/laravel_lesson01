@extends('admin.master')

@section('title','List Classes')



@section('content')
@if(session('success'))
<div>{{session('success')}}</div>
@endif
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên</th>
        <th scope="col">Tên giáo viên</th>
        <th scope="col">Chuyên ngành</th>
        <th scope="col">Sĩ số</th>
        <th scope="col">Admin</th>
        <th></th>
        
      </tr>
    </thead>
    <tbody>
    
      @foreach($classes as $item)
    <tr>
        
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->teacher_name }}</td>
        <td>{{ $item->major }}</td>
        <td>{{ $item->max_student }}</td>
        <td>
        @if(count($item->admins) > 0)
          @foreach($item->admins as $admin)
          <p>{{$admin->name}}</p>
          @endforeach
        @else
          <p>Không có admin</p>
        @endif
        </td>
        <td>
          <a href="{{route('classes.edit',$item->id )}}" class="btn btn-success">Sửa</a>
          
          <button type="button" class="btn btn-danger value_delete" url="{{route('classes.delete',$item->id )}}" data-toggle="modal" data-target="#myModal">Xóa</button>
        </td>
          
      </tr>
      @endforeach
      
    </tbody>
  </table>
  @endsection
  

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="delete" data-dismiss="modal">Xóa</button>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(function(){
   
    $('.value_delete').on('click',function(){
      url = $(this).attr('url');
      $('#delete').click(function(){
        window.location.href = url;
      })
    })
  })
</script>