function validarExt(){
    var archivoInput = document.getElementById('archivo');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.txt)$/i;

    if(!extPermitidas.exec(archivoRuta)){
      alert('Asegurate de seleccionar un archivo de texto .txt');
      archivoInput.value='';
      return false;
    }
    else{
      if(archivoInput.files && archivoInput.files[0]){
        var visor = new FileReader();
        visor.onload = function(e){
          document.getElementById('visorArchivo'); 
        };
        visor.readAsDataURL(archivoInput.files[0]);
      }
    }
  }