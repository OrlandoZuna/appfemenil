<!DOCTYPE html>
<html lang="en" style="background-color: #f5f5f5;">
    <head>
      <title>pdf</title>
      <meta charset="UTF-8">
      <meta name="http-equiv="X-UA-Compatible" content="IE-chrome">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="{{ asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
      <style type="text/css">
        @page {
            margin: 2cm 2cm 2cm 2cm;
        }
        #encabezado {
            /*background: rgb(226, 200, 200);*/
            display: flex;
            align-items:center;
            height: 90px;
        }
        #imgpersonal{
          margin-top: -80px;
          position: absolute;
          float: right;
          width: 90px;
        }
        #imguatf{
          margin-top: 5px;
          float: left;
          width:95PX;
          height: 95px;
        }
        #textoencabezado{
          margin-left: -15%;
          margin-top: 5px;
          text-align:center;
        }
        #uno{
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 0px;
            margin-top: 5px;
        }
        #dos{
            margin-top: 0px;
            font-size: 10px;
            margin-bottom: 0px;
        }
        #cuerpo2{
            text-align: center;
            height:13px;
            margin-bottom: 0px;
            margin-top: 0px;
        }
        #cuerpo2 p{
            margin-top: 10px;
            display: inline-block;
            margin-left: 5.5cm;
            color: black;
        }
        #tipocontrato{
            text-align: center;
            align-items:center;
            height:12px;
        }
        #tipocontrato p{
            padding-top: 1px;
            color: black;
            font-size: 11px;
        }
        b{
            color: black;
            text-transform: uppercase;
        }
        #cuerpodatospersonal{
            margin-top: 10px;
            position:relative;
            align-items:center;
            height: 120px;
            margin-bottom: 0px;
        }
        #cuerpodatospersonal p{
          margin-left: 30px;
          position:relative;
          text-transform:capitalize;
          text-align: center;
          align-items:center;
          color: black;
          font-size: 10px;
        }
        #firmas{
          margin-top:10px;
          position: relative;
          height: 100px;
        }
        #entregue {
          margin-top: 15px;
          float: left;
          margin-left: 100px;

        }
        #recibi {
          margin-top: 15px;
          float: right;
          margin-right: 100px;
        }
        .container{
          margin-top: 6%;
          position: relative;  
        }
        #lineadiv{
          height: 35px;
          margin-top: 1cm;
        }
        #linea{
          position: relative;
          text-align: center;
        }
        #linea i{
          position: relative;
          float:fixed;
        }
      </style>
  </head>
  <body>
    <header>
      <div class="col-12" id="encabezado">
          <img src="{{asset('assets/images/uce_1.png')}}" alt="uatf" id="imguatf"/>
        <div id="textoencabezado">
            <p id="uno">UNION CRISTIANA EVANGELICA</p>
            <p id="uno">XII SUB DIRECTIVA"</p>
            <p id="uno">COMITE FEMENIL REGIONAL"</p>
            <p id="dos">"SE FIEL PORQUE DIOS ES FIEL"</p>
            <p id="dos">Oseas 3:1</p>
        </div>

          <img id="imgpersonal" src="{{asset('assets/images/subdirectiva12j.png')}}" alt="personal"/>
      </div>

      <div id="tipocontrato">
          <p style="text-trasnform:uppercase; font-weight:bold; font-size: 14px"><u>RECIBO DE INSCRIPCION DEL RETIRO FEMENIL DEL ALTIPLANO 2024 </u><br> <b>N°:..0{{$persona->id}}</b></p>
      </div>
    </header>
    <main>
      <div id="cuerpodatospersonal">
        <P>He recibido de: ... <b> {{$persona->nombres .' '. $persona->apellidos}}</b>.. con CI: ..<b>{{$persona->dni}}</b> .. LA SUMA DE: <b>{{$persona->pago .' Bs. por insribirse en: '. $persona->promocion}}</b></P>
        <p>el cual cancelo en: <b> {{$persona->tipo_pago}} </b> con N°: 0 <b>{{$persona->n_pago}}</b>..por concepto de inscripcion al RETIRO FEMENIL DEL ALTIPLANO  POTOSI 2024</p>
        <p>perteneciente a la subdirectiva: ..<b>{{$persona->subdirectiva}}.</b> .. en fecha:.. potosi ...  <b>{{ $date }}</b> .</p>
        <br>
        <br>
      </div>

      <div id="firmas">
        <section id= "entregue">
          <p >..................................</p>
          <p style="margin-top: -10px;">Entregue conforme</p>
        </section>

        <section id= "recibi">
          <p>..............................</p>
          <p style="margin-top: -10px;">Recibi conforme</p>
        </section>
      </div>
    </main>
    <div id="lineadiv">
      <p id="linea" ><i class="fa fa-scissors" aria-hidden="true"></i>  -----------------------------------------------------------------------------------------------------------------------</p>
    </div>
    <div class="container">
      <header>
        <div class="col-12" id="encabezado">
            <img src="{{asset('assets/images/uce_1.png')}}" alt="uatf" id="imguatf"/>
          <div id="textoencabezado">
              <p id="uno">UNION CRISTIANA EVANGELICA</p>
              <p id="uno">XII SUB DIRECTIVA"</p>
              <p id="uno">COMITE FEMENIL REGIONAL"</p>
              <p id="dos">"SE FIEL PORQUE DIOS ES FIEL"</p>
              <p id="dos">Oseas 3:1</p>
          </div>
  
            <img id="imgpersonal" src="{{asset('assets/images/subdirectiva12j.png')}}" alt="personal"/>
        </div>
  
        <div id="tipocontrato">
            <p style="text-trasnform:uppercase; font-weight:bold; font-size: 14px"><u>RECIBO DE INSCRIPCION DEL RETIRO FEMENIL DEL ALTIPLANO 2024 </u> <br> <b>N°:..0{{$persona->id}}</b></p>
        </div>
      </header>
      <main>
        <div id="cuerpodatospersonal">
            <P>He recibido de: ... <b> {{$persona->nombres .' '. $persona->apellidos}}</b>.. con CI: ..<b>{{$persona->dni}}</b> .. LA SUMA DE: <b>{{$persona->pago .' Bs. por insribirse en: '. $persona->promocion}}</b></P>
            <p>el cual cancelo en: <b> {{$persona->tipo_pago}} </b> con N°: 0 <b>{{$persona->n_pago}}</b>..por concepto de inscripcion al RETIRO FEMENIL DEL ALTIPLANO  POTOSI 2024</p>
            <p>perteneciente a la subdirectiva:... <b>{{$persona->subdirectiva}}.</b> .. en fecha:.. potosi ...  <b>{{ $date }}</b> .</p>
            <br>
            <br>
        </div>
  
        <div id="firmas">
          <section id= "entregue">
            <p >..................................</p>
            <p style="margin-top: -10px;">Entregue conforme</p>
          </section>
  
          <section id= "recibi">
            <p>..............................</p>
            <p style="margin-top: -10px;">Recibi conforme</p>
          </section>
        </div>
      </main>
    </div>
  </body>
</html>

