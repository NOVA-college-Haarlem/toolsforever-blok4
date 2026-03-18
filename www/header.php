<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuh Tools4ever</title>
    <link href='https://fonts.googleapis.com/css?family=Montez|Lobster|Josefin+Sans|Shadows+Into+Light|Pacifico|Amatic+SC:700|Orbitron:400,900|Rokkitt|Righteous|Dancing+Script:700|Bangers|Chewy|Sigmar+One|Architects+Daughter|Abril+Fatface|Covered+By+Your+Grace|Kaushan+Script|Gloria+Hallelujah|Satisfy|Lobster+Two:700|Comfortaa:700|Cinzel|Courgette' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header>
        <a href="index.php">
            <img src="images/Obuh.png" alt="Obuh">
        </a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="brands_index.php">Merken</a></li>
                <li><a href="">Winkelmand</a></li>
                <span class="cart-count">
                    <?php echo $_SESSION['cart_count'] ?? 0 ?>
                </span>
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li class="dropdown">
                        <a href="">Gebruikers</a>
                        <div class="dropdown-content">
                            <a href="users_index.php">Bekijken</a>
                            <a href="users_create.php">Toevoegen</a>
                            <a href="users_index_deleted.php">Verwijderde gebruikers</a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="">Gereedschap</a>
                        <div class="dropdown-content">
                            <a href="tools_index.php">Bekijken</a>
                            <a href="tools_create.php">Toevoegen</a>
                        </div>
                    </li>
                    <li><a href="logout.php" class="btn btn-danger">Uitloggen</a></li>
                <?php else : ?>
                    <li><a href="login.php" class="btn btn-success">Inloggen</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>