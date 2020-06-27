fetch("../templates/alumno.html")
    .then((response) => {
        return response.text();
    })
    .then((text) => {
        document.getElementById("alumno").addEventListener("click", () => {
            document.getElementById("campos").innerHTML = text;
        })
    })



fetch("../templates/profesor.html")
    .then((response) => {
        return response.text();
    })
    .then((text) => {
        document.getElementById("profesor").addEventListener("click", () => {
            document.getElementById("campos").innerHTML = text;
        })
    })