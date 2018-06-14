
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

        </div>
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
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-3 sidenav">
        </div>
        <div class="col-sm-6 text-left">
            <h2> Vnesi v polja </h2>
            <form action="pbdodaj.php" method="post">
                Ime recepta: <input type="text" name="name"><br>
                Za koliko ljudi?    <input type="number" max="20" name="osebe"><br>
                Čas priprave: <input type="number" name="cas"> minut<br>
                Težavnostna stopnja
                <select name="teza">
                    <option value="lahko">Lahko</option>
                    <option value="srednje">Srednje</option>
                    <option value="tezko">Težko</option>
                </select>
                <br>
                <textarea name="message" rows="10" cols="30">Postopek priprave</textarea>
                <br>


                <input type="submit" value="Nadaljuj">
            </form>
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


