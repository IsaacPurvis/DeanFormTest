<?php
//Create button to go home
?><a href="/index.php"><button type="button" > HOME</button></a>
<?php
//Connect to local DB
$servername = "localhost";
$username = "deanform";
$password = "pooppoop";
$dbname = "parenttest";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$activeDB = mysql_select_db($servername, $conn);
/* This is the old way of getting the data from the checkbox
if(isset($_POST['Parent_1'])){
    //$stok is checked and value = 1
    $Parent_1 = $_POST['Parent_1'];
}
else{$Parent_1=0;}

//$Parent_1 = $_POST['Parent_1'];
$Parent_2 = $_POST['Land Clearing'];
$Parent_3 = $_POST['Parent_3'];

if(isset($_POST['Parent_4'])){
    //$stok is checked and value = 1
	$Parent_4 = $_POST['Parent_4'];
}
//else{$Parent_1 = 'NULL';}
else{unset($Parent_4);}

$Parent_5 = $_POST['comments'];
*/

/** This section will be for handling the form increment */
$Get_Parent_3_SQL = "SELECT formId FROM FormTest1 ORDER BY id DESC LIMIT 1";    //SQL Query
$Get_Parent_3_SQL_Result = $conn->query($Get_Parent_3_SQL); //Connect and run query
//Get the last form id from the database, then increment. 
while($sqlOutput = $Get_Parent_3_SQL_Result->fetch_assoc()){
    echo "THE GOTTEN FORMID VALUE IS: " . $sqlOutput["formId"] . "<br>";
    $oldFormID = $sqlOutput["formId"];
}


/*if(isset($_POST['Parent_3_Array'])){*/
    $Parent_3_A = $_POST['Parent_3_Array'];
    $parentID = 3;
    $formID = $oldFormID + 1;
 
    foreach($Parent_3_A as &$datathing){
        $Parent_3_SQL = "INSERT INTO FormTest1 (formID, parentID, inputData, inputType) VALUES ('$formID', '$parentID', '$datathing', 'checkbox')";
        echo "THE NEW RECORD VALUE IS: " . $datathing . "<br>";
        if ($conn->query($Parent_3_SQL) === TRUE) {
            echo "New record created successfully" . "<br>";
        } else {
            echo "Error: " . $Parent_3_SQL . "<br>" . $conn->error;
        }
        
    }
    unset($datathing);
/*}*/





/*
//$sql = "INSERT INTO parent_1_checkbox (Parent_1, Parent_2, Parent_3, Parent_4, Parent_5) VALUES ('$Parent_1', '$Parent_2', '$Parent_3', '$Parent_4', '$Parent_5')";
$sql = "INSERT INTO parent_1_bool (formId, Parent_1, Parent_2, Parent_3, Parent_4, Parent_5) VALUES ('1', '$Parent_1', '$Parent_2', '$Parent_3', '$Parent_4', '$Parent_5')";
*/
/*if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
//require("DocTemplate.php");

$conn->close();
