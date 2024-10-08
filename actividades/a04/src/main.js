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