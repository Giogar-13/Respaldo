
fetch("..dynamics/php/cambiosUsu.php")
    .then((response) => {
        return response.text();
    })
    .then((text) => {
        console.log(text);
        document.getElementById("cambio").addEventListener("click", () => {
            document.getElementById("Info").innerHTML = text;
        })
    })

    document.getElementById("cambio").addEventListener("click", () => {
        console.log(8);
    })
