function generarRecibo() {
    var carSelect = document.getElementById("carSelect");
    var car = carSelect.value;

    // Realizar una solicitud AJAX para generar el recibo de compra
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "generar_recibo.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var recibo = xhr.responseText;
            document.getElementById("reciboContent").innerText = recibo;
            document.getElementById("reciboContainer").style.display = "block";
        }
    };
    xhr.send("car=" + car); // Envía el valor del vehículo seleccionado al script PHP
}