<!DOCTYPE html>
<html>
<head>
    <title>Multumim! - MyWay Craiova</title>
    <?php include("inc/header.php"); ?>
</head>
<body>
    <header class="about">
        <?php include("inc/menu2.php"); ?>
    </header>

    <section style="padding: 100px 0; text-align: center;">
        <div class="container">
            <i class="fa fa-check-circle" style="font-size: 5em; color: green;"></i>
            <h1 style="margin-top: 20px;">Multumim pentru comanda!</h1>
            <p style="font-size: 1.2em;">Comanda ta a fost inregistrata cu succes.</p>
            <p>ID Comanda: #<?php echo isset($_GET['order_id']) ? intval($_GET['order_id']) : ''; ?></p>
            <br>
            <a href="index.php" class="btn btn-primary">Inapoi la prima pagina</a>
        </div>
    </section>

    <?php include("inc/footer.php"); ?>
</body>
</html>
