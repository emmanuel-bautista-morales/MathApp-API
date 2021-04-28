<?php
    function view($viewName, $params=[]) {
        $loader = new \Twig\Loader\FilesystemLoader('app/views');

        $twig = new \Twig\Environment($loader);

        return $twig->render($viewName.'.php', $params);
    }

    function json($array) {
        header("Content-type: application/json; charset= utf8");
        return json_encode($array);
    }
?>