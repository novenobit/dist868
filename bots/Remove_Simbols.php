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
 $textoremove=str_replace("á","a",$textoremove);
 $textoremove=str_replace("é","e",$textoremove);
 $textoremove=str_replace("í","i",$textoremove);
 $textoremove=str_replace("ó","o",$textoremove);
 $textoremove=str_replace("ú","u",$textoremove);
 $textoremove=str_replace("ñ","n",$textoremove);
 $textoremove=str_replace("Ñ","N",$textoremove);
 $textoremove=str_replace("Ã±","n",$textoremove);
 $textoremove=str_replace("ÃƒÂ±","n",$textoremove);
 $textoremove=str_replace("ï¿½","n",$textoremove);
 $textoremove=str_replace("ï¿½","n",$textoremove);
 $textoremove=str_replace("?¿½","n",$textoremove);
 $textoremove=str_replace("¯Â¿Â½","n",$textoremove);

 $textoremove=str_replace("Ã¡","a",$textoremove);
 $textoremove=str_replace("Ã©","e",$textoremove);
 $textoremove=str_replace("Ã*","i",$textoremove);
 $textoremove=str_replace("Ã³","o",$textoremove);
 $textoremove=str_replace("Ãº","u",$textoremove);
 $textoremove=str_replace("Ã±","n",$textoremove);
 $textoremove=str_replace("Ã«","e",$textoremove);
 $textoremove=str_replace("Ã¼","u",$textoremove);
 $textoremove=str_replace("Â»",">>",$textoremove);
 $textoremove=str_replace("Â«","<<",$textoremove);
 $textoremove=str_replace("Â©","",$textoremove);
 $textoremove=str_replace("Â®","",$textoremove);
 $textoremove=str_replace("â„¢","",$textoremove);
 $textoremove=str_replace("â??","@",$textoremove);
 $textoremove=str_replace("Ãa","ia",$textoremove);
 $textoremove=str_replace("Ã","ia",$textoremove);
 $textoremove=str_replace("Ã","ir",$textoremove);
 $textoremove=str_replace("Ã","i",$textoremove);
?>
