<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <style>
    :root {
      --main-bg-color: #ff7b00;
      --main-text-color: #fbaa5e;
      --second-text-color: #d7aa80;
      --second-bg-color: #eed3b9;
    }

    .primary-text {
      color: var(--main-text-color);
    }

    .second-text {
      color: var(--second-text-color);
    }

    .primary-bg {
      background-color: var(--main-bg-color);
    }

    .secondary-bg {
      background-color: var(--second-bg-color);
    }

    .rounded-full {
      border-radius: 100%;
    }

    #wrapper {
      overflow-x: hidden;
      background-image: linear-gradient(to right,
          #fd9737,
          #fda34e,
          #feb978,
          #fbcb9f,
          #f7d8ba);
    }

    .bg {
      background-color: #ffffff;
    }

    #sidebar-wrapper {
      min-height: 100vh;
      margin-left: -15rem;
      -webkit-transition: margin 0.25s ease-out;
      -moz-transition: margin 0.25s ease-out;
      -o-transition: margin 0.25s ease-out;
      transition: margin 0.25s ease-out;
    }

    #sidebar-wrapper .sidebar-heading {
      padding: 0.875rem 1.25rem;
      font-size: 1.2rem;
    }

    #sidebar-wrapper .list-group {
      width: 15rem;
    }

    #page-content-wrapper {
      min-width: 100vw;
    }

    #wrapper.toggled #sidebar-wrapper {
      margin-left: 0;
    }

    #menu-toggle {
      cursor: pointer;
    }

    .list-group-item {
      border: none;
      padding: 20px 30px;
    }

    .list-group-item.active {
      background-color: transparent;
      color: var(--main-text-color);
      font-weight: bold;
      border: none;
    }

    @media (min-width: 768px) {
      #sidebar-wrapper {
        margin-left: 0;
      }

      #page-content-wrapper {
        min-width: 0;
        width: 100%;
      }

      #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
      }
    }
  </style>
  <title>SmartLibra - Admin Dashboard</title>
</head>

<body>

  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg" id="sidebar-wrapper">
      <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i class="fas fa-house-user me-2"></i>SmartLibra</div>
      <div class="list-group list-group-flush my-3">
        <a href="{{route('dashboard.index')}}" class="list-group-item list-group-item-action bg-transparent second-text active"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
        <a href="{{route('usersadmin.index')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i class="fas fa-user me-2"></i>Users</a>
        <a href="{{route('book.index')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-book me-2"></i>Books</a>
        <a href="{{route('reservations.index')}}" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fas fa-plus me-2"></i>Reservation</a>
        <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="{{ route('logout') }}" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"> <button type="submit" class="dropdown-item"> <i class="fas fa-power-off me-2"></i>Logout</button></a>
                </form>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0 text-white">Dashboard</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle second-text fw-bold text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user me-2 text-white"></i>  {{ $user->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="dropdown-item">Logout</button>
                </form></li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid px-4">
        <div class="row g-3 my-2">
          <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">{{ $availableCopiesCount }} </h3>
                <p class="fs-5">Total Books</p>
              </div>
              <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">{{ $booksCount }}</h3>
                <p class="fs-5">Books</p>
              </div>
              <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">{{ $todayReservationsCount }}</h3>
                <p class="fs-5">Today's reservation</p>
              </div>
              <i class="fas fa-inbox fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>

          <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
              <div>
                <h3 class="fs-2">{{ $usersCount }}</h3>
                <p class="fs-5">users</p>
              </div>
              <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
          </div>
        </div>

        <h3 class="fs-4 mb-3 text-white">Recent Reservations</h3>
        <div class="col">
          <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>User Name</th>
                <th>Reservation Date</th>
                <th>Return Date</th>
                <th>Is Returned</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reservations as $reservation)
              <tr>
                <td>{{ $reservation->id }}</td>
                <td>{{ $reservation->book ? $reservation->book->title : 'N/A' }}</td>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->reservation_date }}</td>
                <td>{{ $reservation->return_date }}</td>
                <td>{{ $reservation->is_returned ? 'Yes' : 'No' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>


      </div>
    </div>
  </div>
  <!-- /#page-content-wrapper -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function() {
      el.classList.toggle("toggled");
    };
  </script>
</body>

</html>