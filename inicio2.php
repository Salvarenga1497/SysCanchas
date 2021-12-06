<!DOCTYPE html>
<html>
<head>
	<title>FUTLINE</title>
    <meta charset="UTF-8">
    <meta name="Author" content="Alvarenga Sebastian" >
    <meta name="description" content="Alquilar canchas de futbol">
    <meta name="keywords" content="futbol, alquilar, cancha, futbol5, formosa">
    <link rel="shortcut icon"  href="imagenes/logo/logoo.png">
    <link rel="STYLESHEET" type="text/css" href="css/inicioPag.css">
    <link rel="STYLESHEET" type="text/css" href="css/menu.css">
    <link rel="STYLESHEET" type="text/css" href="css/barras.css">
    <link rel="STYLESHEET" type="text/css" href="css/body.css">
</head>

<body>

    <header>
        <img src="imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

	<section>

	   <?php require_once "menu2.php";?>

	</section>

    <section>
        <?php echo $usuario?>
    </section>

	<br><br>

<div id="Principal">  

    


    <div class="bienvenida">

	   <p>Bienvenido al Inicio <?php echo $usuario; ?></p>

    </div>

    <div class="estadistica">
        <div class="titulo">
            <h3>Horarios mas alquilados</h3>
        </div>

        <div class="grafico">
            <label for="21:00">21:00:</label>
            <strong class="barra90" style="">90%</strong>
        </div>

        <br>

        <div class="grafico">
            <label for="20:00">20:00:</label>
            <strong class="barra70" style="">70%</strong>
        </div>

        <br>

        <div class="grafico">
            <label for="22:00">22:00:</label>
            <strong class="barra50" style="">50%</strong>
        </div>
    </div>

    <div class="estadistica2">
        <div class="titulo">
            <h3>Edad Promedio de los Usuarios</h3>
        </div>

        <div class="grafico2">
            <label for="de 15 a 25 años">de 15 a 25 años</label>
            <strong class="barra90" style="">90%</strong>
        </div>

        <br>

        <div class="grafico2">
            <label for="26 a 36 años">26 a 36 años</label>
            <strong class="barra70" style="">70%</strong>
        </div>

        <br>

        <div class="grafico2">
            <label for="de 37 a 50">de 37 a 50</label>
            <strong class="barra50" style="">50%</strong>
        </div>
    </div>

    <div class="estadistica3">
        <div class="titulo">
            <h3>Turno que mas se alquila</h3>
        </div>

        <div class="grafico3">
            <label for="noche">Noche:</label>
            <strong class="barra90" style="">85%</strong>
        </div>

        <br>

        <div class="grafico3">
            <label for="dia">Dia:</label>
            <strong class="barra70" style="">15%</strong>
        </div>

    </div>


</div>  

    <div id="Pie">

       <?php require_once "pie.php";?>

    </div>


</body>
</html>