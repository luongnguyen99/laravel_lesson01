@yield('title')
<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Tên</th>
        <th scope="col">Tên giáo viên</th>
        <th scope="col">Chuyên ngành</th>
        <th scope="col">Sĩ số</th>
      </tr>
    </thead>
    <tbody>
    
      @foreach($classes as $item)
    <tr style="background-color:@if($item->id % 2) yellow @else green @endif">
        <td>{{ $item->id }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->teacher_name }}</td>
        <td>{{ $item->major }}</td>
        <td>{{ $item->max_student }}</td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
  