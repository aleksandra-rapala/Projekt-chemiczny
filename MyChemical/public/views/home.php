<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>HOME PAGE</title>
</head>

<body>

<div class="top_container">
<?php include('public/views/view_template/top_container.php') ?>
</div>
<?php include('public/views/view_template/pasek_menu.php') ?>

    <div class="middle_container_out">
        <div class="middle_container">
            <div class="signup">
                <p>Start learning now</p>
                <button id="button_sign_up" onclick="window.location.href='register'"">Sign up</button>
            </div>
            <div class="opis">
                <p id="tytul">Discover Chemistry</p>
                <p>Create your own blackboard </p>
                <p>and remember that</p>
                <p>learning doesn't have to be boring!</p>
            </div>
            <img src="public/img/girl.png">
        </div>
    </div>

    <?php include('public/views/view_template/footer.php') ?>
</body>