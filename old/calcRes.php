<?	

								include ("dbconnect.php");
								include ("iqfunction.php");
								$uid = $_GET['user_id'];

								$sql_events = mysqli_query($connection, "select * from finalmark,regprog,profile,ipta where ipta.ipta_id=profile.ipta_id and profile.user_id=finalmark.user_id and  finalmark.user_id=regprog.user_id and finalmark.user_id='$uid'") or die (mysqli_error());
								$z =1;

								$date_today =date('Y-m-d');
								while ($row = mysqli_fetch_array($sql_events)) {

									$user_id = $row["user_id"];
									$name = $row["name"];
									$cposition = $row["cposition"];
									$ipta_a = $row["ipta_a"];
									$a12 = $row["a12"];
									$a22 = $row["a22"];
									$a32 = $row["a32"];
									
									$b12 = $row["b12"];
									$b22 = $row["b22"];
									$b32 = $row["b32"];
									
									$c12 = $row["c12"];
									$c22 = $row["c22"];
									$c32 = $row["c32"];
									
									$d12 = $row["d12"];
									$d22 = $row["d22"];
									$d32 = $row["d32"];
									
									$e12 = $row["e12"];
									$e22 = $row["e22"];
									$e32 = $row["e32"];
									
									$curr = $row["curr"];
									$tar = $row["tar"];
									
									$aveA = round(($a12+$a22+$a32)/3,2);
									$aveB = round(($b12+$b22+$b32)/3,2);
									$aveC = round(($c12+$c22+$c32)/3,2);
									$aveD = round(($d12+$d22+$d32)/3,2);
									$aveD1 = ($d12+$d22)/2;
									$aveE = round(($e12+$e22+$e32)/3,2);
									$aveE1= ($e12)/1;
									$totalAve = round(($a12+$a22+$a32+$b12+$b22+$b32+$c12+$c22+$c32+$d12+$d22+$d32+$e12+$e22+$e32)/15,2);
									$weight = 6;
									
									$absA1 = $a12*6/90;
									$absA2 = $a22*6/90;
									$absA3 = $a32*6/90;
									
									$absB1 = $b12*6/90;
									$absB2 = $b22*6/90;
									$absB3 = $b32*6/90;
									
									$absC1 = $c12*6/90;
									$absC2 = $c22*6/90;
									$absC3 = $c32*6/90;
									
									$absD1 = $d12*6/90;
									$absD2 = $d22*6/90;
									$absD3 = $d32*6/90;
									
									$absE1 = $e12*6/90;
									$absE2 = $e22*6/90;
									$absE3 = $e32*6/90;
									
									$totAbs = $absA1+$absA2+$absA3+$absB1+$absB2+$absB3+$absC1+$absC2+$absC3+$absD1+$absD2+$absD3+$absE1+$absE2+$absE3;
									

									$arr = array($a12,$a22,$a32,$b12,$b22,$b32,$c12,$c22,$c32,$d12,$d22,$d32,$e12,$e22,$e32 );
									
									$array_target = array($a12-$tar,$a22-$tar,$a32-$tar,$b12-$tar,$b22-$tar,$b32-$tar,$c12-$tar,$c22-$tar,$c32-$tar,$d12-$tar,$d22-$tar,$d32-$tar,$e12-$tar,$e22-$tar,$e32-$tar);
									
									$target_length = count($array_target);
									$ftar25=0;
									$ftar20=0;
									$ftar15=0;
									$ftar10=0;
									$ftar05=0;
									$ftar00=0;
									$ftar_05=0;
									$ftar_10=0;
									$ftar_15=0;
									$ftar_20=0;
									$ftar_25=0;
									
										for($i=0;$i<$target_length;$i++) 
										{ 
											if ($array_target[$i]==2.5)
											{
												$ftar25++;
											}
											else if ($array_target[$i]==2)
											{
												$ftar20++;
											}
											else if ($array_target[$i]==1.5)
											{
												$ftar15++;
											}
											else if ($array_target[$i]==1)
											{
												$ftar10++;
											}
											else if ($array_target[$i]==0.5)
											{
												$ftar05++;
											}
											else if ($array_target[$i]==0)
											{
												$ftar00++;
											}
											else if ($array_target[$i]==-0.5)
											{
												$ftar_05++;
											}
											else if ($array_target[$i]==-1)
											{
												$ftar_10++;
											}
											else if ($array_target[$i]==-1.5)
											{
												$ftar_15++;
											}
											else if ($array_target[$i]==-2)
											{
												$ftar_20++;
											}
											else if ($array_target[$i]==-2.5)
											{
												$ftar_25++;
											}
											else
											{
												
											}
										}
									
									$tar_spa = array ("2.5" => $ftar25, "2.0" => $ftar20, "1.5" => $ftar15, "1.0" => $ftar10, "0.5" => $ftar05, "0.0" => $ftar00, "-0.5" => $ftar_05, "-1.0" => $ftar_10, "-1.5" => $ftar_15, "-2.0" => $ftar_20, "-2.5" => $ftar_25);
									$tts = array_search(max($tar_spa),$tar_spa);
									
									
									$mts = array_search(min(array_filter($tar_spa)),$tar_spa);
									
									
									if ($tts>=1.51)
									{
										if($mts<-1.02)
										{
											$tj = "Developable";
										}
										else if($mts>= -1.00 && $mts<=-0.51)
										{
											$tj = "Developable";
										}
										else if($mts>= -0.5 && $mts<=0.49)
										{
											$tj = "Suitable";
										}
										else if($mts>= 0.5 && $mts<=1.49)
										{
											$tj = "Exceeds";
										}
										else if($mts>=1.50)
										{
											$tj = "Significantly Exceeds";
										}
										else{
											$tj = "not in range 1";
										}
									}
									else if ($tts>=0.50 && $tts<= 1.50)
									{
										if($mts<-1.02)
										{
											$tj = "Developable";
										}
										else if($mts>= -1.00 && $mts<=-0.51)
										{
											$tj = "Developable";
										}
										else if($mts>= -0.5 && $mts<=0.49)
										{
											$tj = "Suitable";
										}
										else if($mts>= 0.5 && $mts<=1.49)
										{
											$tj = "Exceeds";
										}
										else if($mts>=1.50)
										{
											$tj = "Exceeds";
										}
										else{
											$tj = "not in range 1";
										}
									}
									else if ($tts>=-0.49 && $tts<= 0.49)
									{
										if($mts<-1.02)
										{
											$tj = "Developable";
										}
										else if($mts>= -1.00 && $mts<=-0.51)
										{
											$tj = "Developable";
										}
										else if($mts>= -0.5 && $mts<=0.49)
										{
											$tj = "Suitable";
										}
										else if($mts>= 0.5 && $mts<=1.49)
										{
											$tj = "Suitable";
										}
										else if($mts>=1.50)
										{
											$tj = "Suitable";
										}
										else{
											$tj = "not in range 1";
										}
									}
									
									else if ($tts>=-0.99 && $tts<= -0.05)
									{
										if($mts<-1.02)
										{
											$tj = "Developable";
										}
										else if($mts>= -1.00 && $mts<=-0.51)
										{
											$tj = "Developable";
										}
										else if($mts>= -0.5 && $mts<=0.49)
										{
											$tj = "Developable";
										}
										else if($mts>= 0.5 && $mts<=1.49)
										{
											$tj = "Developable";
										}
										else if($mts>=1.50)
										{
											$tj = "Developable";
										}
										else{
											$tj = "not in range 1";
										}
									}
									else if ($tts<= -1.00)
									{
										if($mts<-1.02)
										{
											$tj = "Reviewable";
										}
										else if($mts>= -1.00 && $mts<=-0.51)
										{
											$tj = "Developable";
										}
										else if($mts>= -0.5 && $mts<=0.49)
										{
											$tj = "Developable";
										}
										else if($mts>= 0.5 && $mts<=1.49)
										{
											$tj = "Developable";
										}
										else if($mts>=1.50)
										{
											$tj = "Developable";
										}
										else{
											$tj = "not in range 1";
										}
									}
									
									if ($tj=="Reviewable")
									{
										$desc = "REVIEWABLE: Consider Subject for Alternative Positions";
									}
									else if ($tj=="Developable")
									{
										$desc = "DEVELOPABLE: Target for Development on Competencies with -0.50 or Wider Gaps. Reassess for SUITABILITY for Target Position at the End of Competency Development Initiative.";
									}
									else if ($tj=="Suitable")
									{
										$desc = "SUITABLE: Ready to Assume Target Position Immediately.";
									}
									else if ($tj=="Exceeds")
									{
										$desc = "EXCEEDS: Exceeds Target Position Requirement. Best Placed in Target Position within 18 Months to Avoid Possible Demotivation.";
									}
									else
									{
										$desc = "SIGNIFICANTLY EXCEEDS: Significantly Exceeds Position Requirement. Best Considered for Position 1 Level above Target Position within 24 Months to Avoid Demotivation.";								
									}
									
									
									
									$array_current = array($a12-$curr,$a22-$curr,$a32-$curr,$b12-$curr,$b22-$curr,$b32-$curr,$c12-$curr,$c22-$curr,$c32-$curr,$d12-$curr,$d22-$curr,$d32-$curr,$e12-$curr,$e22-$curr,$e32-$curr);
									
									$current_length = count($array_current);
									$fcurr25=0;
									$fcurr20=0;
									$fcurr15=0;
									$fcurr10=0;
									$fcurr05=0;
									$fcurr00=0;
									$fcurr_05=0;
									$fcurr_10=0;
									$fcurr_15=0;
									$fcurr_20=0;
									$fcurr_25=0;
									
										for($i=0;$i<$current_length;$i++) 
										{ 
											if ($array_current[$i]==2.5)
											{
												$fcurr25++;
											}
											else if ($array_current[$i]==2)
											{
												$fcurr20++;
											}
											else if ($array_current[$i]==1.5)
											{
												$fcurr15++;
											}
											else if ($array_current[$i]==1)
											{
												$fcurr10++;
											}
											else if ($array_current[$i]==0.5)
											{
												$fcurr05++;
											}
											else if ($array_current[$i]==0)
											{
												$fcurr00++;
											}
											else if ($array_current[$i]==-0.5)
											{
												$fcurr_05++;
											}
											else if ($array_current[$i]==-1)
											{
												$fcurr_10++;
											}
											else if ($array_current[$i]==-1.5)
											{
												$fcurr_15++;
											}
											else if ($array_current[$i]==-2)
											{
												$fcurr_20++;
											}
											else if ($array_current[$i]==-2.5)
											{
												$fcurr_25++;
											}
											else
											{
												
											}
										}
									
									$curr_spa = array ("2.5" => $fcurr25, "2.0" => $fcurr20, "1.5" => $fcurr15, "1.0" => $fcurr10, "0.5" => $fcurr05, "0.0" => $fcurr00, "-0.5" => $fcurr_05, "-1.0" => $fcurr_10, "-1.5" => $fcurr_15, "-2.0" => $fcurr_20, "-2.5" => $fcurr_25);
									
									$top_curr_spa = array_search(max($curr_spa),$curr_spa);
									$tcs = $top_curr_spa;
									
									$min_curr_spa = array_search(min(array_filter($curr_spa)),$curr_spa);
									$mcs = $min_curr_spa;
									
									if ($tcs>=1.51)
									{
										if($mcs<-1.02)
										{
											$cj = "Developable";
										}
										else if($mcs>= -1.00 && $mcs<=-0.51)
										{
											$cj = "Developable";
										}
										else if($mcs>= -0.5 && $mcs<=0.49)
										{
											$cj = "Suitable";
										}
										else if($mcs>= 0.5 && $mcs<=1.49)
										{
											$cj = "Exceeds";
										}
										else if($mcs>=1.50)
										{
											$cj = "Significantly Exceeds";
										}
										else{
											$cj = "not in range 1";
										}
									}
									else if ($tcs>=0.50 && $tcs<= 1.50)
									{
										if($mcs<-1.02)
										{
											$cj = "Developable";
										}
										else if($mcs>= -1.00 && $mcs<=-0.51)
										{
											$cj = "Developable";
										}
										else if($mcs>= -0.5 && $mcs<=0.49)
										{
											$cj = "Suitable";
										}
										else if($mcs>= 0.5 && $mcs<=1.49)
										{
											$cj = "Exceeds";
										}
										else if($mcs>=1.50)
										{
											$cj = "Exceeds";
										}
										else{
											$cj = "not in range 1";
										}
									}
									else if ($tcs>=-0.49 && $tcs<= 0.49)
									{
										if($mcs<-1.02)
										{
											$cj = "Developable";
										}
										else if($mcs>= -1.00 && $mcs<=-0.51)
										{
											$cj = "Developable";
										}
										else if($mcs>= -0.5 && $mcs<=0.49)
										{
											$cj = "Suitable";
										}
										else if($mcs>= 0.5 && $mcs<=1.49)
										{
											$cj = "Suitable";
										}
										else if($mcs>=1.50)
										{
											$cj = "Suitable";
										}
										else{
											$cj = "not in range 1";
										}
									}
									
									else if ($tcs>=-0.99 && $tcs<= -0.05)
									{
										if($mcs<-1.02)
										{
											$cj = "Developable";
										}
										else if($mcs>= -1.00 && $mcs<=-0.51)
										{
											$cj = "Developable";
										}
										else if($mcs>= -0.5 && $mcs<=0.49)
										{
											$cj = "Developable";
										}
										else if($mcs>= 0.5 && $mcs<=1.49)
										{
											$cj = "Developable";
										}
										else if($mcs>=1.50)
										{
											$cj = "Developable";
										}
										else{
											$cj = "not in range 1";
										}
									}
									else if ($tcs<= -1.00)
									{
										if($mcs<-1.02)
										{
											$cj = "Reviewable";
										}
										else if($mcs>= -1.00 && $mcs<=-0.51)
										{
											$cj = "Developable";
										}
										else if($mcs>= -0.5 && $mcs<=0.49)
										{
											$cj = "Developable";
										}
										else if($mcs>= 0.5 && $mcs<=1.49)
										{
											$cj = "Developable";
										}
										else if($mcs>=1.50)
										{
											$cj = "Developable";
										}
										else{
											$cj = "not in range 1";
										}
									}
									
									
									
									

									$totAve1 = ($a12+$a22+$a32+$b12+$b22+$b32+$c12+$c22+$c32+$d12+$d22+$e12)/12;
									
									$totAverage = ($aveA+$aveB+$aveC+$aveD+$aveE)/5;
									$totAverage1 = ($aveA+$aveB+$aveC+$aveD1+$aveE1)/5;
									
							
									
								}
									?>

<html>
<body>
	<head>
		<title>
			UniLEAD | Result
		</title>
		<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors -->
		<link href="assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="assets/demo/default/media/img/logo/favicon.ico" />
	</head>
	<div align="center" id="mainc" style="height:350px;"></div>
	
	<table class="table-borderless" width="98%">
	  <tbody>
	    <tr>
	      <td height="30" align ="center" colspan="5" bgcolor="#F8E9A1"><strong><? echo $name?></strong></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#f8f1d2" align ="center" colspan="2"><strong>Current Position</strong></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" bgcolor="#f8f1d2"  align ="center" colspan="2"><strong>Target Position</strong></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo $cposition?></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center"><strong>Position Title</strong></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo $ipta_a?></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center"><strong>Location</strong></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center"><? echo $ipta_a?></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><? echo $curr ?></td>
	      <td height="30" bgcolor="#f8f1d2" align ="center" colspan="3"><strong>Normative Competency Proficiency Level</strong></td>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><div class="table_warning"><? echo $tar ?></div></td>
        </tr>
	    <tr>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
	      <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
	      <td height="30"  bgcolor="#F8E9A1" align ="center"><strong>Competency Fit Analysis</strong></td>
	      <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
	      <td height="30"  bgcolor="#F8E9A1" align ="center">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($totAverage,2) ?></td>
	      <td height="30" align ="center" colspan="3"><strong>Average Competency Level</strong></td>
	      <td height="30" align ="center"><? echo round($totAverage,2) ?></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#F8E9A1" align ="center"><? echo round($totAbs,2) ?></td>
	      <td height="30" bgcolor="#F8E9A1" align ="center" colspan="3"><strong>Average Competency Variance</strong></td>
	      <td height="30" bgcolor="#F8E9A1" align ="center"><? echo round($totAbs,2) ?></td>
        </tr>
		   <tr>
	      <td height="30" align ="center"><? echo round($totAverage-$curr,2) ?></td>
	      <td height="30" align ="center" colspan="3"><strong>Variance from Position Reqmt: Average</strong></td>
	      <td height="30" align ="center"><? echo round($totAverage-$tar,2) ?></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#F8E9A1" align ="center"><? echo round($totAverage-$curr,2) ?></td>
	      <td height="30" bgcolor="#F8E9A1" align ="center" colspan="3"><strong>Variance from Position Reqmt: Wgtd Average</strong></td>
	      <td height="30" bgcolor="#F8E9A1" align ="center"><? echo round($totAverage-$tar,2) ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><strong>Current Position</strong></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center"><strong>Target Position</strong></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><strong>%</strong></td>
	      <td height="30" align ="center"><strong>f</strong></td>
	      <td height="30" align ="center"><strong>Variance Level</strong></td>
	      <td height="30" align ="center"><strong>f</strong></td>
	      <td height="30" align ="center"><strong>%</strong></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr25/15*100,2) ?></td>
	      <td height="30" align ="center"><? echo $fcurr25 ?></td>
	      <td height="30" align ="center"><strong>2.5</strong></td>
	      <td height="30" align ="center"><? echo $ftar25 ?></td>
	      <td height="30" align ="center"><? echo round($ftar25/15*100,2) ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr20/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr20; ?></td>
	      <td height="30" align ="center"><strong>2.0</strong></td>
	      <td height="30" align ="center"><? echo $ftar20; ?></td>
	      <td height="30" align ="center"><? echo round($ftar20/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr15/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr15; ?></td>
	      <td height="30" align ="center"><strong>1.5</strong></td>
	      <td height="30" align ="center"><? echo $ftar15; ?></td>
	      <td height="30" align ="center"><? echo round($ftar15/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr10/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr10; ?></td>
	      <td height="30" align ="center"><strong>1.0</strong></td>
	      <td height="30" align ="center"><? echo $ftar10; ?></td>
	      <td height="30" align ="center"><? echo round($ftar10/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr05/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr05; ?></td>
	      <td height="30" align ="center"><strong>0.5</strong></td>
	      <td height="30" align ="center"><? echo $ftar05; ?></td>
	      <td height="30" align ="center"><? echo round($ftar05/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><? echo round($fcurr00/15*100,2); ?></td>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><? echo $fcurr00; ?></td>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><strong>0</strong></td>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><? echo $ftar00; ?></td>
	      <td height="30" bgcolor="#f8f1d2" align ="center"><? echo round($ftar00/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr_05/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr_05; ?></td>
	      <td height="30" align ="center"><strong>-0.5</strong></td>
	      <td height="30" align ="center"><? echo $ftar_05; ?></td>
	      <td height="30" align ="center"><? echo round($ftar_05/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr_10/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr_10; ?></td>
	      <td height="30" align ="center"><strong>-1.0</strong></td>
	      <td height="30" align ="center"><? echo $ftar_10; ?></td>
	      <td height="30" align ="center"><? echo round($ftar_10/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr_15/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr_15; ?></td>
	      <td height="30" align ="center"><strong>-1.5</strong></td>
	      <td height="30" align ="center"><? echo $ftar_15; ?></td>
	      <td height="30" align ="center"><? echo round($ftar_15/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr_20/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr_20; ?></td>
	      <td height="30" align ="center"><strong>-2.0</strong></td>
	      <td height="30" align ="center"><? echo $ftar_20; ?></td>
	      <td height="30" align ="center"><? echo round($ftar_20/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" align ="center"><? echo round($fcurr_25/15*100,2); ?></td>
	      <td height="30" align ="center"><? echo $fcurr_25; ?></td>
	      <td height="30" align ="center"><strong>-2.5</strong></td>
	      <td height="30" align ="center"><? echo $ftar_25; ?></td>
	      <td height="30" align ="center"><? echo round($ftar_25/15*100,2); ?></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#F8E9A1" align ="center" colspan="2"><strong>Current Job</strong></td>
	      <td height="30" bgcolor="#F8E9A1" align ="center"><strong>Person : Job Fit</strong></td>
	      <td height="30" bgcolor="#F8E9A1" align ="center" colspan="2" ><div class="table_warning"><strong>Target Job</strong></div></td>
        </tr>
	    <tr>
	      <td height="30" align ="center" colspan="2"><? echo $cj?></td>
	      <td height="30" align ="center">&nbsp;</td>
	      <td height="30" align ="center" colspan="2"><div class="table_warning"><? echo $tj ?></div></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#F8E9A1" align ="center" colspan="5"><strong>Person : Target Job Fit</strong></td>
        </tr>
	    <tr>
	      <td height="30" bgcolor="#f8f1d2"  colspan="5" align ="center"><? echo $desc ?></td>
        </tr>
      </tbody>
</table>
	<p>&nbsp;</p>
	<table width="98%" border="1">
  <tbody>
    <tr>
      <td   colspan="14" bgcolor="red">Do Not Make Any Changes to Any Cells In this Area</td>
    </tr>
    <tr>
      <td  bgcolor="#CDBA6A" rowspan="2" >Theme</td>
      <td  bgcolor="#CDBA6A" colspan="2">Post Requirement</td>
      <td  bgcolor="#CDBA6A" colspan="5">Normalised Score</td>
      <td  bgcolor="#CDBA6A" colspan="2">Simple Average</td>
      <td  bgcolor="#CDBA6A" colspan="2">Gap Vs. Post</td>
      <td  bgcolor="#CDBA6A" colspan="2">Weighted Avg.</td>
    </tr>
    <tr>
      <td bgcolor="#cccccc">Target</td>
      <td bgcolor="#cccccc">Current</td>
      <td bgcolor="#cccccc" colspan="3">Competencies</td>
      <td bgcolor="#cccccc">Potential</td>
      <td bgcolor="#cccccc">C+P</td>
      <td bgcolor="#cccccc">Cluster</td>
      <td bgcolor="#cccccc">All</td>
      <td bgcolor="#cccccc">Target</td>
      <td bgcolor="#cccccc">Current</td>
      <td bgcolor="#cccccc">Abs</td>
      <td bgcolor="#cccccc">%</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo round($totAve1,2) ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo round($totAverage,2) ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>90</td>
      <td><? echo round($totAbs,2) ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo round(standard_deviation($arr),2) ?></td>
      <td>&nbsp;</td>
      <td>z</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">1.1 Integrity,   Values &amp; Ethics</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $a12 ?></td>
      <td><? echo $a12 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $a12 ?></td>
      <td><? echo round($aveA,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($a12 - $tar) ?></td>
      <td><? echo ($a12 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absA1,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">1.2 Organisational   Commitment</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $a22 ?></td>
      <td><? echo $a22 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $a22 ?></td>
      <td><? echo round($aveA,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($a22 - $tar) ?></td>
      <td><? echo ($a22 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absA2,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">1.3 Self Confidence</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $a32 ?></td>
      <td><? echo $a32 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $a32 ?></td>
      <td><? echo round($aveA,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($a32 - $tar) ?></td>
      <td><? echo ($a32 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absA3,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">2.1 Visioning</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $b12 ?></td>
      <td><? echo $b12 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $b12 ?></td>
      <td><? echo round($aveB,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($b12 - $tar) ?></td>
      <td><? echo ($b12 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absB1,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">2.2 Conceptual/   Creative Thinking</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $b22 ?></td>
      <td><? echo $b22 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $b22 ?></td>
      <td><? echo round($aveB,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($b22 - $tar) ?></td>
      <td><? echo ($b22 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absB2,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">2.3 Business Acumen</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $b32 ?></td>
      <td><? echo $b22 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $b32 ?></td>
      <td><? echo round($aveB,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($b32 - $tar) ?></td>
      <td><? echo ($b32 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absB3,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">3.1 Teamwork &amp;   Team Leadership</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $c12 ?></td>
      <td><? echo $c12 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $c12 ?></td>
      <td><? echo round($aveC,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($c12 - $tar) ?></td>
      <td><? echo ($c12 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absC1,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">3.2 Leveraging   Diversity</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $c22 ?></td>
      <td><? echo $c22 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $c22 ?></td>
      <td><? echo round($aveC,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($c22 - $tar) ?></td>
      <td><? echo ($c22 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absC2,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">3.3 Change   Leadership/ Adaptability</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $c32 ?></td>
      <td><? echo $c32 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $c32 ?></td>
      <td><? echo round($aveC,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($c32 - $tar) ?></td>
      <td><? echo ($c32 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absC3,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">4.1 Impact &amp;   Influence</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $d12 ?></td>
      <td><? echo $d12 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $d12 ?></td>
      <td><? echo round($aveD,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($d12 - $tar) ?></td>
      <td><? echo ($d12 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absD1,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">4.2 Networking/   Relationship Building</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $d22 ?></td>
      <td><? echo $d22 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $d22 ?></td>
      <td><? echo round($aveD,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($d22 - $tar) ?></td>
      <td><? echo ($d22 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absD2,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">4.3 Tact &amp;   Courtesy</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $d32 ?></td>
      <td><? echo $d32 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $d32 ?></td>
      <td><? echo round($aveD,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($d32 - $tar) ?></td>
      <td><? echo ($d32 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absD3,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">5.1 Achievement   Orientation</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $e12 ?></td>
      <td><? echo $e12 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $e12 ?></td>
      <td><? echo round($aveE,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($e12 - $tar) ?></td>
      <td><? echo ($e12 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absA1,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">5.2 Initiative</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $e22 ?></td>
      <td><? echo $e22 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $e22 ?></td>
      <td><? echo round($aveE,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($e22 - $tar) ?></td>
      <td><? echo ($e22 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absE2,2) ?></td>
    </tr>
    <tr>
      <td><table cellspacing="0" cellpadding="0">
  <td width="327">5.3 Stakeholder   Focus</td>
      </table></td>
      <td><? echo $tar ?></td>
      <td><? echo $curr ?></td>
      <td><? echo $e32 ?></td>
      <td><? echo $e32 ?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><? echo $e32 ?></td>
      <td><? echo round($aveE,2) ?></td>
      <td><? echo round($totAverage,2) ?></td>
      <td><? echo ($e32 - $tar) ?></td>
      <td><? echo ($e32 - $curr) ?></td>
      <td><? echo $weight ?></td>
      <td><? echo round($absE3,2) ?></td>
    </tr>
  </tbody>
</table>
	

	<script src="assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->   
        <!--begin::Page Vendors -->
		<script src="assets/vendors/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
		<script src="assets/vendors/custom/flot/flot.bundle.js" type="text/javascript"></script>
		<!--end::Page Vendors -->  
        <!--begin::Page Snippets -->
		<script src="assets/app/js/dashboard.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
        <!--begin::Page Resources -->
		<script src="assets/demo/default/custom/components/charts/flotcharts.js" type="text/javascript"></script>
		<script src="assets/demo/default/custom/components/charts/morris-charts.js" type="text/javascript"></script>
	
	<!-- ECharts -->
    	<script src="assets/vendors/echarts/dist/echarts.min.js"></script>
	
	
	<!-- ECharts -->
    <script>
      var theme = {
          color: [
              '#F8E9A1', '#34495E', '#BDC3C7', '#DC143C',
              '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
          ],

          title: {
              itemGap: 8,
              textStyle: {
                  fontWeight: 'normal',
                  color: '#408829'
              }
          },

          dataRange: {
              color: ['#1f610a', '#97b58d']
          },

          toolbox: {
              color: ['#408829', '#408829', '#408829', '#408829']
          },

          tooltip: {
              backgroundColor: 'rgba(0,0,0,0.5)',
              axisPointer: {
                  type: 'line',
                  lineStyle: {
                      color: '#408829',
                      type: 'dashed'
                  },
                  crossStyle: {
                      color: '#408829'
                  },
                  shadowStyle: {
                      color: 'rgba(200,200,200,0.3)'
                  }
              }
          },

          dataZoom: {
              dataBackgroundColor: '#eee',
              fillerColor: 'rgba(64,136,41,0.2)',
              handleColor: '#408829'
          },
          grid: {
              borderWidth: 0
          },

          categoryAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },

          valueAxis: {
              axisLine: {
                  lineStyle: {
                      color: '#408829'
                  }
              },
              splitArea: {
                  show: true,
                  areaStyle: {
                      color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                  }
              },
              splitLine: {
                  lineStyle: {
                      color: ['#eee']
                  }
              }
          },
          timeline: {
              lineStyle: {
                  color: '#408829'
              },
              controlStyle: {
                  normal: {color: '#408829'},
                  emphasis: {color: '#408829'}
              }
          },

          k: {
              itemStyle: {
                  normal: {
                      color: '#68a54a',
                      color0: '#a9cba2',
                      lineStyle: {
                          width: 1,
                          color: '#408829',
                          color0: '#86b379'
                      }
                  }
              }
          },
          map: {
              itemStyle: {
                  normal: {
                      areaStyle: {
                          color: '#ddd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  },
                  emphasis: {
                      areaStyle: {
                          color: '#99d2dd'
                      },
                      label: {
                          textStyle: {
                              color: '#c12e34'
                          }
                      }
                  }
              }
          },
          force: {
              itemStyle: {
                  normal: {
                      linkStyle: {
                          strokeColor: '#408829'
                      }
                  }
              }
          },
          chord: {
              padding: 4,
              itemStyle: {
                  normal: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  },
                  emphasis: {
                      lineStyle: {
                          width: 1,
                          color: 'rgba(128, 128, 128, 0.5)'
                      },
                      chordStyle: {
                          lineStyle: {
                              width: 1,
                              color: 'rgba(128, 128, 128, 0.5)'
                          }
                      }
                  }
              }
          },
          gauge: {
              startAngle: 225,
              endAngle: -45,
              axisLine: {
                  show: true,
                  lineStyle: {
                      color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                      width: 8
                  }
              },
              axisTick: {
                  splitNumber: 10,
                  length: 12,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              axisLabel: {
                  textStyle: {
                      color: 'auto'
                  }
              },
              splitLine: {
                  length: 18,
                  lineStyle: {
                      color: 'auto'
                  }
              },
              pointer: {
                  length: '90%',
                  color: 'auto'
              },
              title: {
                  textStyle: {
                      color: '#333'
                  }
              },
              detail: {
                  textStyle: {
                      color: 'auto'
                  }
              }
          },
          textStyle: {
              fontFamily: 'Arial, Verdana, sans-serif'
          }
      };
	  
	  $(window).on('resize', function(){
        if(chart != null && chart != undefined){
            chart.resize();
        }
    });

	  var echartBarLine = echarts.init(document.getElementById('mainc'), theme);

      echartBarLine.setOption({
        title: {
          x: 'center',
          y: 'top',
          padding: [0, 0, 20, 0],
          text: 'Leadership Cluster',
          textStyle: {
            fontSize: 15,
            fontWeight: 'normal'
          }
        },
        tooltip: {
          trigger: 'axis',
			axisPointer : {     
            type : 'shadow'       
        }
        },
        toolbox: {
          show: true,
          feature: {
            dataView: {
              show: true,
              readOnly: false,
              title: "Text View",
              lang: [
                "Text View",
                "Close",
                "Refresh",
              ],
            },
            restore: {
              show: true,
              title: 'Restore'
            },
            saveAsImage: {
              show: true,
              title: 'Save'
            }
          }
        },
        calculable: true,
        legend: {
          data: ['test'],
          y: 'bottom'
        },
        xAxis : [
        {
            type : 'category',
			maximum: 5,
            data : ['Integrity','Organisational Commitment','Self Confidence','Visioning','Conceptual','Business Acumen','Teamwork','Leveraging Diversity','Change Leadership','Impact','Networking','Tact & Courtesy','Achievement Orientation','Initiative','Stakeholder Focus']
        }
    ],
    yAxis : [
        {
            type : 'value'
        }
    ],
		
        series: [{
          name: 'Value',
          type: 'bar',
          data: [<? echo $a12 ?>, <? echo $a22 ?>, <? echo $a32 ?>,<? echo $b12 ?>, <? echo $b22 ?>, <? echo $b32 ?>, <? echo $c12 ?>,<? echo $c22 ?>, <? echo $c32 ?>, <? echo $d12 ?>, <? echo $d22 ?>,<? echo $d32 ?>, <? echo $e12 ?>, <? echo $e22 ?>, <? echo $e32 ?>]
        },
		{
            name: 'Overall Average',
            type: 'scatter',
            data: [<? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>,<? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>,<? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>,<? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>, <? echo $totalAve ?>]
        },{
            name: 'Current Position',
            type: 'scatter',
            data: [<? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>,<? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>,<? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>,<? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>, <? echo $curr ?>]
        },{
            name: 'Target Position',
            type: 'line',
            data: [<? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>,<? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>,<? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>,<? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>, <? echo $tar ?>]
        },{
            name: 'Cluster Average',
            type: 'scatter',
            data: [<? echo $aveA ?>, <? echo $aveA ?>, <? echo $aveA ?>,<? echo $aveB ?>, <? echo $aveB ?>, <? echo $aveB ?>, <? echo $aveC ?>,<? echo $aveC ?>, <? echo $aveC ?>, <? echo $aveD ?>, <? echo $aveD ?>,<? echo $aveD ?>, <? echo $aveE ?>, <? echo $aveE ?>, <? echo $aveE ?>]
        }]
      });
	  
	</script>
</body>
</html>
