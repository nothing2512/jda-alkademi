<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('category.update', ['category' => $category['id'] ]) }}">
        @csrf
        @method("PUT")
        <input type="text" name="namaKategori" value="{{ $category['name'] }}">
        <input type="submit" value="Submit">
    </form>
</body>
</html>