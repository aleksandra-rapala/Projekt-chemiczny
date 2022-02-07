<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_board.css">
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/js/heart.js" defer ></script>
    <script type="text/javascript" src="/public/js/kosz.js" defer ></script>
    <script type="text/javascript" src="/public/js/search.js" defer ></script>
    <title>BOARD PAGE</title>
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
    <?php include('public/views/view_template/menu_logout_account.php') ?>
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



    <?php include('public/views/view_template/footer.php') ?>
</body>


