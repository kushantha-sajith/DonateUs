<?php

class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getDistricts()
    {
        $this->db->query('SELECT * FROM district');
        $results = $this->db->resultSet();
        return $results;
    }

    public function getOrgType()
    {
        $this->db->query('SELECT * FROM org_type');
        $results = $this->db->resultSet();
        return $results;
    }

    // 1 - Admin
    // 2 - Individual Donor
    // 3 - Corporate Donor
    // 4 - Individual Beneficiary
    // 5 - Organization Beneficiary
    // 6 - Event Organizer

    /**
     * @param $data
     * @param $type
     * @return bool
     */
    public function registerDonor($data, $type)
    {
        $type1 = "ind";

        if (strcmp($type, $type1) == 0) {
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
            if ($this->db->execute()) {

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

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
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
            if ($this->db->execute()) {

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

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    // Regsiter user

    /**
     * @param $data
     * @param $type
     * @return bool
     */
    public function registerBeneficiary($data, $type)
    {
        $type1 = "ind";

        if (strcmp($type, $type1) == 0) {
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
            if ($this->db->execute()) {

                $this->db->query('SELECT id FROM reg_user WHERE email = :email');
                $this->db->bind(':email', $data['email_ind']);
                $row = $this->db->single();
                $user_id = $row->id;

                $this->db->query('INSERT INTO ind_ben (f_name, l_name, NIC, address_proof, address, zipcode, district, acc_status, user_id, identity) VALUES(:f_name, :l_name, :NIC, :address_proof, :address, :zipcode, :district, :acc_status, :user_id, :identity)');

                $this->db->bind(':f_name', $data['fname']);
                $this->db->bind(':l_name', $data['lname']);
                $this->db->bind(':NIC', $data['nic']);
                $this->db->bind(':address_proof', $data['address_ind']);
                $this->db->bind(':address', $data['add_ind']);
                $this->db->bind(':identity', $data['identity_ind']);
                $this->db->bind(':zipcode', $data['zipcode_ind']);
                $this->db->bind(':district', $data['district_ind']);
                $this->db->bind(':acc_status', $data['acc_status']);
                $this->db->bind(':user_id', $user_id);

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            //Organization-------------------------------------------------------------------------------------------------
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
            if ($this->db->execute()) {

                $this->db->query('SELECT id FROM reg_user WHERE email = :email');
                $this->db->bind(':email', $data['email']);
                $row = $this->db->single();
                $user_id = $row->id;

                $this->db->query('INSERT INTO org_ben (org_name, org_type, emp_name, emp_id, designation, address_proof, address, identity, zipcode, district, acc_status, user_id) VALUES(:org_name, :org_type, :emp_name, :emp_id, :designation, :address_proof, :address, :identity, :zipcode, :district, :acc_status, :user_id)');

                $this->db->bind(':org_name', $data['compname']);
                $this->db->bind(':org_type', $data['orgtype']);
                $this->db->bind(':emp_name', $data['fullname']);
                $this->db->bind(':emp_id', $data['empid']);
                $this->db->bind(':designation', $data['desg']);
                $this->db->bind(':district', $data['district']);
                $this->db->bind(':address_proof', $data['address']);
                $this->db->bind(':address', $data['add']);
                $this->db->bind(':identity', $data['identity']);
                $this->db->bind(':zipcode', $data['zipcode']);
                $this->db->bind(':acc_status', $data['acc_status']);
                $this->db->bind(':user_id', $user_id);

                     

                if ($this->db->execute()) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function registerOrganizer($data)
    {

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
        if ($this->db->execute()) {

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

            if ($this->db->execute()) {
                return true;
            } else {
                return false;
            }
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
    public function login($email, $password)
    {
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

    /**
     * @param $tp_number
     * @return bool
     */
    public function findUserByContact($tp_number)
    {
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
    public function findUserByEmail($email)
    {
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

    /**
     * @param $nic
     * @return bool
     */
    public function findUserByNIC($nic)
    {
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

    /**
     * @param $email
     * @return false
     */
    public function getUserType($email)
    {
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


    public function getFirstLogin($user_id)
    {
        $this->db->query('SELECT first_login FROM org_ben WHERE user_id = :user_id');
        // Bind value
        $this->db->bind(':user_id', $user_id);
     
        $row = $this->db->single();

        $results =$row->first_login;
        return $results;

    }

    // public function findUserByUserId($user_id)
    // {
    //     $this->db->query('SELECT * FROM reg_user JOIN org_ben ON reg_user.id = org_ben.user_id WHERE reg_user.email = :email ');
    //     // Bind value
    //     $this->db->bind(':email', $email);

    //     $row = $this->db->single();

    //     // Check row
    //     if ($this->db->rowCount() > 0) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }


    public function addReservationDetails($data,$id){
        $this->db->query('UPDATE org_ben SET first_login =:first_login, reservation=:reservation, members=:members, reservation_description=:reservation_description, meal_plan=:meal_plan WHERE user_id=:user_id ');
        // Bind values
        $this->db->bind(':first_login', 1);
        $this->db->bind(':reservation', 1);
        $this->db->bind(':reservation_description', $data['reservation_description']);
        $this->db->bind(':members', $data['members']);
        $this->db->bind(':meal_plan', $data['meal_plan']);
        $this->db->bind(':user_id', $id);

        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function insertPasswordResetToken($email, $token, $expiry)
    {
        $this->db->query('UPDATE reg_user SET password_reset_hash=:token, password_reset_expiry=:expiry WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $email);
        $this->db->bind(':token', $token);
        $this->db->bind(':expiry', $expiry);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $token
     * @return false|mixed
     */
    public function getUserByToken($token)
    {
        $this->db->query('SELECT * FROM reg_user WHERE password_reset_hash = :token');
        // Bind value
        $this->db->bind(':token', $token);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @param $hashedPassword
     * @return bool
     */
    public function updatePassword($email, $hashedPassword)
    {
        $this->db->query('UPDATE reg_user SET password = :password WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $email
     * @return bool
     */
    public function deletePasswordResetToken($email)
    {
        $this->db->query('UPDATE reg_user SET password_reset_hash = NULL, password_reset_expiry = NULL WHERE email = :email');
        // Bind values
        $this->db->bind(':email', $email);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }


    // public function needReservation($id)
    // {
    //     $this->db->query('UPDATE org_ben SET reservation = :reservation WHERE user_id = :user_id');
    //     // Bind values
    //     $this->db->bind(':user_id', $id);
    //     $this->db->bind(':reservation', 1);

    //     // Execute
    //     if ($this->db->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
