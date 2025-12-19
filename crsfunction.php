<?php

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

	$sql_events1 = mysqli_query($connection, "select * from club_activities as A ,actreg as B where A.act_id=B.act_id and B.stdNo='$vid'");

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
		
	
		$MarksB += $stdMark;
	}

		return $MarksA+$MarksB;
}

?>

