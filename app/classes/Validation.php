<?php

namespace app\classes;

final class Validation
{
    private $validate = [];

    public function validate($sent)
    {
        foreach ($sent as $key => $value) {

            $this->validate[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }

        return (object) $this->validate;
    }

}
