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
    <link rel="STYLESHEET" type="text/css" href="css/cantidadCancha.css">
    <script src="js/canvasjs.min.js"></script>


</script>


</head>

<body>

    <header>
        <img src="imagenes/logo/logoPrincipal.png" alt="logo">
    </header>

    <section>

        <?php require_once "menu.php";?>

    </section>

    <br>

    <div id="Principal">

        <div class="bienvenida">

            <p>Bienvenido al Inicio <?php echo $usuario; ?></p>

        </div>



        <div id="Chart2">
           <?php require_once "modulos/Dashboard/turnosReservadosPorCancha.js";?>
       </div>

       <div id="Chart1">
           <?php require_once "modulos/Dashboard/usuarioQueMasAlquila.js";?>
       </div>

       <div>
           <?php require_once "modulos/Dashboard/cantidadDeCanchasRegistradas.php";?>
       </div>



   </div>

   <div id="Pie">

     <?php require_once "pie.php";?>

 </div>



</body>
</html>