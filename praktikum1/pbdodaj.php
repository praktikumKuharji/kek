<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Search</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <!-- <script src="main.js"></script>-->
    <style>
        /* Remove the navbar's default rounded borders and increase the bottom margin */

        .navbar {
            margin-bottom: 50px;
            border-radius: 0;
        }

        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }


    </style>

    <script type="text/javascript">
        $aq=20;

        function dodajanje() {

            var sestavinaVnos = document.getElementById("sestavina").value;
            var kolicinaVnos = document.getElementById('kolicina').value;
            var enotaVnos = document.getElementById("selectEnota").value;
         //   var stljudi = document.getElementById("osebe").value;
           // document.getElementById("stoseb").innerHTML=stljudi;




            var table = document.getElementById("izpisTabela");
            var row = table.insertRow(-1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);


            cell1.innerHTML = sestavinaVnos;
            cell2.innerHTML = kolicinaVnos;
            cell3.innerHTML = enotaVnos;

        }

        function oddajanje2(){
            // alert("wertzuiolkj");
            //window.location.href="PBDodajRecept.php?a=1";
            var table= document.getElementById("izpisTabela");
            var n= document.getElementById("izpisTabela").rows.length;
            var aji=[];
            var bji=[];
            var cji=[];
           // alert(n);
            for(var i=1;i<n;i++){
                //for(var j=0;j<4;j++){
                //  alert("c");
                var a=table.rows[i].cells[0].innerHTML;
                var b=table.rows[i].cells[1].innerHTML;
                var c=table.rows[i].cells[2].innerHTML;
               // alert(a+b+c);

                aji.push(a);
                bji.push(b);
                cji.push(c);


            }

            window.location.href="pbdodaj2.php?a[]="+aji+"&b[]="+bji+"&c[]="+cji;
            // alert(x);

        }


    </script>
</head>
<body>

<div class="jumbotron">
    <div class="container text-center">
        <h1>Sporhet</h1>
        <p>Kuhaj, Vonjaj & Jej</p>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><span class="glyphicon glyphicon-oil"></span></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">


            </ul>
        </div>
    </div>
</nav>




<div class="container">
    <div class="row">
        <form id="calcForm" class="tabelaForm">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="sestavina">IME SESTAVINE: </label>
                    <input name="sestavina1" type="text" class="form-control" id="sestavina"> <br>
                    <input id="gumbek" type="button" class="btn btn-info" value="Potrdi"  onclick="dodajanje()"/><br>
                </div>
                <div class="col-md-2">
                    <label for="kolicina">KOLICINA: </label>
                    <input name="kolicina1" type="number" class="form-control" id="kolicina"> <br>
                </div>
                <div class="col-md-2">
                    <label for="selectEnota">ENOTA</label><br>
                    <select id="selectEnota">
                        <option value="dg">Dekagrami</option>
                        <option value="g">Grami</option>
                        <option value="l">Liter</option>
                        <option value="ml">Mililiter</option>
                        <option value="">Komad</option>
                    </select>
                </div>

            </div>
        </form>
    </div>


    <p id="testek"></p>
    <p id="izpisSestavina"></p>

    <label for="izpisTabela">Recept za <p id="stoseb"></p></label>
    <table id="izpisTabela" class="table table-bordered">
        <thead>
        <tr>
            <th>Sestavina</th>
            <th>Kolicina</th>
            <th>Enota</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <button onclick="oddajanje2()" >Ustvari</button>


</div><br>

<br><br>

<?php

$naslov=$_POST["name"];
$opis=$_POST["message"];
$osebe=$_POST["osebe"];
$cas=$_POST["cas"];
$teza=$_POST["teza"];


$_SESSION["naslov"]=$naslov;
$_SESSION["osebe"]=$osebe;
$_SESSION["message"]=$opis;
$_SESSION["cas"]=$cas;
$_SESSION["teza"]=$teza;


?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>