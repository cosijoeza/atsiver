<?php
    session_start();
    function conectarse(){
        $link = mysqli_connect("localhost","userdb","bf340cf2", "revistaue");
        mysqli_set_charset ($link,"utf8");
        return $link;
    }

    function crearNavbar($idPagina){
        echo 
        "<nav id='barra' class='navbar navbar-expand-lg navbar-dark'>
            <div class='container'>
                <div class = 'logo'>
                    <a href='.'>
                    <img class='d-block img-fluid rounded float-left mr-2' id = 'logo1' src='imgs/logo1.png' alt='404'>
                    </a>
                </div>
                <button id='responsive-menu' class='navbar-toggler ml-auto' type='button' data-toggle='collapse' data-target='#navbarResponsive'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarResponsive'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item".($idPagina == 1 ? " active":"")."'>
                            <a class='nav-link' href='.'>Inicio</a>
                        </li>
                        <li class='nav-item".($idPagina == 2 ? " active":"")."'>
                            <a class='nav-link' href='ediciones.php'>Ediciones</a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Patrocinadores</a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                              <a class='dropdown-item' target='_blank' href='#'>Barber Shop Maylina</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/chocolatte.caffeteria/'>Chocolate Bar</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/LaDivaHuajuapan/'>La Diva</a>
                              <a class='dropdown-item' target='_blank' href='https://lagrandiosa.mx/'>La Grandiosa</a>
                              <a class='dropdown-item' href='#'>Oxifuel</a>
                            </div>
                        </li>
                        <li class='nav-item".($idPagina == 3 ? " active":"")."'>
                            <a class='nav-link' href='index.php#nosotros'>Nosotros</a>
                        </
                    </ul>
                </div>
            </div>
        </nav>";
    }

    function crearFooter($fixed){
        echo
        "<footer class='py-2'";
        if($fixed)
            echo "fixed-bottom'>";
        else
            echo "style='padding-bottom:45px !important;'>"; 
        echo   
            "<div class='container'>
                <p class='m-0 text-center text-black'>&copy; Universo Estudiantil 2018</p>
            </div>
        </footer>";
    }
?>