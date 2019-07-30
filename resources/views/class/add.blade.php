@extends('admin.master')

@section('title','Create New Class')


@section('content')

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<form action="{{route('classes.save-add')}}" method="post">
    {{@csrf_field()}}
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
            @error('name')
            <div class="" style="color:red">{{ $message }}</div>
            @enderror
        </div>
       

        <div class="form-group">
            <label for="teacher_name">Tên giáo viên</label>
            <input type="text" id="teacher_name" name="teacher_name" class="@error('teacher_name') is-invalid @enderror form-control">
            @error('teacher_name')
            <div class="" style="color:red">{{ $message }}</div>
            @enderror
        </div>
       


        <div class="form-group">
            <label for="major">Ngành</label>
            <select name="major" id="major" class="form-control">
                <option value="CNTT">Công nghệ thông tin</option>
                <option value="TKDH">Thiết kế đồ họa</option>
                <option value="MKT">Marketing</option>
            </select>
        </div>

        <div class="form-group">
            <label for="max_student">Số lượng học sinh</label>
            <input type="number" id="max_student" name="max_student" class="form-control">
        </div>

        <button class="btn btn-success">Lưu</button>
        <button class="btn btn-danger">Hủy</button>
    </form>
@endsection