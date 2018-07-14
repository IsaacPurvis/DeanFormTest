<?php

require_once ('vendor\autoload.php');
//require_once("ServerConfig.php");
// Creating the new document...
//$phpWord = new \vendor\PhpOffice\PhpWord\src\phpWord\PhpWord();
$phpWord = new \PhpOffice\PhpWord\PhpWord();

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection();
// Adding Text element to the Section having font styled by default...
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//SQL code to get the data of a single entity-attribute
/*//$testSQL = 'SELECT Parent_1 FROM parent_1_bool WHERE formId = "0"';
if ($result=mysqli_query($conn,$testSQL))	//Good Connection
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))	//Get Row
    {
	  	echo $row[0] . "<br><br>";
	  	if($row[0] == 1){
		$section->addText('$2500 Scraping and Blading');
	  	}
    }
  // Free result set
  mysqli_free_result($result);
}
*/






$testSQL = 'SELECT Parent_4 FROM parent_1_bool WHERE id = "43"';

 if ($result=mysqli_query($conn,$testSQL))	//Good Connection
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))	//Get Row
    {
	  	echo $row[0] . "<br><br>";
	  	/*if($row[0] == 1){
			$section->addText('$2500 Scraping and Blading');
	  	}*/
		if(isset($_POST['Parent_1'])){
			//$stok is checked and value = 1
			$Parent_1 = $_POST['Parent_1'];
		}
		else{$Parent_1=0;}
	  
    }
  // Free result set
  mysqli_free_result($result);
}

$result = mysqli_query($conn, $testSQL);
/*
while ($row = $result->fetch_assoc()) {
    echo $row['classtype']."<br>";
}
//echo ('The selected data is: ' . $result);

if($result == 1){
	$section->addText('$2500 Scraping And Blading');
}


*/


// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('helloWorld3.docx');




