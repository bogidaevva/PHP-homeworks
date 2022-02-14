<?php

interface Command 
{
    public function getName();
    public function help();
    public function execute();
}