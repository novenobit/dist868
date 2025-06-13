<?php
// ********************************************************************* 2007 ****/
// Variables Para Los Sistemas de Impresi&oacute;n                                       /
// NovenoBIT.com                                                                  /
// *******************************************************************************/

// Tipo de Printer
  // $handle=printer_open("EPSON TM-U300A No cut");
  // $handle=printer_open("Star SP512 Line Mode Printer");
// ---------------------------------------
 if(isset($_POST['lin']))
 { $lin="$_POST[lin]"; }
 if(isset($_POST['lin1']))
 { $lin1="$_POST[lin1]"; }
 if(isset($_POST['lin2']))
 { $lin2="$_POST[lin2]"; }
 if(isset($_POST['col1']))
 { $col1="$_POST[col1]"; }
 if(isset($_POST['col2']))
 { $col2="$_POST[col2]"; }
 if(isset($_POST['col3']))
 { $col3="$_POST[col3]"; }
 if(isset($_POST['col4']))
 { $col4="$_POST[col4]"; }
 if(isset($_POST['printVar']))
 { $printVar="$_POST[printVar]"; }
 if(isset($_POST['fontprinter1']))
 { $fontprinter1="$_POST[fontprinter1]"; }
 if(isset($_POST['fontprinter2']))
 { $fontprinter2="$_POST[fontprinter2]"; }
// ---------------------------------------
// Generic / Text Only

function Printer_Fonts()
{
 global $printVar,  $lin, $lin1, $lin2, $col1, $col2, $col3, $col4, $fontprinter1, $fontprinter2, $AnchoNombre, $PrinterName,
 $printer1,$printer2,$printer3,$printer4,$printer5, $skipLines,$printerVales,$printerAnular1,$printerAnular2,$printerNotaConsumo1,
 $printerNotaConsumo2,$printerNotaConsumo3,$printerList1,$printerList;
 // $fontprinter1 = Encabezado
 // $fontprinter2 = Datos
 //  24, 16
 //  18, 12
 //  12, 10
// ---------------------------------------
 $lin=1;
 $lin1=1;
 $lin2=16;
 $col1=0;
 $col2=300;
 $skipLines=0;

// ==================================================
 if($printVar=="$printer1") // Cocina
 {
  //$PrinterName="\\\AXEL-PC\\BIXOLON SRP-350plus2";
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="17";
  $skipLines=8;
  $PrinterName=$printer1;
  if(!isset($PrinterName))
  { $PrinterName="Cocina"; }
  //$fontprinter1=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter1=printer_create_font("Tahoma", 16, 14, PRINTER_FW_THIN, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 18, 20, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="$printer2") // Bar
 {
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="20";
  $skipLines=4;
  $PrinterName=$printer2;
  if(!isset($PrinterName))
  { $PrinterName="Bar"; }
  $fontprinter1=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 17, 19, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="$printer3") // Sushi
 {
  $lin=1;
  $lin2=20;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="30";
  $skipLines=8;
  $PrinterName=$printer3;
  if(!isset($PrinterName))
  { $PrinterName="Sushi"; }
  // $fontprinter1=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
  // $fontprinter2=printer_create_font("Verdana", 17, 19, PRINTER_FW_LIGHT, false, false, false, 0);
  // $fontprinter2=printer_create_font("Verdana", 18, 20, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter1=printer_create_font("Tahoma", 16, 14, PRINTER_FW_THIN, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 18, 20, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="$printer4") // Helados
 {
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="30";
  $skipLines=4;
  if(isset($printer4) and !empty($printer4))
  { $PrinterName=$printer4; }
  if(!isset($PrinterName))
  { $PrinterName="Helados"; }
  $fontprinter1=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="$printer5") // Cafe
 {
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="16";
  $skipLines=4;
  if(isset($printer5) and !empty($printer5))
  { $PrinterName=$printer5; }
  if(!isset($PrinterName))
  { $PrinterName="Cafe"; }
  $fontprinter1=printer_create_font("Verdana", 16, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 17, 19, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
// Anulación
 if($printVar=="Anular1")
 {
  // $PrinterName="\\\AXEL-PC\\BIXOLON SRP-350plus2";
  $lin2=12;
  $col2=134;
  $col3=20;
  $col4=300;
  $skipLines=4;
  if(isset($printerAnular1) and !empty($printerAnular1))
  { $PrinterName=$printerAnular1; }
  if(!isset($PrinterName))
  { $PrinterName="Anular1"; }
  $fontprinter1=printer_create_font("Verdana", 16, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 18, 20, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="Anular2")
 {
  // $PrinterName="\\\AXEL-PC\\BIXOLON SRP-350plus2";
  $lin2=12;
  $col2=134;
  $col3=20;
  $col4=300;
  $skipLines=4;
  if(isset($printerAnular2) and !empty($printerAnular2))
  { $PrinterName=$printerAnular2; }
  if(!isset($PrinterName))
  { $PrinterName="Anular2"; }

  $fontprinter1=printer_create_font("Verdana", 16, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 18, 20, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
// Listados
 if($printVar=="L1" or $printVar=="Listados1")
 {
  $lin2=18;
  $col2=244;
  $col3=40;
  $col4=420;
  $skipLines=4;
  if(isset($printerList1) and !empty($printerList1))
  { $PrinterName=$printerList1; }
  if(!isset($PrinterName))
  { $PrinterName="Listados1"; }
  $fontprinter1=printer_create_font("Tahoma", 12, 10, PRINTER_FW_THIN, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 12, 10, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="L12" or $printVar=="Listados2")
 {
  // $PrinterName="\\\AXEL-PC\\BIXOLON SRP-350plus2";
  $lin2=14;
  $col2=134;
  $col3=30;
  $col4=400;
  $skipLines=4;
  if(isset($printerList2) and !empty($printerList2))
  { $PrinterName=$printerList2; }
  if(!isset($PrinterName))
  { $PrinterName="Listados2"; }
  $fontprinter1=printer_create_font("Tahoma", 10, 6, PRINTER_FW_THIN, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 10, 6, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
// Vales y Prestamos

 if($printVar=="Vales")
 {
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="17";
  $skipLines=4;
  if(isset($printerVales) and !empty($printerVales))
  { $PrinterName=$printerVales; }
  if(!isset($PrinterName))
  { $PrinterName="Vales"; }
  $fontprinter1=printer_create_font("Verdana", 16, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 17, 19, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
// NotaConsumo Precuenta

 if($printVar=="NotaConsumo1")
 {
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="16";
  $skipLines=4;
  if(isset($printerNotaConsumo1) and !empty($printerNotaConsumo1))
  { $PrinterName=$printerNotaConsumo1; }
  if(!isset($PrinterName))
  { $PrinterName="NotaConsumo1"; }
  $fontprinter1=printer_create_font("Verdana", 12, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="NotaConsumo2")
 {
  $lin=1;
  $col1=0;
  $col2=300;
  $extra="N";
  $AnchoNombre="16";
  $skipLines=4;
  if(isset($printerNotaConsumo2) and !empty($printerNotaConsumo2))
  { $PrinterName=$printerNotaConsumo2; }
  if(!isset($PrinterName))
  { $PrinterName="NotaConsumo2"; }
  $fontprinter1=printer_create_font("Verdana", 16, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 17, 19, PRINTER_FW_LIGHT, false, false, false, 0);
 }

// ==================================================
 if($printVar=="NotaConsumo3")
 {
  $lin2=14;
  $col2=134;
  $col3=30;
  $col4=400;
  $skipLines=4;
  if(isset($printerNotaConsumo3) and !empty($printerNotaConsumo3))
  { $PrinterName=$printerNotaConsumo3; }
  else
  { $PrinterName="NotaConsumo3"; }
  $fontprinter1=printer_create_font("Verdana", 12, 12, PRINTER_FW_LIGHT, false, false, false, 0);
  $fontprinter2=printer_create_font("Verdana", 16, 14, PRINTER_FW_LIGHT, false, false, false, 0);
 }
}
?>
