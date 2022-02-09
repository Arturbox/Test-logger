<?php

namespace Logger\Formatters;

class LineFormatter
{
    private const DEF_TMP = '[%date%] [%level%] %message%';
    private const DEF_DATE = "Y-m-d H:i:s";

    private const MACROS = ['%date%', '%level%', '%level_code%', '%message%'];

    private string $msgTmp;

    private string $date;


    public function __construct(string $msgTmp = self::DEF_TMP, string $date = self::DEF_DATE)
    {
        $this->msgTmp = $msgTmp;
        $this->date = $date;
    }

    public function format(string $message, int $levelCode, string $levelInfo) : string
    {
        return str_replace(self::MACROS, [$message, $levelCode, $levelInfo, date($this->date)], $this->msgTmp);
    }

}