<?php

use Controllers\AnswerController;
use Controllers\CourseController;
    use Phroute\Phroute\RouteCollector;
    use Phroute\Phroute\Dispatcher;
    use Phroute\Phroute\Exception\HttpRouteNotFoundException;
    use Phroute\Phroute\Exception\HttpMethodNotAllowedException;
    use Controllers\HomeController;
    use Controllers\UserController;
    use Controllers\LessonController;
    use Controllers\ExperimentController;
    use Controllers\ProgressController;
    use Controllers\TestController;
    use Controllers\QuestionController;


    $collector = new RouteCollector();

    // rutas

    // users
    $collector->get('/', fn() => HomeController::index() );
    $collector->post('/api/user/create', fn() => UserController::create(file_get_contents("php://input", true)));
    $collector->post('/api/user/add_score', fn() => UserController::add_score(file_get_contents("php://input", true)));
    $collector->post('/api/user/login', fn() => UserController::login(file_get_contents("php://input", true)));
    
    
    // courses
    $collector->get('/api/course/all', fn() => CourseController::all());
    $collector->post('/api/course/create', fn() => CourseController::create(file_get_contents("php://input", true)));
    $collector->get("/api/course/show/{id}",fn($id)=>CourseController::show($id));
    $collector->delete('/api/course/delete/{id}', fn($id)=>CourseController::delete($id));
    // $collector->get('/api/course/{id}/lessons', fn($id)=>CourseController::get_lessons($id));
    // lessons
    $collector->get('/api/lesson/all/{id}', fn($id) => LessonController::all($id));
    $collector->post('/api/lesson/create', fn() => LessonController::create(file_get_contents("php://input", true)));
    $collector->get("/api/lesson/show/{id}",fn($id)=>LessonController::show($id));
    $collector->delete('/api/lesson/delete/{id}', fn($id)=>LessonController::delete($id));
    // experiments
    $collector->get("/api/experiment/all", fn() => ExperimentController::all());
    $collector->post('/api/experiment/create', fn() => ExperimentController::create(file_get_contents("php://input", true)));
    $collector->get("/api/experiment/show/{id}",fn($id)=>ExperimentController::show($id));
    $collector->delete('/api/experiment/delete/{id}', fn($id)=>ExperimentController::delete($id));

    // test
    $collector->post('/api/test/create', fn() => TestController::create(file_get_contents("php://input", true)));

    // questions
    $collector->post('/api/question/create', fn() => QuestionController::create(file_get_contents("php://input", true)));

    // answers
    $collector->post('/api/answer/create', fn() => AnswerController::create(file_get_contents("php://input", true)));

    //progress
    $collector->post('/api/progress/create', fn() => ProgressController::create(file_get_contents("php://input", true)));

    $dispatcher = new Dispatcher($collector->getData());
    try {
        echo $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
    } catch (HttpRouteNotFoundException $e) {
        echo "Error: Ruta no encontrada";
    } catch (HttpMethodNotAllowedException $e) {
        echo "Error: Ruta encontrada pero método no permitido";
    }

?>