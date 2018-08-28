<?php

namespace SocialTech;

class SlowStorage implements StorageInterface
{
    /**
     * @inheritdoc
     */
    public function store(string $path, string $content)
    {
        if (!is_writable($path)) {
            throw new \InvalidArgumentException(sprintf('File "%s" not writable', $path));
        }

        sleep(5); // slow emulation

        file_put_contents($path, $content);
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
