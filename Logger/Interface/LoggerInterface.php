<?php

namespace Logger\Interface;

interface LoggerInterface
{
    /**
     * @param string $msg
     * @param int $levelCode
     * @return void
     */
    public function log(int $levelCode, string $msg);

    /**
     * @param string $msg
     * @return void
     */
    public function error(string $msg);

    /**
     * @param string $msg
     * @return void
     */
    public function info(string $msg);

    /**
     * @param string $msg
     * @return void
     */
    public function debug(string $msg);

    /**
     * @param string $msg
     * @return void
     */
    public function notice(string $msg);

}