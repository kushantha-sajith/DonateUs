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

        public function getDonationRequests(){
            $this->db->query('SELECT * FROM donation_req');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getFinancialRequests(){
            $this->db->query('SELECT * FROM financial_req');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getNonFinancialRequests(){
            $this->db->query('SELECT * FROM nfinancial_req');
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

            $this->db->query('SELECT * FROM reg_user WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $row2 = $this->db->single();
                $tp_existing = $row2->tp_number;
                $tp_new_ind = $data['contact_ind'];
                $tp_new_corp = $data['contact_corp'];

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

                $this->db->query('SELECT * FROM reg_user WHERE tp_number = :tp_number');
                // Bind value
                $this->db->bind(':tp_number', $data['contact_ind']);
                $row3 = $this->db->single();
                 // Check row
                if ($this->db->rowCount() > 0) {
                    $tp_new_ind = $tp_existing; 
                }else{
                    if(empty($data['contact_ind'])){
                        $tp_new_ind = $tp_existing; 
                        
                    }
                }

                $this->db->query('UPDATE reg_user SET tp_number = :tp_number WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':tp_number', $tp_new_ind);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
            }else{

                $this->db->query('SELECT * FROM corp_don WHERE user_id = :id');
                $this->db->bind(':id', $data['id']);
                $row4 = $this->db->single();
                
                if(empty($data['comp_name'])){
                    $data['comp_name'] = $row4->comp_name; 
                }
                if(empty($data['city'])){
                    $data['city'] = $row4->city; 
                }
                if($data['district'] == $zero){
                    $data['district'] = $row4->district; 
                }
            
                if(empty($data['emp_name'])){
                    $data['emp_name'] = $row4->emp_name; 
                }
                if(empty($data['emp_id'])){
                    $data['emp_id'] = $row4->emp_id; 
                }
                if(empty($data['desg'])){
                    $data['desg'] = $row4->designation; 
                }
            
            $this->db->query('UPDATE corp_don SET comp_name = :comp_name, emp_name = :emp_name, emp_id = :emp_id, designation = :designation, city = :city, district = :district WHERE user_id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':comp_name', $data['comp_name']);
            $this->db->bind(':emp_name', $data['emp_name']);
            $this->db->bind(':emp_id', $data['emp_id']);
            $this->db->bind(':designation', $data['desg']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':district', $data['district']);

            if($this->db->execute()){
            $this->db->query('SELECT * FROM reg_user WHERE tp_number = :tp_number');
                // Bind value
                $this->db->bind(':tp_number', $data['contact_corp']);
                $row3 = $this->db->single();
                 // Check row
                if ($this->db->rowCount() > 0) {
                    $tp_new_corp = $tp_existing; 
                }else{
                    if(empty($data['contact_ind'])){
                        $tp_new_corp = $tp_existing; 
                        
                    }
                }

                $this->db->query('UPDATE reg_user SET tp_number = :tp_number WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':tp_number', $tp_new_corp);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
            }
            
    }

    public function passwordChecker($password, $id,$is_quit){

        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();
        $hashed_password = $row->password;
        if ($this->db->execute()) {

            $this->db->query('UPDATE reg_user SET password_reset_hash = :password_reset_hash WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':password_reset_hash', $hashed_password);
            // $2y$10$tuB0gpPLLHx4w1VVzrDU7.oxVREi/aRH6KCA3EVtq1pSIPjxh4N7K
        }
        if($is_quit){

            $this->db->query('SELECT * FROM reg_user WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            $old_password = $row->password_reset_hash;

            $this->db->query('UPDATE reg_user SET password = :password, otp_code = :otp_code, otp_verify = :otp_verify, password_reset_hash = :password_reset_hash WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':password', $old_password);
            $this->db->bind(':otp_code', '');
            $this->db->bind(':otp_verify', 1);
            $this->db->bind(':password_reset_hash', '');

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }else{
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        }

       
    }

   public function change_password($data, $id){

    $this->db->query('UPDATE reg_user SET password = :password, otp_code = :otp_code, otp_verify = :otp_verify WHERE id = :id');
    $this->db->bind(':id', $id);
    $this->db->bind(':password', $data['new_password']);
    $this->db->bind(':otp_code', $data['otp_code']);
    $this->db->bind(':otp_verify', $data['otp_verify']);

    if($this->db->execute()){
        return true;
    } else {
        return false;
    }

    }
}