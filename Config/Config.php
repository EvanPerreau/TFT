<?php

namespace Config;

use Exception;

class Config {
    /**
     * @var array|null Stores the configuration parameters.
     */
    private static ?array $param;

    /**
     * Retrieves a configuration parameter by name.
     *
     * @param  string  $nom  The name of the parameter to retrieve.
     * @param  mixed|null  $valeurParDefaut  The default value to return if the parameter is not found.
     * @return mixed The value of the configuration parameter, or the default value if not found.
     *
     * @throws Exception If no configuration file is found.
     */
    public static function get(string $nom, mixed $valeurParDefaut = null): mixed
    {
        if (isset(self::getParameter()[$nom])) {
            $valeur = self::getParameter()[$nom];
        } else {
            $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    /**
     * Loads and returns the configuration parameters from a file.
     *
     * @return array|null The configuration parameters.
     * @throws Exception If no configuration file is found.
     */
    private static function getParameter(): ?array
    {
        if (self::$param == null) {
            $cheminFichier = "Config/prod.ini";
            if (!file_exists($cheminFichier)) {
                $cheminFichier = "Config/dev.ini";
            }
            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé");
            } else {
                self::$param = parse_ini_file($cheminFichier);
            }
        }
        return self::$param;
    }
}