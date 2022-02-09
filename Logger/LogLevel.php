<?php

namespace Logger;

class LogLevel
{
    const LEVEL_ERROR = 400;

    const LEVEL_INFO = 200;

    const LEVEL_DEBUG = 100;

    const LEVEL_NOTICE = 250;

    public static array $levels = [
        self::LEVEL_DEBUG => 'DEBUG',
        self::LEVEL_INFO => 'INFO',
        self::LEVEL_ERROR => 'ERROR',
        self::LEVEL_NOTICE => 'NOTICE',
    ];

}