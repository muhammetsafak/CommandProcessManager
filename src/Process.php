<?php

namespace CommandProcessManager;

use CommandProcessManager\Exceptions\ProcessOpened;
use CommandProcessManager\Interfaces\ProcessInterface;

use function stream_get_contents;
use function proc_open;
use function is_resource;
use function fclose;

class Process implements ProcessInterface
{

    /**
     * @var false|resource
     */
    protected $process;

    /**
     * @var array[]
     */
    protected array $descriptorspec = [
        ['pipe', 'r'], // stdin
        ['pipe', 'w'], // stdout
        ['pipe', 'w'], // stderr
    ];

    /**
     * @var resource[]
     */
    protected $pipes;

    /**
     * @inheritDoc
     */
    public function __construct(string $command)
    {
        $this->process = proc_open($command, $this->descriptorspec, $this->pipes);
        if (!is_resource($this->process)) {
            throw new ProcessOpened('Failed to start "' . $command . '" command process.');
        }
    }

    /**
     * @inheritDoc
     */
    public function __destruct()
    {
        $this->close();
        unset($this->process, $this->descriptorspec, $this->pipes);
    }

    /**
     * @inheritDoc
     */
    public function getContents(?int $length = null, int $offset = -1)
    {
        return isset($this->pipes[1]) ? stream_get_contents($this->pipes[1], $length, $offset) : false;
    }

    /**
     * @inheritDoc
     */
    public function close(): void
    {
        isset($this->pipes[0]) && fclose($this->pipes[0]);
        isset($this->pipes[1]) && fclose($this->pipes[1]);
        isset($this->pipes[2]) && fclose($this->pipes[2]);
        proc_close($this->process);
    }

}
