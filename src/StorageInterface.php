<?php

namespace SocialTech;

interface StorageInterface
{
    /**
     * Store data to file
     *
     * @param string $path
     * @param $content
     * @return void
     */
    public function store(string $path, string $content): void;

    /**
     * Append data to the end of file
     *
     * @param string $path
     * @param string $data
     * @return void
     */
    public function append(string $path, string $content): void;

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
