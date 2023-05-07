<?php

    class BeneficiaryModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        /**
         * @return mixed
         */
        public function getFeedback(){
            $this->db->query('SELECT * FROM feedback');
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        /**
         * @param $data
         * @return bool
         */
        public function addFeedback($data){
            $this->db->query('INSERT INTO feedback (description) VALUES(:description)');
            // Bind values
           
            $this->db->bind(':description', $data['desc']);
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
         * @return mixed
         */
        public function getRequests(){
            $this->db->query('SELECT * FROM donation_req');
            $results = $this->db->resultSet();
            return $results;
        }

        /**
         * @param $data
         * @return bool
         */
        public function addRequest($data){
            $this->db->query('INSERT INTO donation_req (description, name, quantity, duedate, title, city, contact, cat_id, user_id) VALUES(:description,  :name, :quantity, :duedate, :title, :city, :contact, :cat_id, :user_id)');
            // Bind values
=======


        public function addFeedback($data){
            $this->db->query('INSERT INTO feedback (description) VALUES(:description)');
            // Bind values
           
            $this->db->bind(':description', $data['desc']);
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




        public function getRequests(){
            $this->db->query('SELECT * FROM donation_req');
            $results = $this->db->resultSet();
            return $results;
        }



        public function addRequest($data){
            $this->db->query('INSERT INTO donation_req (description, name, quantity, duedate, title, city, contact, cat_id, user_id) VALUES(:description,  :name, :quantity, :duedate, :title, :city, :contact, :cat_id, :user_id)');
            // Bind values
>>>>>>> Stashed changes
           // $this->db->bind(':id', $data['id']);
           $this->db->bind(':title', $data['title']);
           $this->db->bind(':name', $data['name']);
           $this->db->bind(':quantity', $data['quantity']);
           $this->db->bind(':description', $data['description']);
           $this->db->bind(':cat_id', $data['cat_id']);
           $this->db->bind(':city', $data['city']); 
           $this->db->bind(':contact', $data['contact']);
           $this->db->bind(':duedate', $data['duedate']);
           $this->db->bind(':user_id', $data['user_id']);
            
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

<<<<<<< Updated upstream
        /**
         * @param $data
         * @return bool
         */
=======


>>>>>>> Stashed changes
        public function editRequest($data){
            $this->db->query('UPDATE donation_req SET title= :title, name= :name, description= :description, quantity= :quantity, cat_id= :cat_id, user_id= :user_id, contact= :contact, city= :city, duedate= :duedate WHERE id = :id'); 
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':title', $data['title']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':cat_id', $data['cat_id']);
            $this->db->bind(':user_id', $data['user_id']);
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

<<<<<<< Updated upstream
        /**
         * @param $id
         * @return bool
         */
=======


>>>>>>> Stashed changes
        public function deleteRequest($id){
            $this->db->query('DELETE FROM donation_req WHERE id = :id');
            //bind values
            $this->db->bind(':id',$id);

            //execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

<<<<<<< Updated upstream
        /**
         * @param $id
         * @return mixed
         */
=======


>>>>>>> Stashed changes
        public function getRequestById($id){

            $this->db->query('SELECT * FROM donation_req WHERE id = :id');
            $this->db->bind(':id',$id);
            
            $row = $this->db->single();

            return $row;
        }

<<<<<<< Updated upstream
        /**
         * @return mixed
         */
=======
        

>>>>>>> Stashed changes
        public function getCategories(){
            $this->db->query('SELECT * FROM categories');
            $results = $this->db->resultSet();
            return $results;
          }

    }