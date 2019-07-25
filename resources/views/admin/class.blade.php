@extends('admin.master')
@section('title')
    Class page 
@endsection

@section('content')
{{-- {{dd($studen_id_2)}} --}}

    <h4>Bảng hiển thị</h4>
    <table class="table table-dark">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <td>{{ $studen_id_2[0]['id'] }}</td>
              
              </tr>
            </thead>
            
            @include('admin.classdetail',['studen_id_2' => $studen_id_2])
          </table>
          
@endsection