let playing_snoop = false;
let actual_position = {};

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

function show_loader_bars() {
  let content = '<div id="loader-xhr"><div class="dots-bars-6"></div></div>';
  $("body").prepend(content);
}

function hide_loader_bars() {
  $("#loader-xhr").remove();
}

function get_literal_card_h_100(image, title, intro) {
  let lit_template = `<div class="card h-100">
                        <img src="${image}" class="card-img-top" alt="Imagen ${image}">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">${title}</h5>
                          <p class="card-text">${intro}</p>
                        </div>
                      </div>`;
  return lit_template;
}

function get_literal_card_h_100_rounded_img(image, title, intro) {
  let lit_template = `<div class="card h-100">
                        <img src="${image}" class="card-img-top rounded-circle" alt="Imagen 1">
                        <div class="card-body">
                          <h5 class="card-title fw-bold">${title}</h5>
                          <p class="card-text">${intro}</p>
                        </div>
                      </div>`;
  return lit_template;
}

function add_validation_message(selector, message) {
  if ($(selector).parent().find(".warn-message").length <= 0) {
    var warn_message = document.createElement("div");
    warn_message.innerText = message;
    warn_message.classList.add("warn-message");
    console.log($(selector).parent());
    $(selector).parent().append(warn_message);
  }
}

function remove_validation_message(selector) {
  $(selector).parent().find(".warn-message").remove();
}

function playSnoop() {
  //Create the audio tag
  var soundFile = document.createElement("audio");
  soundFile.preload = "auto";
  var fileName = "audio/snoop_long";
  //Load the sound file (using a source element for expandability)
  var src = document.createElement("source");
  src.src = fileName + ".mp3";
  soundFile.appendChild(src);

  //Load the audio tag
  //It auto plays as a fallback
  soundFile.load();
  soundFile.volume = 0.8;
  if(playing_snoop === false){
    soundFile.play();
    playing_snoop = true;
  }
  
  soundFile.addEventListener("ended", function(){
    soundFile.currentTime = 0;
    playing_snoop = false;
    console.log("ended");
    soundFile.remove();
  });
  
  //Due to a bug in Firefox, the audio needs to be played after a delay
  /* setTimeout(function () {
    soundFile.play();
  }, 1); */
}

function get_location_navigator(){
  //const status = document.querySelector('.status');
  const success = (position=>{
    console.log(position);
    actual_position = position;
    alert(" Latitud: "+position.coords.latitude+" - Longitud: "+position.coords.longitude+" - Acuraccy: "+position.coords.accuracy);
  })

  const error = () => {
    //status.textContent = 'Unable to retrieve your location';
    alert('Unable to retrieve your location');
  }


  navigator.geolocation.getCurrentPosition(success, error);
}

function handlePermissionLocation() {
  navigator.permissions.query({ name: "geolocation" }).then((result) => {
    if (result.state === "granted") {
      report(result.state);
      get_location_navigator();
    } else if (result.state === "prompt") {
      report(result.state);
      get_location_navigator();
    } else if (result.state === "denied") {
      report(result.state);
      alert('Necesita activar permiso para compartir geolocalización');
    }
    result.addEventListener("change", () => {
      report(result.state);
    });
  });
}

function report(state) {
  console.log(`Permission ${state}`);
}
