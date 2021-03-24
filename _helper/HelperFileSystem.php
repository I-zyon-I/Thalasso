<?php
class HelperFileSystem
{
    // attribut
    private static $singleton;

    // Construction du singleton
    public static function getSingleton()
    {
        if (is_null(self::$singleton)) {
            self::$singleton = new HelperFileSystem();
        }

        return self::$singleton;
    }

    /*
        Fonction permettant de retourner un chemin avec les bons 
        séparateur de dossier en fonction de l'os utilisé.
        $postion peut prendre deux valeurs :
            1 - S pour serveur 
            2 - c pour client  
    */
    public function pathCreate(string $position, array $dossiers): string
    {
        // Obtient le chemin racine du projet
        if ($position === "s") {
            $chemin = $_SERVER["DOCUMENT_ROOT"];
        }
        if ($position === "c") {
            $chemin = "";
        }

        foreach ($dossiers as $dossier) {
            $chemin .= DIRECTORY_SEPARATOR . $dossier;
        }

        // Génération d'une chaine de caractères html
        return $chemin . DIRECTORY_SEPARATOR;
    }

    public function fileCreate($fichier): string
    {
        $dossier = dirname($fichier);

        if (!is_dir($dossier)) {
            mkdir($dossier, 0777, true);
        }

        if (!file_exists($fichier)) {
            touch($fichier);
        }

        return $fichier;
    }

    public function fileDelete($fichier): bool
    {
        return unlink($fichier);
    }
}
