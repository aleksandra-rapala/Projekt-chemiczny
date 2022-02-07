<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_po_zalogowaniu.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_account.css">
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>ACCOUNT PAGE</title>
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
                <li ><i class="fas fa-sign-out-alt"></i><a onclick="window.location.href='/wylogowanie'"> Logout</a></li>
                <li id="active_one"><a  onclick="window.location.href='/account/'">My account</a></li>
            </ul>            
        </div>
    </div>
    <div class="middle_container_out">
        <div class="middle_container_account">
            <div>
            <p class="tytul"><i class="far fa-user"></i> My account</p>
            </div>
            <div class="info">
             <div id="jpudlo">
                  <p id="wybor">E-mail</p>
                  <div class="pole">
                      <?php
                      if(isset($_COOKIE["currentUser"]))
                           {echo $_COOKIE['currentUser']; }
                          else{echo "?????";}
                     ?>
                  </div>
             </div>
             <div id="dpudlo">
             <p id="wybor">Password</p>
              <div class="pole">*******</div>
             </div>
             <div id="tpudlo">
              <button onclick="window.location.href='/wylogowanie'">Logout</button>
             </div>
            </div>
          </div>
    </div>
    <?php include('public/views/view_template/footer.php') ?>
</body>



