<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_home.css">
    <link rel="stylesheet" type="text/css" href="/public/css/style_logowanie.css">
    <script src="https://kit.fontawesome.com/7b3efb56a6.js" crossorigin="anonymous"></script>
    <title>LOGIN PAGE</title>
</head>

<body>  

    <div class="top_container">
        <div class="top_container_text">
            <div id="basic_text">
                <p>Discover chemistry</p>
                <p id="green_text">in THE MOST</p>
                <p id="green_text">CONVENIENT</p>
                <p>way</p>
            </div>
        </div>

        <div class="beforelogin-container">
            <p id="button_register"><a href="register">Register</a></p>
            <p id="button_login"><a href="login">Login</a></p>
        </div>

    </div>




    
    <div class="pasek_menu">
        <img src="/public/img/logo_blekitne.png">
        <div class="menu">
            <ul>
                <li><i class="fas fa-home fa-lg"></i><a href="index"> Home</a></li>
                <li id="active_one"><a  href="login">Login</a></li>
                <li><a href="register">Register</a></li>
            </ul>            
        </div>
    </div>



   

 


    <div class="middle_container_out">
        
        <div class="middle_container">

            <div class="signup">
                <p>Start learning now</p>
                <button id="button_sign_up" onclick="window.location.href='register'"">Sign up</button>
            </div>

            <div class="login_container">



                <form action="logowanie" method="POST">

               
                    <div id="jpudlo">
                        <p id="wybor">E-mail</p>
                        <input name="email" type="text" placeholder="email@email.com">
                    </div>

                   <div id="dpudlo">
                    <p id="wybor">Password</p>
                    <input name="password" type="password" placeholder="password">
                   </div>
                    
                   

                <button id="log" type="submit">Login</button>

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



  


    <div class="bottom_container">
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




