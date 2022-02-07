<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_board.css">
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>BOARD PAGE</title>
</head>
<body>
<div class="top_container">
    <div class="pasek_menu_two">
        <div class="menu_main">
            <ul>
                <li id="active_two"><a onclick="window.location.href='/seeUserBoard'">My board</a></li>
                <li ><a  onclick="window.location.href='/seeAllTables'">Tables</a></li>
                <li ><a  onclick="window.location.href='/seeAllCalculators'">Calculators</a></li>
                <?php
                if($_SESSION['account_type'] == 1){
                    ?>
                    <li ><a onclick="window.location.href='/makeReaction'">Add reaction</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<?php include('public/views/view_template/menu_logout_account.php') ?>
<div class="middle_container_out">
    <div class="middle_container_board">
        <div class="spis">
            <p class="tytul"><i class="fas fa-table"></i> Add tables</p>
            <p class="tytul"><i class="fas fa-calculator"></i> Remove tables</p>
            <p class="tytul"><i class="fas fa-atom"></i> Remove users</p>
        </div>
        <section class="middle_container_tab">
            <form action="addTable" method="POST" ENCTYPE="multipart/form-data">
                <h1>UPLOAD</h1>
                <input name="name_table" type="text" placeholder="title">
                <input type="file" name="file1">
                <input type="file" name="file2">
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
        <section class="middle_container_tab">
           <p>W przygotowaniu</p>
        </section>
        <section class="middle_container_tab">
            <p>W przygotowaniu</p>
        </section>
    </div>
</div>
<?php include('public/views/view_template/footer.php') ?>
</body>

