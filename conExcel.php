<?php
include("dbconnect.php");
include("iqfunction.php");
include("class-excel-xml.inc.php");

// Get semester from GET, validate
$sem = $_GET['sem'] ?? '';
$sem = trim($sem);

if ($sem === '') {
    die("Please select a semester first.");
}

// Fetch students for that semester
$stmt = $mysqli->prepare("SELECT stdNo, stdName, noIc, progCode FROM student WHERE kod_sem = ? ORDER BY stdName ASC");
$stmt->bind_param("s", $sem);
$stmt->execute();
$result = $stmt->get_result();

$students = [];
$studentNos = [];
while ($row = $result->fetch_assoc()) {
    $students[] = $row;
    $studentNos[] = $row['stdNo'];
}

// Batch fetch marks and involvement counts
$marksCache = sumMarksBatch($studentNos);            // Returns array[stdNo] => totalMarks
$activitiesCache = countStudentInvolvementBatch($studentNos);  // Returns array[stdNo] => count

$myarray = [];
$y = 1;
foreach ($students as $row) {
    $stdNo = $row['stdNo'];
    $stdName = strtoupper($row['stdName']);
    $noic = $row['noIc'];
    $progCode = $row['progCode'];

    $activitiesJoint = $activitiesCache[$stdNo] ?? 0;
    $totalMarks = $marksCache[$stdNo] ?? 0;

    $myarray[] = [$y, $stdNo, $stdName, $noic, $progCode, $activitiesJoint, $totalMarks];
    $y++;
}

// Header row
$header = [
    ["BIL", "NO PELAJAR", "NAMA PELAJAR", "NO IC", "KOD KURSUS", "JUMLAH PENGLIBATAN AKTIVITI", "JUMLAH MARKAH"]
];

// Export
$xls = new Excel_XML();
$xls->setWorksheetTitle("Semester_$sem");
$xls->addArray($header);
$xls->addArray($myarray);
$xls->generateXML("Senarai_Nama_Pelajar_$sem");
?>
