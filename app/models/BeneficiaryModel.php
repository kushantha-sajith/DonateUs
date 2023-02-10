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

        // /**
        //  * @return mixed
        //  */
        // public function getUserData($id){
        //     $this->db->query('SELECT * FROM beneficiary WHERE id = :id');
        //     $this->db->bind(':id', $id);
        //     $results = $this->db->resultSet();
        //     return $results;
        // }

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

        // /**
        //  * @param $id
        //  * @return mixed
        //  */
        // public function getCategoryById($id){
        //     $this->db->query('SELECT * FROM categories WHERE id = :id');
        //     $this->db->bind(':id', $id);
        //     $row = $this->db->single();
        //     return $row;
        // }




        public function getRequests(){
            $this->db->query('SELECT * FROM donation_req');
            $results = $this->db->resultSet();
            return $results;
        }



        public function addRequest($data){
            $this->db->query('INSERT INTO donation_req(id,categories,description,quantity,type,contact,city,duedate) VALUES(:id, :categories, :description, :quantity, :type, :contact, :city, :duedate)');
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



        public function editRequest($data){
            $this->db->query('UPDATE donation_req SET categories= :categories, description= :description, quantity= :quantity, type= :type, contact= :contact, city= :city, duedate= :duedate WHERE id = :id'); 
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


        public function getRequestById($id){

            $this->db->query('SELECT * FROM donation_req WHERE id = :id');
            $this->db->bind(':id',$id);
            
            $row = $this->db->single();

            return $row;
        }

    }