<?php
// ************************************************************* 2023 ********
//  Sistema de Control de Ventas                                            //
//  pro-cat-list2.php                                                       //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Inform&aacute;tica, C.A.   //
// ***************************************************************************
include_once("../includes/session.php");

$header="S";
$image="S";
$menu="S";
$divider="S";
$icon="S";
$input="S";
$list="N";
$sidebar="S";
$table="S";
$message="S";
$label="S";
$item="N";
$rating="N";
$aos="N";
$slick="N";
$swiper="N";
$autoPro="S";
$divider="S";
$forms="S";
$breadCrumb="S";
$findData="S";
$popup="S";
$dropdown="S";
$topAdmin="S";
$autoPro="S";
$dirRoot="../";
include_once("../includes/headfileFrame.php");
FechayHora();

if(empty($iduser) and empty($usuario) and empty($clave))
{ echo "<html><meta http-equiv=refresh content=0;url=../users/usercontrol.php>";
  exit();
}

if(isset($_GET['op2']))
{ $op2="$_GET[op2]"; }
$todoBien="N";
if(!isset($op2))
{ $op2="1"; }

if(isset($_GET['cod_categoria']))
{ $cod_categoria="$_GET[cod_categoria]"; }

if(isset($_GET['id']))
{ $id=$_GET['id']; }
if(isset($_GET['op']))
{ $op=$_GET['op']; }

if(!isset($op))
{ $op="lp"; }
if(!isset($op2))
{ $op2="lis"; }
?>

<div class="ui container">
 <?php include("sub-menu.php"); ?>
</div>

<div class="ui padded grid">
 <div class="three wide tablet only three wide computer only column sidebar" id="sidebar">
   <?php
    include("left-menu.php");
   ?>
 </div>
 <div class="sixteen wide mobile thirteen wide tablet thirteen wide computer right floated column" id="content">
  <?php
    if($op2=="add" and isset($_POST['nom_categoria']))
    {
     $nom_categoria=$_POST['nom_categoria'];
     //New_Codigo_ProCat();
     include("$dirRoot"."bots/New_Codigo_ProCat.php");
     //echo "<br>2 $cod_categoria<br>3 $nom_categoria";
     if(empty($cod_categoria) or empty($nom_categoria))
     {
       $error="falta algunos datos";
       error();
       exit();
     }
     else
     {
       $query="select id_categoria from categoria where cod_categoria='$cod_categoria' or nom_categoria='$nom_categoria' ";
       $result=mysqli_query($conex1,$query);
       $num_filas=mysqli_num_rows($result);
       if($num_filas>0)
       {
        $error="esta categoria ya fue publicado";
        error();
        exit();
       }
       else
       {
        $nom_categoria=ucwords($nom_categoria);
        $filename=stripslashes($_FILES['foto_categoria']['name']);
        if(isset($filename) and $filename<>"")
        {
         include("pro-cat-foto-upload.php");
        }
        if(!isset($banner_categoria))
        { $banner_categoria=""; }
        if(!isset($icono))
        { $icono=""; }
        if(!isset($nota))
        { $nota=""; }
        $query2="insert into categoria(cod_categoria, nom_categoria, foto_categoria,banner_categoria, icono, nota)
        values('$cod_categoria', '$nom_categoria', '$filename','$banner_categoria', '$icono', '$nota')";
        $result2=mysqli_query($conex1,$query2);
        $todoBien="S";
        $boxColorH="cardColor";
        $boxTitle="Listo";
        $boxData="<p>Los Datos Fueron Actualizados .....
        <br>1 $cod_categoria / $nom_categoria<br>Puede Continuar Trabajando</p>";
        $boxColor="white";
        $boxFoot="";
        $boxColorF="";
        include("$dirRoot"."data/boxData.php");
        echo "<html><meta http-equiv=refresh content=3;url=pro-cat-list.php?op2=1>";
       }
     }
    }
    if($op2=="del")
    {
     if(isset($id))
     {
       $num=0;
       $queryS="select cod_categoria from categoria where id_categoria ='$id'";
       $sqlS=mysqli_query($conex1, $queryS);
       $Data=mysqli_fetch_array($sqlS);
       $num=mysqli_num_rows($sqlS);
       // echo $queryS.' / '.$num;
       if($num>0)
       {
        $sqldel1="delete from productos where cod_categoria ='{$Data['cod_categoria']}' and activo='S'";
     //   $result1=mysqli_query($conex1,$sqldel1) or die ("$queryerror $query. " . mysqli_error());
       }
       $sqldel="delete from categoria where id_categoria ='$id'";
       $result=mysqli_query($conex1,$sqldel) or die ("$queryerror $query. " . mysqli_error());
       $Table="productos";
       TableStatus();
       if($dbEngine=="MyISAM")
       {
        $sql1="repair table categoria, productos";
        $result2=mysqli_query($conex1,$sql1) or die ("$queryerror $query. " . mysqli_error());
       }
       $mensaje= "Los Datos Fueron Eliminados";
       mensaje();
       exit();
     }
     else
     {
//    echo "<form action='pro-cat-del2.php?o2p=$op2&id=$id' method='post'>";
?>
      <br><h2>Eliminar Categor&iacute;a</h2>
      <table class='table' style='width:100%'>
<?php
        $sql=mysqli_query($conex1,"select cod_categoria,nom_categoria,foto_categoria from categoria where id_categoria='$id'");
        while($categoria=mysqli_fetch_array($sql))
        {
          $foto="{$categoria['foto_categoria']}";
          if(empty($foto))
            $foto="sinfoto.png";
          echo "<tr><td bgcolor='#F8F8FF' width=100>Cod&iacute;go</td>
          <td class='fondo-white'>
            {$categoria['cod_categoria']}
          </td></tr>
          <tr><td align=right bgcolor='#F8F8FF'>Nombre</td>
            <td class='fondo-white'>
            {$categoria['nom_categoria']}
          </td></tr>
          <tr><td align= right bgcolor='#F8F8FF'>Foto</td><td class='fondo-white'>
            <img src='$dirRoot"."imagenes/$fotosDir/$foto'>
          </td></tr>";
        }
?>
      </table>
      <br>
      <div class='row'>
       <div class='container'>
        <form action='<?php echo "pro-cat-del2.php?op2=$op2&id=$id"; ?> ' method='post'>
         Seguro desea eliminar esta Categor&iacute;a (S/N) &nbsp;&nbsp;
         <input type='submit' value='Borrar'>
        </form>
       </div>
      </div>
<?php
     } // else if id
    }
    if($op2=="1")
    {
?>
     <form class="ui form" action="pro-cat-list2.php?op2=add" method="post" enctype="multipart/form-data">
      <h3>Agrega Categoria</h3>
      <div class="field">
        <label>Nombre</label>
        <input type="text" name="nom_categoria" placeholder="Nombre">
      </div>
      <div class="field">
        <label>Foto/Imagen</label>
         <input type='file' name='foto_categoria'>
      </div>
      <button class="ui button" type="submit">Enviar</button>
     </form>
     <br><br>
<?php
    }
  ?>
 </div>
</div>

<?php
// $showStatus="N";
$subCatForm="S";
include("$dirRoot"."includes/statusAdmin.php");
?>
