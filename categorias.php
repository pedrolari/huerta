<?php
$html = '';
require_once 'db/conexion.php';
$id_categoria = $_POST['id_categoria'];
echo '<option value="0">Seleccione Subcategoria</option>';
$result1 = $con->query("SELECT * FROM categoria where id_catpadre = '$id_categoria' ORDER BY nombre ASC");
if ($result1->num_rows > 0) {
    while ($row1 = $result1->fetch_assoc()) {                
        $html .= '<option value="'.$row1['idcat'].'">'.$row1['nombre'].'</option>';
		
    }
}
echo $html;
?>

