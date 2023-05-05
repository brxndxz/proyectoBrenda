<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa</title>
    <style type="text/css">   
      #map {
        height: 600px;
        width: 600px;
        margin-left: 5%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        margin-left: 0%
      }
  </style>
</head>
<body>
    <div id="map"></div>
    <?php
    include('conex.php'); 
    $id=intval($_GET['id']); 
    $nombre = "";
    $lat = '';
    $lng = '';

    
    $query = mysql_query('SELECT nombre, lat, lng FROM clientes WHERE id ='.$id.'',$conn);
    

    //Compruebo si hay algún resultado
    if($row = mysql_fetch_array($query)){
    //Guardo los datos de la BD en las variables de php
    $nombre = $row["Nombre"];
    $lat = $row["lat"];
    $lng = $row["lng"];
    }
    ?>
    <script>
    var nombre = <?php echo $nombre;?>;
    var lat = <?php echo $lat;?>;
    var lng =<?php echo $lng;?>;
        var map;
            function initMap(){
            var map = new google.maps.Map(document.getElementById('map'), {
            center: new google.maps.LatLng(parseFloat(lat),parseFloat(lng)),
            zoom: 12
            });
            var point = new google.maps.LatLng(
            parseFloat(lat),
            parseFloat(lng));
            var marker = new google.maps.Marker({
            map: map,
            position: point,
            map: map,
            title: nombre
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCawl5beNT5zNTkyZKNaY1-901g7GDIVOU&callback=initMap&v=weekly"
    defer></script>
</body>
</html>