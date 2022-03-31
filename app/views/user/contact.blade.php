<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section id="header">
        <a href="index.html"><img src="img/logo.png" class="logo" alt=""></a>
        <div>
            <ul id="navbar">
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Loja</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">Sobre nós</a></li>
                <li><a class="active" href="contact.html">Contacto</a></li>
                <div class="nav-direita">

                    <li id="lg-bag"><a href="carrinho.html" class="carrinho"><i class="far fa-shopping-bag"></i><i class="fa-solid fa-cart-shopping"></i>
                        <span>0</span></a></li>
                    
                    </div>
                <a id="close" href="#"><i class="far fa-times"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="carrinho.html"><i class="far fa-shopping-bag"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    </section>

    <section id="page-header" class="about-header">

        <h2>#let's_talk</h2>
        <p>LEAVE A MESSAGE, We love to hear from you!</p>

    </section>

    <section id="contact-details" class="section-p1">
        <div class="details">
            <span>SOBRE NÓS</span>
            <h2>Visite a nossa loja</h2>
            <h3>Escritorio</h3>
            <div>
                <li>
                    <i class="fal fa-map"></i>
                    <p>Bairro cassenda</p>
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <p>bhjvvstore@gmail.com </p>
                </li>
            </div>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.8088025254456!2d-1.256555484681452!3d51.754819700404106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876c6a9ef8c485b%3A0xd2ff1883a001afed!2sUniversity%20of%20Oxford!5e0!3m2!1sen!2sbd!4v1637232208485!5m2!1sen!2sbd"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <section id="form-details">
        <form action="">
            <span>DEIXE MENSAGEM</span>
            <h2>Gostariamos de ver o que tem a dizer </h2>
            <input type="text" name="" id="" placeholder="Nome">
            <input type="text" name="" id="" placeholder="E-mail">
            <input type="text" name="" id="" placeholder="Assunto">
            <textarea name="" id="" cols="30" rows="10" placeholder="Mensagem"></textarea>
            <button class="normal">Enviar</button>
        </form>

        
    </section>

    <section id="newsletter" class="section-m1 section-p1">
        <div class="newstext">
            <h4>Sign Up For Newsletters </h4>
            <p>Get E-mail updates about our latest shop and <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" name="" placeholder="Your email address" id="">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Endereço: </strong> Bairro Cassenda, Rua X</p>
            <p><strong>Contacto:</strong> (+244) 917 431 330 /(+244) 928 589 327</p>
            <p><strong>Horas:</strong> 10:00 - 18:00, Seg - Sab</p>
            <div class="follow">
                <h4>Follow Us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>Sobre</h4>
            <a href="#">sobre nós</a>
            <a href="#">Contact Us</a>
        </div>

        <div class="col">
            <h4>Minha conta</h4>
            <a href="#">Sign In</a>
            <a href="#">Ver carrinho</a>
        </div>

        <div class="copyright">
            <p>© 2021, Colegio Mara e Lú, BHJVV</p>
        </div>
    </footer>


    <script src="script.js"></script>

</body>

</html>