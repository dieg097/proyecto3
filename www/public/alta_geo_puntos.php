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

  <link rel="stylesheet" href="file_input/css/fileinput.min.css">
  <link rel="stylesheet" href="file_input/themes/explorer-fa5/theme.min.css">
  <link rel="stylesheet" href="leaflet/leaflet.css">
  <script src="leaflet/leaflet.js" type="text/javascript"></script>

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
  <?php include 'left_nav.php' ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-10">
            <h1 class="m-0 article-title">Alta Casitas Callejeras</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 col-md-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home.html">Inicio</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section id="altaCasitas">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-left mb-4 fw-bold">Formulario de contacto</h2>
                    <form id="alta_form" clearfix>
                        <div class="mb-3 file-loading">
                            <input id="file-es" name="file-es[]" type="file" multiple>
                        </div>
                        <div class="mt-3 mb-3">
                            <div id="map" style="height: 300px;"></div>
                        </div>
                        <div class="mt-3 mb-3">
                            <img id="snoop_doggy_doe_pic" alt="" class="img-fluid rounded-circle" style="width: 50px; display: block; margin: auto;" src="/img/snoop_doggy_doe.jpg">
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="latitud_ho" class="form-label"></label>
                            <input type="text" class="form-control" id="latitud_ho" name="latitud_ho" placeholder="Ingrese latitud">
                        </div>

                        <div class="mt-3 mb-3">
                            <label for="longitud_ho" class="form-label"></label>
                            <input type="text" class="form-control" id="longitud_ho" name="longitud_ho" placeholder="Ingrese longitud">
                        </div>

                        <div class="mt-3 mb-3">
                            <img id="manual_set_coord" alt="" class="img-fluid rounded-circle" style="width: 50px; display: block; margin: auto;" src="/img/manual_entry_coordinates_icon_50x50.jpeg">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label"></label>
                            <input type="text" class="form-control" id="name_ho" name="name_ho" placeholder="Ingrese nombre">
                        </div>
                        <div class="mb-3">
                            <label for="email_ho" class="form-label"></label>
                            <input type="email" class="form-control" id="email_ho" name="email_ho" placeholder="Ingrese correo electrónico">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="message_cnt" class="form-label"></label>
                            <textarea class="form-control" id="message_ho" rows="5" placeholder="Ingrese mensaje"></textarea>
                        </div> -->
                        
                        <button id="send_frm" type="submit" class="btn btn-primary fw-bold">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
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

<!-- File Input-->
<script src="file_input/plugins/buffer.min.js" type="text/javascript"></script>
<script src="file_input/plugins/filetype.min.js" type="text/javascript"></script>
<script src="file_input/plugins/piexif.min.js" type="text/javascript"></script>
<script src="file_input/plugins/sortable.min.js" type="text/javascript"></script>
<script src="file_input/fileinput.min.js" type="text/javascript"></script>
<script src="file_input/locales/es.js" type="text/javascript"></script>
<script src="file_input/themes/fa5/theme.min.js" type="text/javascript"></script>
<script src="file_input/themes/explorer-fa5/theme.min.js" type="text/javascript"></script>

<script src="js/utils.js"></script>
<script src="js/alta_geo_puntos.js"></script>

</body>
</html>
