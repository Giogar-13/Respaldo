/*Programa encargado de analizar los eventos del navbar, para que con base en esto se puedan desplegar las encuestas correspondientes.*/
let body = document.getElementById('content');
let responder = document.getElementById('resp');
let hacerEnc = document.getElementById("hacerEnc");
let refresh = document.getElementById("refresh");
let consulta = document.getElementById("consultar");
let misEnc = document.getElementById("misEnc");
let denunciar = document.getElementById("denunciar");
let perfil = document.getElementById("perfil");
let cSesion = document.getElementById("cSesion");
let cambio = document.getElementById("cambio");
/*Evento que despliega las encuestas que el usuario aún no contesta. Se imprime toda la información de la misma con la opciones de denunciar la encuesta o responderla.*/


$("#creditos").click(function() {
    $(".modal").css("display", "flex");
    $("#titulo").text("Créditos");
    $("#jugarD").css("display", "none");
    $(".body").html("Este proyecto fue realizado por el equipo 'Los flash', conformado por: <br> <ol><li>Baez de la Rosa Ingrid Montserrat</li><li>Domínguez Ávila Luis Antonio</li><li>Garfias Becerril Giovanni</li><li>Pérez Romero Natalia Abigail</li><li>Villafán Flores María Fernanda</li></ol> El proyectó se comenzó a realizar el 21 de junio de 2020 y se concluyó el 27 de junio del mismo año. Nuestro proyecto lleva por nombre Exprésate Coyote, un sistema dedicado a la realización de encuestas para la comunidad estudiantil. Se agradece infinitamente a los instructores que nos apoyaron durante todo el curso. <br><br> Curso web 2020. ");
})

cierre.addEventListener("click", () => {
    $(".modal").css("display", "none");
});

responder.addEventListener("click", () => {
    $("#content").empty();
    $("#refresh").css("display", "none");
    fetch("../dynamics/php/principalEncuestas.php?consulta=1")
        .then((response) => {
            return ret = response.text();
        }).then((text) => {
            let preguntas = JSON.parse(text);
            let tabla = document.createElement("table");
            tabla.setAttribute("id", "table");
            body.appendChild(tabla);
            let tablaInsertar = document.getElementById("table");
            let encabezado4 = document.createElement("th");
            encabezado4.innerText = "Título";
            tablaInsertar.appendChild(encabezado4);
            let encabezado1 = document.createElement("th");
            encabezado1.innerText = "Creador";
            tablaInsertar.appendChild(encabezado1);
            let encabezado2 = document.createElement("th");
            encabezado2.innerText = "Descripcion";
            tablaInsertar.appendChild(encabezado2);
            let encabezado8 = document.createElement("th");
            encabezado8.innerText = "Categoría";
            tablaInsertar.appendChild(encabezado8);
            let encabezado3 = document.createElement("th");
            encabezado3.innerText = "Contestar";
            tablaInsertar.appendChild(encabezado3);
            let encabezado5 = document.createElement("th");
            encabezado5.innerText = "Denunciar";
            tablaInsertar.appendChild(encabezado5);
            preguntas.forEach((element) => {
                let row = document.createElement("tr");
                let titulo = document.createElement("td");
                titulo.innerText = element[3];
                row.appendChild(titulo);
                let creador = document.createElement("td");
                creador.innerText = element[1];
                row.appendChild(creador);
                let descripcion = document.createElement("td");
                descripcion.innerText = element[2];
                row.appendChild(descripcion);
                let categoriaEnc = document.createElement("td");
                categoriaEnc.innerText = element[4];
                row.appendChild(categoriaEnc);
                let espacioBoton = document.createElement("td");
                let boton = document.createElement("button");
                boton.innerHTML = '<i class="fas fa-edit"></i>';
                boton.setAttribute("id", element[0]);
                boton.classList.add("aEncuesta");
                espacioBoton.appendChild(boton);
                row.appendChild(espacioBoton);
                let denunciar = document.createElement("button");
                denunciar.classList.add("denunciar");
                denunciar.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
                denunciar.addEventListener("click", () => {
                    fetch("../dynamics/php/sancion.php?encuesta=" + element[0])
                        .then(() => {
                            window.location.reload();
                        })
                })
                row.appendChild(denunciar);
                tablaInsertar.appendChild(row);
                eventBoton = document.getElementById(element[0]);
                eventBoton.addEventListener("click", () => {
                    $("#refresh").css("display", "inline");
                    $("#denunciar").css("display", "inline");
                    fetch("../dynamics/php/actual.php?encuesta=" + element[0])
                        .then((response) => {
                            return contenido = response.text();
                        }).then((text) => {
                            body.innerHTML = text;
                        })
                })
            })
        })
});
/*Evento que despliega las encuestas que creó el usuario, se le da la oportunidad de eliminar la encuesta o consultar los resultados de la misma.*/
misEnc.addEventListener("click", () => {
        $("#refresh").css("display", "none");
        $("#content").empty();
        fetch("../dynamics/php/principalEncuestas.php?consulta=3")
            .then((response) => {
                return ret = response.text();
            }).then((text) => {
                let preguntas = JSON.parse(text);
                let tabla = document.createElement("table");
                tabla.setAttribute("id", "table");
                body.appendChild(tabla);
                let tablaInsertar = document.getElementById("table");
                let encabezado1 = document.createElement("th");
                encabezado1.innerText = "Título";
                tablaInsertar.appendChild(encabezado1);
                let encabezado2 = document.createElement("th");
                encabezado2.innerText = "Descripcion";
                tablaInsertar.appendChild(encabezado2);
                let encabezado3 = document.createElement("th");
                encabezado3.innerText = "Consultar";
                tablaInsertar.appendChild(encabezado3);
                let encabezado4 = document.createElement("th");
                encabezado4.innerText = "Eliminar";
                tablaInsertar.appendChild(encabezado4);

                let encabezado5 = document.createElement("th");
                encabezado5.innerText = "Gráficas";
                tablaInsertar.appendChild(encabezado5);

                preguntas.forEach((element) => {
                    let row = document.createElement("tr");
                    let titulo = document.createElement("td");
                    titulo.innerText = element[1];
                    row.appendChild(titulo);
                    let descripcion = document.createElement("td");
                    descripcion.innerText = element[2];
                    row.appendChild(descripcion);
                    let espacioBoton = document.createElement("td");
                    let boton = document.createElement("button");
                    boton.innerHTML = '<i class="far fa-eye"></i>';
                    boton.setAttribute("id", element[0]);
                    boton.classList.add("aEncuesta");
                    espacioBoton.appendChild(boton);
                    row.appendChild(espacioBoton);
                    let eliminarEnc = document.createElement("button");
                    eliminarEnc.classList.add("eliminar");
                    eliminarEnc.innerHTML = "<i class='fas fa-trash'></i>";
                    eliminarEnc.addEventListener("click", () => {
                        fetch("../dynamics/php/eliminar.php?encuesta=" + element[0])
                            .then(() => {
                                window.location.reload();
                            })
                    })
                    row.appendChild(eliminarEnc);
                    encuestas = document.createElement("td")
                    let bEncuestas = document.createElement("button");
                    bEncuestas.classList.add()
                    bEncuestas.innerHTML = "<i class='fas fa-chart-pie'></i>";
                    bEncuestas.addEventListener("click", () => {
                        $("#content").empty();
                        fetch("graficas.php?encuesta=" + element[0])
                            .then((response) => {
                                return graf = response.text();
                            }).then((text) => {
                                let arreglos = JSON.parse(text);
                                let contador = 0;
                                arreglos[0].forEach((element) => {
                                    let canvas = document.createElement("canvas");
                                    body.appendChild(canvas);
                                    let context = canvas.getContext('2d');
                                    let grafica = new Chart(context, {
                                        type: 'pie',
                                        data: {
                                            labels: element[0],
                                            datasets: [{
                                                backgroundColor: ["red", "yellow", "purple", "orange", "lime", "navy", "aqua", "marron", "teal", "black"],
                                                data: element[1]
                                            }]
                                        },
                                        options: {
                                            title: {
                                                display: true,
                                                text: arreglos[1][contador]
                                            }
                                        }
                                    });
                                    contador++;
                                })
                            })
                    })
                    encuestas.appendChild(bEncuestas);
                    row.appendChild(encuestas);
                    tablaInsertar.appendChild(row);
                    eventBoton = document.getElementById(element[0]);
                    eventBoton.addEventListener("click", () => {
                        $("#refresh").css("display", "inline");
                        fetch("../dynamics/php/actual.php?encuesta=" + element[0])
                            .then((response) => {
                                return contenido = response.text();
                            }).then((text) => {
                                body.innerHTML = text;
                            })
                    })
                })
            })
    })
    /*Evento que despliega las encuestas que el usuario ya contestó, se le da la opción de consultar los resultados de la misma*/
consulta.addEventListener("click", () => {
    $("#refresh").css("display", "none");
    $("#content").empty();
    fetch("../dynamics/php/principalEncuestas.php?consulta=2")
        .then((response) => {
            return ret = response.text();
        }).then((text) => {
            let preguntas = JSON.parse(text);
            console.log(preguntas);
            let tabla = document.createElement("table");
            tabla.setAttribute("id", "table");
            body.appendChild(tabla);
            let tablaInsertar = document.getElementById("table");
            let encabezado1 = document.createElement("th");
            encabezado1.innerText = "Título";
            tablaInsertar.appendChild(encabezado1);
            let encabezado2 = document.createElement("th");
            encabezado2.innerText = "Descripcion";
            tablaInsertar.appendChild(encabezado2);
            let encabezado3 = document.createElement("th");
            encabezado3.innerText = "Consultar";
            tablaInsertar.appendChild(encabezado3);
            let encabezado4 = document.createElement("th");
            encabezado4.innerText = "Gráficas";
            tablaInsertar.appendChild(encabezado4);
            preguntas.forEach((element) => {
                let row = document.createElement("tr");
                let titulo = document.createElement("td");
                titulo.innerText = element[2];
                row.appendChild(titulo);
                let descripcion = document.createElement("td");
                descripcion.innerText = element[3];
                row.appendChild(descripcion);
                let espacioBoton = document.createElement("td");
                let boton = document.createElement("button");
                boton.innerHTML = '<i class="far fa-eye"></i>';
                boton.setAttribute("id", element[0]);
                boton.classList.add("aEncuesta");
                espacioBoton.appendChild(boton);
                row.appendChild(espacioBoton);
                encuestas = document.createElement("td")
                let bEncuestas = document.createElement("button");
                bEncuestas.innerHTML = "Encuestas";
                bEncuestas.addEventListener("click", () => {
                    $("#content").empty();
                    fetch("graficas.php?encuesta=" + element[0])
                        .then((response) => {
                            return graf = response.text();
                        }).then((text) => {
                            let arreglos = JSON.parse(text);
                            console.log(arreglos);
                            let contador = 0;
                            arreglos[0].forEach((element) => {
                                let canvas = document.createElement("canvas");
                                body.appendChild(canvas);
                                let context = canvas.getContext('2d');
                                let grafica = new Chart(context, {
                                    type: 'pie',
                                    data: {
                                        labels: element[0],
                                        datasets: [{
                                            backgroundColor: ["red", "yellow", "purple", "orange", "lime", "navy", "aqua", "marron", "teal", "black"],
                                            data: element[1]
                                        }]
                                    },
                                    options: {
                                        title: {
                                            display: true,
                                            text: arreglos[1][contador]
                                        }
                                    }
                                });
                                contador++;
                            })
                        })
                })
                encuestas.appendChild(bEncuestas);
                row.appendChild(encuestas);
                tablaInsertar.appendChild(row);
                let eventBoton = document.getElementById(element[0]);
                eventBoton.addEventListener("click", () => {
                    $("#refresh").css("display", "inline");
                    fetch("../dynamics/php/actual.php?encuesta=" + element[0])
                        .then((response) => {
                            return contenido = response.text();
                        }).then((text) => {
                            body.innerHTML = text;
                        })
                })
            })
        })
});

perfil.addEventListener("click", () => {
    //Colocar aquí la ruta del archivo del perfil.
    window.location = "../dynamics/php/principalPer.php"
})

refresh.addEventListener("click", () => {
    window.location.reload();
});

hacerEnc.addEventListener("click", () => {
    window.location = "./hacer.html";
});

cSesion.addEventListener("click", () => {
    window.location = "../dynamics/php/cerrarS.php";
})