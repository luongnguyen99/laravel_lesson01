<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('sum') }}">
        {{csrf_field()}}
        <input type="number" name="number1" placehodel="a"><br>
        <input type="number" name="number2"  placehodel="b"><br>
        <input type="number" name="number3"  placehodel="b"><br>
        <button type="submit">Tính tổng</button>
</form>
</body>
</html>