<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>
<body>
    {{-- Detail User --}}
    <p>Nama : {{ $user["name"] }}</p>
    <p>Umur : {{ $user["age"] }}</p>
    
    @if($user["age"] > 25)
        <p>Tua</p>
    @else
        <p>Muda</p>
    @endif

    {!! $description !!}
    <br>
    <p>Buku : {{ $buku["name"] }}</p>
    <img src="{{ asset('image/kakashi.jpeg') }}">

    <form action="/post" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="file" name="file">
        <input type="submit" value="submit">
    </form>
</body>
</html>