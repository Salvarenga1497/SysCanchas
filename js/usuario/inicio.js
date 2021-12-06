
function Mostrar(){
 
    document.getElementById("PrimerPantalla").style.display="block";
    document.getElementById("SegundaPantalla").style.display="none";
    document.getElementById("TercerPantalla").style.display="none";
    document.getElementById("Primero").style.backgroundColor="green";
    document.getElementById("Primero").style.color="white";
    document.getElementById("Segundo").style.backgroundColor="white";
    document.getElementById("Segundo").style.color="black";

};

function Mostrar2(){
   
    document.getElementById("PrimerPantalla").style.display="none";
    document.getElementById("SegundaPantalla").style.display="block";
    document.getElementById("TercerPantalla").style.display="none";
    document.getElementById("Primero").style.backgroundColor="white";
    document.getElementById("Primero").style.color="black";
    document.getElementById("Segundo").style.backgroundColor="green";
    document.getElementById("Segundo").style.color="white";
    document.getElementById("Tercero").style.backgroundColor="white";
    document.getElementById("Tercero").style.color="black";

    
};

function Mostrar3(){
    document.getElementById("PrimerPantalla").style.display="none";
    document.getElementById("SegundaPantalla").style.display="none";
    document.getElementById("TercerPantalla").style.display="block";
    document.getElementById("CuartaPantalla").style.display="none";
    document.getElementById("Tercero").style.backgroundColor="green";
    document.getElementById("Tercero").style.color="white";
    document.getElementById("Segundo").style.backgroundColor="white";
    document.getElementById("Segundo").style.color="black";
    document.getElementById("Detalles").style.backgroundColor="white";
    document.getElementById("Detalles").style.color="black";
    document.getElementById("Guardar").style.display="none";
};

function Terminar(){
    document.getElementById("PrimerPantalla").style.display="none";
    document.getElementById("SegundaPantalla").style.display="none";
    document.getElementById("TercerPantalla").style.display="none";
    document.getElementById("CuartaPantalla").style.display="block";
    document.getElementById("CuartaPantalla").style.height="150px";
    document.getElementById("Guardar").style.display="block";
    document.getElementById("Tercero").style.backgroundColor="white";
    document.getElementById("Tercero").style.color="black";
    document.getElementById("Detalles").style.backgroundColor="green";
    document.getElementById("Detalles").style.color="white";

    var documento = document.getElementById("txtDocumento").value;
    document.getElementById("ListaDocumento").innerHTML = documento;

    var nombre = document.getElementById("txtNombre").value;
    document.getElementById("ListaNombre").innerHTML = nombre;

    var apellido = document.getElementById("txtApellido").value;
    document.getElementById("ListaApellido").innerHTML = apellido;

    var username = document.getElementById("txtUserName").value;
    document.getElementById("ListaUserName").innerHTML = username;

    var fecha = document.getElementById("txtFechaNacimiento").value;
    var f = "No completo este campo"
    if (fecha== " ") {
        document.getElementById("ListaSexo").innerHTML = f;
    } else{
        document.getElementById("ListaFechaNacimiento").innerHTML = fecha;
    }


    var i = document.getElementById("cboSexo").selectedIndex;
    var sexo = document.getElementById("cboSexo")[i].text;
    var s = "No completo este campo"
    if (sexo== "--Seleccionar--") {
        document.getElementById("ListaSexo").innerHTML = s;
    } else{
        document.getElementById("ListaSexo").innerHTML = sexo;
    }

    var ii = document.getElementById("cboPerfil").selectedIndex;
    var perfil = document.getElementById("cboPerfil")[ii].text;
    document.getElementById("ListaPerfil").innerHTML = perfil;
};
