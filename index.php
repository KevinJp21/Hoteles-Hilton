<?php
/* Clase abstracta que representa un hotel, se declara como clase absracta para obligar a las subclases a crear sus propias versiones, 
osea esta clase no se puede instanciar directamente, pero se utiliza como plantilla para definir otras clases que heredan sus propiedades y metodos.*/

abstract class Hotel {//Clase creadora abstracta

    protected $precio;//esta variable se daclara como protegida y solo puede ser accedida desde la clase hotel y sus clases derivadas

    public function construct($precio) {// Este metodo se utiliza para establecer el valor de $precio cuando se crea o se instancia un objeto de la clase Hotel.
        $this->precio = $precio;
    }

    abstract public function imprimirFormulario();//Metodo abstracto publico que puede ser accedido desde cualquier parte pero solo por las clases que se derivan de hotel
}

//Clases creadores concretos
class Hostal extends Hotel {

    public function imprimirFormulario() {
        echo '<div class="container-1">';
        echo '<h2 class="mt-5">HOSTAL</h2>';
        echo '<form action="index.php" method="post">';
        echo '<input class="fs-3" type="number" name="numero_personas" placeholder="Número de personas">';
        echo '<input class="fs-3 mt-3" type="number" name="numero_dias" placeholder="Número de días">';
        echo '<button class="btn_2 btn_search btn btn-primary fs-2 mt-2" type="submit" value="Enviar">Enviar</button>';
        echo '</form>';
        echo '</div>';
        echo '<div class="container-2">';
        echo '<img src="../Hoteles_Hilton/img/Hostal.jpg" alt="Posada Hilton">';
        echo '</div>';
    }
}

class Posada extends Hotel {

    public function imprimirFormulario() {
        echo '<div class="container-1">';
        echo '<h2 class="mt-5">POSADA</h2>';
        echo '<form action="index.php" method="post">';
        echo '<input class="fs-3" type="number" name="numero_personas" placeholder="Número de personas">';
        echo '<input class="fs-3 mt-3" type="number" name="numero_dias" placeholder="Número de días">';
        echo '<span class="fs-3 mt-4"><input class="check" type="checkbox" name="desayuno" value="1"> Incluir desayuno</span>';
        echo '<button class="btn_2 btn_search btn btn-primary fs-2 mt-2" type="submit" value="Enviar">Enviar</button>';
        echo '</form>';
        echo '</div>';
        echo '<div class="container-2">';
        echo '<img src="../Hoteles_Hilton/img/posada.jpg" alt="Posada Hilton">';
        echo '</div>';
    }
}

class Resort extends Hotel {

    public function imprimirFormulario() {
        echo '<div class="container-1">';
        echo '<h2 class="mt-5">RESORT</h2>';
        echo '<form action="index.php" method="post">';
        echo '<input class="fs-3" type="number" name="numero_personas" placeholder="Número de personas">';
        echo '<input class="fs-3 mt-3" type="number" name="numero_dias" placeholder="Número de días">';
        echo '<span class="fs-3 mt-4"><input class="check" type="checkbox" name="todo_incluido" value="1"> Plan todo incluido</span>';
        echo '<button class="btn_2 btn_search btn btn-primary fs-2 mt-2" type="submit" value="Enviar">Enviar</button>';
        echo '</form>';
        echo '</div>';
        echo '<div class="container-2">';
        echo '<img src="../Hoteles_Hilton/img/resort.jpg" alt="Posada Hilton">';
        echo '</div>';
    }
}

// Clase que implementa el patrón Factory Method
class HotelFactory {

    public static function crearHotel($precio) {
        if ($precio >= 40000 && $precio <= 70000) {
            return new Hostal($precio);
        } else if ($precio >= 70000 && $precio <= 150000) {
            return new Posada($precio);
        } else {
            return new Resort($precio);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hoteles Hilton</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Hoteles_Hilton/style.css">
    
    
</head>
<body>

<div class="contenedor">
<div class="container-topbar">
    <div class="topbar">

        <div class="row main">

            <div class="col-3 container-1-3">
                <div class="container-location">
                    <a href="#" class="location"><svg class="location-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 20"><symbol viewBox="0 0 14 20" id="45093"><title>location</title> <g fill="currentColor"> <path d="M7,10.8c-1.7,0-3-1.4-3-3.2c0-1.8,1.3-3.2,3-3.2c1.7,0,3,1.4,3,3.2C10,9.4,8.7,10.8,7,10.8 M14,7.6    C14,3.4,10.9,0,7,0S0,3.4,0,7.6c0,2.1,0.8,4,2.1,5.4l0,0l5,7l5-7l0,0C13.2,11.6,14,9.7,14,7.6"></path> </g> </symbol><use xlink:href="#45093"></use></svg>
                    <span class="fs-4">Colombia</span></a>
                </div>
                <div class="container-language">
                    <span class="language fs-4">Español</span>
                </div>
                 <div class="container-client-services">
                    <a href="#"class="client-services  fs-4">Servicio al Cliente</a>
                </div>
            </div>

            <div class="col-6 container-2-3">
                <h1 class="display-2">Hoteles Hilton</h1>
            </div>

            <div class="col-3 container-3-3">
                <div class="container-login">
                    <a href="#" class="link-login"> <span class="fs-4">Iniciar Sesión</span></a>
                </div>
                <div class="container-favorites">
                    <a href="#" class="favorites"><svg class="favorites-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 13.5"><symbol viewBox="0 0 15 13.5" id="14801"><title>saved-items</title> <g fill="currentColor"> <path d="M12.5,5.3l-5,5.2l-5-5.3c0,0-0.8-0.9-0.8-1.5c0-1,0.8-1.8,1.7-1.8c0.6,0,1.1,0.3,1.4,0.9l2.6,2.7l2.7-2.8l0,0    c0.3-0.5,0.8-0.9,1.5-0.9c0.9,0,1.7,0.8,1.7,1.8C13.4,4.4,12.5,5.3,12.5,5.3 M11.5,0c-1.1,0-2.1,0.6-2.7,1.5L7.5,2.8L6.2,1.5    C5.6,0.6,4.6,0,3.5,0C1.5,0,0,1.7,0,3.8c0,1.2,0.5,2.3,1.4,3l1.3,1.4l4.9,5.3l0,0l0,0l4.9-5.3l1.2-1.4C14.5,6.1,15,5,15,3.8    C15,1.7,13.5,0,11.5,0"></path> </g> </symbol><use xlink:href="#14801"></use></svg>
                    </a>
                </div>
                <div class="container-bag">
                    <a href="#" class="bag">
                    <span class="fs-4">Reservaciones</span>
                    </a>
                </div>

                <div class="container-location">
                    <a href="#" class="location"><svg class="location-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 20"><symbol viewBox="0 0 14 20" id="45093"><title>location</title> <g fill="currentColor"> <path d="M7,10.8c-1.7,0-3-1.4-3-3.2c0-1.8,1.3-3.2,3-3.2c1.7,0,3,1.4,3,3.2C10,9.4,8.7,10.8,7,10.8 M14,7.6    C14,3.4,10.9,0,7,0S0,3.4,0,7.6c0,2.1,0.8,4,2.1,5.4l0,0l5,7l5-7l0,0C13.2,11.6,14,9.7,14,7.6"></path> </g> </symbol><use xlink:href="#45093"></use></svg>
                    </a>
                </div>
    
                <div class="container-search">
                    <a href="#" class="search"><svg class="search-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33 33"><symbol viewBox="0 0 33 33" id="95956"><title>search-circle</title> <g id="search-circle-search" fill="currentColor"> <path class="design-in" d="M14.90625,19.2484472 C12.75,19.2484472 10.96875,17.3850932 10.96875,15.1490683 C10.96875,12.9130435 12.75,11.0496894 14.90625,11.0496894 C17.0625,11.0496894 18.84375,12.9130435 18.84375,15.1490683 C18.9375,17.3850932 17.15625,19.2484472 14.90625,19.2484472 Z M20.0625,18.3167702 C20.625,17.3850932 20.90625,16.2670807 20.90625,15.1490683 C20.90625,11.7018634 18.28125,9 14.90625,9 C11.625,9 9,11.7018634 9,15.1490683 C9,18.5031056 11.625,21.2981366 14.90625,21.2981366 C16.21875,21.2981366 17.53125,20.8322981 18.46875,20.0869565 L22.3125,24 L24,22.5093168 L20.0625,18.3167702 Z" id="search-circle-search1"></path> <path class="design-out" d="M16.5,0 C7.38644476,0 0,7.38644476 0,16.5 C0,25.6135552 7.38644476,33 16.5,33 C25.6135552,33 33,25.6121856 33,16.5 C33,7.38781439 25.6121856,0 16.5,0 Z M16.5,30.4223458 C8.81086578,30.4223458 2.57765419,24.1905039 2.57765419,16.5 C2.57765419,8.80949614 8.80949614,2.57765419 16.5,2.57765419 C24.1905039,2.57765419 30.4223458,8.80949614 30.4223458,16.5 C30.4223458,24.1905039 24.1891342,30.4223458 16.5,30.4223458 Z" id="search-circle-search2"></path> </g> </symbol><use xlink:href="#95956"></use></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="7000" data-bs-pause="none">
    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
    <div class="carousel-inner">
    <div class="carousel-item active c-item">
      <img src="../Hoteles_Hilton/img/resort.jpg" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5 cc">
      <p class="mt-5 display-4 text-uppercase">Disfrute de una experiencia de lujo en nuestro resort.</p>
        <button class="btn btn-primary px-4 py-2  mt-5 btn-c"> <a class="fs-2" href="#heading">Reservar</a></button>
      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="../Hoteles_Hilton/img/posada.jpg" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5 cc">
      <p class="mt-5 display-4 text-uppercase">Descanse y relájese en nuestra posada.</p>
      <button class="btn btn-primary px-4 py-2  mt-5 btn-c"> <a class="fs-2" href="#heading">Reservar</a></button>
      </div>
    </div>
    <div class="carousel-item c-item">
      <img src="../Hoteles_Hilton/img/Hostal.jpg" class="d-block w-100 c-img" alt="...">
      <div class="carousel-caption top-0 mt-5 cc">
      <p class="mt-5 display-4 text-uppercase">Ofrecemos habitaciones compartidas y privadas a precios asequibles.</p>
      <button class="btn btn-primary px-4 py-2  mt-5 btn-c"> <a class="fs-2" href="#heading">Reservar</a></button>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
  </div>
</div>


<div class="conainer-content"> 
        <section class="content">
            <div id="heading" class="heading display-4">Reservación</div>
       </section>

        <form class="form-container ms-5 mt-5" action="index.php" method="post">
            <input class="fs-3" type="number" name="precio" placeholder="Ingrese el costo por noche">
            <button class="btn_search btn btn-primary fs-2" type="submit" value="Buscar">Buscar</button>
        </form>
    </div>
        <?php

        // Obtenemos el precio ingresado por el usuario
            $precio = isset($_POST['precio']) ? $_POST['precio'] : 0;

        // Creamos el objeto hotel
            $hotel = HotelFactory::crearHotel($precio);

        // Imprimimos el formulario del hotel
            $hotel->imprimirFormulario();

        ?>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>