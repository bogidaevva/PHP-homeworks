<?php
require_once __DIR__ . '../../lib/Command.php';


class Command1 implements Command
{
    public function getName(){
        return 'command_1';
    }

    public function help(){
        return 'Описание команды 1';
    }

    public function execute()
    {
        echo "КОМАНДА 1 ВЫПОЛНЕНА!";
    }
}