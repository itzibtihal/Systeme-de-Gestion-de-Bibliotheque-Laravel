<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLibra</title>
</head>
<body>
    <h1>Books</h1>
    <div>
        @if(session()->has('success'))
          <div>
            {{session('success')}}
          </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{route('book.create')}}"> create product</a>
        </div>
        <table border="1">
           <tr>
            <th>
             ID   
            </th>
            <th>title</th>
            <th>image</th>
            <th>author</th>
            <th>genre</th>
            <th>description</th>
            <th>publication year</th>
            <th>total copies</th>
            <th>available copies</th>
            <th>edit</th>
            <th>delete</th>
           </tr>
           @foreach($books as $book)
           <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->image}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->genre}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->publication_year}}</td>
            <td>{{$book->total_copies}}</td>
            <td>{{$book->available_copies}}</td>
            <td>
                <a href="{{route('book.edit',['book' => $book])}}"> edit</a>
            </td>
            <td>
                <form action="{{route('book.destroy',['book' => $book])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="submit" value="delete">
                </form>
            </td>
           </tr>
           @endforeach
        </table>
    </div>
</body>
</html>