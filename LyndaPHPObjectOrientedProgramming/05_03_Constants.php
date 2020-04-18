<?php


class Clock
{

    public const DAY_IN_SECONDS = 60 * 60 * 24;

    public function tomorrow ()
    {
        //Time() regular PHP function, returns the time in Unix seconds, it's Unix time, the number of seconds since 1970
        //Importante poner el self, si no no lo reconoce como la constante de clase
        return time() + self::DAY_IN_SECONDS;
    }
}

echo Clock::DAY_IN_SECONDS . "<br />";

$clock = new Clock;
echo $clock->tomorrow() . "<br />";


