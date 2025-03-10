<?php 
    class PdoDriver implements DBInterface
    {
        private $conn;
    
        /**
         * COnnecta amb la bd
         * @param mixed $config Array de les credencials per conectar amb la bd
         * @return void
         */
        public function connect($config)
        {
            try
            {
                $dsn = "mysql:dbname=$config[dbname];host=localhost";
                $this->conn = new PDO($dsn, $config['dbuser'], $config['dbpswd']);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e)
            {
                die("Connection failed: " . $e->getMessage());
            }
        }
    
        /**
         * Retorna el pdostatement (sense convertir en array ni res)
         * @param mixed $query Consulta a la bd
         * @return bool|PDOStatement
         */
        public function query($query)
        {
            return $this->conn->query($query);
        }
    
        /**
         * Retorna els resultats com un array associatiu
         * @param mixed $queryResult Array de resultats
         */
        public function fetchAll($queryResult)
        {
            return $queryResult->fetchAll(PDO::FETCH_ASSOC);
        }
    
        // Devuelve una sola fila
        public function fetchOne($queryResult)
        {
            return $queryResult->fetch(PDO::FETCH_ASSOC);
        }
    
        public function close()
        {
            $this->conn = null;
        }
    }