<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLibra</title>
</head>
<body>
    <h1>Update Book to SmartLibra</h1>
    <div>
        @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
    </div>
    <form action="{{route('book.update', ['book' => $book])}}" method="post" >
        @csrf
        @method('put')
        <div>
            <label for="">title</label>
            <input type="text" name='title' placeholder="title" value="{{$book->title}}">
        </div>

        <div>
            <label for="">image</label>
            <input type="text" name='image' placeholder="image" value="{{$book->image}}">
        </div>

        <div>
            <label for="">Author</label>
            <input type="text" name='author' placeholder="author" value="{{$book->author}}">
        </div>

        <div>
            <label for="">genre</label>
            <input type="text" name='genre' placeholder="genre" value="{{$book->genre}}">
        </div>

        
         
        <div>
            <label for="">publication year</label>
            <input type="date" name='publication_year'  value="{{$book->publication_year}}">
        </div>

        <div>
            <label for="">total copies</label>
            <input type="number" name='total_copies' value="{{$book->total_copies}}" >
        </div>

        <div>
            <label for="">availabe copies</label>
            <input type="number" name='available_copies' value="{{$book->available_copies}}">
        </div>

        
        <div>
            <label for="">description</label>
            <!-- <textarea type="text" name='description' placeholder="description"> -->
                <!-- <textarea name="description" id="" cols="30" rows="10" value="{{$book->description}}"></textarea> -->
                <input type="text" name="description" id="" value="{{$book->description}}">
        </div>
       
        <div>
            <input type="submit" value=" update book">
        </div>
    </form>
    
</body>
</html>