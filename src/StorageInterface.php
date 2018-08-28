<?php

namespace SocialTech;

interface StorageInterface
{
    /**
     * @param string $path
     * @param $content
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function store(string $path, string $content);

    /**
     * @param string $path
     * @return bool
     */
    public function exists(string $path): bool;

    /**
     * @param string $path
     * @return mixed
     * @throws \RuntimeException
     */
    public function load(string $path): string;
}
