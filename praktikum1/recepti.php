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
            <ul class="nav navbar-nav navbar-left">
                <li><a href="index.php"><span class="glyphicon glyphicon-oil"></span></a></li>
            </ul>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="home.php">Home</a></li>
                <li class="active"><a href="recepti.php">Recepti</a></li>
                <li><a href="ustvari.php">Dodajanje receptov</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-3 sidenav">

        </div>
        <div class="col-sm-6 text-left">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "mydb2");
            $a=4;
            $orderBy = "created_at";
           // $orderBy = "author";
            $order = "asc";

            if(!empty($_GET["orderby"])) {
                $orderBy = $_GET["orderby"];
            }
            if(!empty($_GET["order"])) {
                $order = $_GET["order"];
            }

            $postTitleNextOrder = "asc";
            $descriptionNextOrder = "asc";
            $postAtNextOrder = "asc";

            if($orderBy == "title" and $order == "asc") {
                $postTitleNextOrder = "desc";
                $orderBy = "title";
            }
            if($orderBy == "body" and $order == "asc") {
                $descriptionNextOrder = "desc";
            }
            if($orderBy == "created_at" and $order == "desc") {
                $postAtNextOrder = "asc";
            }

            $sql = "SELECT posts.*, users.username from posts 
INNER JOIN users ON posts.author = users.id ORDER BY " . $orderBy . " " . $order ;

            $result = mysqli_query($conn,$sql);

            ?>

            <html>
            <head>
                <title>Sorting Column using PHP and MySQL</title>
                <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
                <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

                <style>
                    .table-content{border-top:#CCCCCC 4px solid; width:100%;}
                    .table-content th {padding:5px 20px; background: #F0F0F0;vertical-align:top;}
                    .table-content td {padding:5px 20px; border-bottom: #F0F0F0 1px solid;vertical-align:top;}
                    .column-title {text-decoration:none; color:#09f;}
                </style>
            </head>

            <body>

            <div class="demo-content">
                <h2 class="title_with_link">Seznam Receptov</h2>
                <form name="frmSearch" method="post" action="">

                    <?php if(!empty($result)){ ?>
                        <table class="table-content">
                            <thead>
                            <tr>
                                <th width="20%"><span><a href="?orderby=post_at&order=<?php echo $postAtNextOrder; ?>" class="column-title">Avtor</a></span></th>
                                <th width="30%"><span><a href="?orderby=post_title&order=<?php echo $postTitleNextOrder; ?>" class="column-title">Naslov</a></span></th>
                                <th width="20%"><span><a href="?orderby=post_at&order=<?php echo $postAtNextOrder; ?>" class="column-title">Objavljeno</a></span></th>
                                <!--<th width="50%"><span><a href="?orderby=description&order=<?php echo $descriptionNextOrder; ?>" class="column-title">Description</a></span></th>-->
                                <th width="20%"><span><a >Težavnostna stopnja</a></span></th>
                                <th width="20%"><span><a >Čas priprave</a></span></th>

                                <th width="20%"><span><a >Link</a></span></th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            while($row = mysqli_fetch_array($result)) {
                                $a=$row["id"];
                                ?>

                                <tr>

                                    <!--<td><?php echo $row["author"]; ?></td>-->
                                    <td><?php echo $row["username"]; ?></td>
                                    <td><?php echo $row["title"]; ?></td>
                                    <td><?php echo $row["created_at"]; ?></td>
                                    <td><?php echo $row["stopnja"]; ?></td>
                                    <td><?php echo $row["cas_priprave"]; ?> minut</td>
                                    <!--<td><?php echo $row["body"]; ?></td>-->

                                    <td><?php echo "<a href='izpis.php?a=". $a ."'>Ogled</a>"; ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                            <tbody>
                        </table>
                    <?php } ?>
                </form>
            </div>

            </body></html>

        </div>
        <div class="col-sm-3 sidenav">

        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>© 2018 Kuharski Pomočnik</p>
</footer>

</body>
</html>