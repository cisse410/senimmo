    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
        }
        .section-main{
            position: relative;
            width: 100%;
            min-height: 100vh;
            background: green;
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        header{
            background: green;
            z-index: 999;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 100px;
            transition: 0.6s;
        }
        header.sticky{
            background: #1883d5;
            padding: 10px 100px;
        }
        header .brand{
            color: #fff;
            font-size: 30px;
            font-weight: 700;
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 3px;
        }
        header .menu{
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        header .menu a{
            color: #fff;
            font-size: 20px;
            font-weight: 500;
            text-decoration: none;
            margin: 0 30px;
            padding: 0 10px;
            border-radius: 20px;
            transition: 0.3s;
            transition-property: color, background;
        }
        header .menu a:hover{
            color: #000;
            background: #fff;
        }
        header .btn{
            color: #fff;
            font-size: 25px;
            cursor: pointer;
            display: none;
        }

        .section-two{
            min-height: 100vh;
            background: #001018;
            padding: 20px 100px;
        }
        .section-two h2{
            color: rgba(255, 255, 255, 0.5);
            font-size: 50px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 30px 0;
        }
        .section-two p{
            color: rgba(255, 255, 255, 0.5);
            font-size: 18px;
            margin: 30px 0;
        }

        @media (max-width: 1060px){
            header .btn{
                display: block;
            }
            header .menu{
                position: fixed;
                background: #1883d5;
                flex-direction: column;
                min-width: 400px;
                height: 100vh;
                top: 0;
                right: -100%;
                padding: 80px 50px;
                transition: 0.5s;
                transition-property: right;
            }
            header .menu.active{
                right: 0;
            }
            header .menu .close-btn{
                position: absolute;
                top: 0;
                left: 0;
                margin: 25px;
            }
            header .menu a{
                display: block;
                font-size: 20px;
                margin: 20px;
                padding: 0 15px;
            }
        }

    </style>
<?php $base_url = "http://localhost/devWeb2/senimmo"; ?>

<!doctype html>
<html lang="en">

        <head>
            <title>Acceul | SEN IMMO</title>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS v5.2.1 -->
            <link
                href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
                rel="stylesheet"
                integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
                crossorigin="anonymous">
            <link
                rel='stylesheet'
                href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
                integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
                crossorigin='anonymous'/>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js'
                integrity='sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=='
                crossorigin='anonymous'>
            </script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.9/scrollreveal.min.js'
                integrity='sha512-Kr+RPfLjQ71E0cJ9nseJ6jwTrnmMnuSPnnsVQQ/ZYYCjOHKfJcWj8ILICXnvf9A7ZQChNzIbr9x/ZAxA6xAZlQ=='
                crossorigin='anonymous'>
            </script>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/4.0.9/scrollreveal.js'
                integrity='sha512-XJgPMFq31Ren4pKVQgeD+0JTDzn0IwS1802sc+QTZckE6rny7AN2HLReq6Yamwpd2hFe5nJJGZLvPStWFv5Kww=='
                crossorigin='anonymous'>
            </script>

            <script src="https://unpkg.com/scrollreveal"></script>
        </head>

<header>
        <div>

        <a href="<?php echo($base_url) ?>" class="brand fs-1">sen immo
        </a>
            <small class="text-muted-light fs-6 text-uppercase">dëku waŸ you japandi</small>
        </div>
        
        <div class="menu">
            <div class="btn">
                <i class="fas fa-times close-btn"></i>
            </div>
                <a href="<?php echo "$base_url"."#vendre"?>">Acheter</a>
                <a href="<?php echo "$base_url"."#location"?>">Location</a>
                <a href="<?php echo "$base_url"."/layouts/login.php"?>">Contact</a>
                <a href="#"><i class="fas fa-cart-shopping"></i></a>
        </div>
            <div class="btn">
                <i class="fas fa-bars menu-btn"></i>
            </div>
    </header>

    <script>

        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle('sticky', window.scrollY > 0)
        });

        var menu = document.querySelector('.menu');
        var menuBtn = document.querySelector('.menu-btn');
        var closeBtn = document.querySelector('.close-btn');

        menuBtn.addEventListener("click", () => {
            menu.classList.add('active');
        });

        closeBtn.addEventListener("click", () => {
            menu.classList.remove('active');
        });

        
        // ScrollReveal().reveal('.menu',{
        //     duration: 2000,
        //     origin: 'top'
        // });
        // ScrollReveal().reveal('.brand',{
        //     duration: 2000,
        //     origin: 'top'
        // });

    </script>