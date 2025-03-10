<?php
    require_once __DIR__ . '/DBInterface.php';
    class MySqliDriver implements DBInterface
    {
        private $conn;
        
        /**
         * COnnecta amb la bd
         * @param mixed $config Array de les credencials per conectar amb la bd
         * @return void
         */
        public function connect($config)
        {
            $this->conn = new mysqli('localhost', $config['dbuser'], $config['dbpswd'], $config['dbname']);

            if ($this->conn->connect_errno)
            {
                echo $this->conn->connect_error;
                die;
            }
        }

        /**
         * Retorna el mysqli_reesult (sense convertir en array ni res)
         * @param mixed $sql Consulta a la bd
         * @return bool|mysqli_stmt
         */
        public function query($sql, $params = [])
        {
            $stmt = $this->conn->prepare($sql);

            if (!empty($params))
            {
                $types = str_repeat('s', count($params));
                $stmt->bind_param($types, ...$params);
            }

            $stmt->execute();

            return $stmt;
        }

        /**
         * Retorna els resultats com un array associatiu
         * @param mysqli_stmt $stmt Array de resultats
         */
        public function fetchAll($stmt)
        {
            $result = $stmt->get_result();
            $rows = [];

            while ($row = $result->fetch_assoc())
            {
                $rows[] = $row;
            }

            return $rows;
        }

        /**
         * Retorna només un resultat
         * @param mysqli_result $queryResult Resultat
         */
        public function fetchOne($queryResult)
        {
            return $queryResult->fetch_assoc();
        }

        /**
         * Tanca la connexió
         * @return void
         */
        public function close()
        {
            $this->conn->close();
        }
    }
