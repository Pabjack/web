function obtenerParametroUrl(name)
{
   
    //validacion de caracteres especiales con corchete
    name = name.replace(/[\[\]]/g, "\\$&")
    //busca el parametro precedido por el signo de ?
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)");
    //asigna a una variable retults el url depurado
    results = regex.exec(url);
    if(!results) return null;
    if(!results[2]) return '';

    return decodeURIComponent(results[2].replace(/\+/g, ""));
}
var nombre = obtenerParametroUrl('nombre');
var nocontrol = obtenerParametroUrl('nocontrol');

document.write("<p>Nombre: " + nombre + "</p>");
document.write("<p id= ' inputnocontrol' name = 'inputnocontrol'> No_control:  " + nocontrol +  "</p>");