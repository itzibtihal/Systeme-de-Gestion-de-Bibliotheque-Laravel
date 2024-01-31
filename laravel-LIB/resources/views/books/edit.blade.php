<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLibra</title>
    <style>
        body{color: #000;overflow-x: hidden;height: 100vh;background-image: url("https://wallpaperaccess.com/full/253342.jpg");background-repeat: no-repeat;background-size: 100% 100%}.card{padding: 30px 40px;margin-top: 60px;margin-bottom: 60px;border: none !important;box-shadow: 0 6px 12px 0 rgba(0,0,0,0.2)}.blue-text{color: #00BCD4}.form-control-label{margin-bottom: 0}input, textarea, button{padding: 8px 15px;border-radius: 5px !important;margin: 5px 0px;box-sizing: border-box;border: 1px solid #ccc;font-size: 18px !important;font-weight: 300}input:focus, textarea:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;border: 1px solid #00BCD4;outline-width: 0;font-weight: 400}.btn-block{text-transform: uppercase;font-size: 15px !important;font-weight: 400;height: 43px;cursor: pointer}.btn-block:hover{color: #fff !important}button:focus{-moz-box-shadow: none !important;-webkit-box-shadow: none !important;box-shadow: none !important;outline-width: 0}
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="text-white">Update your SmartLibra's Book </h3>
                <p class="text-white">Empower your library curation effortlessly <br> Elevate your library management experience with simplicity and efficiency.</p>
                <div class="card">
                    <h5 class="text-center mb-4">Update Book!</h5>
                    <div>
                        @if($errors->any())
                          <ul>
                            @foreach($errors->all() as $error)
                               <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        @endif
                    </div>
                    <form class="form-card" action="{{route('book.update', ['book' => $book])}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Title<span class="text-danger"> *</span></label> <input type="text"  name="title" value="{{$book->title}}" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Author<span class="text-danger"> *</span></label> <input type="text"  name="author"  value="{{$book->author}}"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Genre<span class="text-danger"> *</span></label> <input type="text"  name="genre" placeholder="" value="{{$book->genre}}"> </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Publication year<span class="text-danger"> *</span></label> <input type="date"  name="publication_year" placeholder="" value="{{$book->publication_year}}"> </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Total copies<span class="text-danger"> *</span></label> <input type="text" name="total_copies" placeholder=""value="{{$book->total_copies}}" > </div>
                            <div class="form-group col-sm-6 flex-column d-flex"> <label class="form-control-label px-3">Available Copies<span class="text-danger"> *</span></label> <input type="text" name="available_copies" placeholder=""value="{{$book->available_copies}}" > </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-6">Description<span class="text-danger"> *</span></label> <textarea name="description" id="" cols="10" rows="5" >{{$book->description}}</textarea> </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex"> <label class="form-control-label px-3">Update Cover<span class="text-danger"> *</span></label> <input type="file"  name="image" placeholder="" value="{{$book->image}}"> </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6"> <button type="submit" class="btn-block " style="background-color: bisque;">Update</button> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>