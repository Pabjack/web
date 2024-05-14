function obtenerParametroURL(nombre)
{
    nombre = nombre.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + nombre + "(=([^&#]*)|&|#|$)");
    resultados = regex.exec(window.location.href);
    if(!resultados) return null;
    if(!resultados[2]) return '';
    return decodeURIComponent(resultados[2].replace(/\+/g, ""));
}
var nombre = obtenerParametroURL('nombre');
var nocontrol = obtenerParametroURL('nocontrol');
//posiblemente se tenga que cambiar a no_control 
document.write("<p> Nombre: " + nombre + "</p>");
document.write("<p id='nocontrol' nombre='nocontrol' no_control: "+ nocontrol +"</p>");
