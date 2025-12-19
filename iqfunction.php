<?php
//new line fikri 27/10/2025
include("dbconnect.php");
date_default_timezone_set("Asia/Kuala_Lumpur");
$date_today = date("Y-m-d");
$today = date("d M Y");

function checkMyD($username)
{

	global $connection;
	$xx = 0;
	$sql_events = mysqli_query($connection, "select * from dept,dept_advisor where dept.dept_id=dept_advisor.dept_id and dept_advisor.staffID='193632'");
	$num_rows = mysqli_num_rows($sql_events);
	if(empty($num_rows))
	{
		$xx=0;
	}
	else {
		$xx=1;
	}
	echo $xx;
}

function getCurrentSemester() {
    // Get current month and year
    $current_month = date('n'); // 1-12
    $current_year = date('Y');
    
    // Determine semester based on month
    if ($current_month >= 1 && $current_month <= 6) {
        // January to June - Semester 2 of previous year
        $semester_year = $current_year - 1;
        return $semester_year . "/" . ($semester_year + 1) . " - Semester 2";
    } else {
        // July to December - Semester 1 of current year
        return $current_year . "/" . ($current_year + 1) . " - Semester 1";
	}
}

function generateToken($size)
{
	$token = bin2hex(random_bytes($size));
	return $token;
}

function checkMyDeptID($username)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from dept,dept_advisor where dept.dept_id=dept_advisor.dept_id and dept_advisor.staffID='$username'") or die (mysqli_error());


	while ($row = mysqli_fetch_array($sql_events)) {

		$dept_id = $row["dept_id"];
	}
		return $dept_id;
}

function showMyDept($sxid)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from dept,dept_advisor where dept.dept_id=dept_advisor.dept_id and dept_advisor.staffID='$sxid'") or die (mysqli_error());
	while ($row = mysqli_fetch_array($sql_events)) {

		$dept_name = $row["dept_name"];
	}
		echo $dept_name;
}

function showMyClub($sxid)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from club,club_advisor where club.club_id=club_advisor.club_id and club_advisor.staffID='$sxid'") or die (mysqli_error());
	while ($row = mysqli_fetch_array($sql_events)) {

		$club_name = $row["club_name"];
	}
		echo $club_name;
}


function checkMarks($actreg_id)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from club_activities as A ,actreg as B where A.act_id=B.act_id and B.actreg_id='$actreg_id'") or die (mysqli_error());


	while ($row = mysqli_fetch_array($sql_events)) {

		$level_id = $row["level_id"];
		$regpoint = $row["regpoint"];
		$stdMark = 0;

		//--level 1
		if ($level_id==1 && $regpoint=='c')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='p')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='a')
		{
			$stdMark = 2;
		}
		//--level 2

		else if ($level_id==2 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 3
		else if ($level_id==3 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 4
		else if ($level_id==4 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 5
		else if ($level_id==5 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 6
		else if ($level_id==6 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==6 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==6 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 7
		else if ($level_id==7 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==7 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==7 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 8
		else if ($level_id==8 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==8 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==8 && $regpoint=='a')
		{
			$stdMark = 2;
		}

//--MDS
else if ($level_id==9 && $regpoint=='c')
{
	$stdMark = 25;
}
else if ($level_id==9 && $regpoint=='p')
{
	$stdMark = 25;
}
else if ($level_id==9 && $regpoint=='a')
{
	$stdMark = 25;
}

}
return $stdMark;
}



function checkMarksD($dactreg_id)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from dept_activities as A ,dactreg as B where A.dact_id=B.dact_id and B.dactreg_id='$dactreg_id'") or die (mysqli_error());


	while ($row = mysqli_fetch_array($sql_events)) {

		$level_id = $row["level_id"];
		$regpoint = $row["regpoint"];
		$stdMark = 0;

		//--level 1
		if ($level_id==1 && $regpoint=='c')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='p')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='a')
		{
			$stdMark = 2;
		}
		//--level 2

		else if ($level_id==2 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 3
		else if ($level_id==3 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 4
		else if ($level_id==4 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 5
		else if ($level_id==5 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 6
		else if ($level_id==6 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==6 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==6 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 7
		else if ($level_id==7 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==7 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==7 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 8
		else if ($level_id==8 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==8 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==8 && $regpoint=='a')
		{
			$stdMark = 2;
		}

//--MDS

		else if ($level_id==9 && $regpoint=='c')
		{
			$stdMark = 25;
		}
		else if ($level_id==9 && $regpoint=='p')
		{
			$stdMark = 25;
		}
		else if ($level_id==9 && $regpoint=='a')
		{
			$stdMark = 25;
		}

		//--level 10
		else if ($level_id==10  && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==10 && $regpoint=='p')
		{
			$stdMark = 5;
		}
		else if ($level_id==10 && $regpoint=='a')
		{
			$stdMark = 5;
		}

	}
		return $stdMark;
}


function checkMyClubID($username)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from club,club_advisor where club.club_id=club_advisor.club_id and club_advisor.staffID='$username'  ") or die (mysqli_error());


	while ($row = mysqli_fetch_array($sql_events)) {

		$club_id = $row["club_id"];
	}
		return $club_id;
}

function senaraiPenasihat($club_id) //TAMBAH is_active
{
	global $connection;
	$sql_events = mysqli_query($connection, "select nama from acstaff, club_advisor  where acstaff.staffID=club_advisor.staffID and club_id='$club_id' AND is_active=1");

	while ($row = mysqli_fetch_array($sql_events)) {

			$nama = $row["nama"];

			echo "- ".$nama;?><br><?php

	}
}

function countClub()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$club_id = $row["club_id"];


			return $club_id;

	}
}



function countStudentRegistered()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdNo from club_registration ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdNo = $row["stdNo"];


			return $stdNo;

	}
}

function countAdvisor()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as ad_id from club_advisor ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$ad_id = $row["ad_id"];


			return $ad_id;

	}
}


function countStudentInvolvement($stdNo)
{
	global $connection;
	$MarksB = 0;
	$sql_events1 = mysqli_query($connection, "select count(*) as stdNo from dactreg where stdNo='$stdNo'   ");
	while ($row = mysqli_fetch_array($sql_events1)) {
			$stdNo = $row["stdNo"];
			$MarksB = $stdNo;
	}

	$MarksA = 0;
	$sql_events2 = mysqli_query($connection, "select count(*) as stdNo from actreg where stdNo='$stdNo'   ");
	while ($row = mysqli_fetch_array($sql_events2)) {
			$stdNo = $row["stdNo"];
			$MarksA = $stdNo;
	}
 	$tots = $MarksB+$MarksA;
	return $tots;
}


function countDeptActivity($dept_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as dept_id from dept_activities where dept_id='$dept_id'   ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$dept_id = $row["dept_id"];
			return $dept_id;
	}
}

function countClubActivity($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club_activities where club_id='$club_id'   ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$club_id = $row["club_id"];
			return $club_id;
	}
}

function countClubActivityA($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club_activities where club_id='$club_id' and level_id='7' ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$club_id = $row["club_id"];
			return $club_id;
	}
}

function countClubActivityB($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club_activities where club_id='$club_id' and level_id !='7' ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$club_id = $row["club_id"];
			return $club_id;
	}
}


function countDeptStdRegistered($dact_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as dact_id from dactreg where dact_id='$dact_id'   ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$dact_id = $row["dact_id"];
			return $dact_id;
	}
}

function countClubStdRegistered($act_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as act_id from actreg where act_id='$act_id'   ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$act_id = $row["act_id"];
			return $act_id;
	}
}

function countDeptStdRegisteredA($dept_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(dactreg.dact_id) as dact_id from dactreg,dept_activities where dept_activities.dact_id=dactreg.dact_id and dept_activities.dept_id='$dept_id'    ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$dact_id = $row["dact_id"];
			return $dact_id;
	}
}

function countClubStdRegisteredA($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(actreg.act_id) as act_id from actreg,club_activities where club_activities.act_id=actreg.act_id and club_activities.club_id='$club_id'    ");
	while ($row = mysqli_fetch_array($sql_events)) {
			$act_id = $row["act_id"];
			return $act_id;
	}
}

function countClubRegistration($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club_registration where club_id='$club_id'   ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$club_id = $row["club_id"];


			return $club_id;

	}
}


function totalAdvisor($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club_advisor where club_id='$club_id'");

	while ($row = mysqli_fetch_array($sql_events)) {

			$club_id = $row["club_id"];

   	  echo $club_id;

	}
}

function totalDStaff($dept_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as dept_id from dept_advisor where dept_id='$dept_id'");

	while ($row = mysqli_fetch_array($sql_events)) {

			$dept_id = $row["dept_id"];

   	  echo $dept_id;

	}
}

function countCard()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdcard_id from stdcard");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdcard_id = $row["stdcard_id"];

   	  echo $stdcard_id;

	}
}

function countCardPending()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdcard_id from stdcard where card_stat=1");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdcard_id = $row["stdcard_id"];

   	  echo $stdcard_id;

	}
}

function countCardCollected()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdcard_id from stdcard where card_stat=2");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdcard_id = $row["stdcard_id"];

   	  echo $stdcard_id;

	}
}



function countStudentOutToday()
{
	global $connection;
	$dtoday = date("Y-m-d");
	$sql_events = mysqli_query($connection, "select * from stdaccess, student where  student.stdNo=stdaccess.stdNo") or die (mysqli_error());
	$z =0;

	while ($row = mysqli_fetch_array($sql_events)) {

		$stdNo = $row["stdNo"];
		$fstat = $row["fstat"];
		$stdName = $row["stdName"];
		//$bkp_stat = $row["bkp_stat"];
		$timestamp = $row["timestamp"];
		$date = new DateTime("@$timestamp");

		if ($date->format('Y-m-d')==$dtoday){

			$z++;

		}

}
	echo $z;

}

function countStudentOut()
{
	global $connection;
	$dtoday = date("Y-m-d");
	$sql_events = mysqli_query($connection, "select * from stdaccess, student where student.stdNo=stdaccess.stdNo") or die (mysqli_error());
	$z =0;

	while ($row = mysqli_fetch_array($sql_events)) {

		$stdNo = $row["stdNo"];
		$fstat = $row["fstat"];
		$stdName = $row["stdName"];
		//$bkp_stat = $row["bkp_stat"];
		$timestamp = $row["timestamp"];
		$date = new DateTime("@$timestamp");

		if ($date->format('Y-m-d')==$dtoday && $fstat==1){

			$z++;

		}

}
	echo $z;

}

function countStudentIn()
{
	global $connection;
	$dtoday = date("Y-m-d");
	$sql_events = mysqli_query($connection, "select * from stdaccess, student where student.stdNo=stdaccess.stdNo") or die (mysqli_error());
	$z =0;

	while ($row = mysqli_fetch_array($sql_events)) {

		$stdNo = $row["stdNo"];
		$fstat = $row["fstat"];
		$stdName = $row["stdName"];
		//$bkp_stat = $row["bkp_stat"];
		$timestamp = $row["timestamp"];
		$date = new DateTime("@$timestamp");

		if ($date->format('Y-m-d')==$dtoday && $fstat==2){

			$z++;

		}

}
	echo $z;

}

function stdTimeOut($stdNo)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select * from access_log where stdNo='$stdNo' and cstat='1' order by accesslog_id desc limit 1 ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$timestamp = $row["timestamp"];
			$date = new DateTime("@$timestamp");
			return $date->format('d M h:i:s A');
	}

}



function tout($stdNo)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select * from access_log where stdNo='$stdNo' and cstat='1' order by accesslog_id desc limit 1 ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$timestamp = $row["timestamp"];
   	  return $timestamp;
	}

}

function tin($stdNo)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select * from access_log where stdNo='$stdNo' and cstat='2' order by accesslog_id desc limit 1 ");

	while ($row = mysqli_fetch_array($sql_events)) {

		$timestamp = $row["timestamp"];
		return $timestamp;
	}

}

function checkstdAccess($stdNo)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select * from access_log where stdNo='$stdNo' and cstat='2' order by accesslog_id desc limit 1 ");

	while ($row = mysqli_fetch_array($sql_events)) {

		$std_in = $row["timestamp"];

	}

	$sql_events2 = mysqli_query($connection, "select * from access_log where stdNo='$stdNo' and cstat='1' order by accesslog_id desc limit 1 ");

	while ($row = mysqli_fetch_array($sql_events2)) {

			$std_out = $row["timestamp"];
	}

	if($std_out>=$std_in)
	{

	}
	else {
		$date = new DateTime("@$std_in");
		echo $date->format('d M h:i:s A');
	}
}

function countStudent()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdID from student ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdID = $row["stdID"];

   	  echo $stdID;

	}
}

function totalStudent()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdID from student ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdID = $row["stdID"];

   	  return $stdID;

	}
}

function countAdministration()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as staffID from acstaff where gred_jenis='P' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$staffID = $row["staffID"];

   	  echo $staffID;

	}
}

function countAcademic()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as staffID from acstaff where gred_jenis='A' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$staffID = $row["staffID"];

   	  echo $staffID;

	}
}

function countStdFile($fileNum)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as fileNum from stdfile where stdNo !='' and fileNum='$fileNum' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$fileNum = $row["fileNum"];

   	  return $fileNum;

	}
}

function checkBoxes($vid)
{
	global $connection;
	$sql_events = mysqli_query($connection, " select * from stdfile where stdNo='$vid' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$fileNum = $row["fileNum"];

   	  return $fileNum;
	}
}

function checkCocoReg($vid)
{
	global $connection;
	$sql_events = mysqli_query($connection, " select * from club_registration as A, club as B where A.club_id=B.club_id and  A.stdNo='$vid' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$club_name = $row["club_name"];

   	  return $club_name;
	}
}

function checkBKP($vid)
{
	global $connection;
	$sql_events = mysqli_query($connection, " select * from bkp where stdNo='$vid' ");
	$num_rows = mysqli_num_rows($sql_events);

	if(empty($num_rows))
	{
		echo "No";
	}
	else {
		echo "yes";
	}
}

function checkSC($vid)
{
	global $connection;
	$sql_events = mysqli_query($connection, " select * from stdcard where stdNo='$vid' ");
	$num_rows = mysqli_num_rows($sql_events);

	if(empty($num_rows))
	{
		echo "No";
	}
	else {
		while ($row = mysqli_fetch_array($sql_events)) {

				$stdcard_id = $row["stdcard_id"];

				echo $stdcard_id;
		}
	}
}


function countFileGroup()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as fileNum from stdfile where stdNo !='' group by fileNum ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$fileNum = $row["fileNum"];

   	  return $fileNum;

	}
}

function countBox()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdFile_id from stdfile where stdNo !='' group by fileNum ");

	$num_rows = mysqli_num_rows($sql_events);

	return $num_rows;
}


function countFileNum()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdFile_id from stdfile where stdNo !='' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdFile_id = $row["stdFile_id"];

   	  return $stdFile_id;

	}
}

function countBKP()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where stdNo !='' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}

function countBKPOver()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where stdNo !='' and totSal>=10000");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}

function countBKPLess()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where stdNo !='' and totSal<10000");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}


function countBKPPending()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where bkp_stat='p' and stdNo!='' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}

function countBKPApproved()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where bkp_stat='a' and stdNo!=''  ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}

function countBKPIncomplete()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where bkp_stat='i' and stdNo!=''  ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}

function countBKPRejected()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as bkp_id from bkp where bkp_stat='x' and stdNo!='' ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$bkp_id = $row["bkp_id"];

   	  return $bkp_id;

	}
}



function sumMarks($vid)
{

	global $connection;
	$sql_events = mysqli_query($connection, "select * from dept_activities as A ,dactreg as B where A.dact_id=B.dact_id and B.stdNo='$vid'");

	$MarksA = 0;

	while ($row = mysqli_fetch_array($sql_events)) {

		$level_id = $row["level_id"];
		$regpoint = $row["regpoint"];
		$stdMark = 0;

		//--level 1
		if ($level_id==1 && $regpoint=='c')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='p')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='a')
		{
			$stdMark = 2;
		}
		//--level 2

		else if ($level_id==2 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 3
		else if ($level_id==3 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 4
		else if ($level_id==4 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 5
		else if ($level_id==5 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 6
		else if ($level_id==6 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==6 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==6 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 7
		else if ($level_id==7 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==7 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==7 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 8
		else if ($level_id==8 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==8 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==8 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--MDS
		else if ($level_id==9 && $regpoint=='c')
		{
			$stdMark = 25;
		}
		else if ($level_id==9 && $regpoint=='p')
		{
			$stdMark = 25;
		}
		else if ($level_id==9 && $regpoint=='a')
		{
			$stdMark = 25;
		}
		
		//--level 10
		else if ($level_id==10 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==10 && $regpoint=='p')
		{
			$stdMark = 5;
		}
		else if ($level_id==10 && $regpoint=='a')
		{
			$stdMark = 5;
		}

		$MarksA += $stdMark;
	}

	$sql_events1 = mysqli_query($connection, 
"select * from club_activities as A ,actreg as B 
 where A.act_id=B.act_id and B.stdNo='$vid'");


	$MarksB = 0;

	while ($row = mysqli_fetch_array($sql_events1)) {

		$level_id = $row["level_id"];
		$regpoint = $row["regpoint"];
		$stdMark = 0;

		//--level 1
		if ($level_id==1 && $regpoint=='c')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='p')
		{
			$stdMark = 20;
		}
		else if ($level_id==1 && $regpoint=='a')
		{
			$stdMark = 2;
		}
		//--level 2

		else if ($level_id==2 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==2 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 3
		else if ($level_id==3 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==3 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 4
		else if ($level_id==4 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==4 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 5
		else if ($level_id==5 && $regpoint=='c')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='p')
		{
			$stdMark = 10;
		}
		else if ($level_id==5 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 6
		else if ($level_id==6 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==6 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==6 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 7
		else if ($level_id==7 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==7 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==7 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level 8
		else if ($level_id==8 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==8 && $regpoint=='p')
		{
			$stdMark = 4;
		}
		else if ($level_id==8 && $regpoint=='a')
		{
			$stdMark = 2;
		}

		//--level MDS
		else if ($level_id==9 && $regpoint=='c')
		{
			$stdMark = 25;
		}
		else if ($level_id==9 && $regpoint=='p')
		{
			$stdMark = 25;
		}
		else if ($level_id==9 && $regpoint=='a')
		{
			$stdMark = 25;
		}
		
		//--level 10
		else if ($level_id==10 && $regpoint=='c')
		{
			$stdMark = 5;
		}
		else if ($level_id==10 && $regpoint=='p')
		{
			$stdMark = 5;
		}
		else if ($level_id==10 && $regpoint=='a')
		{
			$stdMark = 5;
		}
		
		$MarksB += $stdMark;
	}

	$sql_events2 = mysqli_query($connection, 
"select sum(com_marks) as com_marks 
 from student, regcom, com_marks 
 where student.stdNo=regcom.stdNo 
 and com_marks.com_id=regcom.com_id 
 and regcom.stdNo='$vid'");


	while ($row = mysqli_fetch_array($sql_events2)) {

		$com_marks = $row["com_marks"];

	}

		$tots = $MarksA+$MarksB+$com_marks;
		return $tots;
}

function countStudentInvolvementBatch($studentNos) {
    global $connection;

    if (empty($studentNos)) return [];

    // Escape student numbers for SQL safety
    $safeNos = array_map(function($no) use ($connection) {
        return "'" . mysqli_real_escape_string($connection, $no) . "'";
    }, $studentNos);

    $nosString = implode(",", $safeNos);

    // Query both actreg and dactreg tables
    $sql = "
        SELECT stdNo, SUM(cnt) AS totalCount FROM (
            SELECT stdNo, COUNT(*) AS cnt FROM actreg WHERE stdNo IN ($nosString) GROUP BY stdNo
            UNION ALL
            SELECT stdNo, COUNT(*) AS cnt FROM dactreg WHERE stdNo IN ($nosString) GROUP BY stdNo
        ) AS combined
        GROUP BY stdNo
    ";

    $result = mysqli_query($connection, $sql);
    if (!$result) {
        die("Database error: " . mysqli_error($connection));
    }

    // Initialize counts with 0
    $counts = array_fill_keys($studentNos, 0);

    // Fill counts from DB results
    while ($row = mysqli_fetch_assoc($result)) {
        $counts[$row['stdNo']] = (int)$row['totalCount'];
    }

    return $counts;
}



// Batch version of sumMarks - calculates marks for multiple students at once (much faster)
function sumMarksBatch($studentNos) {
	global $connection;
	
	$marksCache = array();
	
	if (empty($studentNos)) {
		return $marksCache;
	}
	
	// Escape student numbers for SQL
	$escapedNos = array_map(function($stdNo) use ($connection) {
		return mysqli_real_escape_string($connection, $stdNo);
	}, $studentNos);
	$studentList = "'" . implode("','", $escapedNos) . "'";
	
	// Initialize marks cache
	foreach ($studentNos as $stdNo) {
		$marksCache[$stdNo] = 0;
	}
	
	// Helper function to calculate mark based on level and regpoint
	$calculateMark = function($level_id, $regpoint) {
		if ($level_id == 1 && ($regpoint == 'c' || $regpoint == 'p')) return 20;
		else if ($level_id == 1 && $regpoint == 'a') return 2;
		else if (in_array($level_id, [2,3,4,5]) && ($regpoint == 'c' || $regpoint == 'p')) return 10;
		else if (in_array($level_id, [2,3,4,5]) && $regpoint == 'a') return 2;
		else if (in_array($level_id, [6,7,8]) && $regpoint == 'c') return 5;
		else if (in_array($level_id, [6,7,8]) && $regpoint == 'p') return 4;
		else if (in_array($level_id, [6,7,8]) && $regpoint == 'a') return 2;
		else if ($level_id == 9) return 25;
		else if ($level_id == 10) return 5;
		return 0;
	};
	
	// Dept/Asasi activities
	$deptQuery = mysqli_query($connection, "
		SELECT B.stdNo, A.level_id, B.regpoint
		FROM dept_activities AS A
		INNER JOIN dactreg AS B ON A.dact_id = B.dact_id
		WHERE B.stdNo IN ($studentList)
	");
	while ($row = mysqli_fetch_assoc($deptQuery)) {
		$marksCache[$row['stdNo']] += $calculateMark($row['level_id'], $row['regpoint']);
	}
	
	// Club activities
	$clubQuery = mysqli_query($connection, "
		SELECT B.stdNo, A.level_id, B.regpoint
		FROM club_activities AS A
		INNER JOIN actreg AS B ON A.act_id = B.act_id
		WHERE B.stdNo IN ($studentList)
	");
	while ($row = mysqli_fetch_assoc($clubQuery)) {
		$marksCache[$row['stdNo']] += $calculateMark($row['level_id'], $row['regpoint']);
	}
	
	// Committee/Class participation
	$comQuery = mysqli_query($connection, "
		SELECT regcom.stdNo, SUM(com_marks.com_marks) as com_marks
		FROM regcom
		INNER JOIN com_marks ON regcom.com_id = com_marks.com_id
		WHERE regcom.stdNo IN ($studentList)
		GROUP BY regcom.stdNo
	");
	while ($row = mysqli_fetch_assoc($comQuery)) {
		$marksCache[$row['stdNo']] += $row['com_marks'] ? $row['com_marks'] : 0;
	}
	
	return $marksCache;
}


function getClubToken($club_id)
{
	global $connection;
	$sql = "select * from club where club_id=?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param("i", $club_id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$club_token = $row["token"];

		return $club_token;
	}	
}

function getDeptToken($dept_id)
{
	global $connection;
	$sql = "select * from dept where dept_id=?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param("i", $dept_id);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$dept_token = $row["token"];

		return $dept_token;
	}	
}

function getStaffName($staffID)
{
	global $connection;
	$sql = "select * from acstaff where staffID=?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param("s", $staffID);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$nama = $row["nama"];

		return $nama;
	}	
}

function getStaffEmail($staffID)
{
	global $connection;
	$sql = "select * from acstaff where staffID=?";
	$stmt = $connection->prepare($sql);
	$stmt->bind_param("s", $staffID);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$email = $row["email"];

		return $email;
	}	
}
?>