<?php
namespace app\admin\command;
use think\console\Command;
use think\console\input;
use think\console\Output;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/30
 * Time: 10:34
 */
class Script extends Command
{
    protected function configure()
    {
        $this->setName('test')->setDescription('Here is the remark ');
    }

    protected function execute(Input $input, Output $output)
    {
        $output->writeln("TestCommand:");
    }
}