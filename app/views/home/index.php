<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Lins de js y css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>
<body>


<!-- estilos -->
<style>
body{
  background-color: rgb(248, 249, 250, 0.85);
}
html {
    scroll-behavior: smooth;
}
.menu a {
    
    display: inline-block;
    color: gray;
    padding: 1rem;
    margin-right: 20px;
    width: inherit;
    text-decoration: none;
}

</style>
<!-- Código del navbar -->
   <div class="bg-white">
     <div class="container-fluid">
        <div class="navbar d-flex">
            <div>
                <h2>MathApp</h2>
            </div>
            <nav class=" menu">
                <a href="#seccion1">Inicio</a>
                <a href="#seccion2">Servicios</a>
                <a href="#seccion3">Descargar</a>
            </nav>
        </div>
     </div>
   </div>
   <!-- Fin navbar -->

   <div class="p-4 bg-primary">
      <p class="text-white fs-4 text-center">¿Interesado en aprender matemáticas de una manera diferente? <a href="#seccion2" class="text-white"> Consulte nuestra aplicación móvil</a> </p>
   </div>


<div class="container">
  <section id="seccion1">
<div class="m-5">
<h1> MathApp</h1>
    <div class="card text-center">
      <div class="card-body">
          <p class="card-text fs-4">
              Es una aplicación móvil, con el objetivo de incrementar
              el aprendizaje de los estudiantes en el área de las matemáticas 
              a través de la experimentación como una estrategia de enseñanza-aprendizaje,
              una manera diferente a lo tradicional.
          </p>
          <a href="#" class="btn btn-primary p-3">Comenzar</a>
      </div>
    </div>
  </div>
  </section>


<section id="seccion2">
<div class="m-5">
<h1>Te garantizamos</h1>
<div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="https://www.muyseguridad.net/wp-content/uploads/2017/10/Programa-de-Protecci%C3%B3n-Avanzada-de-Google.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Seguridad</h5>
        <p class="card-text">Todos tus datos personales estan totalmente seguros con nosotros</p>
      </div>
     
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://lh3.googleusercontent.com/proxy/ZQCGWgVKs-9fGXeUds_kCh1BtT-kHemrzHDjwlIGz2bS-0lDDWFgsfFteV4kyZaNPmw0wIG89ri9lFAm363zx6odiLeSui4uT0D_qlowRVZ2pA" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Experiencia de usuario</h5>
        <p class="card-text">Nuestra app contiene las mejores tecnicas de experiencia de usuario, lo cuál logrará que te sientas a gusto </p>
      </div>
     
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="https://ipas.es/wp-content/uploads/2020/09/memoria.png" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Aprendizaje</h5>
        <p class="card-text">Con nuestra app mejorarás tus conocimientos en matematicas, a través de experimentos intuitivos</p>
      </div>
      
    </div>
  </div>
</div>
</div>

</section>
<section id="seccion3">
<div class="m-5">
<h1>Descarga</h1>
  <div class="card text-center">
    <div class="m-3">
      <p class="fs-2">Instala nuestra aplicación móvil hoy</p>
  </div>
  <div class="card-body m-3">
    <p class="card-text fs-3">
      Es totalmente gratis!
    </p>
    <a href="#" class="btn btn-primary p-3">Descargar ahora</a>
  </div>
   </div>
</div>
</section>

  
</div> <!-- fin container -->
<!-- Inicio footer -->
  <footer class="bg-dark text-center text-white">
      <div class="container p-4 pb-0">
       
        <section class="mb-4">
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-facebook-f"></i ></a>
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
          <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-github"></i></a>
        </section>
    
      </div>
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2020 Copyright:
      </div>
</footer>
</body>
</html>