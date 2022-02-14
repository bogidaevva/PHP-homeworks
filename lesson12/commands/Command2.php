<?php
require_once __DIR__ . '../../lib/Command.php';

class Command2 implements Command
{
    public function getName(){
        return 'command_2';
    }

    public function help(){
        return 'Описание команды 2';
    }

    public function execute()
    {
        echo "КОМАНДА 2 ВЫПОЛНЕНА!";
    }
}