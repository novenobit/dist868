<?php
// ******************************************************** 2023 - 2017 ***
// SiAdVe4  System POS 4 Small Business                 //
// Copyright (c) 2023 NovenoBIT.com                                      //
// ************************************************************************
include_once("../includes/session.php");
$dropdown="S";
$forms="S";
$findData="S";
$tabs="S";
$table="S";
$image="S";
$icon="S";
$input="S";
$message="S";
$label="S";
$forms="S";
$whiteBackground="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");

//FechayHora();
if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['iduser']))
{ $iduser=$_GET['iduser']; }
$numventas=0;
//include("usuario-top.php");
include("$dirRoot"."bots/bot-usuarios.php");

if(isset($usuarioData))
{
  $nextcli=$iduser+1;
  $befcli=$iduser-1;
  $idantes=$iduser-1;
  $idsiguiente=$iduser+1;
  if($idantes==0 or $idsiguiente==0)
  {$idantes=$num_rows;
   $idsiguiente=$num_rows;
  }
}
?>

<h3 class='font-18 font-bold'>Edita los Datos del Usuario</h3>

<?php
 echo "<form class='ui form' action='usuario-edit2.php?op=cl&iduser={$usuarioData['iduser']}' method='post'>";
 $cid_usuario=$usuarioData['cid_usuario'];
 $id_pais="ve";
// $id_pais=$usuarioData['id_pais'];
 //if(empty($id_pais))
 //{ $id_pais="ve"; }
 //include("$dirRoot"."bots/bot-user-ventas.php");
?>

<div class="two fields">
 <div class="field">
   <?php
     echo "<label>Nombre:</label>
     <input class='ui input' type='text' name='nombre' value='{$usuarioData['nombre']}'>";
   ?>
 </div>
 <div class="field">
   <?php
     echo "<label>Apellido:</label>
     <input class='ui input' type='text' name='apellido' value='{$usuarioData['apellido']}'>";
   ?>
 </div>
</div>

<div class="three fields">
 <div class="field">
   <?php
   if($numventas==0)
   {
     echo "<label>CI/RIF:</label>
     <input class='ui input' type='text' name='cid_usuario' value='{$usuarioData['cid_usuario']}'>";
   }
   else
   {
     echo "<label class='w3-label w3-text-blue'>CI/RIF: <b>{$usuarioData['cid_usuario']}</b>:</label>";
   }
   ?>
 </div>
 <div class="field">
   <?php
     echo "<label>Usuario:</label>
     <input class='ui input' type='text' name='usuario' value='{$usuarioData['usuario']}'>";
   ?>
 </div>
 <div class="field">
   <?php
     echo "<label>Clave:</label>
     <input class='ui input' type='password' name='clave'>";
   ?>
 </div>
</div>


<div class="two fields">
 <div class="field">
   <?php
     echo "<label>Tel&eacute;fono Local:</label>
     <input class='ui input' type='text' name='telefono' value='{$usuarioData['telefono']}'>";
   ?>
 </div>
 <div class="field">
   <?php
     echo "<label>Celular:</label>
     <input class='ui input' type='text' name='celular' value='{$usuarioData['celular']}'>";
   ?>
 </div>
</div>

<div class="three fields">
 <div class="field">
   <?php
     echo "<label>eMail:</label>
     <input class='ui input' type='text' name='email' value='{$usuarioData['email']}'>";
   ?>
 </div>

 <div class="field">
   <?php
        $cons="select id_tipoemp,tipo_empleado from tipodeempleados where id_tipoemp='{$usuarioData['id_tipoemp']}'";
        $resultado=mysqli_query($conex1,$cons);
        $tipoEmp=mysqli_fetch_array($resultado);
        echo "<label>Cargo: {$tipoEmp['tipo_empleado']}</label>";
        echo "<select class='select' name='id_tipoemp'>";
        if($tipoEmp['tipo_empleado']<>"")
        { echo "{$tipoEmp['tipo_empleado']}"; }
        else
        { echo "<option selected>seleccione</option>"; }
        $cons="select id_tipoemp,tipo_empleado from tipodeempleados order by tipo_empleado";
        $resultado=mysqli_query($conex1,$cons);
        while($tipoemp=mysqli_fetch_array($resultado))
        { echo "<option value='{$tipoemp['id_tipoemp']}'>{$tipoemp['tipo_empleado']}</option>";  }
     echo "</select>";
   ?>
 </div>

 <div class="field">
      <?php
       $tipousuario=$usuarioData['tipousuario'];
       $Mtipousuario="Nada";
       if($tipousuario=="C")
       { $Mtipousuario="Cliente"; }
       if($tipousuario=="E")
       { $Mtipousuario="Empleado"; }
       echo "<label>Tipo de Usaurio: $Mtipousuario</label>";
?>
        <div class="field">

            <div class="ui selection dropdown">
                <input type="hidden" name="tipousuario">
                <i class="dropdown icon"></i>
                <div class="default text">Tipo Usuario</div>
                <div class="menu">
                    <div class="item" data-value="C">Cliente</div>
                    <div class="item" data-value="E">Empleado</div>
                </div>
            </div>
        </div>
<?php
      ?>
 </div>

 <div class="field">
      <label>Usuario Activo (S/N):</label>
      <?php
       $activo=$usuarioData['activo'];
       if($activo=="S")
       { echo "<label class='rocker rocker-small'><input type='checkbox' name='activo' checked style='height: 25px;width: 25px;'><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
       else
       { echo "<label class='rocker rocker-small'><input type='checkbox' name='activo' style='height: 25px;width: 25px;'><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
      ?>
 </div>
</div>


<div class="fields">
 <div class="field">
   <input class="ui blue button" type="submit" value='Enviar Datos'>
  <input class="ui button" type ="reset" value='Limpiar Campos'>
  </div>
</div>
 <br><br>
</form>


<br><br><br>
<?php
if($mobile=="S")
{
 $sysNormalM="S";
 $sysCuentaM="N";
}
else
{
  $sysNormal="S";
  $sysCuenta="N";
}
$resizeFrame2="S";
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>
