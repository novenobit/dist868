<?php
//Function Remove_Simbols22($textoremove)
// Remove_Simbols222($textoremove);
//{
// global $textoremove;
 $count=1;
 $textoremove=str_replace(";","",$textoremove);
 $textoremove=str_replace("-","",$textoremove);
 $textoremove=str_replace("_","",$textoremove);
 $textoremove=str_replace(":","",$textoremove);
 $textoremove=str_replace("/","",$textoremove);
 $textoremove=str_replace("'","",$textoremove);
 $textoremove=str_replace("`","",$textoremove);
 $textoremove=str_replace("�","a",$textoremove);
 $textoremove=str_replace("�","e",$textoremove);
 $textoremove=str_replace("�","i",$textoremove);
 $textoremove=str_replace("�","o",$textoremove);
 $textoremove=str_replace("�","u",$textoremove);
 $textoremove=str_replace("�","n",$textoremove);
 $textoremove=str_replace("�","N",$textoremove);
 $textoremove=str_replace("ñ","n",$textoremove);
 $textoremove=str_replace("Ã±","n",$textoremove);
 $textoremove=str_replace("�","n",$textoremove);
 $textoremove=str_replace("�","n",$textoremove);
 $textoremove=str_replace("?��","n",$textoremove);
 $textoremove=str_replace("�¿½","n",$textoremove);

 $textoremove=str_replace("á","a",$textoremove);
 $textoremove=str_replace("é","e",$textoremove);
 $textoremove=str_replace("�*","i",$textoremove);
 $textoremove=str_replace("ó","o",$textoremove);
 $textoremove=str_replace("ú","u",$textoremove);
 $textoremove=str_replace("ñ","n",$textoremove);
 $textoremove=str_replace("ë","e",$textoremove);
 $textoremove=str_replace("ü","u",$textoremove);
 $textoremove=str_replace("»",">>",$textoremove);
 $textoremove=str_replace("«","<<",$textoremove);
 $textoremove=str_replace("©","",$textoremove);
 $textoremove=str_replace("®","",$textoremove);
 $textoremove=str_replace("™","",$textoremove);
 $textoremove=str_replace("�??","@",$textoremove);
 $textoremove=str_replace("�a","ia",$textoremove);
 $textoremove=str_replace("�","ia",$textoremove);
 $textoremove=str_replace("�","ir",$textoremove);
 $textoremove=str_replace("�","i",$textoremove);
?>
