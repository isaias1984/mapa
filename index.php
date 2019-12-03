<?php require_once __DIR__ . "/vendor/autoload.php" ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EJEMPLO DE MAPA CON STOCK</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>EJEMPLO DE MAPA CON STOCK</h1> 
        <div class="contenido">
          <?php 
            
            //ACCESO a base de datos MySQL
            try {
              require_once('./mysql_conexion.php');
              $sql = "SELECT * FROM `stocktotal`";
              $resultado = $conn->query($sql);
          } catch (\Exception $e) {
              echo $e->getMessage();
          }


          while($centros = $resultado->fetch_assoc()){
            $res[$centros['centroLogistico']]['stock'] = $centros['stockCentro'];
          }  

          //ACCESO a base de datos MongoDB
          try {
            require_once('./mong_conexion.php');
            $db = getDatabase();
            $collection = $db->coordenadas;
            
            $cursor = $collection->find();
            
            foreach( $cursor as $id => $value) {
              $res[$value['centroLogistico']]['coordLat'] = $value['coordLat']; 
              $res[$value['centroLogistico']]['coordLong'] = $value['coordLong'];
            }

          } catch (Exception $e) {
            echo $e->getMessage(); 
          }
            
          ?>
        </div>

        <div id="mapa" class="mapa">
          
        </div>
    </div>
  </body>
  
  
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <script type="text/javascript">var prueba = <?= json_encode($res, JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS)?>;</script>
  <script src="./mapa.js"></script>
</html>
