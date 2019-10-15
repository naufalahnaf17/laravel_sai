<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div id="hal" class="col-sm-2">
          <div class="col-2 px-1 bg-dark position-fixed" id="sticky-sidebar" style="height:100%;">
                <div class="row pt-5 pl-3">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="/">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/data-siswa">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/data-tagihan">Data Tagihan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/data-pembayaran">Data Pembayaran</a>
                    </li>
                  </ul>
                </div>
              </div>
        </div>

        <div id="navbar" class="col-sm-10">
          <!-- Awal Navbar -->
            <a id="btnLogout" href="/logout"> <img id="logoutDude" src="/logout.png"> </a>
          <!-- Akhir Navbar -->
        </div>

        <div id="hal" class="col-sm-2">
          <!-- Awal Flex Column -->
          <div class="col-2 px-1 bg-dark position-fixed" id="sticky-sidebar" style="height:100%;">
                <div class="row pt-5 pl-3">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link active" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/data-siswa">Data Siswa</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/data-tagihan">Data Tagihan</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="/data-pembayaran">Data Pembayaran</a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Akhir Flex Column -->
        </div>

        <!-- Awal content -->
        <div class="col-sm-10">
          <div class="main-contain">
            @yield('content')
          </div>
        </div>
        <!-- AKhir Content -->



    <!-- Situationan Javascript -->
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
