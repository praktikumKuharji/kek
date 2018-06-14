<?php
$vnos=$_GET['a'];

$conn = mysqli_connect("localhost", "root", "", "mydb2");
$orderBy = "author";
$order = "asc";
//$vnos=2;
$sql = "SELECT * FROM posts";

$sql2 = "SELECT posts.*, users.username from posts 
INNER JOIN users ON posts.author = users.id WHERE posts.id=". $vnos . " ORDER BY " . $orderBy . " " . $order ;

$sql3 ="SELECT * from sestavine WHERE sestavine.post_id=".  $vnos;

//$result = mysqli_query($conn,$sql);
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$row = mysqli_fetch_array($result2);
//$row2 = mysqli_fetch_array($result3);
$l=$row["st_ljudi"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kuharski Pomočnik</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        p {
            font-size: 17px;
        }
        .glyphicon.glyphicon-oil {
            font-size: 15px;
        }
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }
        /* Remove the jumbotron's default bottom margin */
        .jumbotron {
            margin-bottom: 0;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
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
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
          <!--  <li> <span class="glyphicon glyphicon-asterisk" size="200%" href="#"></span></li>-->
            <ul class="nav navbar-nav navbar-left">
            <li><a href="index.php"><span class="glyphicon glyphicon-oil"></span></a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>
        <div class="col-sm-8 text-left">
            <!DOCTYPE html>
            <html>
            <head>
                <script src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

            </head>
            <body>
            <div id="content">
                <h1><?php echo $row["title"]; ?></h1>
                <p>Za <?php echo $row["st_ljudi"]; ?> ljudi</p>
                <p>Avtor :<?php echo $row["username"]; ?></p>
                <p>Težavnostna stopnja: <?php echo $row["stopnja"]; ?></p>
                <p>Čas priprave: <?php echo $row["cas_priprave"]; ?> </p>
                <p><?php echo $row["body"]; ?></p>


                <label for="izpisTabela">Sestavine <p id="stoseb"></p></label>
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

                <div class="slidecontainer">
                    <input type="range" min="1" max="100" value="4" class="slider" id="myRange">
                    <p>Osebe: <span b="1" class="qwer" id="demo"></span></p>
                </div>

            </div>
            <button id="cmd">izvozi v pdf obliki</button>
            <script>

                var doc = new jsPDF();
                var specialElementHandlers = {
                    '#editor': function (element, renderer) {
                        return true;
                    }
                };

                $('#cmd').click(function () {
                    doc.fromHTML($('#content').html(), 15, 15, {
                        'width': 170,
                        'elementHandlers': specialElementHandlers
                    });
                    doc.save('recept.pdf');
                });



                var table = document.getElementById("izpisTabela");
                var slider = document.getElementById("myRange");
                //var output = document.getElementById("demo");
                var output = document.getElementsByClassName("qwer");
                //var x =      document.getElementsByClassName("asd");
                output[0].innerHTML = slider.value;

                // while ($row = mysqli_fetch_array($result)) {

                function vpisi() {

                    <?php

                    $num_rows = mysqli_num_rows($result);
                    ///echo "alert(". $num_rows .");";
                    for ($i=0;$i<$num_rows;$i++){
                        //echo "alert(". $num_rows .");";
                        while ($row2 = mysqli_fetch_array($result3)) {
                            $a = $row2['name'];
                            echo "sestavinaVnos='" . $a . "';";
                            $b = $row2['quantity'];
                            $c = $row2['unit'];

                            echo "kolicinaVnos='" . $b . "';";
                            echo "enotaVnos='" . $c . "';";

                            //echo "<br> id: ". $row2["id"]. " - Name: ". $row2["name"]. " " . $row2["unit"] . "<br>";
                            echo "   
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML=sestavinaVnos
    cell2.innerHTML = `<span b='`+". $row2['quantity']/4 ."+`' class='qwer' ></span>`;
    cell3.innerHTML = enotaVnos;
  

    
    ";
                            break;
                        }
                    }
                    ?>

                }
                vpisi();

                //  `<span b='`+ 50 +`' class='qwer' ></span>`
                // cell2.innerHTML = kolicinaVnos;

                slider.oninput = function() {
                    for (var i = 0; i < output.length; i++) {
                        var a=output[i].getAttribute("b");

                        output[i].innerHTML = this.value*a;
                    }
                }

                for (var i = 0; i < output.length; i++) {
                    var a=output[i].getAttribute("b");
                    var s=document.getElementById(myRange);
                    output[i].innerHTML = slider.value*a;
                }


            </script>
            <!-- begin wwww.htmlcommentbox.com -->
            <div id="HCB_comment_box"><a href="http://www.htmlcommentbox.com">Widget</a> is loading comments...</div>
            <link rel="stylesheet" type="text/css" href="//www.htmlcommentbox.com/static/skins/bootstrap/twitter-bootstrap.css?v=0" />
            <script type="text/javascript" id="hcb"> /*<!--*/ if(!window.hcb_user){hcb_user={};} (function(){var s=document.createElement("script"), l=hcb_user.PAGE || (""+window.location).replace(/'/g,"%27"), h="//www.htmlcommentbox.com";s.setAttribute("type","text/javascript");s.setAttribute("src", h+"/jread?page="+encodeURIComponent(l).replace("+","%2B")+"&mod=%241%24wq1rdBcg%24gMlU74JW4cy0GDLGM1ey91"+"&opts=326&num=20&ts=1528184307648");if (typeof s!="undefined") document.getElementsByTagName("head")[0].appendChild(s);})(); /*-->*/ </script>
            <!-- end www.htmlcommentbox.com -->
            <h3>Ratings</h3><!-- start Star Ratings and Reviews -->
            <script data-sil-id='5b219320e1cace002f3d3f6a'> (function() {var d = document, w = window, l = window.location,p = l.protocol == 'file:' ? 'http://' : '//';if (!w.WS) w.WS = {}; c = w.WS;var m=function(t, o){  var e = d.getElementsByTagName('script'); e=e[e.length-1];  var n = d.createElement(t); if (t=='script') {n.async=true;} for (k in o) n[k] = o[k];  e.parentNode.insertBefore(n, e)};   m('script', {      src: p+'bawkbox.com/widget/star-rating/5b219320e1cace002f3d3f6a?page='+encodeURIComponent(l+''),      type: 'text/javascript'  });  c.load_net = m;})();</script>
            <script type='application/ld+json' src='//bawkbox.com/widget/star-rating/5b219320e1cace002f3d3f6a/microdata'></script><div class='sil-widget-star-rating sil-widget' id='sil-widget-5b219320e1cace002f3d3f6a'><a href='https://bawkbox.com/install/star-rating'>Star Ratings and Reviews</a></div>
            <!-- end Star Ratings and Reviews -->

            </body>
            </html>
        </div>
        <div class="col-sm-2 sidenav">

        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>© 2018 Kuharski Pomočnik</p>
</footer>

</body>
</html>