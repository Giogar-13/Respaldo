fetch("../php/cambiosUsu.php")
    .then((response) => {
        return response.text();
    })
    .then((text) => {
        document.getElementById("cambio").addEventListener("click", () => {
            document.getElementById("Info").innerHTML = text;
        })
    })

fetch("../php/bloquearUsu.php")
    .then((response) => {
        return response.text();
    })
    .then((text) => {
        document.getElementById("bloquear").addEventListener("click", () => {
            document.getElementById("Info").innerHTML = text;
        })
    })



fetch("../php/revisarUsu.php")
    .then((response) => {
        return response.text();
    })
    .then((text) => {
        document.getElementById("revisar").addEventListener("click", () => {
            document.getElementById("Info").innerHTML = text;
        })
    })