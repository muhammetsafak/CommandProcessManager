<?php

namespace CommandProcessManager\Interfaces;

use CommandProcessManager\Exceptions\ProcessOpened;

interface ProcessInterface
{

    /**
     * @param string $command
     * @throws ProcessOpened
     */
    public function __construct(string $command);

    /**
     * @return void
     */
    public function __destruct();

    /**
     * @param int|null $length
     * @param int $offset
     * @return string|false
     */
    public function getContents(?int $length = null, int $offset = -1);

    /**
     * @return void
     */
    public function close(): void;

}
