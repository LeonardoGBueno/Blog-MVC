<?php

function dd($param = null)
{
    echo "<pre>";

    print_r($param);
    
    echo "</pre>";

    die();
}

/**
 * Redireciona o usuário para a URL especificada
 */
function redirect(string $url)
{
    header('Location: ' . $url);
}
