<?php

    class AdminModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getCategories(){
            $this->db->query('SELECT * FROM categories');
            $results = $this->db->resultSet();
            return $results;
        }

        public function addCategory($data){
            $this->db->query('INSERT INTO categories (category_name) VALUES(:category_name)');
            // Bind values
            $this->db->bind(':category_name', $data['category_name']);
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }