<html>
	<head>
	    <meta charset="utf-8">
			<title>Filmdatenbank</title>
			<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
			<link rel="stylesheet" href="/css/main.css">
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
					 <a class="navbar-brand" href="main.php">Filmdatenbank</a>

          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link" href="filme.php">Filme</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="starring.php">Alle Mitwirkenden</a>
            </li>

          </ul>

					<form class="form-inline my-2 my-md-0" action="filme.php" method="get">
            <input class="form-control" type="text" name="search" placeholder="Film Suchen" aria-label="Search">

          </form>

      </div>
    </nav>

		<div class="container">
