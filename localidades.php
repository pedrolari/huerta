<?php
$html = '';
require_once 'db/conexion.php';
$id_provincia = $_POST['id_provincia'];
echo '<option value="0">Seleccionar Municipio</option>';
$result = $con->query("SELECT * FROM municipios WHERE id_provincia = '$id_provincia' ORDER BY nombre ASC");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['id_municipio'].'">'.$row['nombre'].'</option>';
		
    }
}
echo $html;
?>

