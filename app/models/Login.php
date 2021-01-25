<?php

namespace app\models;

final class Login
{

    public static function removeAccents(string $fullname)
    {
        return preg_replace(
            array("/(á|à|ã|â|ä)/",
                "/(Á|À|Ã|Â|Ä)/",
                "/(é|è|ê|ë)/",
                "/(É|È|Ê|Ë)/",
                "/(í|ì|î|ï)/",
                "/(Í|Ì|Î|Ï)/",
                "/(ó|ò|õ|ô|ö)/",
                "/(Ó|Ò|Õ|Ô|Ö)/",
                "/(ú|ù|û|ü)/",
                "/(Ú|Ù|Û|Ü)/",
                "/(ñ)/",
                "/(Ñ)/",
                "/(ç)/",
                "/(Ç)/"), explode(" ", "a A e E i I o O u U n N c C"), $fullname);
    }

    public static function takeFirstName(string $filteredfullname)
    {
        $firstname = explode(" ", strtolower($filteredfullname));

        return $firstname[0];
    }

    public function createLogin($id, $name)
    {
        return $id . self::takeFirstName(self::removeAccents($name));
    }

}
