document.addEventListener("DOMContentLoaded", function () {
    //El código se ejecuta al finalizar la carga del dom
    console.log('Ya cargo todo el DOM');
    localStorage.getItem("name_user") === null ? localStorage.setItem("name_user", prompt("Hola como te llamas?")) : '';
    var btn_round_dog = document.querySelector('#snoop_doggy_doe_pic');

    document.querySelector('#user-profile').innerText = localStorage.getItem("name_user");

    btn_round_dog.addEventListener('click', hola_func);

    window.addEventListener("beforeunload", function (event) {
        btn_round_dog.removeEventListener('click', hola_func);
    });

    load_data();

    function  hola_func(){
        alert("Hola "+localStorage.getItem("name_user"));
    } 

    function load_data(){
        fetch("jsons/home/lab7.json")
        .then((response) => response.json())
        .then((json) => {
            var content_lomitos = '';
            for (let index = 0; index < json.lomitos_recientes.length; index++) {
                content_lomitos = content_lomitos + literal_template_rounded_img(
                                                                json.lomitos_recientes[index].nombre,
                                                                json.lomitos_recientes[index].intro,
                                                                json.lomitos_recientes[index].picture
                                                            );
                
            }
            document.querySelector('#lomitos-recientes').innerHTML = content_lomitos;
            
            var content_casitas = '';
            for (let index = 0; index < json.casitas.length; index++) {
                content_casitas += literal_template_square_image(
                                                            json.casitas[index].nombre,
                                                            json.casitas[index].intro,
                                                            json.casitas[index].picture
                                                        );
                
            }
            document.querySelector('#casitas-dv').innerHTML = content_casitas;
        });
    }

    function literal_template_rounded_img(nombre, descript, img){
        var template = `<div class="col-md-3">
                            <div class="card h-100 bg-violet">
                                <img src="${img}" class="card-img-top rounded-circle" alt="Imagen 1">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold">${nombre}</h5>
                                    <p class="card-text">${descript}</p>
                                </div>
                            </div>
                        </div> `;

        return template;
    }

    function literal_template_square_image(nombre, descript, img){
        var template = `<div class="col-md-3">
                            <div class="card h-100">
                            <img src="${img}" class="card-img-top" alt="Imagen img/Imagen Testimonios/ana_torres.jpeg">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">${nombre}</h5>
                                <p class="card-text">${descript}</p>
                            </div>
                            </div>
                        </div>`;
        return template;
    }

});