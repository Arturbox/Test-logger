<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;
use Logger\Interface\LoggerInterface;
use Logger\Interface\LogHandlerInterface;
use Logger\LogLevel;
use mysql_xdevapi\Exception;

class FakeHandler implements LogHandlerInterface, LoggerInterface
{

    /**
     * @param int $levelCode
     * @return bool
     */
    public function supportLevel(int $levelCode): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return true;
    }

    /**
     * @param bool $isEnabled
     * @return void
     */
    public function setIsEnabled(bool $isEnabled)
    {

    }

    /**
     * @param int $levelCode
     * @param string $msg
     * @return void
     */
    public function log(int $levelCode, string $msg)
    {

    }

    /**
     * @param string $msg
     * @return void
     */
    public function error(string $msg)
    {

    }

    /**
     * @param string $msg
     * @return void
     */
    public function info(string $msg)
    {

    }

    /**
     * @param string $msg
     * @return void
     */
    public function debug(string $msg)
    {

    }

    /**
     * @param string $msg
     * @return void
     */
    public function notice(string $msg)
    {

    }

}