<?php
    require_once __DIR__ . '/../db/DBFactory.php';

    class PersonesModel
    {
        private $db;
        private $persones;
    
        public function __construct($tipusBD = 'mysqli')
        {
            $credencials = include __DIR__ . '/../configs/credentials.php';

            $this->db = DBFactory::utilitzar($tipusBD);
            $this->db->connect($credencials);

            $this->persones = array();
        }

        public function getPersones()
        {
            $sql = "SELECT * FROM persones";
            $query = $this->db->query($sql);

            $this->persones = $this->db->fetchAll($query);

            return $this->persones;
        }

        public function __destruct()
        {
            $this->db->close();
        }
    }