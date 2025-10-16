<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

function lastestChange($stdNo)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select * from bkp_log where stdNo='$stdNo' order by bkplog_id desc limit 1");

	while ($row = mysqli_fetch_array($sql_events)) {

			$tcomment = $row["tcomment"];

			echo $tcomment;
	}
}


function countMaxPax()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select sum(club_max) as club_max from club   ");

	while ($row = mysqli_fetch_array($sql_events)) {

	$club_max = $row["club_max"];

	}
	return $club_max;
}

function senaraiPenasihat($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select gelaran, nama from acstaff, club_advisor  where acstaff.staffID=club_advisor.staffID and club_id='$club_id'   ");

	while ($row = mysqli_fetch_array($sql_events)) {

		$nama = $row["nama"];
		$gelaran = $row["gelaran"];
		$fullname = $gelaran.$nama;

			echo $fullname;?><br><?php

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

function countStudent()
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as stdNo from student ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$stdNo = $row["stdNo"];


			return $stdNo;

	}
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

	}
		return $stdMark;
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

function countClubRegistration($club_id)
{
	global $connection;
	$sql_events = mysqli_query($connection, "select count(*) as club_id from club_registration where club_id='$club_id'   ");

	while ($row = mysqli_fetch_array($sql_events)) {

			$club_id = $row["club_id"];


			return $club_id;

	}
}

?>
