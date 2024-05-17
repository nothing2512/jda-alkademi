<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @if($errors->any())
        @foreach($errors->all() as $error)
            <h3>{{ $error }}</h3>
        @endforeach
    @endif

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <input type="text" name="nama" placeholder="Nama"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="text" name="umur" placeholder="Umur"><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>