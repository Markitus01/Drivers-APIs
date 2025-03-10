<?php 
    // https://www.w3schools.com/php/php_oop_interfaces.asp

    /**
     * Una interface per evitar el haber de fer canvis als models (com al projecte 1 de m12), i per tant reaprofitar 
     * més codi, si no em veia obligat a fer o bé models molt grans, o diversos models per a cada driver utilitzable
     * per a la base de dades.
     */
    interface DBInterface
    {
        public function connect($config);
        public function query($sql);
        public function fetchAll($queryResult);
        public function fetchOne($queryResult);
        public function close();
    }