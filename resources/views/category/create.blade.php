<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('category.store', ['namaKategori' => 'Adventure']) }}" method="POST">
        @csrf
        <input type="text" name="namaKategori" placeholder="Nama Kategori">
        <input type="submit" value="Submit">
    </form>
</body>
</html>