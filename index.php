<?php
 include '../motorat/php/sesion_handler.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Motos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>MOTORAT</h1>
        <H3></H3>
        <nav>
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="#models">mas vendidas</a></li>
                <li><a href="../motorat/php/contacto.php">Contacto</a></li>
                <LI><a href="../motorat/php/admin_control.php">Administrador</a></LI>
                <?php if($usuario): ?>
                    <li><a href="#"><?php echo $usuario; ?></a></li>
                    <li><a href="../motorat/php/logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li><a href="../motorat/php/login.php">Iniciar sesión</a></li>
                    <li><a href="../motorat/php/register.php">Registrarse</a></li>
                <?php endif; ?>

        </nav>
    </header>
    
    <main>

        <div class="MYV">
            <div class="box">
                <h2>MISION</h2>
                <p>En motorad, nuestra misión es superar las expectativas de nuestros clientes en cada interacción. Nos esforzamos por proporcionar una selección incomparable de motos de calidad, junto con un servicio al cliente excepcional, transparencia total y precios competitivos. Nos dedicamos a crear relaciones sólidas y duraderas con nuestros clientes, basadas en la confianza mutua, la integridad y la satisfacción del cliente en cada paso del camino. Nuestro objetivo es hacer que la experiencia de compra de motos sea emocionante, sin complicaciones y gratificante para todos nuestros clientes.</p>
            </div>
            <div class="box2">
                <h2>VISION</h2>
                <p>En motorad, visualizamos un futuro donde cada cliente experimenta la excelencia motociclistica en un ambiente acogedor y orientado al cliente. Nos esforzamos por ser líderes en la industria, ofreciendo una gama diversa de motos de calidad superior, servicios excepcionales y una experiencia de compra sin igual. Nos comprometemos a ser el destino preferido para aquellos que buscan no solo una moto, sino una relación de confianza a largo plazo.</p>
            </div>
        </div>
        <section id="home">
            <h2>Inicio</h2>
            <p>Bienvenidos a nuestra página de motos, donde encontrarás la mejor información sobre los modelos másvendidos, si quieres ver mas ve nuestro catalogo.</p>
        </section>
        <section class="hero">
            <h1>Bienvenido a motorad</h1>
            <p>Tu destino para encontrar la moto de tus sueños.</p>
            <a href="../motorat/php/catalogo.php" class="btn" >Ver motos</a>
        </section>
    
        <section id="models">
            <h2>Modelos Más Vendidos</h2>
    <div class="card-container">
        <div class="card">
            <div class="card-img">
                <img src="images/MT09.png" alt="Yamaha">
            </div>
            <div class="card-info">
                <p class="text-title">Yamaha MT09</p>
                <p class="text-body">Moto alto cilindraje ideal para el candeleo en pista o callejero</p>
            </div>
            <div class="card-footer">
                <span class="text-title">$150.000.000</span>
                        <div class="card-button">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                                <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                                <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img"> <img src="images/Ducati.png" alt="Ducati">
                    </div>                       
                    <div class="card-info">
                        <p class="text-title">Ducati Multistrada v4</p>
                        <p class="text-body">moto de alto cilindraje, ideal para trayectos largos ngracias a su autonomia y confort </p>
                    </div>
                    <div class="card-footer">
                        <span class="text-title">$250.000.000</span>
                        <div class="card-button">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                                <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                                <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="images/bmw-s1000r.jpg" alt="bmw-s1000r">
                    </div>
                    <div class="card-info">
                        <p class="text-title">BMW S1000</p>
                        <p class="text-body">Moto de alto cilindraje ideal para las pistas y la adrenalina que genera la velocidad</p>
                    </div>
                    <div class="card-footer">
                        <span class="text-title">$200.000.000</span>
                        <div class="card-button">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                                <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                                <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-img">
                        <img src="images/1390.png" alt="KTM">
                    </div>
                    <div class="card-info">
                        <p class="text-title">KTM 1390 SUPER DUKE R </p>
                        <p class="text-body">moto de alto cilindraje, con mucho torque y una de las mas rapidas de su segmento, la bestia de la velocidad</p>
                    </div>
                    <div class="card-footer">
                        <span class="text-title">$350.000.000</span>
                        <div class="card-button">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path d="M17.72,5.011H8.026c-0.271,0-0.49,0.219-0.49,0.489c0,0.271,0.219,0.489,0.49,0.489h8.962l-1.979,4.773H6.763L4.935,5.343C4.926,5.316,4.897,5.309,4.884,5.286c-0.011-0.024,0-0.051-0.017-0.074C4.833,5.166,4.025,4.081,2.33,3.908C2.068,3.883,1.822,4.075,1.795,4.344C1.767,4.612,1.962,4.853,2.231,4.88c1.143,0.118,1.703,0.738,1.808,0.866l1.91,5.661c0.066,0.199,0.252,0.333,0.463,0.333h8.924c0.116,0,0.22-0.053,0.308-0.128c0.027-0.023,0.042-0.048,0.063-0.076c0.026-0.034,0.063-0.058,0.08-0.099l2.384-5.75c0.062-0.151,0.046-0.323-0.045-0.458C18.036,5.092,17.883,5.011,17.72,5.011z"></path>
                                <path d="M8.251,12.386c-1.023,0-1.856,0.834-1.856,1.856s0.833,1.853,1.856,1.853c1.021,0,1.853-0.83,1.853-1.853S9.273,12.386,8.251,12.386z M8.251,15.116c-0.484,0-0.877-0.393-0.877-0.874c0-0.484,0.394-0.878,0.877-0.878c0.482,0,0.875,0.394,0.875,0.878C9.126,14.724,8.733,15.116,8.251,15.116z"></path>
                                <path d="M13.972,12.386c-1.022,0-1.855,0.834-1.855,1.856s0.833,1.853,1.855,1.853s1.854-0.83,1.854-1.853S14.994,12.386,13.972,12.386z M13.972,15.116c-0.484,0-0.878-0.393-0.878-0.874c0-0.484,0.394-0.878,0.878-0.878c0.482,0,0.875,0.394,0.875,0.878C14.847,14.724,14.454,15.116,13.972,15.116z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
        
    <footer>
        <p>Contacto: info@motos.com | Teléfono: 123-456-7890</p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
