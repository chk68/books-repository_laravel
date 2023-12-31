<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Directory</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Authors</h2>
    <table class="authors-table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->last_name }}</td>
                <td>{{ $author->first_name }}</td>
                <td>{{ $author->middle_name }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h2>Books</h2>
    <table class="books-table table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Authors</th>
            <th>Publish Date</th>
        </tr>

        </thead>


        <tbody>

        @foreach ($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>
                    <div style="width: 50px; margin-right: 10px;">
                        <img src="{{ asset('storage/images/books/' . $book->image) }}" alt="{{ $book->title }}"
                             style="width: 100%; height: auto;">
                    </div>
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                        <div>
                            <h4 style="margin: 0;">{{ $book->title }}</h4>
                        </div>
                    </div>
                </td>
                <td><p>{{ $book->description }}</p></td>
                <td>
                    @foreach ($book->authors as $author)
                        {{ $author->first_name }} {{ $author->last_name }}<br>
                    @endforeach
                </td>
                <td>{{ $book->publish_date }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>

    <h2>Add New Author</h2>

    <form method="post" action="{{ route('authors.store') }}">

        @csrf
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="middle_name">Middle Name:</label>
        <input type="text" name="middle_name">

        <button type="submit">Add Author</button>

    </form>

    <h2>Add New Book</h2>

    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="description">Description:</label>
        <textarea name="description"></textarea>

        <label for="authors">Authors:</label>
        <select name="authors[]" multiple required>

            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->first_name }} {{ $author->last_name }}</option>
            @endforeach

        </select>

        <label for="publish_date">Publish Date:</label>
        <input type="date" name="publish_date" required>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" required>

        <button type="submit">Add Book</button>

    </form>

</div>


</body>
</html>
