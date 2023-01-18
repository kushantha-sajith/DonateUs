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
      public function register_donor($data){
     
        
          $this->db->query('INSERT INTO donor (email, password, f_name, l_name, contact, city, c_name, eid, designation, type, verification_status, otp_code) VALUES(:email, :password, :fname, :lname, :contact, :city, :c_name, :eid, :designation, :type, :verification_status, :otp_code)');
          // Bind values
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':fname', $data['fname']);
          $this->db->bind(':lname', $data['lname']);
          $this->db->bind(':contact', $data['contact']);
          $this->db->bind(':city', $data['city']);
          $this->db->bind(':c_name', $data['compname']);
          $this->db->bind(':eid', $data['empid']);
          $this->db->bind(':designation', $data['desg']);
          $this->db->bind(':type', $data['user_type']);
          $this->db->bind(':verification_status', $data['verification_status']);
          $this->db->bind(':otp_code', $data['otp_code']);
    
          // Execute
          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
    }

    // Login user
      /**
       * @param $email
       * @param $password
       * @return false|mixed
       */
      public function login_donor($email, $password){
      $this->db->query('SELECT * FROM donor WHERE email = :email');
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
      $this->db->query('SELECT * FROM donor WHERE email = :email');
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