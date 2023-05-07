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

<<<<<<< Updated upstream
        /**
         * @return mixed
         */
=======
>>>>>>> Stashed changes
        public function getUsers(){
            $this->db->query('SELECT * FROM reg_user');
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        /**
         * @return mixed
         */
=======
>>>>>>> Stashed changes
        public function getDonationRequests(){
            $this->db->query('SELECT * FROM donation_req');
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        /**
         * @return mixed
         */
=======
>>>>>>> Stashed changes
        public function getEvents(){
            $this->db->query('SELECT * FROM events');
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        /**
         * @return mixed
         */
        public function financialDonationHistory(){
            $this->db->query('SELECT dh.id, dr.request_title, r.tp_number, dh.date_of_completion, c.category_name AS category, dh.quantity, dh.amount, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, dr.id as req_id, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, CASE WHEN dh.status = 0 THEN "Pending" WHEN dh.status = 1 THEN "Completed" WHEN dh.status = 2 THEN "Delivered" END AS status FROM donation_history AS dh JOIN reg_user AS r ON dh.don_id = r.id JOIN categories AS c ON dh.category = c.id JOIN donation_req AS dr ON dh.req_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 WHERE dh.type = 0');
=======
        public function financialDonationHistory(){
            $this->db->query('SELECT * FROM donation_history');
>>>>>>> Stashed changes
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        /**
         * @return mixed
         */
        public function nonFinancialDonationHistory(){
            $this->db->query('SELECT dh.id, dr.request_title, r.tp_number, dh.date_of_completion, c.category_name AS category, dh.quantity, dh.quantity, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, dr.id as req_id, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, CASE WHEN dh.status = 0 THEN "Pending" WHEN dh.status = 1 THEN "Completed" WHEN dh.status = 2 THEN "Delivered" END AS status FROM donation_history AS dh JOIN reg_user AS r ON dh.don_id = r.id JOIN categories AS c ON dh.category = c.id JOIN donation_req AS dr ON dh.req_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 WHERE dh.type = 1;');
=======
        public function nonFinancialDonationHistory(){
            $this->db->query('SELECT * FROM donation_history');
>>>>>>> Stashed changes
            $results = $this->db->resultSet();
            return $results;
        }
    }