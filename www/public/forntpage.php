<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description"
    content="Cuidando al Lomito Snoop Doggy Doe, es un sitio web innovador que busca rastrear y brindar apoyo a estos animales valiosos. Este proyecto se centra en la colaboración de la comunidad para proporcionar cuidado y atención a los perros sin hogar, aprovechando la tecnología para facilitar la logística y la organización.">
  <title>Cuidando al lomito Snoop Doggy Doe</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="css/style_agenda.css">

  <link rel="stylesheet" href="css/my_styles.css">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
  <script>
    var eventos_agenda = new Array();
</script>

<div class="wrapper">

  <!-- Navbar -->
  <?php include 'navbar.php' ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include 'left_nav.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-10">
            <h1 class="m-0 article-title">"CUIDANDO AL LOMITO SNOOP DOGGY DOE ": UN SITIO WEB REVOLUCIONARIO PARA EL CUIDADO DE PERROS CALLEJEROS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 col-md-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section id="inicio" class="bg-light pb-5">

      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div id="content-about-us pr-3">
              <p class="text-justify">Únete a nuestra plataforma innovadora que busca mejorar la vida de los perros callejeros. En "Cuidando al Lomito Snoop Doggy Doe" fomentamos la colaboración comunitaria para brindar cuidado y atención a estos valiosos animales. Utilizando tecnología avanzada, rastreamos a los perros a través de avistamientos reportados por nuestros usuarios, gracias a la transmisión y recepción Bluetooth en nuestra aplicación móvil.</p> 
              <p class="text-justify">Nuestra plataforma te mantendrá informado sobre la ubicación geográfica de los perros identificados, lo que nos permite actuar rápidamente en situaciones de peligro o emergencia. Además, si tienes la aplicación abierta y el GPS activado, recibirás alertas cuando haya perros cercanos, lo cual es especialmente útil mientras conduces. Así, juntos podemos prevenir accidentes y garantizar la seguridad de los perros y las personas.</p> 
              <p class="text-justify">¡Únete a nuestra comunidad comprometida y marca la diferencia en la vida de los perros callejeros!</p></div>
          </div>
  
          <div class="col-md-4 top-left pl-3">
            <img id="snoop_doggy_doe_pic" alt="" class="img-fluid rounded-circle" src="/img/snoop_doggy_doe.jpg" >
          </div>
        </div>
  
      </div>
    </section>

    <section class="pt-3 pb-4 lomitos bg-violet" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center pb-3 fw-bold">Lomitos Descatados</h2>
          </div>
        </div>
  
        <div id="lomitos-recientes" class="row">
          
  
        </div>
    
      </div>
    </section>

    <section class="pt-3 pb-4 cuidadores" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center pb-3 fw-bold">Casitas Recientes</h2>
          </div>
        </div>
  
        <div id="casitas-dv" class="row">
          
            
        </div>
  
      </div>
  
  
    </section>

    <section class="pt-3 pb-4 lomitos bg-violet" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center pb-3 fw-bold">Padrinos Descatados</h2>
          </div>
        </div>
  
        <div id="lomitos-recientes" class="row">
          <div class="col-md-3">
            <div class="card h-100 bg-violet">
                          <img src="img/lomitos/merlin_1.jpeg" class="card-img-top rounded-circle" alt="Imagen 1">
                          <div class="card-body">
                            <h5 class="card-title fw-bold">Snoop Doggy Doe</h5>
                            <p class="card-text">Este encantador lomito es una mezcla de Pitbull y Labrador, y destaca por su increíble lealtad. Con su mirada tierna y su cola siempre enérgica, este compañero de cuatro patas es un verdadero amigo incondicional.</p>
                          </div>
                        </div></div><div class="col-md-3">
                          <div class="card h-100 bg-violet">
                          <img src="img/lomitos/negrito_puppy.jpeg" class="card-img-top rounded-circle" alt="Imagen 1">
                          <div class="card-body">
                            <h5 class="card-title fw-bold">Snoop Dogy Doe</h5>
                            <p class="card-text">Este encantador lomito es una mezcla de Pitbull y Labrador, y destaca por su increíble lealtad. Con su mirada tierna y su cola siempre enérgica, este compañero de cuatro patas es un verdadero amigo incondicional.</p>
                          </div>
                        </div></div><div class="col-md-3"><div class="card h-100 bg-violet">
                          <img src="img/lomitos/merlin_2.jpeg" class="card-img-top rounded-circle" alt="Imagen 1">
                          <div class="card-body">
                            <h5 class="card-title fw-bold">Snoop Doggy Doe</h5>
                            <p class="card-text">Este encantador lomito es una mezcla de Pitbull y Labrador, y destaca por su increíble lealtad. Con su mirada tierna y su cola siempre enérgica, este compañero de cuatro patas es un verdadero amigo incondicional.</p>
                          </div>
                        </div></div><div class="col-md-3"><div class="card h-100 bg-violet">
                          <img src="img/lomitos/negrito_puppy_2.jpeg" class="card-img-top rounded-circle" alt="Imagen 1">
                          <div class="card-body">
                            <h5 class="card-title fw-bold">Snoop Doggy Doe</h5>
                            <p class="card-text">Este encantador lomito es una mezcla de Pitbull y Labrador, y destaca por su increíble lealtad. Con su mirada tierna y su cola siempre enérgica, este compañero de cuatro patas es un verdadero amigo incondicional.</p>
                          </div>
                        </div></div></div>
  
      </div>
  
  
    </section>

    <section class="agenda-back">
        <div id="agenda" class="container">
          
          <div class="row">
              <div class="col-md-12">
                  <h2 class="title-agenda">AGENDA DE ACTIVIDADES</h2>
              </div>
              <div class="col-md-12 month-nav">
                  <img id="prev-month" src="img/i-prev.png" alt="">
                  <div class="month-dv">
                      <span class="month-sp"></span>
                      <span class="year-sp"></span>
                  </div>
                  <img id="next-month" src="img/i-next.png" alt="">
              </div>
              <div class="col-md-12 nav-weeks">

              </div>
              <div class="days">
                  <div class="day-column">
                      <h1 class="day__title">Lunes <span id="mon_date">7</span></h1>
                      <div id="day_1_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

                  <div class="day-column">
                      <h1 class="day__title">Martes <span id="tue_date">7</span></h1>
                      <div id="day_2_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

                  <div class="day-column">
                      <h1 class="day__title">Miercoles <span id="wed_date">7</span></h1>
                      <div id="day_3_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

                  <div class="day-column">
                      <h1 class="day__title">Jueves <span id="thu_date">7</span></h1>
                      <div id="day_4_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

                  <div class="day-column">
                      <h1 class="day__title">Viernes <span id="fri_date">7</span></h1>
                      <div id="day_5_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

                  <div class="day-column">
                      <h1 class="day__title">Sabado <span id="sat_date">7</span></h1>
                      <div id="day_6_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

                  <div class="day-column">
                      <h1 class="day__title">Domingo <span id="sun_date">7</span></h1>
                      <div id="day_7_events">
                          <span class="info">No hay eventos</span>
                      </div>
                  </div>

              </div>
          </div>

      </div>
    </section>

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>

                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                  Some quick example text to build on the card title and make up the bulk of the card's
                  content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Featured</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">

    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h4>Síguenos en nuestras redes sociales:</h4>
          <ul class="list-inline redes">
            <li class="list-inline-item">
              <a href="https://www.facebook.com/" target="_blank">
                <i class="fab fa-facebook-square"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.instagram.com/" target="_blank">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://api.whatsapp.com/send?phone=" target="_blank">
                <i class="fab fa-whatsapp"></i>
              </a>
            </li>
          </ul>
          <p>&copy; 2023 Cuidando al Lomito Snoop Doggy Doe.</p>
        </div>
      </div>
    </div>
    
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="adminlte/dist/js/demo.js"></script> -->

<script src="js/agenda.js"></script>

<script src="js/inicio.js"></script>

</body>
</html>
