<?php
require_once 'views/layout/header.php'; ?>



<div class="w3-container" style="padding:128px 16px" id="about">
    <h3 class="w3-center">ACERCA DE NOSOTROS</h3>
    <p class="w3-center w3-large">Nuestra estructura de trabajo</p>
    <div class="w3-row-padding w3-center" style="margin-top:64px">
        <div class="w3-quarter">
            <i class="fa fa-desktop w3-margin-bottom w3-jumbo w3-center"></i>
            <p class="w3-large">Responsive</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
        <div class="w3-quarter">
            <i class="fa fa-heart w3-margin-bottom w3-jumbo"></i>
            <p class="w3-large">Passion</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
        <div class="w3-quarter">
            <i class="fa fa-diamond w3-margin-bottom w3-jumbo"></i>
            <p class="w3-large">Design</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
        <div class="w3-quarter">
            <i class="fa fa-cog w3-margin-bottom w3-jumbo"></i>
            <p class="w3-large">Support</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
        </div>
    </div>
</div>

<!-- Promo Section - "We know design" -->
<div class="w3-container w3-light-grey" style="padding:128px 16px">
    <div class="w3-row-padding">
        <div class="w3-col m6">
            <h3>Rutas</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore.</p>
            <p><a href="#work" class="w3-button w3-black"><i class="fa fa-th"> </i> Ver mapas</a></p>
        </div>
        <div class="w3-col m6">
            <img class="w3-image w3-round-large" src="/trabajoFinal/uploads/images/ruta.jpg" alt="Buildings" width="700" height="394">
        </div>
    </div>
</div>

<!-- Team Section -->
<div class="w3-container" style="padding:128px 16px" id="team">
    <h3 class="w3-center">EQUIPO</h3>
    <p class="w3-center w3-large">Quiénes llevan adelante a TRANSPORTECH </p>
    <div class="w3-row-padding w3-grayscale" style="margin-top:64px">
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">

                <img src="/trabajoFinal/uploads/images/administrador.jpg" alt="John" style="width:100%">
                <div class="w3-container">
                    <h3>Juan Carlos Peluffo</h3>
                    <p class="w3-opacity">Administrador</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                </div>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">
                <img src="/trabajoFinal/uploads/images/supervisor.jpg" alt="Jane" style="width:100%">
                <div class="w3-container">
                    <h3>Wilmer Valderrama</h3>
                    <p class="w3-opacity">Supervisor</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                </div>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">
                <img src="/trabajoFinal/uploads/images/mecanico.jpg" alt="Mike" style="width:100%">
                <div class="w3-container">
                    <h3>Dalmiro Ferreira</h3>
                    <p class="w3-opacity">Mecánico</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                </div>
            </div>
        </div>
        <div class="w3-col l3 m6 w3-margin-bottom">
            <div class="w3-card">
                <img src="/trabajoFinal/uploads/images/camionero.jpg" alt="Dan" style="width:100%">
                <div class="w3-container">
                    <h3>Anibal Hito</h3>
                    <p class="w3-opacity">Camionero</p>
                    <p>Phasellus eget enim eu lectus faucibus vestibulum. Suspendisse sodales pellentesque elementum.</p>
                    <p><button class="w3-button w3-light-grey w3-block"><i class="fa fa-envelope"></i> Contact</button></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="w3-container w3-row w3-center w3-dark-grey w3-padding-64">
    <div class="w3-quarter">
        <span class="w3-xxlarge">14+</span>
        <br>Partners
    </div>
    <div class="w3-quarter">
        <span class="w3-xxlarge">55+</span>
        <br>Proyectos ejecutados
    </div>
    <div class="w3-quarter">
        <span class="w3-xxlarge">89+</span>
        <br>Clientes
    </div>
    <div class="w3-quarter">
        <span class="w3-xxlarge">150+</span>
        <br>Reuniones
    </div>
</div>

<div class="w3-container" style="padding:128px 16px" id="work">
    <h3 class="w3-center">TRABAJOS</h3>
    <p class="w3-center w3-large">What we've done for people</p>

    <div class="w3-row-padding" style="margin-top:64px">
        <div class="w3-col l3 m6">
            <img src="/trabajoFinal/uploads/images/1.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A microphone">
        </div>
        <div class="w3-col l3 m6">
            <img src="/trabajoFinal/uploads/images/2.webp" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A phone">
        </div>
        <div class="w3-col l3 m6">
            <img src="/trabajoFinal/uploads/images/3.jpeg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="A drone">
        </div>
        <div class="w3-col l3 m6">
            <img src="/trabajoFinal/uploads/images/4.jpeg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Soundbox">
        </div>
    </div>


    <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-xxlarge w3-black w3-padding-large w3-display-topright" title="Close Modal Image">×</span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <img id="img01" class="w3-image">
            <p id="caption" class="w3-opacity w3-large"></p>
        </div>
    </div>

    <div class="w3-container w3-light-grey w3-padding-64">
        <div class="w3-row-padding">
            <div class="w3-col m6">
                <h3>Desempeño</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>
                    tempor incididunt ut labore et dolore.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod<br>
                    tempor incididunt ut labore et dolore.</p>
            </div>
            <div class="w3-col m6">
                <p class="w3-wide"><i class="fa fa-truck w3-margin-right"></i>Transporte</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-center" style="width:90%">90%</div>
                </div>
                <p class="w3-wide"><i class="fa fa-fire w3-margin-right"></i>Transporte inflamables</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-center" style="width:85%">85%</div>
                </div>
                <p class="w3-wide"><i class="fa fa-fire w3-margin-right"></i>Transporte sustancias peligrosas</p>
                <div class="w3-grey">
                    <div class="w3-container w3-dark-grey w3-center" style="width:75%">75%</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="w3-container w3-light-grey" style="padding:128px 16px" id="contact">
        <h3 class="w3-center">CONTACT</h3>
        <p class="w3-center w3-large">Envianos un mensaje:</p>
        <div style="margin-top:48px" class="form-box">
            <p><i class="fa fa-map-marker fa-fw w3-xxlarge w3-margin-right"></i> González Catán</p>
            <p><i class="fa fa-phone fa-fw w3-xxlarge w3-margin-right"></i> 4444-4444</p>
            <p><i class="fa fa-envelope fa-fw w3-xxlarge w3-margin-right"> </i> noTan@barats.com</p>
            <br>
            <form action="/action_page.php" target="_blank" >
                <p><input class="w3-input w3-border" type="text" placeholder="Nombre" required name="Name"></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Email" required name="Email"></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Asunto" required name="Subject"></p>
                <p><input class="w3-input w3-border" type="text" placeholder="Mensaje" required name="Message"></p>
                <p>
                    <button class="w3-button w3-black" type="submit">
                        <i class="fa fa-paper-plane"></i> ENVIAR MENSAJE
                    </button>
                </p>
            </form>
            <!-- Image of location/map -->
            <img src="/trabajoFinal/uploads/images/footer.jpg" class="w3-image w3-greyscale" style="width:100%;margin-top:48px">
        </div>
    </div>

<?php
require_once 'views/layout/footer.php'; ?>