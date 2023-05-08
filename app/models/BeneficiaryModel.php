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

<<<<<<< Updated upstream
        // public function getDonationHistory($id){
        //     $this->db->query('SELECT donation.id, donation.timestamp, donation.request_id, donation.anonymous, donation.type, donation.status, donation_req.request_title  FROM donation JOIN donation_req ON donation.request_id = donation_req.id WHERE donation.donor_id = :id  ORDER BY donation.id DESC');
        //     $this->db->bind(':id', $id);
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
=======
>>>>>>> Stashed changes

        public function getDonationHistory($id){
            $this->db->query('SELECT donation.id, donation.timestamp, donation.request_id, donation.anonymous, donation.type, donation.status, donation_req.request_title  FROM donation JOIN donation_req ON donation.request_id = donation_req.id WHERE donation_req.user_id = :id  ORDER BY donation.id DESC');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }
    
        public function getFilteredHistory($id, $category,$filterId){

            if($filterId==0){
            if($category==0){
                $this->db->query('SELECT donation.id, donation.timestamp, donation.request_id, donation.anonymous, donation.type, donation.status, donation_req.request_title  FROM donation JOIN donation_req ON donation.request_id = donation_req.id WHERE donation_req.user_id = :id  AND donation.type = 0 ORDER BY donation.id DESC');
                $this->db->bind(':id', $id);
                $results = $this->db->resultSet();
                return $results;
            }else{
                $this->db->query('SELECT donation.id, donation.timestamp, donation.request_id, donation.anonymous, donation.type, donation.status, donation_req.request_title  FROM donation JOIN donation_req ON donation.request_id = donation_req.id WHERE donation_req.user_id = :id  AND donation.cat_id = :category ORDER BY donation.id DESC');
                $this->db->bind(':id', $id);
                $this->db->bind(':category', $category);
                $results = $this->db->resultSet();
                return $results;
            }
            }else{
                
                $this->db->query('SELECT donation.id, donation.timestamp, donation.request_id, donation.anonymous, donation.type, donation.status, donation_req.request_title  FROM donation JOIN donation_req ON donation.request_id = donation_req.id WHERE donation_req.user_id = :id  AND donation.status = :status  ORDER BY donation.id DESC');
                $this->db->bind(':id', $id);
                $this->db->bind(':status', $category);
                $results = $this->db->resultSet();
                return $results;
                
            }
        }


        public function getFinancialHistory($id){
<<<<<<< Updated upstream
            $this->db->query('SELECT  donation.donor_id, donation.type, donation.status, financial_donation.amount_donated, financial_donation.donation_id  FROM donation JOIN financial_donation ON donation.id = financial_donation.donation_id WHERE donation.donor_id = :id AND donation.type = 1 ');
=======
            $this->db->query('SELECT  donation.request_id, donation.type, donation.status, financial_donation.amount_donated, financial_donation.donation_id  FROM donation JOIN financial_donation ON donation.id = financial_donation.donation_id WHERE donation.request_id = :id AND donation.type = 1 ');
>>>>>>> Stashed changes
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getNonFinancialHistory($id){
<<<<<<< Updated upstream
            $this->db->query('SELECT donation.donor_id, donation.type, donation.status, nfinancial_donation.quantity_donated, nfinancial_donation.donation_id  FROM donation JOIN nfinancial_donation ON donation.id = nfinancial_donation.donation_id WHERE donation.donor_id = :id AND donation.type = 0 ');
=======
            $this->db->query('SELECT donation.request_id, donation.type, donation.status, nfinancial_donation.quantity_donated, nfinancial_donation.donation_id  FROM donation JOIN nfinancial_donation ON donation.id = nfinancial_donation.donation_id WHERE donation.request_id = :id AND donation.type = 0 ');
>>>>>>> Stashed changes
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }


        public function getNonfinancialCategories(){
        
            $this->db->query('SELECT * FROM categories WHERE id > 1');
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        public function getCategoryById($id){
            $this->db->query('SELECT * FROM categories WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
=======
        public function getCategory($id){
            $this->db->query('SELECT * FROM categories WHERE id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
        }


        public function getCategoryById($cat_id){
            $this->db->query('SELECT * FROM categories WHERE id = :id');
            $this->db->bind(':id', $cat_id);
            $row = $this->db->single();
>>>>>>> Stashed changes
            $cat = $row->category_name;
            return $cat;
        }

        public function markReceived($data){
            $this->db->query('UPDATE donation SET status = :status WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':status', 3);
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

        //   public function getNonFinancialCategories(){
        //     $this->db->query('SELECT * FROM categories WHERE id != 1');
        //     $results = $this->db->resultSet();
        //     return $results;
        //   }
 

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
                
                if(empty($data['zipcode'])){
                    $data['zipcode'] = $row->zipcode; 
                }
                if($data['district'] == $zero){
                    $data['district'] = $row->district; 
                }

                $this->db->query('UPDATE ind_don SET f_name = :f_name, l_name = :l_name, zipcode = :zipcode, district = :district WHERE user_id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':f_name', $data['f_name']);
                $this->db->bind(':l_name', $data['l_name']);
                $this->db->bind(':zipcode', $data['zipcode']);
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
                if(empty($data['zipcode'])){
                    $data['zipcode'] = $row4->zipcode; 
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
            
            $this->db->query('UPDATE corp_don SET comp_name = :comp_name, emp_name = :emp_name, emp_id = :emp_id, designation = :designation, zipcode = :zipcode, district = :district WHERE user_id = :id');
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':comp_name', $data['comp_name']);
            $this->db->bind(':emp_name', $data['emp_name']);
            $this->db->bind(':emp_id', $data['emp_id']);
            $this->db->bind(':designation', $data['desg']);
            $this->db->bind(':zipcode', $data['zipcode']);
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

        // public function getDistrictName($id,$user_type){

        //     $dist_id;

        //     if($user_type==4){
        //         $this->db->query('SELECT district FROM ind_ben WHERE user_id = :id');
        //     $this->db->bind(':id', $id);
        //     $row = $this->db->single();
        //     $dist_id = $row->district;
            
        //     }elseif($user_type==5){
        //         $this->db->query('SELECT district FROM org_ben WHERE user_id = :id');
        //     $this->db->bind(':id', $id);
        //     $row = $this->db->single();
        //     $dist_id = $row->district;
            
        //     }else{
        //         $this->db->query('SELECT district FROM event_org WHERE user_id = :id');
        //         $this->db->bind(':id', $id);
        //         $row = $this->db->single();
        //         $dist_id = $row->district;
                
        //     }

        //     $this->db->query('SELECT dist_name FROM district WHERE id = :dist_id');
        //     $this->db->bind(':dist_id', $dist_id);
        //     $row = $this->db->single();
        //     $dist = $row->dist_name;
        //     return $dist;
        // }

        // public function getCategoryName($id, $category_name){
        //     $this->db->query('SELECT category_name FROM categories WHERE id = :id');
        //     $this->db->bind(':id', $id);
        //     $row = $this->db->single();
        //     $cat_id = $row->category_name;
        //     return $cat_id;
        // }


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



<<<<<<< Updated upstream

        public function addFinancialRequest($data)
    {
       
            $this->db->query('INSERT INTO donation_req (request_title, name, NIC, description, contact, zipcode, cat_id, due_date , user_id, proof_document, thumbnail) VALUES(:request_title, :name, :NIC, :description, :contact, :zipcode, :cat_id, :due_date, :user_id, :proof_document, :thumbnail)');

            // Bind values
            $this->db->bind(':request_title', $data['title']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NIC', $data['NIC']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':zipcode', $data['zipcode']);
            $this->db->bind(':proof_document', $data['proof']);
            $this->db->bind(':cat_id',$data['cat_id']);
            // $this->db->bind(':status', $data['status']);
            // $this->db->bind(':published_date', $data['published_date']);
            $this->db->bind(':due_date', $data['duedate']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':thumbnail', $data['thumbnail']);


            // Execute
            if ($this->db->execute()) {

=======
        public function addFinancialRequest($data)
    {
       
            $this->db->query('INSERT INTO donation_req (request_title, name, NIC, description, contact, zipcode, cat_id, due_date , user_id, proof_document, thumbnail) VALUES(:request_title, :name, :NIC, :description, :contact, :zipcode, :cat_id, :due_date, :user_id, :proof_document, :thumbnail)');

            // Bind values
            $this->db->bind(':request_title', $data['title']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NIC', $data['NIC']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':zipcode', $data['zipcode']);
            $this->db->bind(':proof_document', $data['proof']);
            $this->db->bind(':cat_id',$data['cat_id']);
            // $this->db->bind(':status', $data['status']);
            // $this->db->bind(':published_date', $data['published_date']);
            $this->db->bind(':due_date', $data['duedate']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':thumbnail', $data['thumbnail']);


            // Execute
            if ($this->db->execute()) {

>>>>>>> Stashed changes
                $this->db->query('SELECT id FROM donation_req WHERE user_id = :user_id ORDER BY id DESC LIMIT 1;');
                $this->db->bind(':user_id', $data['user_id']);
                $row = $this->db->single();
                $req_id = $row->id;

                $this->db->query('INSERT INTO financial_req (req_id, total_amount, bank_acc_number, bank_name) VALUES(:req_id, :total_amount, :bank_acc_number, :bank_name)');

                $this->db->bind(':req_id', $req_id);
                $this->db->bind(':total_amount', $data['amount']);
                // $this->db->bind(':received_amount', $data['received_amount']);
                 // $this->db->bind(':bank_pass_book', $data['passbook']);
                $this->db->bind(':bank_acc_number', $data['accnumber']);
                $this->db->bind(':bank_name', $data['bankname']);
                                
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        
    }


    public function addNonFinancialRequest($data)
    {
        
            $this->db->query('INSERT INTO donation_req (request_title, name, NIC, description, contact, zipcode, cat_id, due_date , user_id, proof_document, thumbnail) VALUES(:request_title, :name, :NIC, :description, :contact, :zipcode, :cat_id, :due_date, :user_id, :proof_document, :thumbnail)');

                    // Bind values
            $this->db->bind(':request_title', $data['title']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NIC', $data['NIC']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':zipcode', $data['zipcode']);
            $this->db->bind(':proof_document', $data['proof']);
            $this->db->bind(':cat_id',$data['cat_id']);
            // $this->db->bind(':status', $data['status']);
            // $this->db->bind(':published_date', $data['published_date']);
            $this->db->bind(':due_date', $data['duedate']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->bind(':thumbnail', $data['thumbnail']);


            // Execute
            if ($this->db->execute()) {

                $this->db->query('SELECT id FROM donation_req WHERE user_id = :user_id ORDER BY id DESC LIMIT 1;');
                $this->db->bind(':user_id', $data['user_id']);
                $row = $this->db->single();
                $req_id = $row->id;

                $this->db->query('INSERT INTO nfinancial_req (req_id, quantity,item) VALUES(:req_id, :quantity, :item)');

                $this->db->bind(':req_id', $req_id);
                $this->db->bind(':quantity', $data['quantity']);
                $this->db->bind(':item', $data['item']);


                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
       
    }


<<<<<<< Updated upstream
    


=======
>>>>>>> Stashed changes
        public function getRequests($id){
            $this->db->query('SELECT * FROM donation_req WHERE user_id = :user_id ORDER BY donation_req.id DESC LIMIT 5');
            $this->db->bind(':user_id', $id);
            // $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.NIC, donation_req.description, donation_req.contact, donation_req.zipcode, donation_req.cat_id ,donation_req.status , donation_req.published_date, donation_req.due_date, donation_req.user_id, donation_req.proof_document FROM donation_req INNER JOIN reg_user ON donation_req.user_id=reg_user.id');
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

        public function getNonFinancialRequests($id){
            $this->db->query('SELECT * FROM donation_req WHERE id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
        // public function makeRequestCompleted($id){
        //     $this->db->query('UPDATE donation_req SET status = 3 WHERE status IN (0, 1) AND due_date < NOW() AND user_id=:user_id');
        //     $this->db->bind(':user_id', $id);
        //     // $this->db->bind(':due_date', $id);
        //     $results = $this->db->resultSet();
        //     return $results;

        // }


=======
>>>>>>> Stashed changes
        public function makeNonFinancialRequestOngoing($id){
            $this->db->query('UPDATE donation_req SET status = 1 WHERE status = 0 AND id IN (SELECT req_id FROM nfinancial_req WHERE received_quantity > 0)');
            $this->db->bind(':user_id', $id);
            // $this->db->bind(':due_date', $id);
            $results = $this->db->resultSet();
            return $results;

        }

        public function makeFinancialRequestOngoing($id){
            $this->db->query('UPDATE donation_req SET status = 1 WHERE status = 0 AND id IN (SELECT req_id FROM financial_req WHERE received_amount > 0)');
            $this->db->bind(':user_id', $id);
            // $this->db->bind(':due_date', $id);
            $results = $this->db->resultSet();
            return $results;

        }

<<<<<<< Updated upstream
        




=======
>>>>>>> Stashed changes

        public function viewNonFinancialRequest($id){
            // $this->db->query('SELECT * FROM nfinancial_req');
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.description, donation_req.contact, donation_req.zipcode, donation_req.NIC, donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, donation_req.status, donation_req.rejection_note, nfinancial_req.quantity, nfinancial_req.received_quantity, nfinancial_req.item  FROM donation_req JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id WHERE donation_req.id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function viewFinancialRequest($id){
            // $this->db->query('SELECT * FROM financial_req');
            $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.description, donation_req.contact, donation_req.zipcode, donation_req.NIC, donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, donation_req.status, donation_req.rejection_note, financial_req.total_amount, financial_req.received_amount, financial_req.bank_pass_book, financial_req.bank_acc_number, financial_req.bank_name FROM donation_req JOIN financial_req ON donation_req.id = financial_req.req_id WHERE donation_req.id=:id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getHistoryDonor($id){
            $this->db->query('SELECT donation.id, donation.anonymous, donation.date_of_completion, financial_donation.donation_id, financial_donation.amount_donated, nfinancial_donation.donation_id, nfinancial_donation.quantity_donated FROM donation JOIN financial_donation ON donation.id = financial_donation.donation_id JOIN nfinancial_donation ON donation.id = nfinancial_donation.donation_id WHERE donation.id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->resultSet();
            return $results;
        }

<<<<<<< Updated upstream
    //     public function updateNonFinancialRequest($data)
    //     {
            
    //             $this->db->query('UPDATE donation_req SET request_title = :request_title, name = :name, NIC = :NIC, description = :description, contact = :contact, zipcode = :zipcode, due_date = :due_date WHERE id =:id ');
    // // $this->db->query('UPDATE reg_user SET password = :password, otp_code = :otp_code, otp_verify = :otp_verify WHERE id = :id');

    //                     // Bind values
    //             $this->db->bind(':request_title', $data['title']);
    //             $this->db->bind(':name', $data['name']);
    //             $this->db->bind(':NIC', $data['NIC']);
    //             $this->db->bind(':description', $data['description']);
    //             $this->db->bind(':contact', $data['contact']);
    //             $this->db->bind(':zipcode', $data['zipcode']);
    //             // $this->db->bind(':proof_document', $data['proof_document']);
    //             // $this->db->bind(':cat_id',$data['cat_id']);
    //             // $this->db->bind(':status', $data['status']);
    //             // $this->db->bind(':published_date', $data['published_date']);
    //             $this->db->bind(':due_date', $data['duedate']);
    //             // $this->db->bind(':user_id', $data['user_id']);
    //             // $this->db->bind(':thumbnail', $data['thumbnail']);
    //              $this->db->bind(':id', $data['id']);


    //             // Execute
    //                 if ($this->db->execute()) {
                        
    //                     $this->db->query('SELECT id FROM donation_req WHERE user_id = :user_id ORDER BY id DESC LIMIT 1;');
    //                     $this->db->bind(':user_id', $data['id']);
    //                     $row = $this->db->single();
    //                     $req_id = $row->id;
                    
                        
    //                     if ($this->db->execute()) {
    //                     $this->db->query('UPDATE nfinancial_req SET quantity = :quantity WHERE req_id = :req_id');
                    
    //                     $this->db->bind(':req_id', $req_id);
    //                     $this->db->bind(':quantity', $data['quantity']);
                    
    //                     if ($this->db->execute()) {
    //                         return true;
    //                     } else {
    //                         return false;
    //                     }
    //                 } else {
    //                     return false;
    //                 }
    //             } else {
    //                 return false;
    //             }
           
    //     }


        

        public function updateFinancialRequest($data)
    {
       
        $this->db->query('UPDATE donation_req SET request_title = :request_title, name = :name, NIC = :NIC, description = :description, contact = :contact, zipcode = :zipcode, due_date = :due_date WHERE id =:id ');
           
        // $this->db->query('UPDATE donation_req (request_title, name, NIC, description, contact, zipcode, cat_id, due_date , user_id, proof_document, thumbnail) VALUES(:request_title, :name, :NIC, :description, :contact, :zipcode, :cat_id, :due_date, :user_id, :proof_document, :thumbnail)');

            // Bind values
=======
        //get donation details
        public function getDonationDetails($id, $donation_type){

            if($donation_type == 1){
                $this->db->query('SELECT donation.anonymous, donation.timestamp, donation.date_of_completion, donation.status, financial_donation.amount_donated, donation_req.name, donation_req.request_title, donation_req.contact, donation_req.zipcode, donation_req.user_id FROM donation JOIN financial_donation ON donation.id = financial_donation.donation_id JOIN donation_req ON donation.request_id = donation_req.id WHERE donation.id = :id');
                $this->db->bind(':id', $id);
                $results = $this->db->resultSet();
                return $results;
            }else{
                $this->db->query('SELECT donation.anonymous, donation.timestamp, donation.date_of_completion, donation.status, nfinancial_donation.quantity_donated, nfinancial_donation.note_to_beneficiary, donation_req.name, donation_req.request_title, donation_req.contact, donation_req.zipcode, donation_req.user_id, donation_req.cat_id, categories.category_name, nfinancial_req.item FROM donation JOIN nfinancial_donation ON donation.id = nfinancial_donation.donation_id JOIN donation_req ON donation.request_id = donation_req.id JOIN categories ON donation_req.cat_id = categories.id JOIN nfinancial_req ON nfinancial_req.req_id = donation_req.id WHERE donation.id = :id');
                $this->db->bind(':id', $id);
                $results = $this->db->resultSet();
                return $results;
            }
    
        }


        //get user by id
        public function getUserTypeById($id){
            $this->db->query('SELECT reg_user.user_type FROM reg_user WHERE reg_user.id = :id');
            $this->db->bind(':id', $id);
            $results = $this->db->single();
            $type = $results->user_type;
            return $type;
        }


        public function getBeneficiaryDetails($id, $user_type){

            if($user_type == 4){
                $this->db->query('SELECT reg_user.email, reg_user.tp_number, ind_ben.f_name, ind_ben.l_name, ind_ben.address, ind_ben.zipcode, ind_ben.district, district.dist_name FROM reg_user JOIN ind_ben ON reg_user.id = ind_ben.user_id JOIN district ON ind_ben.district = district.id WHERE reg_user.id = :id');
                $this->db->bind(':id', $id);
                $results = $this->db->resultSet();
                return $results;
            }else{
                $this->db->query('SELECT reg_user.email, reg_user.tp_number, org_ben.org_name, org_ben.org_type, org_ben.address, org_ben.zipcode, org_ben.district, district.dist_name FROM reg_user JOIN org_ben ON reg_user.id = org_ben.user_id JOIN district ON org_ben.district = district.id WHERE reg_user.id = :id');
                $this->db->bind(':id', $id);
                $results = $this->db->resultSet();
                return $results;
            }
          
              
        }


            public function editDueDate($id, $data){
                $this->db->query('UPDATE donation_req SET due_date = :due_date WHERE id = :id');
                // Bind values
                $this->db->bind(':id', $id);
                $this->db->bind(':due_date', $data['due_date']);
                // Execute
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
            }


        public function updateFinancialRequest($data)
        {
         $this->db->query('UPDATE donation_req INNER JOIN financial_req ON donation_req.id = financial_req.req_id  SET donation_req.request_title = :request_title, donation_req.name = :name, donation_req.NIC = :NIC, donation_req.description = :description, donation_req.contact = :contact, donation_req.zipcode = :zipcode, donation_req.due_date = :due_date, donation_req.proof_document=:proof_document, donation_req.thumbnail=:thumbnail, financial_req.total_amount = :total_amount, financial_req.bank_acc_number, financial_req.bank_pass_book =:bank_pass_book, financial_req.bank_name=:bank_name  WHERE donation_req.id =:id ');

             // Bind values
>>>>>>> Stashed changes
            $this->db->bind(':request_title', $data['title']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':NIC', $data['NIC']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':zipcode', $data['zipcode']);
<<<<<<< Updated upstream
            // $this->db->bind(':proof_document', $data['proof']);
=======
            $this->db->bind(':proof_document', $data['proof_document']);
>>>>>>> Stashed changes
            // $this->db->bind(':cat_id',$data['cat_id']);
            // $this->db->bind(':status', $data['status']);
            // $this->db->bind(':published_date', $data['published_date']);
            $this->db->bind(':due_date', $data['duedate']);
            $this->db->bind(':id', $data['id']);
<<<<<<< Updated upstream
            // $this->db->bind(':thumbnail', $data['thumbnail']);


            // Execute
            if ($this->db->execute()) {

                $this->db->query('SELECT id FROM donation_req WHERE user_id = :user_id ORDER BY id DESC LIMIT 1;');
                $this->db->bind(':user_id', $data['id']);
                $row = $this->db->single();
                $req_id = $row->id;

                $this->db->query('UPDATE financial_req SET total_amount=:total_amount, bank_acc_number=:bank_acc_number, bank_name=:bank_name WHERE req_id=:req_id');

                $this->db->bind(':req_id', $req_id);
                $this->db->bind(':total_amount', $data['amount']);
                // $this->db->bind(':received_amount', $data['received_amount']);
                //  $this->db->bind(':bank_pass_book', $data['passbook']);
                $this->db->bind(':bank_acc_number', $data['accnumber']);
                $this->db->bind(':bank_name', $data['bankname']);
                                
                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        
   
        
    }


    //     public function updateFinancialRequest($data)
    //     {
    //      $this->db->query('UPDATE donation_req INNER JOIN financial_req ON donation_req.id = financial_req.req_id  SET donation_req.request_title = :request_title, donation_req.name = :name, donation_req.NIC = :NIC, donation_req.description = :description, donation_req.contact = :contact, donation_req.zipcode = :zipcode, donation_req.due_date = :due_date, financial_req.total_amount = :total_amount, financial_req.bank_acc_number =:bank_acc_number, financial_req.bank_name=:bank_name  WHERE donation_req.id =:id ');

    //          // Bind values
    //         $this->db->bind(':request_title', $data['title']);
    //         $this->db->bind(':name', $data['name']);
    //         $this->db->bind(':NIC', $data['NIC']);
    //         $this->db->bind(':description', $data['description']);
    //         $this->db->bind(':contact', $data['contact']);
    //         $this->db->bind(':zipcode', $data['zipcode']);
    //         // $this->db->bind(':proof_document', $data['proof']);
    //         // $this->db->bind(':cat_id',$data['cat_id']);
    //         // $this->db->bind(':status', $data['status']);
    //         // $this->db->bind(':published_date', $data['published_date']);
    //         $this->db->bind(':due_date', $data['duedate']);
    //         $this->db->bind(':id', $data['id']);
    //         // $this->db->bind(':thumbnail', $data['thumbnail']);
    //         //  $this->db->bind(':req_id', $data['req_id']);
    //         // $this->db->bind(':quantity', $data['quantity']);
    //         $this->db->bind(':total_amount', $data['amount']);
    //         // $this->db->bind(':received_amount', $data['received_amount']);
    //         //  $this->db->bind(':bank_pass_book', $data['passbook']);
    //         $this->db->bind(':bank_acc_number', $data['accnumber']);
    //         $this->db->bind(':bank_name', $data['bankname']);

    //        // Execute
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    public function updateNonFinancialRequest($data)
    {
     $this->db->query('UPDATE donation_req INNER JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id  SET donation_req.request_title = :request_title, donation_req.name = :name, donation_req.NIC = :NIC, donation_req.description = :description, donation_req.contact = :contact, donation_req.zipcode = :zipcode, donation_req.due_date = :due_date, nfinancial_req.quantity = :quantity  WHERE donation_req.id =:id ');
=======
            $this->db->bind(':thumbnail', $data['thumbnail']);
            //  $this->db->bind(':req_id', $data['req_id']);
            // $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':total_amount', $data['amount']);
            // $this->db->bind(':received_amount', $data['received_amount']);
             $this->db->bind(':bank_pass_book', $data['bank_pass_book']);
            $this->db->bind(':bank_acc_number', $data['accnumber']);
            $this->db->bind(':bank_name', $data['bankname']);

           // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    public function updateNonFinancialRequest($data)
    {
     $this->db->query('UPDATE donation_req INNER JOIN nfinancial_req ON donation_req.id = nfinancial_req.req_id  SET donation_req.request_title = :request_title, donation_req.name = :name, donation_req.NIC = :NIC, donation_req.description = :description, donation_req.contact = :contact, donation_req.zipcode = :zipcode, donation_req.due_date = :due_date, donation_req.proof_document=:proof_document, donation_req.thumbnail=:thumbnail, nfinancial_req.quantity = :quantity  WHERE donation_req.id =:id ');
>>>>>>> Stashed changes

         // Bind values
        $this->db->bind(':request_title', $data['title']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':NIC', $data['NIC']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':zipcode', $data['zipcode']);
<<<<<<< Updated upstream
        // $this->db->bind(':proof_document', $data['proof']);
=======
        $this->db->bind(':proof_document', $data['proof_document']);
>>>>>>> Stashed changes
        // $this->db->bind(':cat_id',$data['cat_id']);
        // $this->db->bind(':status', $data['status']);
        // $this->db->bind(':published_date', $data['published_date']);
        $this->db->bind(':due_date', $data['duedate']);
        $this->db->bind(':id', $data['id']);
<<<<<<< Updated upstream
        // $this->db->bind(':thumbnail', $data['thumbnail']);
=======
        $this->db->bind(':thumbnail', $data['thumbnail']);
>>>>>>> Stashed changes
        //  $this->db->bind(':req_id', $data['req_id']);
        $this->db->bind(':quantity', $data['quantity']);
        

       // Execute
    if ($this->db->execute()) {
        return true;
    } else {
        return false;
    }
}
                    


        


    public function deleteFinancialRequest($id)
    {
        $this->db->query('DELETE FROM donation_req WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteNonFinancialRequest($id)
    {
        $this->db->query('DELETE FROM donation_req WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // public function checkFinancialRequest($id){
    //     $this->db->query('SELECT status FROM donation_req WHERE user_id = :user_id');
    //     $this->db->bind(':user_id', $id);

    //     if()
    // }


    public function checkFinancialRequest($id){
        $this->db->query('SELECT * FROM donation_req WHERE status = 0 OR status =1 AND user_id = :user_id AND req_type = 1');
        $this->db->bind(':user_id', $id);
        $row = $this->db->single();
        $count = $this->db->rowCount();
        return $count;
        if($count>1){
            return true;
        } else {
            $results = $this->db->resultSet();
            return $results;
        }

    }

    public function markReceivedDonation($id){

        $this->db->query('UPDATE donation SET status = :status WHERE id = :id');
            $this->db->bind(':id', $id);
            $this->db->bind(':status', 3);
           
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
    }


        // calendar----------------------------------------------------------------------------------------------------------


    public function getReservations(){
        $this->db->query('SELECT * FROM reservation WHERE status=0');
        $results = $this->db->resultSet();
       return $results;
    }

    public function getCalendar($id){
        $this->db->query('SELECT date, month, year, meal, status, ben_id FROM reservation WHERE ben_id = :ben_id');
        $this->db->bind(':ben_id', $id);
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

    public function rejectRequest($id){

        $this->db->query('UPDATE reservation SET status = :status WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':status', 2);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }
   

    // public function getAcceptedReservations(){
    //     // $this->db->query('SELECT donation_req.id, donation_req.request_title, donation_req.name, donation_req.description, donation_req.contact, donation_req.zipcode, donation_req.NIC, donation_req.cat_id, donation_req.published_date, donation_req.due_date, donation_req.proof_document, donation_req.status, financial_req.total_amount, financial_req.received_amount, financial_req.bank_pass_book, financial_req.bank_acc_number, financial_req.bank_name FROM donation_req JOIN financial_req ON donation_req.id = financial_req.req_id WHERE donation_req.id=:id');
    //                                                                                                                                                                                                  // FROM donation_history JOIN donation_req ON donation_history.req_id = donation_req.id JOIN categories ON donation_req.cat_id = categories.id WHERE donation_history.don_id = :id AND donation_req.cat_id != "1" ORDER BY donation_history.id DESC');
    //     $this->db->query('SELECT reservation.id, reservation.amount, reservation.date, reservation.month, reservation.year, reservation.meal, reservation.time_stamp, reservation.status, reservation.don_id, reservation.ben_id, ind_don.f_name, corp_don.comp_name FROM reservation JOIN ind_don ON reservation.don_id = ind_don.user_id JOIN reservation.don_id = corp_don.user_id WHERE ind_don.user_id=:user_id AND corp_don.user_id=:user_id ');
    //      $this->db->bind(':user_id', $id);
    //     $results = $this->db->resultSet();
    //    return $results;
    // }

    public function getAcceptedReservations(){
        $this->db->query('SELECT * FROM reservation WHERE status = 1');
        $results = $this->db->resultSet();
       return $results;
    }

    public function getBreakfast($day, $month, $year){
        $this->db->query('SELECT * FROM reservation WHERE meal = 1 AND status = 1 AND date = :day AND month = :month AND year = :year');
        $this->db->bind(':day', $day);
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        $results = $this->db->resultSet();
       return $results;
    }

    public function getLunch($day, $month, $year){
        $this->db->query('SELECT * FROM reservation WHERE meal = 2 AND status = 1 AND date = :day AND month = :month AND year = :year');
        $this->db->bind(':day', $day);
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        $results = $this->db->resultSet();
       return $results;
    }

    public function getDinner($day, $month, $year){
        $this->db->query('SELECT * FROM reservation WHERE meal = 3 AND status = 1 AND date = :day AND month = :month AND year = :year');
        $this->db->bind(':day', $day);
        $this->db->bind(':month', $month);
        $this->db->bind(':year', $year);
        $results = $this->db->resultSet();
       return $results;
    }



    public function makeReservation($data){

        $this->db->query('INSERT INTO reservation (date, month, year, meal, time_stamp, status, amount, don_id, ben_id) VALUES (:date, :month, :year, :meal, CURRENT_TIMESTAMP, :status, :amount, :don_id, :ben_id)');

            $this->db->bind(':date', $data['date']);
            $this->db->bind(':month', $data['month']);
            $this->db->bind(':year', $data['year']);
            $this->db->bind(':meal', $data['meal_type']);
            $this->db->bind(':status', 3);
            $this->db->bind(':ben_id', $data['ben_id']);
            $this->db->bind(':don_id', $data['ben_id']);
            $this->db->bind(':amount', $data['quantity']);


            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
    }

    // public function getAcceptedReservations(){
    //     $this->db->query('SELECT * FROM reservation WHERE status = 1');
    //     $this->db->bind(':status', $status);
    //     $row = $this->db->single();
    //     return $row;
    // }

      // public function acceptRequest($Id){

    //     $this->db->query('UPDATE shedule_request_table SET Accepted = true WHERE B_Req_ID = :B_Req_ID');
    //     $this->db->bind(':B_Req_ID', $Id);
    //     if($this->db->execute()){
    //         return true;
    //     }
    //     else{
    //         return false;
    //     }
    // }

    // public function getAcceptedReservations(){
    //     $this->db->query('SELECT * FROM reservation WHERE status = 1');
    //     // $this->db->bind(':id', $id);
    //     $row = $this->db->single();
    //     $count = $this->db->rowCount();
    //     return $count;
    // }
    
         
    }