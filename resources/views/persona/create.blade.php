@extends('layouts.app')

@section('metadatos')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('titulo','Crear Persona')

@section('cabecera')
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('persona.index') }}">Personas</a>
    </li>
    </ul>

@endsection
@section('subtitulo','Crear Registro de Persona')

@section('content')
<hr>

<center>
<div id="divmsg" style="display:none" class="alert alert-primary" role="alert">
</div>
</center>

<form class="responsive">
<!--@csrf--> <!-- Crea el token en un input de tipo hidden -->
<!--{{csrf_token()}} <= Imprime el token en pantalla--> 
@csrf
    <div class="form-group-prepend">
       <label for="nombres">Nombre</label>
       <input type="text" class="form-control" id="nombres" name="nombres"  placeholder="coloque e nombre de la persona" required>
       <div class="invalid-feedback">
         coloque el monmbre.
       </div>
    </div>
    <div class="form-group">
       <label for="apellidos">Apellidos</label>
       <input type="text" class="form-control text"id="apellidos" name="apellidos" required>
    </div>
    <div class="form-group">
       <label for="dni">Ci</label>
       <input type="text" class="form-control" id="dni" name="dni" required>
    </div>
    <div class="form-group">
      <label for="numero_movil"> Numero Movil</label>
      <input type="number" class="form-control" id="numero_movil" name="numero_movil" required>
   </div>

   <label>Tipo de Pago:</label><br>
   <div class="form-check form-check-inline"">
      <input class="form-check-input" type="checkbox" name="transferencia" id="transferencia" value="transferencia">
      <label class="form-check-label" for="transferencia">
        Transferencia
      </label>
    </div>

    <div class="form-check form-check-inline">
      <input class="form-check-input" type="checkbox" name="efectivo" id="efectivo" aria-valuemax="efectivo">
      <label class="form-check-label" for="efectivo">
        Efectivo
      </label>
    </div>
    
   <div class="form-group" >
      <label for="pago">Pago</label><br>
      <select name="pago" id="pago" name="pago" class="form-control" required>
         <option value="0" selected disabled hidden>seleccione pago</option>
         <option value="100">Promo Mayo</option>
         <option value="110">Promo Junio</option>
         <option value="120">Julio</option>
         <option value="60">Niños</option>
         <option value="100">Hermanos</option>
      </select>

      <label for="numero_pago">Numero de transferencia:</label>
      <input type="number" class="form-control" id="numero_pago" name="numero_pago" placeholder="inserte solo numeros">
        <!-- <small id="passwordHelpInline" class="text-muted">
         Must be 8-20 characters long.
         </small>-->
   </div>
   <div class="form-group" >
      <label for="subdirectiva">Subdirectiva:</label>
      <select name="subdirectiva" id="subdirectiva" name="subdirectiva" class="form-control" required>
         <option value="0" selected disabled hidden>seleccione subdirectiva de la persona</option>
         <option value="I Subdirectiva Challapata">I Subdirectiva Challapata</option>
         <option value="II Subdirectiva Pocoata">II Subdirectiva Pocoata</option>
         <option value="III Subdirectiva Andamarca">III Subdirectiva Andamarca</option>
         <option value="VII Subdirectiva Oruro">VII Subdirectiva Oruro</option>
         <option value="X Subdirectiva La Paz">X Subdirectiva La Paz</option>
         <option value="XII Subdirectiva Potosí">XII Subdirectiva Potosí</option>
         <option value="XIV Subdirectiva Corque">XIV Subdirectiva Corque</option>
         <option value="XV Subdirectiva Culpina">XV Subdirectiva Culpina</option>
         <option value="XXIII Subdirectiva Llallagua">XXIII Subdirectiva Llallagua</option>
         <option value="XXVI Subdirectiva Yawisla">XXVI Subdirectiva Yawisla</option>
         <option value="XXVII Subdirectiva Illimani La Paz">XXVII Subdirectiva Illimani La Paz</option>
         <option value="otra subdirectiva">Otra Subdirectiva</option>
      </select>
   </div>

    <button href="{{ route('persona_creada') }}"  type="submit" class="btn btn-success btnenviar"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
     <a href="{{ route('cancelar_persona') }}" class="btn btn-warning"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</a>
</form>

<script type="text/javascript">
   
   function limpiarCampos(){
      $("#nombres").val('');
      $("#apellidos").val('');
      $("#dni").val('');
      $("#numero_movil").val('');
      $('#pago').val('0');
      $("#subdirectiva").val('0');
      $('#numero_pago').val(0);
      $("#efectivo")[0].checked=false;
      $("#transferencia")[0].checked=false;
      $("#pago").hide();
      $("#numero_pago").hide();
      
   }
      $("#pago").hide();
      $("#numero_pago").hide();
      console.log($("#transferencia")[0]);
   
   function mostrarMensaje(mensaje){
       $("#divmsg").empty(); //limpiar div
       $("#divmsg").append("<p>"+mensaje+"</p>");
       $("#divmsg").show(500);
       $("#divmsg").hide(5000);
   }
   var tipo_pago;
   var n_pago=0;
    $.ajaxSetup({
        headers: {
            //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            'X-CSRF-TOKEN': $("input[name=_token]").val()
        }
    });
   
    $(".btnenviar").click(function(e){
  
        e.preventDefault(); //evitar recargar la pagina..
        //console.log($("#pago")[0].options.selectedIndex); 
        console.log($("#pago")[0][$("#pago")[0].options.selectedIndex].label); 
        var nombres = $("input[name=nombres]").val();
        var apellidos = $("input[name=apellidos]").val();
        var dni = $("input[name=dni]").val();
        var num_cel= $("input[name=numero_movil]").val();
        var tipo = tipo_pago; 
        var pago = $('#pago').val();
        var n_pago =n_pago = $("input[name=numero_pago]").val();
        var subdirectiva = $("#subdirectiva").val();
        var transferencia = $("input[name=transferencia]").val();
        var efectivo = $("input[name=efectivo]").val();
        var promocion = $("#pago")[0][$("#pago")[0].options.selectedIndex].label;

        console.log(nombres, apellidos, dni, num_cel, tipo_pago, pago, n_pago, subdirectiva, promocion);
   
        $.ajax({
           type:'POST',
           url:"{{ route('persona.store') }}",
           data:{nombres:nombres, apellidos:apellidos, dni:dni, num_cel:num_cel, tipo_pago:tipo_pago, pago:pago, n_pago:n_pago, subdirectiva:subdirectiva, promocion:promocion },
           success:function(data){

               if (data.resp==200){
                  mostrarMensaje(data.mensaje);
               }  
               if (data.resp==3000){
                  toastr.error(data.mensaje);
               }  
               if(data.resp==250){
                  toastr.warning(data.mensaje);
               }
               limpiarCampos();
           }
        });
  
	});

   $("#transferencia").click(function(e){
      //e.preventDefault(); //evitar recargar la pagina..
      var transferencia = $("#transferencia")[0].checked;
      console.log($("#transferencia")[0].checked);
      if (transferencia == true) {
         console.log(transferencia);
         $("#pago").show();
         $("#numero_pago").show();
         $("#efectivo")[0].checked=false;
         tipo_pago = "transferencia";
         n_pago = $("input[name=numero_pago]").val();
      }
      else{
         $("#pago").hide();
         $("#numero_pago").hide();
      }

   })

   $("#efectivo").click(function(e){
      //e.preventDefault(); //evitar recargar la pagina..
      var efectivo = $("#efectivo")[0].checked;
      console.log($("#transferencia")[0].checked);
      if (efectivo == true) {
         console.log(efectivo);
         $("#pago").show();
         $("#numero_pago").hide()
         $("#transferencia")[0].checked=false;
         //$("#numero_pago").show();
         tipo_pago = "efectivo";
      }
      else{
         $("#pago").hide();
         //$("#numero_pago").hide() ;
      }

   })
</script>


@endsection