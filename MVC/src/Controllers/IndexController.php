<?php
namespace Cakes\Controllers;

// use Cakes\Db\CakeDAO;
use Cakes\Kernel\Controller;

class IndexController extends Controller
{
    public function index(){
        $data = ['message' => '<h2>Доброго времени суток! На нашем сайте Вы можете найти множество тортов и добавить свои!</h2>'];
        echo $this->getTemplate('main.php', $data);
    }
}