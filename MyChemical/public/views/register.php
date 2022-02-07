<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_log_reg.css">

    <script type="text/javascript" src="/public/js/valid_register.js" defer ></script>
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>REGISTER PAGE</title>
</head>

<body>  

    <div class="top_container">
        <?php include('public/views/view_template/top_container.php') ?>
        <div class="beforelogin-container">
            <p id="button_register_two"><a href="register">Register</a></p>
            <p id="button_login_two"><a href="login">Login</a></p>
        </div>
    </div>


    <div class="pasek_menu">
        <img src="/public/img/logo_blekitne.png">
        <div class="menu">
            <ul>
                <li ><i class="fas fa-home fa-lg"></i><a href="index"> Home</a></li>
                <li ><a  href="login">Login</a></li>
                <li id="active_one"><a href="register">Register</a></li>
            </ul>            
        </div>
    </div>


    <div class="middle_container_out">
        
        <div class="middle_container">
            <div class="signup">
                <p>You have an account?</p>
                <button id="button_sign_up" onclick="window.location.href='login'"">Sign in</button>
            </div>
            <div class="login_container">

                <form action="rejestracja" method="POST">
                 <div id="jpudlo">
                         <p id="wybor">E-mail</p>
                         <input name="email" type="text" placeholder="email@email.com">
                 </div>
                 <div id="dpudlo">
                         <p id="wybor">Password</p>
                          <input name="password" type="password" placeholder="password">
                 </div>
                <div id="tpudlo">
                        <p id="wybor">Confirm password</p>
                        <input name="confirm_password" type="password" placeholder="password">
                </div>
    
                <button id="log" type="submit" >Register</button>


                <div id="pobierz">
                    <?php if(isset($messages)){
                         foreach($messages as $message){
                           echo $message;
                        }
                    }
                    ?>
                </div>

                </form>
            </div>

            <img src="public/img/girl.png">
        </div>
       
    </div>


    <?php include('public/views/view_template/footer.php') ?>

</body>




