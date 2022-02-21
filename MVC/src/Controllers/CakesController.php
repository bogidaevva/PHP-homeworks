<?php
namespace Cakes\Controllers;

use Cakes\Kernel\Controller;
use Cakes\Db\CakeDAO;

class CakesController extends Controller
{
    private $cakeDAO;

    public function __construct(){
        $this->cakeDAO = new CakeDAO();
    }

    public function addNewCake() 
    {
        $post = $_POST;
        $files = $_FILES;

        $title = $post['title'];
        $price = $post['price'];
        $desc = $post['description'];
        
        $id = microtime().$post['title'];

        $pic_name = microtime().$files['picture']['name'];

        if (move_uploaded_file($files['picture']['tmp_name'], "../public/pictures/$pic_name")) {
            $cake = $this->cakeDAO->getCakeById($id);
            if (!$cake) {
                $cake = $this->cakeDAO->addCakeDB($id, $title, $price, $desc, $pic_name);
                $data = ['message' => '<h2>Торт успешно добавлен!</h2>'];
                echo $this->getTemplate('main.php', $data);
            } else {
                $data = ['message' => '<h2>Этот торт уже есть в базе.</h2>'];
                echo $this->getTemplate('main.php', $data);
            }
        } else {
            $data = ['message' => '<h2>Произошла ошибка загрузки изображения, попробуйте еще раз.</h2>'];
            echo $this->getTemplate('main.php', $data);
        }
    }

    public function showAllCakes() 
    {
        $cakes = $this->cakeDAO->getAllCakes();
        if ($cakes) {
            $data = [
                'cakes' => $cakes, 
                'message' => '<p>Фильтры</p>'
            ];
            echo $this->getTemplate('cakes.php', $data);
        } else {
            $data = ['message' => '<h2>В каталоге пока нет ни одного торта. Но вы можете добавить свой!</h2>'];
            echo $this->getTemplate('main.php', $data);
        }
    }

    public function getCakeById() 
    {
        $get = $_GET;
        $id = $get['id'];
        $cake = $this->cakeDAO->getCakeById($id);
        if ($cake) {
            $data = ['cake' => $cake];
            echo $this->getTemplate('cake.php', $data);
        } else {
            $data = ['message' => 'Произошла ошибка, попробуйте еще раз.'];
            echo $this->getTemplate('cakes.php', $data);
        }
    }

    public function searchCakesByPrice()
    {
        $get = $_GET;
        $min = $get['min'];
        $max = $get['max'];

        $cakes = $this->cakeDAO->getCakesByPrice($min, $max);
        if ($cakes) {
            $data = ['message' => 'Ehffhfhfhfh'];
            echo $this->getTemplate('cakes.php', $data);;
        } else {
            echo 'error';
        }
    }
}