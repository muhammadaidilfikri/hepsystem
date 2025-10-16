<?php
include ("dbconnect.php");
include ("crsfunction.php");
include ("class-excel-xml.inc.php");

$sql_events = mysqli_query($mysqli, "select * from student order by stdName asc") or die (mysqli_error());
$myarray = array();
$y=1;
while($row = mysqli_fetch_array($sql_events)) {

  $stdName = $row["stdName"];
  $stdNo = $row["stdNo"];
  $noic = $row["noIc"];
  $kod_sem = $row["kod_sem"];
  $jantina = $row["jantina"];
  $progCode = $row["progCode"];
  $noPhone = $row["noPhone"];
  $email = $row["email"];
  $cstd = countStudentInvolvement($stdNo);
  $smark = sumMarks($stdNo);
  $doc = array (1 => array("BIL","NO PELAJAR","NAMA PELAJAR","NO IC","KOD KURSUS","JUMLAH PENGLIBATAN AKTIVITI", "JUMLAH MARKAH"));
  $myarray[] = array($y,$stdNo,strtoupper($stdName),$noic,$progCode,$cstd,$smark);
  $y++;
  }

  $xls = new Excel_XML;
  $xls->addArray ( $doc );
  $xls->addArray ( $myarray );
  $xls->generateXML ( "Senarai Nama Pelajar dan Markah KOKO");
  ?>
