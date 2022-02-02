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
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">

    <link rel="stylesheet" type="text/css" href="/public/css/molar_mass.css">

    <script type="text/javascript" src="/public/js/molar_mass.js" defer ></script>
    <script type="text/javascript" src="/public/js/lista.js" defer ></script>



    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>LOGIN PAGE</title>
</head>

<body>



<div class="top_container">
    <div class="pasek_menu_two">
        <div class="menu_main">
            <ul>
                <li ><a onclick="window.location.href='/seeBoard'">My board</a></li>
                <li id="active_two"><a  onclick="window.location.href='/seeAllTables'">Tables</a></li>
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
    <img  src="../public/img/logo_blekitne.png">
    <div class="menu">
        <ul>
            <li id="active_one"><i class="fas fa-sign-out-alt"></i><a onclick="window.location.href='/wylogowanie'"> Logout</a></li>
            <li ><a  onclick="window.location.href='/account/'">My account</a></li>
        </ul>
    </div>
</div>











<div class="middle_container_out">






    <div class="nazwa_kalkulatora">
        <h1>Percentage</h1>
    </div>

    <div class="container-wstep">


        <FORM  NAME="odnosniki">
            <SELECT class="odnosniki" onchange="showOptions(this)" id="elo" NAME="lista"  SIZE = "1">

                <OPTION VALUE="brak">Kliknij, aby wybrać pierwiastek chemiczny</OPTION>
                <?php foreach ($listChemicalElements as $element): ?>
                    <OPTION class="wybor" id=<?= $element->getMolarMass(); ?> VALUE="<?=$element->getSignChemicalElement(); ?>"> <?= $element->getSignChemicalElement(); ?> (<?= $element->getNameChemicalElement(); ?>)</OPTION>
                <?php endforeach; ?>

            </SELECT>
        </FORM>




        <i id="kolba" class="fas fa-flask fa-3x"></i>
    </div>



    <div class="tabela">
        <div class="columna1">
            <div class="dane"><p class="pole11" id="puste"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole21" id="puste"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole31" id="puste"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole41" id="puste"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole51" id="puste"><i class="far fa-question-circle"></i></p></div>
        </div>


        <div class="columna2">
            <div class="dane"><p class="pole12"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole22"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole32"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole42"><i class="far fa-question-circle"></i></p></div>
            <div class="dane"><p class="pole52"><i class="far fa-question-circle"></i></p></div>

        </div>
    </div>




</div>


<div class="przyciski">
    <button class="oblicz">Calculate</button>
    <button class="clear">Clear</button>
</div>




<svg width="300" height="300" id="svgContainer" style="display: block; margin: auto; height: 300px;">

    <path id="dpie0" style="fill:RGB(0,255,150);
stroke: none" type="arc" d="M 270,150 A 120,120 0 0 1 263.3447133921783,189.40781579896262 L 150,150z"></path>

    <path id="dpie1" style="fill:RGB(85,170,150);
stroke: none" type="arc" d="M 263.3447133921783,189.40781579896262 A 120,120 0 1 1 76.43352871289366,55.19507237298602 L 150,150z"></path>

    <path id="dpie2" style="fill:RGB(170,85,150);stroke: none" type="arc" d="M 76.43352871289366,55.19507237298602 A 120,120 0 0 1 270,149.99999999999997 L 150,150z"></path>

    <text x="244.6595847986861" y="165.9863380966485" style="fill: black;stroke: none;text-anchor: middle" id="text0">Klucz 1 = 45</text>

    <text x="94.0066160438264" y="227.97910587546204" style="fill: black;stroke: none;text-anchor: middle" id="text1">Klucz 2 = 500</text>

    <text x="192.2261471433887" y="63.78542758080346" style="fill: black;stroke: none;text-anchor: middle" id="text2">Klucz 3 = 300</text>

</svg>





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