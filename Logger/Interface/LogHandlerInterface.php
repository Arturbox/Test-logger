<?php

namespace Logger\Interface;

interface LogHandlerInterface
{

    /**
     * @param int $levelCode
     * @return bool
     */
    public function supportLevel(int $levelCode): bool;

    /**
     * @return bool
     */
    public function isEnabled(): bool;


    /**
     * @param bool $isEnabled
     * @return void
     */
    public function setIsEnabled(bool $isEnabled);

}