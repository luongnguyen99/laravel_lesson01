@extends('admin.master')

@section('title','Create New Admin')


@section('content')

{{-- @if ($errors->any())
    <div admin="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="{{route(!isset($admin) ?'admins.save-add' : 'admins.save-edit')}}" method="post">
    {{@csrf_field()}}

    @if(isset($admin))
        <input type="hidden" name="id" value="{{$admin->id}}">
    @endif
        
        <div admin="form-group">
            <label for="name">Tên</label>
        <input type="text" id="name" name="name" admin="@error('name') is-invalid @enderror form-control" value="{{isset($admin) ? $admin->name : ''}}">
            @error('name')
            <div admin="" style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div admin="form-group">
                <label for="name">Trường</label>
            <input type="text" id="university" name="university" admin="@error('name') is-invalid @enderror form-control" value="{{isset($admin) ? $admin->university : ''}}">
                @error('name')
                <div admin="" style="color:red">{{ $message }}</div>
                @enderror
                 </div>
        </div>



        <div admin="form-group">
            <label for="major">Ngành</label>
            <select name="is_active" id="is_active" admin="form-control">     
                <option {{isset($admin) && $admin->is_active == '0' ? 'selected' : ''}}  value="0">Vô hiệu hóa</option>
                <option {{isset($admin) && $admin->is_active == '1' ? 'selected' : ''}} value="1">Kích hoạt</option>
            </select>
        </div>

        

        <button admin="btn btn-success">Lưu</button>
        <button admin="btn btn-danger">Hủy</button>
    </form>
@endsection