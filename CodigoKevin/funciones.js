//Funciones utiles para la diferentes interfacez, este archivo es utilizado en varios casos aunque no necesariamente utilice
//todas las funciones aqui presentadas, ya que eso depende del contexto.
function seleccionado(elemento,accion)
{
document.getElementById(elemento).style.opacity="10";
document.getElementById('esc').innerHTML=accion;
}
function deseleccionado(elemento)
{
document.getElementById(elemento).style.opacity="0.4";
document.getElementById('esc').innerHTML=':: Escoja alguna de las opciones ::';
}