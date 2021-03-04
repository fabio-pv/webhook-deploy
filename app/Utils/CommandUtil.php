<?php


namespace App\Utils;


use App\Models\v1\Command;
use App\Models\v1\Repository;

class CommandUtil
{

    static function clone(string $https): string
    {
        return "git clone ${https}";
    }

    static function command(Repository $repository, Command $command): string
    {

        $path = PathUtil::getFullPathRepository($repository);

        return 'cd ' . $path . ' && ' . $command->command;
    }

}
