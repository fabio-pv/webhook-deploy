<?php


namespace App\Utils;


use App\Models\v1\Repository;

class PathUtil
{
    static function getFullPathRepository(Repository $repository): string
    {

        $projectDir = $repository->project->directory;

        $explodeHttps = explode('/', $repository->https);
        $nameRepository = $explodeHttps[count($explodeHttps) - 1];
        $nameRepository = str_replace('.git', '', $nameRepository);

        return $projectDir . '/' . $nameRepository;
    }

    static function getFullPathRepositoryWithFile(Repository $repository, string $file): string
    {
        $fullPathRepository = self::getFullPathRepository($repository);
        $fullPathRepository .= '/' . $file;

        return $fullPathRepository;
    }
}
