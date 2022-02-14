<?php

class CommandsLibrary 
{
    private $commands = [];

    public function printCommands()
    {
        foreach (array_values($this->commands) as $command) {
            $name = $command->getName();
            $desc = $command->help();
            echo "$name : $desc \n";
        }
    }

    public function initCommandsArr()
    {
        $commandsArr = require_once 'commands.php'; 
        // $commandsArr = [
        //     'command_1' => 'Command1',
        //     'command_2' => 'Command2'
        // ];

        // $commandsArr = ['Command1', 'Command2']
        foreach (array_values($commandsArr) as $commands_class) {
            // $commands_class = 'Command1'
            $command = new $commands_class();
            // $command = new Command1(); 
            $this->commands[$command->getName()] = $command;
        }
        // $commands = [ 
        //      command_1 => объкт Command1, 
        //      command_1 => объкт Command2
        // ]
    }

    public function getCommandsArr() 
    {
        return $this->commands;
    }

    public function getCommand($name) 
    {
        if (in_array($name, array_keys($this->commands))) {
            return $this->commands[$name];
        } else {
            return false;
        }
    }
}