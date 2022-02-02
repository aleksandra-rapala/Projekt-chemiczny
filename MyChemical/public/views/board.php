<!DOCTYPE html>

<?php
if (!isset($_SESSION['email']) || !(1 == $_SESSION['account_type'])){
    Routing::run('login');
}
else{
?>


<head>

    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_board.css">
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/public/js/heart.js" defer ></script>
    <script type="text/javascript" src="/public/js/kosz.js" defer ></script>
    <script type="text/javascript" src="/public/js/search_reaction.js" defer ></script>
    <script type="text/javascript" src="/public/js/search_table.js" defer ></script>
    <script type="text/javascript" src="/public/js/search_calculator.js" defer ></script>

    <title>LOGIN PAGE</title>
</head>

<body>



    <div class="top_container">
        <div class="pasek_menu_two">
            <div class="menu_main">
                <ul>
                    <li id="active_two"><a onclick="window.location.href='/seeBoard'">My board</a></li>
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



    <div class="pasek_menu">
        <img  src="/public/img/logo_blekitne.png">
        <div class="menu">
            <ul>
                <li id="active_one"><i class="fas fa-sign-out-alt"></i><a onclick="window.location.href='/wylogowanie'"> Logout</a></li>
                <li ><a  onclick="window.location.href='/account/'">My account</a></li>
            </ul>            
        </div>
    </div>

    

    <div class="middle_container_out">
        
    
        <div class="middle_container_board">

            
            <div class="spis">
                <p class="tytul"><i class="fas fa-table"></i> My tables</p>
                <p class="tytul"><i class="fas fa-calculator"></i> My calculators</p>
                <p class="tytul"><i class="fas fa-atom"></i> My reactions</p>

            </div>


                <div class="search-bar">
                    <input placeholder="Search table">
                </div>

            <div class="search-bar">
                <input placeholder="Search calculator">
            </div>

            <div class="search-bar">
                <input placeholder="Search reaction">
            </div>


            <section id="tables" class="middle_container_tab">


                <?php foreach ($tables as $table): ?>

                    <div id="<?= $table->getIdTable(); ?>">
                        <img src="/public/img/img_tables/<?= $table->getImageTable(); ?>">
                        <div class="linia">
                            <button id="serce" class="serce_zamalowane"><i class="fas fa-heart fa-lg"></i></button>
                            <button class="podpis_tabela" onclick="window.location.href='seeContentTable/<?=$table->getIdTable()?>'""><?= $table->getNameTable(); ?></button>
                        </div>

                    </div>

                <?php endforeach; ?>

            </section>

            <section id="calculators" class="middle_container_tab">
                <?php foreach ($calculators as $calculator): ?>

                    <div id="<?= $calculator->getIdCalculator(); ?>">
                        <img src="/public/img/img_calculators/<?= $calculator->getImageCalculator(); ?>">
                        <div class="linia">
                            <button id="serce" class="serce_zamalowane"><i class="fas fa-heart fa-lg"></i></button>
                            <button class="podpis_kalkulator" onclick="window.location.href='<?=$calculator->getEndpointCalculator()?>/<?=$calculator->getIdCalculator()?>'"><?= $calculator->getNameCalculator(); ?></button>
                        </div>

                    </div>

                <?php endforeach; ?>


            </section>





            <section id="reactions" class="middle_container_tab">

                <?php foreach ($reactions as $reaction): ?>

                    <div id="<?= $reaction->getIdReaction(); ?>">
                        <img src="/public/img/img_reaction/<?= $reaction->getImgReaction(); ?>">
                        <h2>Chemical Formula: <?= $reaction->getChemicalFormula(); ?> </h2>
                        <p>Description: <?= $reaction->getDescription(); ?></p>
                        <div class="linia">
                            <button id="kosz"><i class="fas fa-trash-alt"></i></button>
                            <button class="podpis" onclick="window.location.href='register'""><?= $reaction->getNameReaction(); ?></button>
                        </div>

                    </div>

                <?php endforeach; ?>


            </section>


            
        </div>
 

    </div>





    <template id="template_table">
        <div id="">
            <img src="">
            <div class="linia">
                <button id="serce" class="serce_zamalowane"><i class="fas fa-heart fa-lg"></i></button>
                <button class="podpis_tabela"></button>
            </div>

        </div>
    </template>



<template id="template_calculator">
    <div id="">
        <img src="">
        <div class="linia">
            <button id="serce" class="serce_zamalowane"><i class="fas fa-heart fa-lg"></i></button>
            <button class="podpis_kalkulator"></button>
        </div>

    </div>
</template>



<template id="template_reaction">
    <div id="">
        <img src="">
        <h2>Chemical Formula:</h2>
        <p>Description:</p>
        <div class="linia">
            <button id="kosz"><i class="fas fa-trash-alt"></i></button>
            <button class="podpis" onclick="window.location.href='register'"></button>
        </div>

    </div>
</template>






        

    <div class="bottom_container">

        <div class="top_container_text">
            <div id="basic_text">
                <p>Discover chemistry</p>
                <p id="green_text">in THE MOST</p>
                <p id="green_text">CONVENIENT</p>
                <p>way</p>
            </div>
        </div>

        <div id="kontakt">
            <p>Masz pytanie?<br>Skontaktuj się z nami przez adres <br><b>mychemical@gmail.com</b></p>
        </div>
        <div id="spolecznosc">
            <p>Znajdź nas również na</p>
            <div id="ikony">
                <i class="fab fa-facebook-square fa-lg"></i>
                <i class="fab fa-instagram fa-lg"></i>
                <i class="fab fa-snapchat-square fa-lg"></i>
             </div>
        </div>
    </div>
</body>




<?php

}

?>