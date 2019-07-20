<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Tên</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Trường</th>
    </tr>
  </thead>
  <tbody>
  
    @foreach($students as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->name }}</td>
      <td>{{ $item->address }}</td>
      <td>{{ $item->univercity }}</td>
    </tr>
    @endforeach
    
  </tbody>
</table>
