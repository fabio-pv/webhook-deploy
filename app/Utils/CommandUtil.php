<?php


namespace App\Utils;


class CommandUtil
{

    static function clone(string $https): string
    {
        return "git clone ${https}";
    }

}
