<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_tab_calc.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">

    <script type="text/javascript" src="/public/js/heart.js" defer ></script>
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>REACTION PAGE</title>
</head>
<body>
<div class="top_container">
    <div class="pasek_menu_two">
        <div class="menu_main">
            <ul>
                <li ><a onclick="window.location.href='/seeBoard'">My board</a></li>
                <li ><a  onclick="window.location.href='/seeAllTables'">Tables</a></li>
                <li ><a  onclick="window.location.href='/seeAllCalculators'">Calculators</a></li>
                <?php
                if($_SESSION['account_type'] == 1){
                    ?>
                    <li id="active_two"><a onclick="window.location.href='/makeReaction'">Add reaction</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php include('public/views/view_template/menu_logout_account.php') ?>
<div class="middle_container_out">
    <section class="middle_container_tab">
        <form action="addReaction" method="POST" ENCTYPE="multipart/form-data">
            <h1>UPLOAD MY REACTION</h1>
            <input name="name_reaction" type="text" placeholder="Name reaction">
            <input name="description" type="text" placeholder="Description">
            <input name="chemical_formula" type="text" placeholder="Chemical formula">
            <input type="file" name="file1">
            <button type="submit">send</button>
            <div id="pobierz">

                <?php if(isset($messages)){
                    foreach($messages as $message){
                        echo $message;
                    }
                }
                ?>
            </div>
        </form>
    </section>
</div>
<?php include('public/views/view_template/footer.php') ?>
</body>



