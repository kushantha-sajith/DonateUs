<?php

    class DonorModel {
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

        /**
         * @return mixed
         */
        public function getUserData($id){
            $this->db->query('SELECT * FROM reg_user WHERE id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getPersonalData($id,$user_type){

            if($user_type==2){
                $this->db->query('SELECT * FROM ind_don WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
            }elseif($user_type==3){
                $this->db->query('SELECT * FROM corp_don WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
            }else{
                $this->db->query('SELECT * FROM event_org WHERE user_id = :id');
                $this->db->bind(':id', $id);
                $results = $this->db->resultSet();
                return $results;
            }
            
        }

        public function getDistrictName($id,$user_type){

            $dist_id;

            if($user_type==2){
                $this->db->query('SELECT district FROM ind_don WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            $dist_id = $row->district;
            
            }elseif($user_type==3){
                $this->db->query('SELECT district FROM corp_don WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            $dist_id = $row->district;
            
            }else{
                $this->db->query('SELECT district FROM event_org WHERE user_id = :id');
                $this->db->bind(':id', $id);
                $row = $this->db->single();
                $dist_id = $row->district;
                
            }

            $this->db->query('SELECT dist_name FROM district WHERE id = :dist_id');
            $this->db->bind(':dist_id', $dist_id);
            $row = $this->db->single();
            $dist = $row->dist_name;
            return $dist;
        }


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
         * @param $id
         * @return mixed
         */
        public function getCategoryById($id){
            $this->db->query('SELECT * FROM categories WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();

            return $row;
        }

        public function update_profile_donor($data){
                    
            $zero ='1';
            $ind = '2'; 

            if($data['type'] == $ind){
                $this->db->query('SELECT * FROM ind_don WHERE user_id = :id');
                $this->db->bind(':id', $data['id']);
                $row = $this->db->single();

                if(empty($data['f_name'])){
                    $data['f_name'] = $row->f_name; 
                    
                }
                if(empty($data['l_name'])){
                    $data['l_name'] = $row->l_name; 
                    
                }
                // if(empty($data['contact_ind'])){
                //     $data['contact_ind'] = $row->tp_number; 
                // }
                if(empty($data['city'])){
                    $data['city'] = $row->city; 
                }
                if($data['district'] == $zero){
                    $data['district'] = $row->district; 
                }

                $this->db->query('UPDATE ind_don SET f_name = :f_name, l_name = :l_name, city = :city, district = :district WHERE user_id = :id');
                $this->db->bind(':id', $data['id']);
            $this->db->bind(':f_name', $data['f_name']);
            $this->db->bind(':l_name', $data['l_name']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':district', $data['district']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
            }else{

                $this->db->query('SELECT * FROM corp_don WHERE user_id = :id' );
                $this->db->bind(':id', $data['id']);
                $row = $this->db->single();
                
                if(empty($data['comp_name'])){
                $data['comp_name'] = $row->comp_name; 
                
            }
            if(empty($data['city'])){
                $data['city'] = $row->city; 
            }
            if($data['district'] == $zero){
                $data['district'] = $row->district; 
            }
            
            if(empty($data['emp_name'])){
                $data['emp_name'] = $row->emp_name; 
            }
            if(empty($data['emp_id'])){
                $data['emp_id'] = $row->emp_id; 
            }
            if(empty($data['desg'])){
                $data['desg'] = $row->designation; 
            }
            if(empty($data['contact_corp'])){
                $data['contact_corp'] = $row->tp_number; 
            }

            $this->db->query('UPDATE corp_don SET comp_name = :comp_name, emp_name = :emp_name, emp_id = :emp_id, designation = :designation, city = :city, district = :district WHERE user_id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':comp_name', $data['compname']);
            $this->db->bind(':emp_name', $data['emp_name']);
            $this->db->bind(':emp_id', $data['empid']);
            $this->db->bind(':designation', $data['desg']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':district', $data['district']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
            }
            
    }
}