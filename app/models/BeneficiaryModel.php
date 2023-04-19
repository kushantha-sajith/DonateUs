<?php

    class BeneficiaryModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }


        public function getTotalDonations($id){
            $this->db->query('SELECT * FROM donation_req WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            $count = $this->db->rowCount();
            return $count;
        }


        public function getTotalReject($id){
            $this->db->query('SELECT * FROM donation_req WHERE status = 2 AND user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            $count = $this->db->rowCount();
            return $count;
        }

        public function getTotalOngoing($id){
            $this->db->query('SELECT * FROM donation_req WHERE status = 1 AND user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            $count = $this->db->rowCount();
            return $count;
        }

        public function getTotalComplete($id){
            $this->db->query('SELECT * FROM donation_req WHERE status = 3 AND user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $row = $this->db->single();
            $count = $this->db->rowCount();
            return $count;
        }



        public function getFeedback(){
            $this->db->query('SELECT * FROM feedback');
            $results = $this->db->resultSet();
            return $results;
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

        public function getDonationHistory($id){
            $this->db->query('SELECT donation_history.id, donation_history.time_stamp, donation_history.req_id, donation_req.request_title, donation_req.cat_id, categories.category_name  FROM donation_history JOIN donation_req ON donation_history.req_id = donation_req.id JOIN categories ON donation_req.cat_id = categories.id WHERE donation_req.user_id = :id ORDER BY donation_history.id DESC');
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




        public function getRequestById($id){

            $this->db->query('SELECT * FROM donation_req WHERE id = :id');
            $this->db->bind(':id',$id);
            
            $row = $this->db->single();

            return $row;
        }

        

        public function getCategories(){
            $this->db->query('SELECT * FROM categories');
            $results = $this->db->resultSet();
            return $results;
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

            if($user_type==4){
                $this->db->query('SELECT * FROM ind_ben WHERE user_id = :id');
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

            if($user_type==4){
                $this->db->query('SELECT district FROM ind_ben WHERE user_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            $dist_id = $row->district;
            
            }elseif($user_type==5){
                $this->db->query('SELECT district FROM org_ben WHERE user_id = :id');
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


        public function deleteProfileBeneficiary($id){
            $this->db->query('DELETE FROM reg_user WHERE id = :id');
            //bind values
            $this->db->bind(':id',$id);

            //execute
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        
        }


     

         // Add Financial Request
  /**
   * @param $data
   * @return bool
   */
    public function addFinancialRequest($data){
       // $type1 = "ind";
       $this->db->query('INSERT INTO donation_req (request_title, name, NIC, description, contact, city, due_date , user_id) VALUES(:request_title, :name, :NIC, :description, :contact, :city, :due_date, :user_id)');
 
       // Bind values
       $this->db->bind(':request_title', $data['title']);
       $this->db->bind(':name', $data['name']);
       $this->db->bind(':NIC', $data['NIC']);
       $this->db->bind(':description', $data['description']);
       $this->db->bind(':contact', $data['contact']);
       $this->db->bind(':city', $data['city']);
    //    $this->db->bind(':proof_document', $data['proof']);
    //    $this->db->bind(':cat_id', $data['cat_id']);
    //    $this->db->bind(':status', $data['status']);
    //    $this->db->bind(':published_date', $data['published_date']);
       $this->db->bind(':due_date', $data['duedate']);
       $this->db->bind(':user_id', $data['user_id']);

            // // Execute
            // if ($this->db->execute()) {

            //     $user_id = $this->db->insert_id();

            //     // $this->db->query('SELECT id FROM reg_user WHERE email = :email');
            //     // $this->db->bind(':email', $data['email_ind']);
            //     // $row = $this->db->single();
            //     // $user_id = $row->id;

            //     $this->db->query('INSERT INTO financial_req (req_id, total_amount, received_amount, bank_acc_number, bank_name) VALUES(:user_id, :total_amount, :received_amount, :bank_acc_number, :bank_name)');

            //     $this->db->bind(':req_id', $user_id);
            //     $this->db->bind(':total_amount', $data['amount']);
            //     $this->db->bind(':received_amount', $data['received_amount']);
            //     // $this->db->bind(':bank_pass_book', $data['passbook']);
            //     $this->db->bind(':bank_acc_number', $data['accnumber']);
            //     $this->db->bind(':bank_name', $data['bankname']);
            //     // // $this->db->bind(':district', $data['district_ind']);
            //     // // $this->db->bind(':acc_status', $data['acc_status']);
            //     // // $this->db->bind(':user_id', $user_id);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
        //     } else {
        //         return false;
            
        // }
    }


           // Add Non Financial Request
  /**
   * @param $data
   * @return bool
   */
    public function addNonFinancialRequest($data){

//         INSERT INTO users (username, email) VALUES ('john.doe', 'john.doe@example.com');
// INSERT INTO orders (user_id, order_date) VALUES (LAST_INSERT_ID(), '2023-03-07');
// $query = "INSERT INTO users (username, email) VALUES ('john.doe', 'john.doe@example.com')";
// $this->db->query($query);


// $query = "INSERT INTO orders (user_id, order_date) VALUES ('$user_id', '2023-03-07')";
// $this->db->query($query);

    $this->db->query('INSERT INTO donation_req (request_title, name, NIC, description, contact, city, cat_id, status, published_date, due_date , user_id, proof_document) VALUES(:request_title, :name, :NIC, :description, :contact, :city, :cat_id, :status, :published_date, :due_date, :user_id, :proof_document)');
  
        // Bind values
       $this->db->bind(':request_title', $data['title']);
       $this->db->bind(':name', $data['name']);
       $this->db->bind(':NIC', $data['NIC']);
       $this->db->bind(':description', $data['description']);
       $this->db->bind(':contact', $data['contact']);
       $this->db->bind(':city', $data['city']);
       $this->db->bind(':proof_document', $data['proof']);
       $this->db->bind(':cat_id', $data['cat_id']);
       $this->db->bind(':status', $data['status']);
       $this->db->bind(':published_date', $data['published_date']);
       $this->db->bind(':due_date', $data['duedate']);
       $this->db->bind(':user_id', $data['user_id']);

             
 
             // Execute
              if ($this->db->execute()) {

                $user_id = $this->db->insert_id();
 
                //  $this->db->query('SELECT id FROM reg_user WHERE email = :email');
                //  $this->db->bind(':email', $data['email_ind']);
                //  $row = $this->db->single();
                //  $user_id = $row->id;
 
                 $this->db->query('INSERT INTO nfinancial_req (req_id, quantity, received_quantity) VALUES(:user_id, :quantity, :received_quantity)');
 
                // $this->db->bind(':req_id', $data['req_id']);
                 $this->db->bind(':req_id', $user_id);
                 $this->db->bind(':quantity', $data['quantity']);
                 $this->db->bind(':received_quantity', $data['received_quantity']);
                 
 
                 if ($this->db->execute()) {
                     return true;
                 } else {
                     return false;
                 }
              } else {
                  return false;
              }
         }



        public function getRequests($id){
            $this->db->query('SELECT * FROM donation_req WHERE user_id = :user_id');
            $this->db->bind(':user_id', $id);
            // $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.NIC, donation_req.description, donation_req.contact, donation_req.city, donation_req.cat_id ,donation_req.status , donation_req.published_date, donation_req.due_date, donation_req.user_id, donation_req.proof_document FROM donation_req INNER JOIN reg_user ON donation_req.user_id=reg_user.id');
            $results = $this->db->resultSet();
            return $results;

        }
        
        public function getFinancialRequest(){
            $this->db->query('SELECT * FROM financial_req');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getNonFinancialRequest(){
            $this->db->query('SELECT * FROM nfinancial_req');
            $results = $this->db->resultSet();
            return $results;
        }


        public function viewNonFinancialRequest($id){
            // $this->db->query('SELECT * FROM nfinancial_req');
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.description, donation_req.contact, donation_req.city, donation_req.NIC, donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, nfinancial_req.quantity, nfinancial_req.received_quantity FROM donation_req JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id WHERE donation_req.user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function viewFinancialRequest($id){
            // $this->db->query('SELECT * FROM financial_req');
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.description, donation_req.contact, donation_req.city, donation_req.NIC, donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, financial_req.total_amount, financial_req.received_amount, financial_req.bank_pass_book, financial_req.bank_acc_number, financial_req.bank_name FROM donation_req JOIN financial_req ON donation_req.id = financial_req.req_id WHERE donation_req.user_id = :user_id');
            $this->db->bind(':user_id', $id);
            $results = $this->db->resultSet();
            return $results;
        }







        // calendar----------------------------------------------------------------------------------------------------------


    public function getReservations(){
        $this->db->query('SELECT * FROM reservation');
        $results = $this->db->resultSet();
       return $results;
    }


    public function getRequestDetails($id){
        $this->db->query('SELECT * from reservation WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }
    
    
    public function acceptRequest($id){

        $this->db->query('UPDATE reservation SET status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', 1);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }


    // public function getAcceptedReservations(){
    //     $this->db->query('SELECT * FROM reservation WHERE status = 1');
    //     // $this->db->bind(':id', $id);
    //     $row = $this->db->single();
    //     $count = $this->db->rowCount();
    //     return $count;
    // }

    

    public function getAcceptedReservations(){
        $this->db->query('SELECT * FROM reservation WHERE status = 1');
        $results = $this->db->resultSet();
       return $results;
    }
    
         
    }