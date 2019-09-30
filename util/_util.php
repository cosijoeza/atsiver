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
                <img class='d-block img-fluid rounded float-left mr-2' id = 'logo1' src='imgs/logo1.png' alt='404'>
                </div>
                <!--<a class='navbar-brand' href='.' style='font-family: 'Montserrat', sans-serif;'>Universo Estudiantil</a>-->
                <button class='navbar-toggler ml-auto' type='button' data-toggle='collapse' data-target='#navbarResponsive'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarResponsive'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item".($idPagina == 1 ? " active":"")."'>
                            <a class='nav-link text-navbar' href='.'>Inicio</a>
                        </li>
                        <li class='nav-item".($idPagina == 2 ? " active":"")."'>
                            <a class='nav-link text-navbar' href='revista.php'>Revista</a>
                        </li>
                        <li class='nav-item".($idPagina == 3 ? " active":"")."'>
                            <a class='nav-link text-navbar' href='ediciones.php'>Ediciones</a>
                        </li>
                        <li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Patrocinadores</a>
                            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/Tlayudas-Nanashi-661927167306647/'>Tlayudas Nanashi</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/profile.php?id=100001481396445&ref=br_rs'>PC Y Reparación</a>
                              <a class='dropdown-item' href='#'>Gelatinas Lolita</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/MediCanHuajuapan/'>Medi Can</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/Linda-Belleza-Y-Estetica-382675125474403/'>Estética Linda</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/Bolsas.chuke'>Chuke Accesorios y cosméticos</a>
                              <a class='dropdown-item' href='#'>Abarrotes Josué</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/MAZU-Sushi-House-1492281291093367/?ref=br_rs'>Mazu Sushi House</a>
                              <a class='dropdown-item' target='_blank' href='http://www.factorialn.com'>Factorial N</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/Cl%C3%ADnica-de-Especialidades-Santa-Fe-1680059042304469/'>Clínica Santa Fe</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/bambu.el.5'>Comedor Bambú</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/BostonParfait/?ref=br_rs'>Boston Parfait's</a>
                              <a class='dropdown-item' target='_blank' href='https://aiesec.org.mx/emprendedor-global/'>AIESEC</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/fernandoherreralop'>Fernando Herrera Fotógrafo</a>
                              <a class='dropdown-item' href='#'>Tienda de ropa Angelo</a>
                              <a class='dropdown-item' target='_blank' href='https://www.facebook.com/coffee.surf.9'>Coffee Surf</a>
                            </div>
                        </li>
                        <li class='nav-item".($idPagina == 4 ? " active":"")."'>
                            <a class='nav-link text-navbar' href='#'>About</a>
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
            echo ">"; 
        echo   
            "<div class='container'>
                <p class='m-0 text-center text-white'>&copy; Universo Estudiantil 2018</p>
            </div>
        </footer>";
    }
?>