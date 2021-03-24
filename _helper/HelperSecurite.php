<?php
class HelperSecurite
{
    // attribut
    private static $singleton;

    //méthodes
    /**
     * @return HelperSecurite
     */
    public static function getSingleton(): HelperSecurite
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new HelperSecurite();
        }
        return self::$singleton;
    }

    /**
     * Permet de sécuriser une chaine de caractères
     * @param string $string
     * @return string
     */
    public function str_securise(string $string): string
    {
        return trim(htmlspecialchars(($string)));
    }
}
