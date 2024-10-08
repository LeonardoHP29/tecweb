/*
function getDatos(){
    var nombre=prompt('Nombre: ', '');
    var edad=prompt('Edad: ', 0);

    var div1 = document.getElementById('nombre');
    div1.innerHTML = '<h3>Nombre: ' + nombre + '</h3>';
    var div2 = document.getElementById('edad');
    div2.innerHTML = '<h3>Edad: ' + edad + '</h3>';
}*/
function ejercicio1(){
    var div3 = document.getElementById('Ejemplo1'); 
    div3.innerHTML = '<h3>Hola Mundo</h3>';
}
function ejercicio2(){
    var nombre='Juan';
    var edad=10;
    var altura=1.92;
    var casado=true;
    var div4 = document.getElementById('Ejemplo2');
    div4.innerHTML='<p>'+nombre+'<br>'+edad+'<br>'+altura+'<br>'+casado+'<br>'+'</p>';
}
function ejercicio3(){
    var nombre;
    var edad;
    nombre=prompt('Ingresa tu nombre: ','');
    edad=prompt('Ingresa tu edad: ',0);
    var div5 = document.getElementById('Ejemplo3');
    div5.innerHTML='<p>Hola '+nombre+' asi que tienes '+edad+' años</p>'
}
function ejercicio4(){
    var valor1;
    var valor2;
    valor1=prompt('Introducir el primer numero: ','');
    valor2=prompt('Introducir el segundo numero: ','');
    var suma=parseInt(valor1)+parseInt(valor2);
    var producto=parseInt(valor1)*parseInt(valor2);
    var div6 = document.getElementById('Ejemplo4');
    div6.innerHTML='<p>La suma es '+suma+'<br>El producto es '+producto+' </p>'
}
function ejercicio5(){
    var nombre;
    var nota;
    nombre=prompt('Ingresa tu nombre: ','');
    nota=prompt('Ingresa tu nota: ', '');
    var div7 = document.getElementById('Ejemplo5');
    if(nota>=4){
        div7.innerHTML='<p>'+nombre+' esta aprobado con un '+nota+'</p>'
    }
}
function ejercicio6(){
    var num1,num2;
    num1=prompt('Ingresa el primer numero: ', '');
    num2=prompt('Ingresa el segundo numero: ','');
    num1=parseInt(num1);
    num2=parseInt(num2);
    var div8 = document.getElementById('Ejemplo6');
    if(num1>num2){
        div8.innerHTML='<p>El mayor es '+num1+'</p>';
    }else{
        div8.innerHTML='<p>El mayor es '+num2+'</p>';
    }
}
function ejercicio7(){
    var nota1, nota2, nota3;
    nota1=prompt('Ingresa 1ra. nota: ','');
    nota2=prompt('Ingresa 2da. nota: ','');
    nota3=prompt('Ingresa 3ra. nota: ','');
    nota1=parseInt(nota1);
    nota2=parseInt(nota2);
    nota3=parseInt(nota3);
    var pro;
    pro=(nota1+nota2+nota3)/3;
    var div9 = document.getElementById('Ejemplo7');
    if(pro>=7){
        div9.innerHTML='<p>Aprobado</p>';
    }else{
        if(pro>=4){
            div9.innerHTML='<p>Regular</p>';
        }else{
            div9.innerHTML='<p>Reprobado</p>';
        }
    }
}
function ejercicio8(){
    var valor;
    valor=prompt('Ingresar un valor comprendido entre 1 y 5: ', '');
    valor=parseInt(valor);
    var div10 = document.getElementById('Ejemplo8');
    switch(valor){
        case 1:div10.innerHTML='<p>Uno</p>';
        break;
        case 2:div10.innerHTML='<p>Dos</p>';
        break;
        case 3:div10.innerHTML='<p>Tres</p>';
        break;
        case 4:div10.innerHTML='<p>Cuatro</p>';
        break;
        case 5:div10.innerHTML='<p>Cinco</p>';
        break;
        default:div10.innerHTML='<p>Debe ingresar un valor comprendido entre 1 y 5.</p>';
    }
}
function ejercicio9(){
    var col;
    col=prompt('Ingresa el color con que quiera pintar el fondo del div (rojo, verde, azul)','');
    var div11 = document.getElementById('Ejemplo9');
    div11.style.width='100px';
    div11.style.height='100px';
    switch(col){
        case 'rojo':div11.style.backgroundColor='#ff0000';
        break;
        case 'verde':div11.style.backgroundColor='#00ff00';
        break;
        case 'azul':div11.style.backgroundColor='#0000ff';
        break;
    }
}
function ejercicio10(){
    var x;
    x=1;
    var resultado='';
    var div12 = document.getElementById('Ejemplo10');
    while(x<=100){
       resultado='<p>'+resultado+x+'<br></p>';
       x=x+1;
    }
    div12.innerHTML=resultado;
}
function ejercicio11(){
    var x=1;
    var suma=0;
    var valor;
    while(x<=5){
        valor=prompt('Ingresar el valor: ','');
        valor=parseInt(valor);
        suma=suma+valor;
        x=x+1;
    }
    var div13 = document.getElementById('Ejemplo11');
    div13.innerHTML='<p>La suma de los valores es '+suma+'<br></p>'
}
function ejercicio12() {
    var valor;
    var div14 = document.getElementById('Ejemplo12'); 
    var resultado = ''; 
    do {
        valor = prompt('Ingresa un valor entre 0 y 999:', '');
        valor = parseInt(valor);
        resultado += '<p>El valor ' + valor + ' tiene ';
        if (valor < 10) {
            resultado += " 1 dígito";
        } else if (valor < 100) {
            resultado += " 2 dígitos";
        } else {
            resultado += " 3 dígitos";
        }
        resultado += "<br></p>"; 
    } while (valor != 0);
    div14.innerHTML = resultado;
}
function ejercicio13(){
    var f;
    var resultado='';
    var div15 = document.getElementById('Ejemplo13');
    div15.innerHTML='<p>';
    for(f=1;f<=10;f++){
        resultado=resultado+f+' ';
    }
    div15.innerHTML+=resultado+'</p>';
}
