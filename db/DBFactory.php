<?php
    require_once __DIR__ . '/MySqliDriver.php';
    /**
     * La factory s'eencarrega d'asignar el driver per a la BD
     */
    class DBFactory
    {
        public static function utilitzar($type)
        {
            switch ($type)
            {
                case 'mysqli':
                    return new MySqliDriver();
                case 'pdo':
                    return new PdoDriver();
                // case 'adodb':
                //     return new AdoDBDriver();
                // case 'odbc':
                //     return new OdbcDriver();
            }
        }
    }
    