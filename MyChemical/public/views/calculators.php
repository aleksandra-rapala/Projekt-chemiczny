<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_tab_calc.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">
    <script type="text/javascript" src="/public/js/heart.js" defer ></script>
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>CALCULATORS PAGE</title>
</head>
<body>
<?php
    if($_SESSION['account_type']==1){
    ?>
        <img class="dymek" src="/public/img/dymek2.png"></img>
   <?php }
?>
<div class="top_container">
    <div class="pasek_menu_two">
        <div class="menu_main">
            <ul>
                <li ><a onclick="window.location.href='/seeBoard'">My board</a></li>
                <li ><a  onclick="window.location.href='/seeAllTables'">Tables</a></li>
                <li id="active_two"><a  onclick="window.location.href='/seeAllCalculators'">Calculators</a></li>
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
    <section class="middle_container_tab">
        <?php foreach ($calculators as $calculator): ?>
            <div id="<?= $calculator->getIdCalculator(); ?>">
                <img src="/public/img/img_calculators/<?=$calculator->getImageCalculator(); ?>">
                <div class="linia">
                    <?php
                    if(1 == $_SESSION['account_type']){
                    ?>
                    <?php
                    $rodzaj_serca;
                    $rodzaj_serca_name;
                    ?>
                    <?php if(in_array($calculator, $user_calculators)){  //jesli lubi użytkownik
                        $rodzaj_serca="serce_zamalowane";
                        $rodzaj_serca_name="fas fa-heart fa-lg";
                    }
                    else{
                        $rodzaj_serca="serce_puste";
                        $rodzaj_serca_name="far fa-heart fa-lg";
                    }
                    ?>
                    <button id="serce" class= <?='"'.$rodzaj_serca.'"/' ; ?> ><i class=<?='"'.$rodzaj_serca_name.'"'; ?>></i></button>
                    <?php
                    }
                    ?>
                    <button class="podpis_kalkulator" onclick="window.location.href='<?=$calculator->getEndpointCalculator()?>/<?=$calculator->getIdCalculator()?>'"><?= $calculator->getNameCalculator(); ?></button>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <img class="obraz3" src="/public/img/girl.png"></img>
</div>
<?php include('public/views/view_template/footer.php') ?>
</body>

