<?php 
include '../conexion/conexion.php';
$estado = htmlentities($_POST['estado']);

 ?>
             <select id="municipio" name="municipio" required>
            <option value="" disabled selected>Selecciona un municipio</option>
            <?php 
            $sel_muni = $con->prepare("SELECT * FROM municipios WHERE departamento_id = ?");
            $sel_muni->bind_param('i',$estado);
            $sel_muni->execute();
            $res_muni = $sel_muni->get_result();
            while ($f_muni =$res_muni->fetch_assoc()) {?>
              <option value="<?php echo $f_muni['municipio'] ?>"><?php echo $f_muni['municipio'] ?></option>
            <?php }
            $sel_muni->close(); ?>
            </select>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
            <script>
            $(document).ready(function(){
    $('select').formSelect();
  });
 

            	</script>