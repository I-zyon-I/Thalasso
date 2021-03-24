<?php
class HelperHtml
{
    // attribut
    private static $singleton;

    //méthodes
    /**
     * @return HelperHtml
     */
    public static function getSingleton(): HelperHtml
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new HelperHtml();
        }
        return self::$singleton;
    }

    /**
     * Permet de formater l'affichage des variables 
     * @param $var
     * @return [type]
     */
    public function tagPre($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }
}
