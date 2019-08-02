<?php

// 厨师
class cook
{
    public function make()
    {
        echo '辣子鸡'.PHP_EOL;
    }

    public function drink()
    {
        echo '紫菜水'.PHP_EOL;
    }

    public function ok()
    {
        echo '上菜了喂';
    }
}


interface Command
{
    public function execute();
}

// 服务员
class MakeCommand implements Command
{
    private $cook;

    public function __construct($cook)
    {
        $this->cook = $cook;
    }

    public function execute()
    {
        $this->cook->make();
    }
}

class DrinkCommand implements Command
{
    private $cook;

    public function __construct($cook)
    {
        $this->cook = $cook;
    }

    public function execute()
    {
        $this->cook->drink();
    }
}

class cookControll
{
    private $makecommand;
    private $drinkcommand;

    public function addCommand($makecommand, $drinkcommand)
    {
        $this->makecommand = $makecommand;
        $this->drinkcommand = $drinkcommand;
    }

    public function callMake()
    {
        $this->makecommand->execute();
    }

    public function callDrink()
    {
        $this->drinkcommand->execute();
    }
}

$cook = new cook;
$makecommand = new MakeCommand($cook);
$drinkcommand = new DrinkCommand($cook);

$cookControll = new cookControll;
$cookControll->addCommand($makecommand, $drinkcommand);
$cookControll->callMake();
$cookControll->callDrink();