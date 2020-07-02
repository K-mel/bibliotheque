<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIBLIOTHEQUE</title>
    <?php include "components/header.php" ?>
    <?php linkCSS("asset/css/dataTables.bootstrap4.min.css") ?>
</head>
<body>

<?php include "components/nav.php" ?>

    <div class="container mt-5" >
    <div class="row">
    <div class="col-md-12">

<?php include "components/messages.php" ?>
<?php include "components/dataUsers.php" ?>


    </div>
    <!-- fin du col-md-5 -->
    </div>
    <!-- fin du ROW -->
    </div>
    <!-- fin du CONTAINER -->

<?php include "components/footer.php" ?>

<?php linkJS("assets/js/datatable.js") ?>
<?php linkJS("assets/js/jquery.dataTables.min.js") ?>
<?php linkJS("assets/js/dataTables.bootstrap4.min.js") ?>

</body>
</html>