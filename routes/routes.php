<?php
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;
    use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
    use Controllers\HomeController;

    $collector = new RouteCollector();

    // rutas
    $collector->get('/', fn() => HomeController::index() );

    $dispatcher = new Dispatcher($collector->getData());
    
    try {
        echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    } catch (HttpRouteNotFoundException $e) {
        echo "Error: Ruta no encontrada";
    } catch (HttpMethodNotAllowedException $e) {
        echo "Error: Ruta encontrada pero método no permitido";
    }

?>