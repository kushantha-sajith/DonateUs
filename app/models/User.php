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
      public function register_beneficiary($data,$type){

        // 1 - Admin
        // 2 - Individual beneficiary
        // 3 - Corporate beneficiary
        // 4 - Individual Beneficiary
        // 5 - Organization Beneficiary
        // 6 - Event Organizer
     
        $type1 = "ind";
        
        if(strcmp($type,$type1) == 0 ){
          $this->db->query('INSERT INTO reg_user (email, password, user_type, prof_img, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :prof_img, :tp_number, :otp_code, :otp_verify, :verification_status)');
          
          // Bind values
          $this->db->bind(':email', $data['email_ind']);
          $this->db->bind(':password', $data['password_ind']);
          $this->db->bind(':user_type', 4);
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

            $this->db->query('INSERT INTO ind_ben (f_name, l_name, NIC, address, identity, city, district, acc_status, user_id) VALUES(:f_name, :l_name, :NIC, :address, :identity, :city, :district, :acc_status, :user_id)');
            
            $this->db->bind(':f_name', $data['fname']);
            $this->db->bind(':l_name', $data['lname']);
            $this->db->bind(':NIC', $data['nic']);
            $this->db->bind(':address', $data['address_ind']);
            $this->db->bind(':identity', $data['identity_ind']);
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
          $this->db->bind(':user_type', 5);
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

            $this->db->query('INSERT INTO org_ben (org_name, org_type, emp_name, emp_id, designation, address, identity, city, district, acc_status, user_id) VALUES(:org_name, :org_type, :emp_name, :emp_id, :designation, :address, :identity, :city, :district, :acc_status, :user_id)');
            
            $this->db->bind(':org_name', $data['compname']);
            $this->db->bind(':org_type', $data['orgtype']);
            $this->db->bind(':emp_name', $data['fullname']);
            $this->db->bind(':emp_id', $data['empid']);
            $this->db->bind(':designation', $data['desg']);
           // $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':district', $data['district']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':identity', $data['identity']);
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
      public function login_beneficiary($email, $password){
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
<<<<<<< Updated upstream
=======
  }

  

  public function register_beneficiary($data, $type){
    $type1 = "ind";

    if (strcmp($type, $type1) == 0) {
      $this->db->query('INSERT INTO reg_user (email, password, user_type, prof_img, tp_number, otp_code , otp_verify, verification_status) VALUES(:email, :password, :user_type, :prof_img, :tp_number, :otp_code, :otp_verify, :verification_status)');
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
  
        // Check row
        if($this->db->rowCount() > 0){
=======
        $user_id = $row->id;

        $this->db->query('INSERT INTO org_ben (org_name, org_type, emp_name, emp_id, designation, address, city, district, acc_status, user_id) VALUES(:org_name, :org_type, :emp_name, :emp_id, :designation, :address, :city, :district, :acc_status, :user_id)');

        $this->db->bind(':org_name', $data['compname']);
        $this->db->bind(':org_type', $data['orgtype']);
        $this->db->bind(':emp_name', $data['fullname']);
        $this->db->bind(':emp_id', $data['empid']);
        $this->db->bind(':designation', $data['desg']);
        // $this->db->bind(':contact', $data['contact']);
        $this->db->bind(':district', $data['district']);
        $this->db->bind(':address', $data['address']);
        // $this->db->bind(':identity', $data['identity']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':district', $data['district']);
        $this->db->bind(':acc_status', $data['acc_status']);
        $this->db->bind(':user_id', $user_id);

        if ($this->db->execute()) {
>>>>>>> Stashed changes
          return true;
        } else {
          return false;
        }
      }
<<<<<<< Updated upstream
  }
=======
    } else {
      return false;
    }
  }

  public function register($data){
    $this->db->query('INSERT INTO reg_user (email, password, otp_verify, otp_code) VALUES(:email, :password, :verification_status, :otp_code)');
    // Bind values
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':verification_status', $data['verification_status']);
    $this->db->bind(':otp_code', $data['otp_code']);

    // Execute
    if ($this->db->execute()) {
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
  public function login($email, $password){
    $this->db->query('SELECT * FROM reg_user WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->password;
    if (password_verify($password, $hashed_password)) {
      return $row;
    } else {
      return false;
    }
  }

  public function findUserByContact($tp_number){
    $this->db->query('SELECT * FROM reg_user WHERE tp_number = :tp_number');
    // Bind value
    $this->db->bind(':tp_number', $tp_number);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
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
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function findUserByNIC($nic){
    $this->db->query('SELECT * FROM ind_don WHERE NIC = :nic');
    // Bind value
    $this->db->bind(':nic', $nic);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      return true;
    } else {
      return false;
    }
  }

  public function getUserType($email){
    $this->db->query('SELECT user_type FROM reg_user WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      $user_type = $row->user_type;
      return $user_type;
    } else {
      return false;
    }
  }

  public function getCategories(){
    $this->db->query('SELECT * FROM categories');
    $results = $this->db->resultSet();
    return $results;  
<<<<<<< Updated upstream
}

}
>>>>>>> Stashed changes
=======
}

}
>>>>>>> Stashed changes
