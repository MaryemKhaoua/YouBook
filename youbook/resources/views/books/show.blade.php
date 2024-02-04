<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Book Details</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Book Details</h1>
        <p><strong>Title:</strong> {{ $book->title }}</p>
        <p><strong>Description:</strong> {{ $book->description }}</p>
        <p><strong>Reservation Status:</strong> {{ $book->is_reserved ? 'Reserved' : 'Not Reserved' }}</p>
        
        @if (!$book->is_reserved)
            <form method="POST" action="{{ route('books.reserve', $book->id) }}">
                @csrf
                <button type="submit" class="btn btn-success btn-sm">Reserve Book</button>
            </form>
        @else
            <button class="btn btn-secondary btn-sm" disabled>Book Reserved</button>
        @endif

        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>

        <form action="{{ route('books.destroy', $book->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>
    </div>
</body>
</html>