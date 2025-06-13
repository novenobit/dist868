<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  producto-ver1.php                                                      //
//  Copyright (c) 2023 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");
$topFile="N";
$headFile="N";
$topAdmin="N";
$findData="S";
$dirRoot="../";
$autoPro="S";
$dropdown="S";
$findData="S";
$forms="S";
$header="S";
$label="S";
$menu="S";
$icon="S";
$image="S";
$input="S";
$item="S";
$loadPage="S";
$popup="S";
$table="S";
$tabs="S";
include_once("../includes/headfileFrame.php");
// -------------------------------
FechayHora();
if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../index.php>";
  exit();
}
if(isset($_GET['op2']))
{ $op2=$_GET['op2']; }
$num=0;
$ves=1;
$title="Ficha del Cliente";
include("$dirRoot"."bots/bot-cliente.php");
include("$dirRoot"."bots/AreasSistema.php");

if(!isset($clienteData) or empty($clienteData))
{
 $error="Hay en Error en Los Datos<br>Prueba con otro Producto o Revisa que la Tabla existe y este este bien...";
 error();
 exit();
}
// include("left-menu.php");


if(isset($clienteData))
{
    // $nextcli=$id_cliente+1;
    // $befcli=$id_cliente-1;
//     $idantes=$id_cliente-1;
//     $idsiguiente=$id_cliente+1;
//     if($idantes==0 or $idsiguiente==0)
//     {$idantes=$num_rows;
//      $idsiguiente=$num_rows;
//     }
}

echo "<form class='ui form' action='../clientes/clientes-edit2.php?op=cl&id_cliente={$clienteData['id_cliente']}' method='post' style='background-color:#ffffff;color:#000000;'>";
     $cid_cliente=$clienteData['cid_cliente'];
     $id_pais=$clienteData['id_pais'];
     if(empty($id_pais))
     { $id_pais="ve"; }
     include("$dirRoot"."bots/bot-cliente-ventas.php");
    ?>
 <div class="ui text container">
    <div class="two fields">
     <div class='field'>
      <label>CI/RIF:</label>
      <?php
       if(!isset($numventas))
       { $numventas=0; }
       if($numventas==0)
       {
         echo "<input type='text' name='cid_cliente' value='{$clienteData['cid_cliente']}'>";
       }
       else
       {
        echo "<span class='font-blue'>CI/RIF: <b>{$clienteData['cid_cliente']}</b>:</span>";
       }
      ?>
     </div>
     <div class='field'>
      <label>Nombre:</label>
      <?php
       echo "<input type='text' name='nom_cliente' value='{$clienteData['nom_cliente']}'>";
      ?>
     </div>
    </div>
    <div class="fields">
      <div class="eight wide field">
         <label>Codigo Acceso:</label>
         <?php
          echo "<input type='text' name='cod_cliente' value='{$clienteData['cod_cliente']}'>";
         ?>
      </div>
      <div class="eight wide field">
       <?php
         echo "<label>eMail:</label>
         <input type='text' name='email_cliente' value='{$clienteData['email_cliente']}'>";
       ?>
      </div>
    </div>
    <div class="fields">
      <div class="eight wide field">
         <label>Empresa:</label>
         <?php
          echo "<input type='text' name='empresa_cliente' value='{$clienteData['empresa_cliente']}'>";
         ?>
      </div>
      <div class="eight wide field">
         <?php
          echo "<label>Encargado:</label>
          <input type='text' name='encargado' value='{$clienteData['encargado']}'>";
         ?>
      </div>
    </div>

    <div class="fields">
      <div class="eight wide field">
        <label>Ciudad:</label>
        <?php
         echo "<input type='text' name='ciudad_cliente' value='{$clienteData['ciudad_cliente']}'>";
        ?>
      </div>
      <div class="eight wide field">
         <?php
          echo "<label>Estado:</label>
          <input type='text' name='estado_cliente' value='{$clienteData['estado_cliente']}'>";
         ?>
      </div>
    </div>
    <div class="fields">
      <div class="eight wide field">
        <label>Direcci&oacute;n1:</label>
        <?php
         echo "<textarea name='dir1_cliente' rows='2' cols='30'>{$clienteData['dir1_cliente']}</textarea>";
        ?>
      </div>
      <div class="eight wide field">
        <label>Direcci&oacute;n2:</label>
        <?php
         echo "<textarea name='dir2_cliente' rows='2' cols='30'>{$clienteData['dir2_cliente']}</textarea>";
        ?>
      </div>

    </div>

    <div class="fields">
      <div class="eight wide field">
         <?php
           echo "<label>Tel&eacute;fono 1:</label>
           <input type='text' name='tel1_cliente' value='{$clienteData['tel1_cliente']}'>";
         ?>
      </div>
      <div class="eight wide field">
      <?php
        echo "<label>Tel&eacute;fono 2:</label>
        <input type='text' name='tel2_cliente' value='{$clienteData['tel2_cliente']}'>";
      ?>
     </div>
    </div>

    <div class="fields">
     <div class="sixteen wide field">
      <?php
        echo "<label>Sitio Web:</label>
        <input type='text' name='url_cliente' value='{$clienteData['url_cliente']}'>";
      ?>
     </div>
     <div class="six wide field">
      <?php
       // echo "<label>Cumplea&ntilde;o (dd/mm):</label>
       // <input type='text' name='cumpleano_cliente' value='{$clienteData['cumpleano_cliente']}' placeholder='dia/mes'>";
      ?>
     </div>
    </div>

    <div class="fields">
     <div class="sixteen wide field">
      <?php
       echo "<label>Nota:</label>
       <textarea name='nota_cliente' rows='2' cols='30'>{$clienteData['nota_cliente']}</textarea>";
      ?>
     </div>
    </div>

    <div class="fields">
     <div class="six wide field">
      <label>Lista de Correo (S/N):</label>
        <?php
          $lista_correo=$clienteData['lista_correo'];
          if($lista_correo=="S")
          { echo "<label class='rocker rocker-small'><input type='checkbox' name='lista_correo' checked><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
          else
          { echo "<label class='rocker rocker-small'><input type='checkbox' name='lista_correo'><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
        ?>
     </div>
     <div class="five wide field">
      <label>Contribuyente Especial (S/N):</label>
        <?php
          $contribuyente=$clienteData['contribuyente'];
          if($contribuyente=="S")
          { echo "<label class='rocker rocker-small'><input type='checkbox' name='contribuyente' checked><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
          else
          { echo "<label class='rocker rocker-small'><input type='checkbox' name='contribuyente'><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
        ?>
     </div>
     <div class="six wide field">
          <label>Cliente Activo (S/N):</label>
         <?php
          $activo=$clienteData['activo'];
          if($activo=="S")
          { echo "<label class='rocker rocker-small'><input type='checkbox' name='activo' checked><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
          else
          { echo "<label class='rocker rocker-small'><input type='checkbox' name='activo'><span class='switch-left'>Si</span><span class='switch-right'>No</span>:</label>"; }
         ?>
     </div>
    </div>
    <div class="fields">
     <div class="six wide field">
       <?php
        include("select-tipo-cliente.php");
       ?>
     </div>
     <div class="six wide field">
      <label class='font-16'>Nivel de Precios <i class='check icon'></i></label>
      <?php
        if($clienteData['nivelprecio']<>"")
        {
          $nivelprecio=$clienteData['nivelprecio'];
          include("$dirRoot"."datafiles/find-nivel-precios.php");
          //  echo "$nom_nivel";
        }
        //include("$dirRoot"."datafiles/find-nivel-precios.php");
        include("$dirRoot"."datafiles/select-nivel-precios.php");

      ?>
     </div>
     <div class="six wide field">
       <?php
        include("select-vendedor.php");
       ?>
     </div>
    </div>


     <div class='field'>
       <input class="ui button blue" type="submit" value='Enviar Datos'>
       <input class="ui button" type ="reset" value='Limpiar Campos'>
     </div>
    </div>
   <br><br>
    </div>
   <br><br><br>
    </form>
   </div>


<br><br><br>
<?php
// $showStatus="N";
include("$dirRoot"."includes/statusAdmin.php");
?>

