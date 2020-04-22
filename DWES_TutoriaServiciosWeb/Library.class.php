<?php


class Library
{
    public function eightBall ()
    {
        $options = array(
            "Without a doubt",
            "Comome el coño",
        );

        return $options[array_rand($options)];
    }
}