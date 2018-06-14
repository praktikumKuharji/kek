<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
</head>
<body>

<h1>This is a Heading</h1>
<p>This is a paragraph.</p>
<p>TA STRAN VNAŠA STVARI V BAZO</p>
</body>
</html>
<?php
//include  'pbdodaj.php';



function qwer(){

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "mydb2";

    $naslov=$_SESSION["naslov"];
    $opis=$_SESSION["message"];
    $osebe=$_SESSION["osebe"];
    $cas=$_SESSION["cas"];
    $teza=$_SESSION["teza"];
    $dude=$_SESSION["username"];
    $guy="SELECT id FROM users WHERE username='$dude'";



    $conn=new mysqli($servername, $username, $password, $dbname);// or die("Unable to connect");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        echo 'ni povezave';
    }else
        echo 'povezava uspesna';



    $result=mysqli_query($conn, $guy);
    $row=mysqli_fetch_assoc($result);
    $id=$row['id'];/*
		while ($row = $result->fetch_assoc()) {
		echo $row['id']."<br>";
		}*/

    $sql = "INSERT INTO posts (title, body, author, cas_priprave,stopnja, st_ljudi)
VALUES ('$naslov', '$opis', '$id', '$cas', '$teza' ,'$osebe');";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        $last_id = $conn->insert_id;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }






    if($_GET['a']!=null&&$_GET['b']!=null&&$_GET['c']!=null) {

        $idArray1 = explode(',', implode(",", $_GET['a']));
        echo $idArray1[0];

        $idArray2 = explode(',', implode(",", $_GET['b']));
        echo $idArray2[0];

        $idArray3 = explode(',', implode(",", $_GET['c']));
        echo $idArray3[0];

        $velikost = count($idArray2);

        //echo $idArray1[0];
        if($idArray1[0]!=null) {

            $sql = "INSERT INTO sestavine (name, quantity, unit,post_id)
VALUES ('$idArray1[0]', '$idArray2[0]', '$idArray3[0]','$last_id');";


            for ($i = 1; $i < $velikost; $i++) {
                //echo $velikost;
                $sql .= "INSERT INTO sestavine (name, quantity, unit,post_id)
VALUES ('$idArray1[$i]', '$idArray2[$i]', '$idArray3[$i]','$last_id');";
            }

            if ($conn->multi_query($sql) === TRUE) {
                echo "New records created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
//novo
    }
    $conn->close();

}
qwer();

header('Location: home.php');

?>