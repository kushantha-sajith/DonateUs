<?php
  class User {
         

    public function __construct(){
      $this->db = new Database;
    }

    public function getDistricts(){
      $this->db->query('SELECT * FROM district');
      $results = $this->db->resultSet();
      return $results;
  }

    // Regsiter user
      /**
       * @param $data
       * @return bool
       */
      public function register_donor($data,$type){

        // 1 - Admin
        // 2 - Individual Donor
        // 3 - Corporate Donor
        // 4 - Individual Beneficiary
        // 5 - Organization Beneficiary
        // 6 - Event Organizer
     
        $type1 = "ind";
        
        if(strcmp($type,$type1) == 0 ){
          $this->db->query('INSERT INTO reg_user (email, password,  user_type, prof_img, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :prof_img, :tp_number, :otp_code, :otp_verify, :verification_status)');
          
          // Bind values
          $this->db->bind(':email', $data['email_ind']);
          $this->db->bind(':password', $data['password_ind']);
          $this->db->bind(':user_type', 2);
          $this->db->bind(':prof_img', $data['prof_img']);
          $this->db->bind(':tp_number', $data['contact_ind']);
          $this->db->bind(':otp_code', $data['otp_code']);
          $this->db->bind(':otp_verify', $data['otp_verify']);
          $this->db->bind(':verification_status', $data['verification_status']);
          
              
          // Execute
          if($this->db->execute()){

            $this->db->query('SELECT id FROM reg_user WHERE email = :email');
            $this->db->bind(':email', $data['email_ind']);
            $row = $this->db->single();
            $user_id = $row->id;

            $this->db->query('INSERT INTO ind_don (f_name, l_name, NIC, city, district, acc_status, user_id) VALUES(:f_name, :l_name, :NIC, :city, :district, :acc_status, :user_id)');
            
            $this->db->bind(':f_name', $data['fname']);
            $this->db->bind(':l_name', $data['lname']);
            $this->db->bind(':NIC', $data['nic']);
            $this->db->bind(':city', $data['city_ind']);
            $this->db->bind(':district', $data['district_ind']);
            $this->db->bind(':acc_status', $data['acc_status']);
            $this->db->bind(':user_id', $user_id);

            if($this->db->execute()){
              return true;
            }else{
              return false;
            }

          } else {
            return false;
          }

        }else{
          //corporate-------------------------------------------------------------------------------------------------
          $this->db->query('INSERT INTO reg_user (email, password,  user_type, prof_img, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :prof_img, :tp_number, :otp_code, :otp_verify, :verification_status)');
          
          // Bind values
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':user_type', 3);
          $this->db->bind(':prof_img', $data['prof_img']);
          $this->db->bind(':tp_number', $data['contact']);
          $this->db->bind(':otp_code', $data['otp_code']);
          $this->db->bind(':otp_verify', $data['otp_verify']);
          $this->db->bind(':verification_status', $data['verification_status']);
          
    
          // Execute
          if($this->db->execute()){

            $this->db->query('SELECT id FROM reg_user WHERE email = :email');
            $this->db->bind(':email', $data['email']);
            $row = $this->db->single();
            $user_id = $row->id;

            $this->db->query('INSERT INTO corp_don (comp_name, emp_name, emp_id, designation, city, district, acc_status, user_id) VALUES(:comp_name, :emp_name, :emp_id, :designation, :city, :district, :acc_status, :user_id)');
            
            $this->db->bind(':comp_name', $data['compname']);
            $this->db->bind(':emp_name', $data['fullname']);
            $this->db->bind(':emp_id', $data['empid']);
            $this->db->bind(':designation', $data['desg']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':district', $data['district']);
            $this->db->bind(':acc_status', $data['acc_status']);
            $this->db->bind(':user_id', $user_id);

            if($this->db->execute()){
              return true;
            }else{
              return false;
            }

          } else {
            return false;
          }
        }
          
    }

    // Login user
      /**
       * @param $email
       * @param $password
       * @return false|mixed
       */
      public function login_donor($email, $password){
      $this->db->query('SELECT * FROM reg_user WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }

    // Find user by email
      /**
       * @param $email
       * @return bool
       */
      public function findUserByEmail($email){
      $this->db->query('SELECT * FROM reg_user WHERE email = :email');
      // Bind value
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }

    // Find user by contact number
      /**
       * @param $tp_number
       * @return bool
       */
      public function findUserByContact($tp_number){
        $this->db->query('SELECT * FROM reg_user WHERE tp_number = :tp_number');
        // Bind value
        $this->db->bind(':tp_number', $tp_number);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }

      // Find user by NIC number
      /**
       * @param $nic
       * @return bool
       */
      public function findUserByNIC($nic){
        $this->db->query('SELECT * FROM ind_don WHERE NIC = :nic');
        // Bind value
        $this->db->bind(':nic', $nic);
  
        $row = $this->db->single();
  
        // Check row
        if($this->db->rowCount() > 0){
          return true;
        } else {
          return false;
        }
      }

      public function register_eorganizer($data){

          $this->db->query('INSERT INTO reg_user (email, password,  user_type, prof_img, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :prof_img, :tp_number, :otp_code, :otp_verify, :verification_status)');
          
          // Bind values
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':user_type', 6);
          $this->db->bind(':prof_img', $data['prof_img']);
          $this->db->bind(':tp_number', $data['contact']);
          $this->db->bind(':otp_code', $data['otp_code']);
          $this->db->bind(':otp_verify', $data['otp_verify']);
          $this->db->bind(':verification_status', $data['verification_status']);
          
              
          // Execute
          if($this->db->execute()){

            $this->db->query('SELECT id FROM reg_user WHERE email = :email');
            $this->db->bind(':email', $data['email']);
            $row = $this->db->single();
            $user_id = $row->id;

            $this->db->query('INSERT INTO event_org (full_name, NIC, community_name, designation, city, district, acc_status, user_id) VALUES(:full_name, :NIC, :community_name, :designation, :city, :district, :acc_status, :user_id)');
            
            $this->db->bind(':full_name', $data['fullname']);
            $this->db->bind(':NIC', $data['nic']);
            $this->db->bind(':community_name', $data['comm_name']);
            $this->db->bind(':designation', $data['desg']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':district', $data['district']);
            $this->db->bind(':acc_status', $data['acc_status']);
            $this->db->bind(':user_id', $user_id);

            if($this->db->execute()){
              return true;
            }else{
              return false;
            }

          } else {
            return false;
          }

    }
  }