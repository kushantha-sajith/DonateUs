<?php
  class User {
         

    public function __construct(){
      $this->db = new Database;
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
          $this->db->query('INSERT INTO reg_user (email, password,  user_type, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :tp_number, :otp_code, :otp_verify, :verification_status)');
          
          // Bind values
          $this->db->bind(':email', $data['email_ind']);
          $this->db->bind(':password', $data['password_ind']);
          $this->db->bind(':user_type', 2);
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

            $this->db->query('INSERT INTO ind_don (f_name, l_name, NIC, city, user_id) VALUES(:f_name, :l_name, :NIC, :city, :user_id)');
            
            $this->db->bind(':f_name', $data['fname']);
            $this->db->bind(':l_name', $data['lname']);
            $this->db->bind(':NIC', $data['nic']);
            $this->db->bind(':city', $data['city_ind']);
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

          $this->db->query('INSERT INTO reg_user (email, password,  user_type, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :tp_number, :otp_code, :otp_verify, :verification_status)');
          
          // Bind values
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':user_type', 3);
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

            $this->db->query('INSERT INTO corp_don (comp_name, emp_name, emp_id, designation, user_id) VALUES(:comp_name, :emp_name, :emp_id, :designation, :user_id)');
            
            $this->db->bind(':comp_name', $data['compname']);
            $this->db->bind(':emp_name', $data['fullname']);
            $this->db->bind(':emp_id', $data['empid']);
            $this->db->bind(':designation', $data['desg']);
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
  }