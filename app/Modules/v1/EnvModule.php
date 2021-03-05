<?php


namespace App\Modules\v1;


use App\Jobs\FilePutContentsCommand;
use App\Models\v1\Repository;
use App\Utils\PathUtil;
use LaravelSimpleBases\Exceptions\ValidationException;

class EnvModule
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function startGet(): array
    {
        $this->existEnv();
        return $this->getEnv();
    }

    public function startCreate(): void
    {
        $this->existDir();
        $this->createEnv();
    }

    private function existEnv(): void
    {
        $fileName = PathUtil::getFullPathRepositoryWithFile($this->repository, '.env');

        if (!file_exists($fileName)) {
            throw new ValidationException('env file not exist');
        }
    }

    private function getEnv(): array
    {
        $fileName = PathUtil::getFullPathRepositoryWithFile($this->repository, '.env');
        $envRaw = file_get_contents($fileName);

        return $this->formatEnv($envRaw);
    }

    private function formatEnv(string $envRaw): array
    {
        return explode(PHP_EOL, $envRaw);
    }

    private function existDir(): void
    {
        $dir = PathUtil::getFullPathRepository($this->repository);

        if (!is_dir($dir)) {
            throw new ValidationException('Directory does not exist yet use the clone function to create.');
        }
    }

    private function createEnv(): void
    {
        $fileName = PathUtil::getFullPathRepositoryWithFile($this->repository, '.env');
        $data = request()->get('env');

        FilePutContentsCommand::dispatch($fileName, $data);
    }
}
