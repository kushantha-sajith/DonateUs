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
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description,  donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, categories.category_name FROM donation_req INNER JOIN categories ON donation_req.cat_id = categories.id ORDER BY donation_req.id DESC');
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
            }elseif($user_type==5){
                $this->db->query('SELECT * FROM org_ben WHERE user_id = :id');
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
            
            }elseif($user_type==6){
                $this->db->query('SELECT district FROM event_org WHERE user_id = :id');
                $this->db->bind(':id', $id);
                $row = $this->db->single();
                $dist_id = $row->district;
                
            }else{
                $dist_id = $id;
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

        public function updateProfileDonor($data){
                    
            $zero ='1';
            $ind = '2'; 

            $this->db->query('SELECT * FROM reg_user WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $row2 = $this->db->single();
                $tp_existing = $row2->tp_number;
                $tp_new_ind = $data['contact_ind'];
                $tp_new_corp = $data['contact_corp'];
                
                $this->db->query('UPDATE reg_user SET backup = :tp_backup WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':tp_backup', $tp_existing);
                
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

                $this->db->query('UPDATE reg_user SET tp_number = :tp_number, otp_code = :otp_code, otp_verify = :otp_verify WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':tp_number', $tp_new_ind);
                $this->db->bind(':otp_code', $data['otp_code']);
                $this->db->bind(':otp_verify', $data['otp_verify']);

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

                $this->db->query('UPDATE reg_user SET tp_number = :tp_number, otp_code = :otp_code, otp_verify = :otp_verify WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':tp_number', $tp_new_corp);
                $this->db->bind(':otp_code', $data['otp_code']);
                $this->db->bind(':otp_verify', $data['otp_verify']);

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

    public function passwordChecker($password, $id){

        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);
        
        $row = $this->db->single();
        $hashed_password = $row->password;
        
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
                   
    }

   public function changePassword($data, $id){

    $this->db->query('SELECT * FROM reg_user WHERE id = :id');
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    $hashed_password = $row->password;

    $this->db->query('UPDATE reg_user SET backup = :password_backup WHERE id = :id');
    $this->db->bind(':id', $id);
    $this->db->bind(':password_backup', $hashed_password);

    if($this->db->execute()){
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

    } else {
        return false;
    }

    

    }

    public function getDonationHistory($id){
        $this->db->query('SELECT donation_history.id, donation_history.time_stamp, donation_history.req_id, donation_req.request_title, donation_req.cat_id, categories.category_name  FROM donation_history JOIN donation_req ON donation_history.req_id = donation_req.id JOIN categories ON donation_req.cat_id = categories.id WHERE donation_history.don_id = :id ORDER BY donation_history.id DESC');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFilteredHistory($id, $category){

        if($category==0){
            $this->db->query('SELECT donation_history.id, donation_history.time_stamp, donation_history.req_id, donation_req.request_title, donation_req.cat_id, categories.category_name  FROM donation_history JOIN donation_req ON donation_history.req_id = donation_req.id JOIN categories ON donation_req.cat_id = categories.id WHERE donation_history.don_id = :id AND donation_req.cat_id != "1" ORDER BY donation_history.id DESC');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }else{
            $this->db->query('SELECT donation_history.id, donation_history.time_stamp, donation_history.req_id, donation_req.request_title, donation_req.cat_id, categories.category_name  FROM donation_history JOIN donation_req ON donation_history.req_id = donation_req.id JOIN categories ON donation_req.cat_id = categories.id WHERE donation_history.don_id = :id AND donation_req.cat_id = :category ORDER BY donation_history.id DESC');
            $this->db->bind(':id', $id);
            $this->db->bind(':category', $category);
            $results = $this->db->resultSet();
            return $results;
        }
        
    }

    public function getTotalDonations($id){
        $this->db->query('SELECT * FROM donation_history WHERE don_id = :don_id');
        $this->db->bind(':don_id', $id);
        $row = $this->db->single();
        $count = $this->db->rowCount();
        return $count;
    }

    public function getTotalFDonations($id){

    }

    public function getTotalNDonations($id){

    }

    public function getEventRequests(){
        $this->db->query('SELECT events.id, events.event_title, events.description, events.published_date, events.due_date, events.budget, events.received, events.proof_letter, events.event_org_id, event_org.community_name FROM events INNER JOIN event_org ON events.event_org_id = event_org.id ORDER BY events.id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getOrgRequests(){
        $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description, donation_req.cat_id, donation_req.proof_document, donation_req.user_id, org_ben.org_name, org_ben.city, org_ben.district FROM donation_req INNER JOIN org_ben ON donation_req.user_id = org_ben.user_id WHERE donation_req.cat_id ="99" ORDER BY donation_req.id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getReservations($id){
        $this->db->query('SELECT date, month, year, meal, status, ben_id FROM reservation WHERE ben_id = :ben_id');
        $this->db->bind(':ben_id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function disableAccount($id,$user_type){

        if($user_type ==2){
            $this->db->query('UPDATE ind_don SET acc_status = :status WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':status', 0);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }else{
            $this->db->query('UPDATE corp_don SET acc_status = :status WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':status', 0);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }
        
    }

    public function setToDefault($id,$field){
        $this->db->query('SELECT * FROM reg_user WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            //0 for password
            //1 for tp_number
            //2 for (next critical field...)
            if($field == 0){
                $old_password = $row->backup;

            $this->db->query('UPDATE reg_user SET password = :password, otp_code = :otp_code, otp_verify = :otp_verify, backup = :backup WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':password', $old_password);
            $this->db->bind(':otp_code', '');
            $this->db->bind(':otp_verify', 1);
            $this->db->bind(':backup', '');
            }else{
                $old_tp_number = $row->backup;

            $this->db->query('UPDATE reg_user SET tp_number = :tp_number, otp_code = :otp_code, otp_verify = :otp_verify, backup = :backup WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':tp_number', $old_tp_number);
            $this->db->bind(':otp_code', '');
            $this->db->bind(':otp_verify', 1);
            $this->db->bind(':backup', '');
            }
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
    }

    public function getFilteredRequests($category){

        if($category==0){
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description,  donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, categories.category_name, nfinancial_req.quantity, nfinancial_req.received_quantity FROM donation_req JOIN categories ON donation_req.cat_id = categories.id JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id WHERE donation_req.cat_id != "1" ORDER BY donation_req.id DESC');
            $results = $this->db->resultSet();
            return $results;
        }else if($category==1){
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description,  donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, categories.category_name, financial_req.total_amount, financial_req.received_amount FROM donation_req JOIN categories ON donation_req.cat_id = categories.id JOIN financial_req ON donation_req.id = financial_req.req_id WHERE donation_req.cat_id = "1" ORDER BY donation_req.id DESC');
            $results = $this->db->resultSet();
            return $results;
        }else{
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description,  donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, categories.category_name, nfinancial_req.quantity, nfinancial_req.received_quantity FROM donation_req JOIN categories ON donation_req.cat_id = categories.id JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id WHERE donation_req.cat_id = :category ORDER BY donation_req.id DESC');
            $this->db->bind(':category', $category);
            $results = $this->db->resultSet();
            return $results;
        }
        
    }

    public function getRequestDetails($id, $category){
        if($category==1){
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description,  donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, categories.category_name, financial_req.total_amount, financial_req.received_amount, ind_ben.f_name, ind_ben.l_name FROM donation_req JOIN categories ON donation_req.cat_id = categories.id JOIN financial_req ON donation_req.id = financial_req.req_id JOIN ind_ben ON donation_req.user_id = ind_ben.user_id WHERE donation_req.id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }else{
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description,  donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, categories.category_name, nfinancial_req.quantity, nfinancial_req.received_quantity, ind_ben.f_name, ind_ben.l_name FROM donation_req JOIN categories ON donation_req.cat_id = categories.id JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id JOIN ind_ben ON donation_req.user_id = ind_ben.user_id WHERE donation_req.id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }
    }

    public function getEventDetails($id){
        $this->db->query('SELECT events.id, events.event_title, events.description, events.published_date, events.due_date, events.budget, events.received, events.proof_letter, events.event_org_id, event_org.community_name, event_org.city FROM events JOIN event_org ON events.event_org_id = event_org.id WHERE events.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
        
    }

    public function getOrgRequestDistricts(){
        $this->db->query('SELECT DISTINCT org_ben.district, district.dist_name FROM donation_req JOIN org_ben ON donation_req.user_id = org_ben.user_id JOIN district ON org_ben.district = district.id WHERE donation_req.cat_id ="99" ORDER BY org_ben.district ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getEventRequestDistricts(){
        $this->db->query('SELECT DISTINCT event_org.district, district.dist_name FROM events JOIN event_org ON events.event_org_id = event_org.id JOIN district ON event_org.district = district.id ORDER BY event_org.district ASC');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFilteredReservations($id){
        $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.description, donation_req.cat_id, donation_req.proof_document, donation_req.user_id, org_ben.org_name, org_ben.city, org_ben.district FROM donation_req INNER JOIN org_ben ON donation_req.user_id = org_ben.user_id WHERE donation_req.cat_id ="99" AND org_ben.district = :id ORDER BY donation_req.id DESC');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFilteredEvents($id){
        $this->db->query('SELECT events.id, events.event_title, events.description, events.published_date, events.due_date, events.budget, events.received, events.proof_letter, events.event_org_id, event_org.community_name, event_org.district FROM events INNER JOIN event_org ON events.event_org_id = event_org.id WHERE event_org.district = :id ORDER BY events.id DESC');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function makeReservationDonor($data){

        $this->db->query('INSERT INTO reservation (date, month, year, meal, amount, time_stamp, status, don_id, ben_id) VALUES (:date, :month, :year, :meal_type, :amount_reserved, CURRENT_TIMESTAMP, :status, :don_id, :ben_id)');

            $this->db->bind(':date', $data['date']);
            $this->db->bind(':month', $data['month']);
            $this->db->bind(':year', $data['year']);
            $this->db->bind(':meal_type', $data['meal_type']);
            $this->db->bind(':amount_reserved', $data['amount_reserved']);
            $this->db->bind(':status', $data['status']);
            $this->db->bind(':don_id', $data['don_id']);
            $this->db->bind(':ben_id', $data['ben_id']);

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
    }

    public function getMyReservations($user_id){
        $this->db->query('SELECT reservation.id, reservation.date, reservation.month, reservation.year, reservation.meal, reservation.amount, reservation.status, org_ben.org_name FROM reservation INNER JOIN org_ben ON reservation.ben_id = org_ben.user_id WHERE reservation.don_id = :id ORDER BY reservation.id DESC');
        $this->db->bind(':id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function markDeliveredReservation($reservation_id){

        $this->db->query('UPDATE reservation SET status = :status WHERE id = :id');
            $this->db->bind(':id', $reservation_id);
            $this->db->bind(':status', 2);
           
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
    }

    public function markCancelledReservation($reservation_id){

        $this->db->query('UPDATE reservation SET status = :status WHERE id = :id');
            $this->db->bind(':id', $reservation_id);
            $this->db->bind(':status', 4);
           
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
    }

    public function getMyReservationsOrgs($user_id){
        $this->db->query('SELECT DISTINCT reservation.ben_id, org_ben.org_name FROM reservation JOIN org_ben ON reservation.ben_id = org_ben.user_id WHERE reservation.don_id = :id ORDER BY reservation.id DESC');
        $this->db->bind(':id', $user_id);
        $results = $this->db->resultSet();
        return $results;
    }

    public function getFilteredMyReservations($user_id,$ben_id){
        $this->db->query('SELECT reservation.id, reservation.date, reservation.month, reservation.year, reservation.meal, reservation.amount, reservation.status, org_ben.org_name FROM reservation INNER JOIN org_ben ON reservation.ben_id = org_ben.user_id WHERE reservation.don_id = :don_id AND reservation.ben_id = :ben_id ORDER BY reservation.id DESC');
        $this->db->bind(':don_id', $user_id);
        $this->db->bind(':ben_id', $ben_id);
        $results = $this->db->resultSet();
        return $results;
    }
}