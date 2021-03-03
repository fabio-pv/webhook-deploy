<?php

if (!function_exists('exec_custom')) {
    function exec_custom(string $command, $execOnDir = null)
    {

        $moveDir = "cd ${execOnDir} && ";

        $command = $moveDir . $command;

        exec($command, $result);

        dd($result);

    }
}
