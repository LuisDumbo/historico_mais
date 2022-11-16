<?php

use Devanych\View\Renderer;

function views($view, $data = [])
{
    $renderer = new Renderer(__DIR__ . '..\..\view');

    $content = $renderer->render('/' . $view . '.php', $data);

    echo $content;
}
