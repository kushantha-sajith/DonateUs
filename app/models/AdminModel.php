<?php

    class AdminModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        /**
         * @return mixed
         */
        public function getCategories(){
            $this->db->query('SELECT * FROM categories');
            $results = $this->db->resultSet();
            return $results;
        }

        /**
         * @param $data
         * @return bool
         */
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

        /**
         * @param $data
         * @return bool
         */
        public function editCategory($data){
            $this->db->query('UPDATE categories SET category_name = :category_name WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':category_name', $data['category_name']);
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        /**
         * @param $id
         * @return bool
         */
        public function deleteCategory($id){
            $this->db->query('DELETE FROM categories WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        /**
         * @param $id
         * @return mixed
         */
        public function getCategoryById($id){
            $this->db->query('SELECT * FROM categories WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            return $row;
        }

        // Find user by email

        /**
         * @param $category_name
         * @return bool
         */
        public function findCategoryByName($category_name){
            $this->db->query('SELECT * FROM categories WHERE category_name = :category_name');
            // Bind value
            $this->db->bind(':category_name', $category_name);

            $row = $this->db->single();

            // Check row
            if($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        public function getUsers(){
            $this->db->query('SELECT * FROM reg_user');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getDonationRequests(){
            $this->db->query('SELECT * FROM donation_req');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getEvents(){
            $this->db->query('SELECT * FROM events');
            $results = $this->db->resultSet();
            return $results;
        }
    }