var validaFormulario=function(){

    ///////////////// NOMBRE /////////////////
    var valor = document.getElementById("nombre").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
      alert("Debe introducir el nombre");
      return false;
    }
    ///////////////// APELLIDOS /////////////////
    valor = document.getElementById("apellido").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
      alert("Debe introducir los apellidos");
      return false;
    }

    ///////////////// PASSWORD /////////////////
    var valor = document.getElementById("password").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
      alert("Debe introducir una contraseña");
      return false;
    }

    ///////////////// EMAIL RFC 2822 /////////////////
        var valor = document.getElementById("mail").value;
    var re=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/i;
    if( valor == null || valor.length == 0 || !re.test(valor)) {
      alert("Debe introducir un email válido");
      return false;
    }

    ///////////////// DIRECCION /////////////////
    valor = document.getElementById("direccion").value;
    if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
      alert("Debe introducir la dirección");
      return false;
    }

    ///////////////// TELEFONO /////////////////
    valor = document.getElementById("telefono").value;
    if( !(/^\d{9}$/.test(valor)) ) {
      alert("Debe introducir un teléfono válido");
      return false;
    }

    ////////////////// LATITUD1 //////////////////
    valor = document.getElementById("latitud1").value;
    if( valor == null || valor.length == 0 || isNaN(valor) ) {
      alert("Debe introducir una latitud válida");
    return false;
    }

        ////////////////// LONGITUD1 //////////////////
    valor = document.getElementById("longitud").value;
    if( valor == null || valor.length == 0 || isNaN(valor) ) {
      alert("Debe introducir una longitud válida");
    return false;
    }

        ////////////////// LATITUD2 //////////////////
    valor = document.getElementById("latitud2").value;
    if( isNaN(valor) ) {
      alert("Debe introducir una latitud válida");
    return false;
    }

            ////////////////// LONGITUD2 //////////////////
    valor = document.getElementById("longitud2").value;
    if( isNaN(valor) ) {
      alert("Debe introducir una longitud válida");
    return false;
    }

    return true;
}


