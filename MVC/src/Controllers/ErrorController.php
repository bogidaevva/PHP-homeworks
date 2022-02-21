<?php
namespace Cakes\Controllers;

use Cakes\Kernel\Controller;

class ErrorController extends Controller
{
    public function error404(){
        echo $this->getTemplate('404.php');
    }
}