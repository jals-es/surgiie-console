<?php

namespace Surgiie\Console\Concerns;

use Dotenv\Dotenv;
use InvalidArgumentException;

trait LoadsEnvFiles
{
    /**
     * Parse an env file and returns parsed data as an array.
     */
    public function getEnvFileVariables(string $path): array
    {
        if (! is_file($path)) {
            throw new InvalidArgumentException("The env file '$path' does not exist.");
        }

        return Dotenv::parse(file_get_contents($path));
    }

    /**
     * Loads a env file variables into $_ENV and return the result.
     */
    public function loadEnvFileVariables(string $path): array
    {
        if (! is_file($path)) {
            throw new InvalidArgumentException("The env file '$path' does not exist.");
        }

        $env = basename($path);

        $dotenv = Dotenv::createImmutable(dirname($path), $env);

        return $dotenv->load();
    }
}
