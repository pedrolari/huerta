        <!-- Main Content -->
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-sign-out"></i> Alta Nuevo Producto
                </div>
                <div class="panel-body ">

					<form class="form-horizontal" role="form" method="post" id="envioimagen" enctype="multipart/form-data" action="index.php?page=altaproductook">
					  <div class="form-group">

							<?php
								
								require_once 'db/conexion.php';
								$result = $con->query("SELECT MAX(id_producto) as max FROM producto");
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {                
										$_SESSION["id_producto"]=$row["max"]+1;
									}
								}
							?>
						<label for="nombreproducto" class="col-lg-2 control-label">Nombre</label>
						<div class="col-lg-6">
						  <input type="text" class="form-control" name="nombreproducto" placeholder="Nombre del producto" required>
						</div>
					  </div>
					  <div class="form-group">
						<label for="descripcionproducto" class="col-lg-2 control-label">Descripcion</label>
						<div class="col-lg-10">
						  <textarea class="form-control" id="descripcionproducto" placeholder="Descripcion del producto" rows="6" name="descripcionproducto" required></textarea>
						</div>
					  </div>
					  <div class="form-group">
						<label for="precioproducto" class="col-lg-2 control-label">Precio</label>
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">€</span>
								<input type="text" class="form-control" placeholder="Precio" required name="precioproducto" required>
							</div>
						</div>
						<label for="stockproducto" class="col-lg-2 control-label">Stock</label>
						<div class="col-lg-3">
							<div class="input-group">
								<span class="input-group-addon">Uds.</span>
								<input type="text" class="form-control" placeholder="Unidades" required name="stockproducto" required>
							</div>
						</div>
					  </div>

					  <div class="form-group">
						<label for="imagenproducto" class="col-lg-2 control-label">Imagen</label>
						<div class="col-lg-10">
						  <input name="imagen" required="" type="file" />
						</div>
					  </div>

					  <div class="form-group">
						<label for="Categoria" class="col-lg-2 control-label">Categoria</label>
						<div class="col-lg-10">
							<select  id="categoria" name="categoria" class="form-control" required>
							<option value="">Seleccione Categoria</option>
							<?php
								require_once 'db/conexion.php';
								$result = $con->query("SELECT * FROM categoria where id_catpadre=0");
								if ($result->num_rows > 0) {
									while ($row = $result->fetch_assoc()) {                
										echo '<option name="categoria" value="'.$row['idcat'].'">'.$row['nombre'].'</option>';
									}
								}
							?>
							</select>
						</div>
					  </div>

					  <div class="form-group">
						<label for="Subcategoria" class="col-lg-2 control-label">Subcategoria</label>
						<div class="col-lg-10">
							<select id="subcategoria" name="subcategoria" class="form-control" required>
							</select>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-lg-offset-2 col-lg-6">
						  <button type="submit" class="btn btn-primary btn-block">Agregar Producto</button>
						</div>
						<div class="col-lg-4">
						  <button type="reset" class="btn btn-default btn-block">Limpiar Campos</button>
						</div>
					  </div>
					</form>
                  
                </div>
              </div>
            </div>

          </div>

		  <!--<div id="respuesta"></div>-->