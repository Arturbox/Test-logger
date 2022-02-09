<?php

namespace Logger\Handlers;

use Logger\Formatters\LineFormatter;
use Logger\Interface\LoggerInterface;
use Logger\Interface\LogHandlerInterface;
use Logger\LogLevel;

class SysLogHandler implements LogHandlerInterface, LoggerInterface
{
    const SYS_LOG_PREFIX = 'error';

    /**
     * @var bool
     */
    private bool $enabled;

    /**
     * @var array
     */
    private array $levels;

    /**
     * @var LineFormatter
     */
    private LineFormatter $formatter;

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->enabled = $data['is_enabled'] ?? true;
        $this->levels = $data['levels'] ?? [];
        $this->formatter = $data['formatter'] ?? new LineFormatter();
    }


    public function __destruct()
    {
        closelog();
    }

    /**
     * @param int $levelCode
     * @return bool
     */
    public function supportLevel(int $levelCode): bool
    {
        return in_array($levelCode, $this->levels);
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $isEnabled
     * @return void
     */
    public function setIsEnabled(bool $isEnabled)
    {
        $this->enabled = $isEnabled;
    }

    /**
     * @param int $levelCode
     * @param string $msg
     * @return void
     */
    public function log(int $levelCode, string $msg)
    {
        $newLine = $this->formatter->format($msg, $levelCode, LogLevel::$levels[$levelCode]);

        syslog(LOG_ERR, $newLine);

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