<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLibra</title>
</head>
<body>
    <h1>Create Book to SmartLibra</h1>
    <div>
        @if($errors->any())
          <ul>
            @foreach($errors->all() as $error)
               <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
    </div>
    <form action="{{route('book.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('post')
        <div>
            <label for="">title</label>
            <input type="text" name='title' placeholder="title">
        </div>

        <div>
        <input type="file" name="image">
        <button type="submit">Upload Image</button>
        </div>

        <div>
            <label for="">Author</label>
            <input type="text" name='author' placeholder="author">
        </div>

        <div>
            <label for="">genre</label>
            <input type="text" name='genre' placeholder="genre">
        </div>

        
         
        <div>
            <label for="">publication year</label>
            <input type="date" name='publication_year' >
        </div>

        <div>
            <label for="">total copies</label>
            <input type="number" name='total_copies' >
        </div>

        <div>
            <label for="">availabe copies</label>
            <input type="number" name='available_copies'>
        </div>

        
        <div>
            <label for="">description</label>
            <!-- <textarea type="text" name='description' placeholder="description"> -->
                <textarea name="description" id="" cols="30" rows="10"></textarea>
        </div>
       
        <div>
            <input type="submit" value="Save new book">
        </div>
    </form>
    
</body>
</html>