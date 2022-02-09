<?php

namespace Logger;

use Logger\Interface\LoggerInterface;
use Logger\Interface\LogHandlerInterface;

class Logger implements LoggerInterface
{
    /**
     * @var LogHandlerInterface[]
     */
    private array $handlers;


    /**
     * @param LogHandlerInterface $logHandler
     * @return void
     */
    public function addHandler(LogHandlerInterface $logHandler)
    {
        $this->handlers[] = $logHandler;
    }

    /**
     * @param int $levelCode
     * @param string $msg
     * @return void
     */
    public function log(int $levelCode, string $msg)
    {
        foreach ($this->handlers as $handler) {
            if ($handler->supportLevel($levelCode) && $handler->isEnabled()) {
                $handler->log($levelCode, $msg);
            }
        }
    }

    /**
     * @param string $msg
     * @return void
     */
    public function error(string $msg)
    {
        $this->log(LogLevel::LEVEL_ERROR, $msg);
    }

    /**
     * @param string $msg
     * @return void
     */
    public function info(string $msg)
    {
        $this->log(LogLevel::LEVEL_INFO, $msg);
    }

    /**
     * @param string $msg
     * @return void
     */
    public function debug(string $msg)
    {
        $this->log(LogLevel::LEVEL_DEBUG, $msg);
    }

    /**
     * @param string $msg
     * @return void
     */
    public function notice(string $msg)
    {
        $this->log(LogLevel::LEVEL_NOTICE, $msg);
    }
}