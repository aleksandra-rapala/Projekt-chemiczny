<!DOCTYPE html>

<?php
if (!isset($_SESSION['email']) || !(1 == $_SESSION['account_type'] || 2 == $_SESSION['account_type'])){
    Routing::run('login');
}
else{
?>



<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_table.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">

    <script type="text/javascript" src="/public/js/heart.js" defer ></script>
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>LOGIN PAGE</title>
</head>

<body>


<img class="dymek" src="/public/img/dymek2.png"></img>


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