<?php

namespace SocialTech;

class SlowStorage implements StorageInterface
{
    /**
     * @inheritdoc
     */
    public function store(string $path, string $content): void
    {
        sleep(5); // simulation of slowness

        file_put_contents($path, $content, LOCK_EX);
    }

    /**
     * @inheritdoc
     */
    public function append(string $path, string $content): void
    {
        sleep(5); // simulation of slowness

        file_put_contents($path, $content, FILE_APPEND | LOCK_EX);
    }

    /**
     * @inheritdoc
     */
    public function exists(string $path): bool
    {
        return file_exists($path);
    }

    /**
     * @inheritdoc
     */
    public function load(string $path): string
    {
        if (!$this->exists($path)) {
            throw new \RuntimeException(sprintf('File "%s" not exists', $path));
        }

        return file_get_contents($path);
    }
}
