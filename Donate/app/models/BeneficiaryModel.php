<?php

    class BeneficiaryModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getRequests(){
            $this->db->query('SELECT * FROM requests');
            $results = $this->db->resultSet();
            return $results;
        }

        public function addRequest($data){
            $this->db->query('INSERT INTO requests (id,categories,description,quantity,type,contact,city,duedate) VALUES(:id, :categories, :description, :quantity, :type, :contact, :city, :duedate)');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':categories', $data['categories']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':duedate', $data['duedate']);
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
    }