<?php include("Plantillas/Encabezado.php");
include("BDD/conexion.php");

$id = "";
$cedula = "";
$nombre = "";
$apellido = "";
$direccion  = "";
$telefono = "";
$foto = "";
$correo = "";





if ($_SERVER['REQUEST_METHOD'] === "POST") {




    if (isset($_POST) && $_POST["Actualizar"] == "Actualizar") {
        $id = $_POST["id"];

        $sql = "SELECT * FROM usuarios WHERE id = $id";

        $sql = "SELECT p.id,p.nombre AS Nombre, p.detalle AS Detalle,p.precio As Precio, 
        p.stock AS Stock,p.foto As foto, c.id AS idCat, c.nombre AS Categoria
        FROM productos p, categorias c where p.idCategoria = c.id AND p.id =  $id ";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $id = $row['id'];
        $nombre = $row['Nombre'];
        $detalle = $row['Detalle'];
        $stock = $row['Stock'];
        $precio = $row['Precio'];
        $foto = $row['foto'];
        $idCat = $row['idCat'];
        $categoria = $row['Categoria'];
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br />
            <div class="card">
                Datos - Cliente

            </div>
            <div class="card-header">
                <br />
                <form method="POST" enctype="multipart/form-data" action="BDD/ProductosCRUD.php">
                    <!-- Envio de fotografias-->

                    
                    <div class="form-group">


                        <input type="hidden" name="id" value="<?php echo $id; ?>" />

                        <label for="descripcion por nombre">Ingrese su número de cedula </label>
                        <br /> <br />
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su número de cedula" value="<?php echo $nombre; ?>">
                        <br />
                    </div>
                    <div class="form-group">


                        <input type="hidden" name="id" value="<?php echo $id; ?>" />

                        <label for="descripcion por nombre">Ingrese su Nombre </label>
                        <br /> <br />
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombre; ?>">
                        <br />
                    </div>

                    <div class="form-group">
                        <label>Ingrese su apellido</label>
                        <br /> <br />
                        <input type="text" class="form-control" id="detalle" name="detalle"  placeholder="Ingrese su apellido">
                        <br />
                    </div>




  <!--      Aqui va el combo box  -->

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Ciudad</label>
                        </div>

                        <select class="custom-select" id="cbxCategoria" name="cbxCategoria">
                            
                        <?php 
                        if(empty($categoria)){ // valida la seleccion de comboBox segun su estado vacio(NuevoP) Seleccionar; toma el nombre y valor de categorias
                            echo "<option selected> Quito</option>";
                        }else{
                           
                            echo "  <option value=$idCat selected > $categoria </option>";
                        }
                         ?>
                          
                    </div>



                    <br>




                    <div class="form-group">
                        <label>Ingrese su Dirección</label>
                        <br /> <br />
                        <input type="text" class="form-control" placeholder="Igrese su dirección" id="stock" name="stock" >
                        <br />
                    </div>

                    <div class="form-group">
                        <label>Ingrese su número telefónico</label>
                        <br /> <br />
                        <input type="text" class="form-control" step="any" id="precio" name="precio"  placeholder="Ingrese su número de telefono">
                        <br />
                    </div>

                    <div class="form-group">
                        <label>Ingrese su correo</label>
                        <br /> <br />
                        <input type="text" class="form-control" step="any" id="precio" name="precio"  placeholder="Ingrese su correo">
                        <br />
                    </div>

                    <div class="form-group">
                        <label>Seleccione una Foto</label>
                        <br /> <br />
                        <input type="file" class="form-control" id="foto" name="foto" placeholder="Seleccione un archivo" accept="image/png, image/jpeg">
                        <br />
                        <h3> <?php echo $foto; ?></h3>
                    </div>




                    <button type="submit" name="Enviar" class="btn btn-primary" value="Guardar">Guardar</button>
                </form>


            </div>
            <div class="card-body">

            </div>
        </div>

    </div>

</div>

</div>

<?php include("Plantillas/Pie.php"); ?>