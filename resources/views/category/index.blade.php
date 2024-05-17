<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="{{ route('category.create') }}">
        <button>Tambah Kategori</button>
    </a>
    <table>
        <thead>
            <tr>
                <td>Nama</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{ $item["name"] }}</td>
                    <td>
                        <a href="{{ route('category.show', ['category' => $item['id']]) }}">
                            <button>Detail</button>
                        </a>
                        <a href="{{ route('category.edit', ['category' => $item['id']]) }}">
                            <button>Edit</button>
                        </a>
                        <form action="{{ route('category.destroy', ['category' => $item['id']]) }}" method="post">
                            @csrf
                            @method("DELETE")
                            <button>Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>