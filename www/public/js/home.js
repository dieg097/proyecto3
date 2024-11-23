$(document).ready(function () {
  $("#file-es").fileinput({
    theme: "fa5",
    language: "es",
    uploadUrl: "https://snoopdoggydoe.website/test_forms.php",
    showUpload: false,
    allowedFileExtensions: ["jpg", "png", "gif"],
  });

  $("#send_cnt").click(function (e) {
    e.preventDefault();
    if (validar_send_contact_us()) {
      send_contact_us();
    }
  });

  $("#snoop_doggy_doe_pic").click(function (e) {
    e.preventDefault();
    playSnoop();
    handlePermissionLocation();
  });

  load_home_info();
  load_destacados();
  startMap();

  //Llamado por fetch
  function load_home_info() {
    $("#title-about-us").hide(1);
    $("#content-about-us").fadeOut(1);
    $("#snoop_doggy_doe_pic").fadeOut(1);
    $("#doe-name").hide(1);
    show_loader_bars();
    fetch("jsons/home/home.json")
      .then((response) => response.json())
      .then((json) => {
        console.log(json);
        //Pure JavaScript Way
        document.getElementById("title-about-us").innerText =
          json.about_us.title;
        $("#title-about-us").show(250);
        $("#content-about-us").fadeIn(250);
        //JQuery Way
        $("#content-about-us").html(json.about_us.content);
        //Pure JavaScript Way
        document
          .getElementById("snoop_doggy_doe_pic")
          .setAttribute("src", json.about_us.image);
        //JQuery Style
        $("#snoop_doggy_doe_pic").fadeIn(250);
        //Animación
        $("#doe-pic").attr("src", json.user_pic);
        $("#doe-pic").animate(
          {
            opacity: 1,
            width: "2.2em",
          },
          250,
          function () {}
        );
        //JQuery Way
        $("#doe-name").text(json.user_name);
        $("#doe-name").show(500);
        hide_loader_bars();
      });
  }

  function load_destacados() {
    $(".cuidadores").fadeOut(1);
    $(".lomitos").fadeOut(1);
    show_loader_bars();
    $.get("jsons/home/destacados.json", function (data) {
      //console.log(data);
      var cuida = "";
      data.cuidadores_destacados.forEach((element) => {
        cuida += '<div class="col-md-3">';
        cuida += get_literal_card_h_100(
          element.picture,
          element.nombre,
          element.intro
        );
        cuida += "</div>";
        //console.log($cuida);
      });
      $("#cuidadores-destacados").html(cuida);

      cuida = "";
      data.lomitos_recientes.forEach((element) => {
        cuida += '<div class="col-md-3">';
        cuida += get_literal_card_h_100_rounded_img(
          element.picture,
          element.nombre,
          element.intro
        );
        cuida += "</div>";
        //console.log($cuida);
      });
      $("#lomitos-recientes").html(cuida);
      hide_loader_bars();
      $(".cuidadores").fadeIn(500);
      $(".lomitos").fadeIn(500);
    });
  }

  function validar_send_contact_us() {
    let valid = true;
    if ($("#name_cnt").val() === "") {
      add_validation_message(
        "#name_cnt",
        "Debes introducir por lo menos un nombre"
      );
      valid = false;
    } else {
      remove_validation_message("#name_cnt");
      valid = true;
    }

    if (!isEmail($("#email_cnt").val())) {
      add_validation_message("#email_cnt", "Debes introducir un email válido");
      valid = false;
    } else {
      remove_validation_message("#email_cnt");
      valid = true;
    }

    return valid;
  }

  function send_contact_us() {
    let data_snd = new FormData();

    data_snd.append("name", $("#name_cnt").val());
    data_snd.append("email", $("#email_cnt").val());
    data_snd.append("message", $("#message_cnt").val());

    let fileList = $("#file-es").fileinput("getFileList");
    let i = 1;

    for (const key in fileList) {
      data_snd.append("file_" + i, fileList[key]);
      i++;
    }

    send_to_server_javascript(data_snd);
    //send_to_server_jq_ajax(data_snd);
  }

  function send_to_server_javascript(data_snd) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "https://snoopdoggydoe.website/test_forms.php", true);
    xhr.onload = xhr.onerror = function () {
      console.log(xhr.responseText);
      alert("Envio exitoso");
    };
    xhr.send(data_snd);
  }

  function send_to_server_jq_ajax(data_snd) {
    $.ajax({
      url: "https://snoopdoggydoe.website/test_forms.php",
      data: data_snd,
      processData: false,
      contentType: false,
      type: "POST",
      success: function (data) {
        console.log(data);
      },
    });
  }

  function startMap() {
    const map = L.map('map').setView([-35.4161607, -71.664794], 15);

	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

    var marker = L.marker([-35.4260366, -71.653858]).addTo(map).bindTooltip("Punto de prueba 1");
    var marker_placita = L.marker([-35.41616079920004, -71.66479436605353]).addTo(map).bindTooltip("Placita de los Perritos").openTooltip();
  }
});
