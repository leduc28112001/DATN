<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FAVICON -->
    <link rel="shortcut icon" href="../assets/image/favicon.png" type="image/x-icon">
    <!-- FAVICON -->
    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/root.css">
    <link rel="stylesheet" href="../assets/css/auth-style.css">
    <link rel="stylesheet" href="../assets/css/common-style.css">
    <!-- CSS -->
    <!-- ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- ICON -->
    <!-- ALERT -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.2/dist/sweetalert2.all.min.js"></script>
    <!-- ALERT -->
    <title>
        <?= (isset($_GET["auth"]) && !empty($_GET["auth"])) ? ucfirst($_GET["auth"]) : "" ?>
        <?= (isset($_GET["action"]) && !empty($_GET["action"])) ? ucfirst($_GET["action"]) : "" ?>
    </title>
</head>
<body>
    <div id="root">
        <?php include './router-auth.php' ?>
    </div>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
    <script src="../assets/javascript/auth.js"></script>
    <script src="../assets/javascript/alert.js"></script>
    <script src="../assets/javascript/alert-condition.js"></script>
    <script src="../assets/javascript/snowfall.js" ></script>
    <!-- /* --------------------------------- SCRIPT --------------------------------- */ -->
</body>
</html>