document.addEventListener("DOMContentLoaded", function () {
    //El código se ejecuta al finalizar la carga del dom
    console.log('Ya cargo todo el DOM');
    var posicion = null;

    $("#file-es").fileinput({
        theme: "fa5",
        language: "es",
        //uploadUrl: "https://snoopdoggydoe.website/test_forms.php",
        showUpload: false,
        allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
      });

      const map = L.map('map').setView([-35.4161607, -71.664794], 15);
    
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var btn_round_dog = document.querySelector('#snoop_doggy_doe_pic');
        var btn_round_by_hand = document.querySelector('#manual_set_coord');

        btn_round_dog.addEventListener('click', get_geo_loc);
        btn_round_by_hand.addEventListener('click', manual_geo_location);

        document.querySelector('#alta_form').addEventListener('submit', function(event){
            event.preventDefault();
            if(validate_send()){
              send_geolocation();
            }
        });

        function validate_send(){
            var valid = true;

            if(document.querySelector('#name_ho').value === ''){
                add_validation_message(
                    "#name_ho",
                    "Debes introducir un nombre de casita"
                  );

                valid = false;
            }else{
                remove_validation_message("#name_ho");  
            }

            if(!isEmail(document.querySelector('#email_ho').value)){
                add_validation_message(
                    "#email_ho",
                    "Debes introducir un email para la casita"
                  );

                valid = false;
            }else{
                remove_validation_message("#email_ho");
            }

            if(posicion === null){
                add_validation_message(
                    "#map",
                    "Debes capturar coordenada"
                  );

                valid = false;
            }else{
                remove_validation_message("#map");
            }

            return valid;
        }
        
        function manual_geo_location(){
          posicion = {
            latitude: 0,
            longitude:0
          }

          posicion.latitude = document.querySelector('#latitud_ho').value;
          posicion.longitude = document.querySelector('#longitud_ho').value;

          var marker = L.marker([posicion.latitude, posicion.longitude]).addTo(map).bindTooltip("Ubicación manual");
          map.flyTo([posicion.latitude, posicion.longitude]);
        }

        function get_geo_loc(){
            //playSnoop();
            navigator.permissions.query({ name: "geolocation" }).then((result) => {
                if (result.state === "granted") {
                  report(result.state);
                  get_location_navigator_in_map();
                  
                } else if (result.state === "prompt") {
                  report(result.state);
                  get_location_navigator_in_map();
                } else if (result.state === "denied") {
                  report(result.state);
                  alert('Necesita activar permiso para compartir geolocalización');
                }
                result.addEventListener("change", () => {
                  report(result.state);
                });
              });
        }

        function send_geolocation() {
            let data_snd = new FormData();
        
            data_snd.append("name", $("#name_ho").val());
            data_snd.append("email", $("#email_ho").val());
            //data_snd.append("message", $("#message_ho").val());
            data_snd.append('latitud', posicion.latitude);
            data_snd.append('longitud', posicion.longitude);
            //data_snd.append("file_1", $("#file-es").prop('files')["0"]);

            let fileList = $("#file-es").prop('files');
            let i = 1;
        
            for (const key in fileList) {
              if(key=="0"){
                data_snd.append("file_" + i, fileList[key]);
              }
              console.log(fileList[key]);
              console.log(key);
              i++;
            }
        
            send_to_server_javascript(data_snd);
          }
        
          function send_to_server_javascript(data_snd) {
            var xhr = new XMLHttpRequest();
            //xhr.open("POST", "https://snoopdoggydoe.website/test_forms.php", true);
            //xhr.open("POST", "http://localhost/test_forms.php", true);
            xhr.open("POST", "http://localhost/keep_punto_geo.php", true);
            xhr.onload = xhr.onerror = function () {
              console.log(xhr.responseText);
              alert("Envio exitoso");
            };
            xhr.send(data_snd);
          }

        function get_location_navigator_in_map(){
            //const status = document.querySelector('.status');
            const success = (position=>{
              posicion = position.coords;
              var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map).bindTooltip("Ubicación actual");
              map.flyTo([position.coords.latitude, position.coords.longitude]);
            })
          
            const error = () => {
              //status.textContent = 'Unable to retrieve your location';
              alert('Unable to retrieve your location');
              return null;
            }
          
          
            navigator.geolocation.getCurrentPosition(success, error);
          }

     
});