<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartLibra</title>
    <style>
        /* Your CSS styles go here */
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>
<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h3 class="text-white">Update your SmartLibra's User</h3>
                <p class="text-white">Empower your user management effortlessly.</p>
                <div class="card">
                    <h5 class="text-center mb-4">Update User!</h5>
                    <div>
                        @if($errors->any())
                          <ul>
                            @foreach($errors->all() as $error)
                               <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        @endif
                    </div>
                    <form class="form-card" action="{{ route('usersadmin.update', ['user' => $user]) }}" method="post">
                        @csrf
                        @method('put')
                        
                     
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Name<span class="text-danger"> *</span></label>
                                <input type="text" name="name" value="{{ $user->name }}" >
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label>
                                <input type="text" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="row justify-content-between text-left">
                           
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block" style="background-color: bisque;">Update</button>
                            </div>
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
