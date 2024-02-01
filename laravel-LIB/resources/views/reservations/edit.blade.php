
        
        <!DOCTYPE html>

        <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLibra</title>
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100vh;
            background-image: url("https://th.bing.com/th/id/R.a969e236f0e5117b71584a3fbfc24e65?rik=8oq18gfv2Sm7oQ&riu=http%3a%2f%2ffarm1.staticflickr.com%2f130%2f376152628_249e3630c0_o_d.jpg&ehk=OroM%2bemSe2TPLNE5LzOoDLTlx2QEga27Du1XPff6Z%2bA%3d&risl=&pid=ImgRaw&r=0");
            background-repeat: no-repeat;
            background-size: 100% 100%
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
<div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="text-white">Update Reservation</h3>
                <p class="text-white">Empower your library curation effortlessly <br> Elevate your library management experience with simplicity and efficiency.</p>
                <div class="card">
                    <h5 class="text-center mb-4">Update Reservation!</h5>
                    <div>
                        @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <form class="form-card" action="{{ route('reservations.update', ['reservation' => $reservation]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put') <!-- Use PUT method for updating -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">User ID<span class="text-danger"> *</span></label>
                                <input type="text" name="user_id" value="{{ old('user_id', $reservation->user_id) }}">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Book ID<span class="text-danger"> *</span></label>
                                <input type="text" name="book_id" value="{{ old('book_id', $reservation->book_id) }}">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Reservation Date<span class="text-danger"> *</span></label>
                                <input type="date" name="reservation_date" value="{{ old('reservation_date', $reservation->reservation_date) }}">
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Return Date<span class="text-danger"> *</span></label>
                                <input type="date" name="return_date" value="{{ old('return_date', $reservation->return_date) }}">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block " style="background-color: bisque;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>