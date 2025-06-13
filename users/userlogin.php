<?php
// ************************************************************* 2023 ********
//  Formulario                                                              //
//  usuarios.php                                                            //
//  Copyright (c) 2023-2025 NovenoBIT.com, Noveno Bit Informatica, C.A.          //
// ***************************************************************************
//csession2();
if(!isset($idac))
{ $idac=""; }
userid();
//if(isset($usuario))
// showuser();
//else
// userlogin();
?>
<center><table border=0 cellpadding=6 width="90%" >
 <tr><td width="50%"></td><td width="50%"></td><td><td width="124"></tr>
 <tr>
  <td VALIGN=TOP class="black12">Estimado usuario, reg&iacute;strese gratuitamente como miembro de nuestra Portal.
   <br><br>Si usted ya se registr&oacute;, s&oacute;lo ingrese su nombre de usuario y contrase&ntilde;a. Para registrarse por primera vez, por favor complete los datos con la informaci&oacute;n necesaria para activar su cuenta.
   <br><br>Le recordamos que la informaci&oacute;n que usted suministra aqu&iacute; es confidencial. Nosotros no compartirmos informaci&oacute;n de nuestros usuarios con terceros sin su consentimiento. Por ninguna raz&oacute;n, le enviar&aacute; informaci&oacute;n no solicitada a su e-mail.<br><br>
   <center><a href="<?php echo "usercontrol.php?idac=$idac&nd=1"; ?>"><span class="red12"><b>Nuevos Usuarios entra aqu&iacute;</b></span> <img src='../imagenes/graphs/openfolder.gif' border=0 height=10 width=22 alt=""></a>
   <br><br><a href="../index.php"><span class="blue12"><b>Salir de aqu&iacute;</b></span></a></center>
  </td>
  <td VALIGN=TOP align=center>
   <table border=0 width="100%" bgcolor="#999999" >
    <tr><td align=center>
     <table border=0 cellspacing=2 cellpadding=2 width="100%" bgcolor="#FFFFFF" >
      <tr><td>
       <?php
        // <form action=usercontrol.php?nd=3 method=post>
        echo "<form action='usercontrol.php?idac=$idac&nd=3&cesta=1' method=post>"; ?>
      </td></tr>
      <tr><td align=center valign=center class="gray14">
       <b>Usuarios Registrados</b>
      </td></tr>
      <tr><td align=center class="black10">Usuario o Login:
       <br><input type='text' name='usuario' size='20' value='' maxlenght='20'>
      </td></tr>
      <tr><td align=center class="black10">Contrase&ntilde;a
      <br><input type=password maxlenght=20 size=20 name=clave></td></tr>
      <tr><td align=center>
       <img src="../captcha/captcha.php" id="img" border="0" title="captcha v1 phpform.net" alt=""><br>
       <?php
        // echo "<img src='usercaptcha.php'>";
       ?>
       <input type="text" style="font-size:14px;font-family:'Trebuchet MS';font-weight:bold;color:#4D4D4E;border:#ccc 2px dotted;" size="10" name="check">
       <br>Indica Valor
      </td></tr>
      <tr><td align=center>
       <input type=submit name=register value=' ENTRAR '>
      </td></tr>

      <tr><td align=center><span class="red10"><a href="userolvido.php"> &iquest;Olvid&oacute; su contrase&ntilde;a?</a></span></td></tr>
      <tr><td><?php echo "</form>"; ?>
       </td></tr>
     </table>
    </td></tr>
   </table>
  </td>
 </tr>
</table></center>
