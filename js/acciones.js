function Comenzar()
{
var reloj=new Date();
var horas=reloj.getHours();
var minutos=reloj.getMinutes();
var segundos=reloj.getSeconds();
// Agrega un cero si .. minutos o segundos <10
minutos=revisarTiempo(minutos);
segundos=revisarTiempo(segundos);
document.getElementById('hora').innerHTML=horas+":"+minutos+":"+segundos;
tiempo=setTimeout(function(){Comenzar()},500); 
/*en tiempo creamos una funcion generica que cada 
500 milisegundos ejecuta la funcion Comenzar()*/
}

function revisarTiempo(i)
{
if (i<10)
  {
  i="0" + i;
  }
return i;
/*Esta funcion le agrega un 0 
a una variable i que sea menor a 10*/
}
