<?php

use helpers\Email;
use helpers\NIC_Validator;


class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->verificationModel = $this->model('VerificationModel');
        $this->donorModel = $this->model('DonorModel');
    }

    //Register function

    /**
     * @return void
     */
    public function registerDonor($type)
    {
        $type1 = "ind";
        $districts = $this->userModel->getDistricts();

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $otp_verify = 0;
            $otp_code = rand(100000, 999999);
            $verification_status = 1;

            // Init data
            if (strcmp($type, $type1) == 0) {
                $data = [
                    'email_ind' => trim($_POST['email_ind']),
                    'nic' => trim($_POST['nic']),
                    'password_ind' => trim($_POST['password_ind']),
                    'confirm_password_ind' => trim($_POST['confirm_password_ind']),
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'contact_ind' => trim($_POST['contact_ind']),
                    'city_ind' => trim($_POST['city_ind']),
                    'district_ind' => trim($_POST['district_ind']),
                    'otp_verify' => $otp_verify,
                    'otp_code' => $otp_code,
                    'verification_status' => $verification_status,
                    'districts' => $districts,
                    'prof_img' => 'img_profile.png',
                    'acc_status' => '1',
                    'email_err_ind' => '',
                    'nic_err' => '',
                    'password_err_ind' => '',
                    'confirm_password_err_ind' => '',
                    'fname_err_ind' => '',
                    'lname_err_ind' => '',
                    'contact_err_ind' => '',
                    'city_err_ind' => '',
                    'district_err_ind' => '',
                    'city_err' => '',
                    'district_err' => '',
                    'city' => '',
                    'district' => '',
                    'email' => '',
                    'compname' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'fullname' => '',
                    'empid' => '',
                    'desg' => '',
                    'contact' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'contact_err' => '',
                    'cname_err' => '',
                    'fullname_err' => '',
                    'desg_err' => '',
                    'empid_err' => '',
                    'tab' => 'Individual'
                ];

                $error = false;
                // Validate Email
                if (empty($data['email_ind'])) {
                    $data['email_err_ind'] = 'Please enter email';
                    $error = true;
                } else {
                    // Check email
                    if ($this->userModel->findUserByEmail($data['email_ind'])) {
                        $data['email_err_ind'] = 'Email is already taken';
                        $error = true;
                    }
                }
                //Validate NIC
                if (empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter NIC';
                    $error = true;
                } else {
                    // Check NIC
                    $nic = new NIC_Validator($data['nic']);
                    $validity = $nic->checkNIC($data['nic']);
                    if (!$validity) {
                        $data['nic_err'] = 'Enter a valid NIC';
                        $error = true;
                    }
                    if ($this->userModel->findUserByNIC($data['nic'])) {
                        $data['nic_err'] = 'NIC Number is already taken';
                        $error = true;
                    }
                }

                // Validate Password
                if (empty($data['password_ind'])) {
                    $data['password_err_ind'] = 'Please enter password';
                    $error = true;
                } elseif (strlen($data['password_ind']) < 6) {
                    $data['password_err_ind'] = 'Password must be at least 6 characters';
                    $error = true;
                }

                // Validate Confirm Password
                if (empty($data['confirm_password_ind'])) {
                    $data['confirm_password_err_ind'] = 'Please confirm password';
                    $error = true;
                } else {
                    if ($data['password_ind'] != $data['confirm_password_ind']) {
                        $data['confirm_password_err_ind'] = 'Passwords do not match';
                        $error = true;
                    }
                }

                //validate other fields
                if (empty($data['fname'])) {
                    $data['fname_err_ind'] = 'Required';
                    $error = true;
                }
                if (empty($data['lname'])) {
                    $data['lname_err_ind'] = 'Required';
                    $error = true;
                }
                if (empty($data['contact_ind'])) {
                    $data['contact_err_ind'] = 'Required';
                    $error = true;
                } else {
                    // Check contact number
                    if ($this->userModel->findUserByContact($data['contact_ind'])) {
                        $data['contact_err_ind'] = 'Contact Number is already taken';
                        $error = true;
                    }
                }
                if (empty($data['city_ind'])) {
                    $data['city_err_ind'] = 'Required';
                    $error = true;
                }
                if (($data['district_ind']) == 1) {
                    $data['district_err_ind'] = 'Required';
                    $error = true;
                }
                // Make sure errors are empty
                if (!$error) {
                    // Validated

                    // Hash Password
                    $data['password_ind'] = password_hash($data['password_ind'], PASSWORD_DEFAULT);

                    // Register User
                    if ($this->userModel->registerDonor($data, $type)) {
                        $email = new Email($data['email_ind']);
                        $email->sendVerificationEmail($data['email_ind'], $otp_code);
                        redirect('users/verify');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register_donor', $data);
                }
            } else {
                //corporate--------------------------------------------------------------------------------------
                $data = [
                    'email' => trim($_POST['email']),
                    'compname' => trim($_POST['compname']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'city' => trim($_POST['city']),
                    'district' => trim($_POST['district']),
                    'fullname' => trim($_POST['fullname']),
                    'empid' => trim($_POST['empid']),
                    'desg' => trim($_POST['desg']),
                    'contact' => trim($_POST['contact']),
                    'user_type' => 'corporate_donor',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'contact_err' => '',
                    'cname_err' => '',
                    'fullname_err' => '',
                    'desg_err' => '',
                    'empid_err' => '',
                    'email_ind' => '',
                    'nic' => '',
                    'password_ind' => '',
                    'confirm_password_ind' => '',
                    'fname' => '',
                    'lname' => '',
                    'contact_ind' => '',
                    'city_ind' => '',
                    'district_ind' => '',
                    'district_err_ind' => '',
                    'otp_verify' => $otp_verify,
                    'otp_code' => $otp_code,
                    'verification_status' => $verification_status,
                    'districts' => $districts,
                    'prof_img' => 'img_profile.png',
                    'acc_status' => '1',
                    'email_err_ind' => '',
                    'nic_err' => '',
                    'password_err_ind' => '',
                    'confirm_password_err_ind' => '',
                    'fname_err_ind' => '',
                    'lname_err_ind' => '',
                    'contact_err_ind' => '',
                    'city_err_ind' => '',
                    'city_err' => '',
                    'district_err' => '',
                    'tab' => 'Corporate'
                ];

                $error = false;

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                    $error = true;
                } else {
                    // Check email
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                        $error = true;
                    }
                }

                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                    $error = true;
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                    $error = true;
                }

                // Validate Confirm Password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                    $error = true;
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                        $error = true;
                    }
                }

                //validate other fields
                if (empty($data['contact'])) {
                    $data['contact_err'] = 'Required';
                    $error = true;
                } else {
                    // Check contact number
                    if ($this->userModel->findUserByContact($data['contact'])) {
                        $data['contact_err'] = 'Contact Number is already taken';
                        $error = true;
                    }
                }
                if (empty($data['compname'])) {
                    $data['cname_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['fullname'])) {
                    $data['fullname_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['desg'])) {
                    $data['desg_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['empid'])) {
                    $data['empid_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['city'])) {
                    $data['city_err'] = 'Required';
                    $error = true;
                }
                if (($data['district']) == 1) {
                    $data['district_err'] = 'Required';
                    $error = true;
                }

                // Make sure errors are empty
                if (!$error) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if ($this->userModel->registerDonor($data, $type)) {
                        $email = new Email($data['email']);
                        $email->sendVerificationEmail($data['email'], $otp_code);
                        redirect('users/verify');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register_donor', $data);
                }
            }
        } else {
            // Init data
            $data = [
                'email_ind' => '',
                'nic' => '',
                'password_ind' => '',
                'confirm_password_ind' => '',
                'fname' => '',
                'lname' => '',
                'contact_ind' => '',
                'city_ind' => '',
                'district_ind' => '0',
                'email_err_ind' => '',
                'nic_err' => '',
                'password_err_ind' => '',
                'confirm_password_err_ind' => '',
                'other_err_ind' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'compname' => '',
                'fullname' => '',
                'empid' => '',
                'desg' => '',
                'contact' => '',
                'city' => '',
                'district' => '0',
                'email_err' => '',
                'nic_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'fname_err_ind' => '',
                'lname_err_ind' => '',
                'contact_err_ind' => '',
                'city_err_ind' => '',
                'district_err_ind' => '',
                'city_err' => '',
                'district_err' => '',
                'contact_err' => '',
                'cname_err' => '',
                'fullname_err' => '',
                'desg_err' => '',
                'empid_err' => '',
                'districts' => $districts,
                'tab' => 'Individual'
            ];

            // Load view
            $this->view('users/register_donor', $data);
        }
    }

    //Register function

    /**
     * @return void
     */
    public function registerBeneficiary($type)
    {
    
        $type1 = "ind";
        $districts = $this->userModel->getDistricts();
        $orgtype = $this->userModel->getOrgType();

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $otp_verify = 0;
            $otp_code = rand(100000, 999999);
            $verification_status = 0;

            // Init data
            if (strcmp($type, $type1) == 0) {
                $data = [
                    'email_ind' => trim($_POST['email_ind']),
                    'nic' => trim($_POST['nic']),
                    'password_ind' => trim($_POST['password_ind']),
                    'confirm_password_ind' => trim($_POST['confirm_password_ind']),
                    'fname' => trim($_POST['fname']),
                    'lname' => trim($_POST['lname']),
                    'contact_ind' => trim($_POST['contact_ind']),
                    'zipcode_ind' => trim($_POST['zipcode_ind']),
                    'district_ind' => trim($_POST['district_ind']),
                    // 'identity_ind' => trim($_POST['identity_ind']),
                    // 'address_ind' => trim($_POST['address_ind']),
                    'identity_ind' => $_FILES['identity_ind'],
                    'address_ind' => $_FILES['address_ind'],
                    'add_ind' => trim($_POST['add_ind']),
                    'otp_verify' => $otp_verify,
                    'otp_code' => $otp_code,
                    'verification_status' => $verification_status,
                    'districts' => $districts,
                    'orgtype' => $orgtype,
                    'prof_img' => 'img_profile.png',
                    'acc_status' => '1',
                    // 'address_ind' => '',
                    // 'identity_ind' => '',
                    'email_err_ind' => '',
                    'nic_err' => '',
                    'password_err_ind' => '',
                    'confirm_password_err_ind' => '',
                    'fname_err_ind' => '',
                    'lname_err_ind' => '',
                    'contact_err_ind' => '',
                    'zipcode_err_ind' => '',
                    'district_err_ind' => '',
                    'identity_err_ind' => '',
                    'address_err_ind' => '',
                    'add_err_ind' => '',
                    'zipcode' => '',
                    'district' => '',
                    'email' => '',
                    'compname' => '',
                    'orgtype' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'fullname' => '',
                    'empid' => '',
                    'desg' => '',
                    'contact' => '',
                    'address' => '',
                    'add' => '',
                    'identity' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'contact_err' => '',
                    'cname_err' => '',
                    'fullname_err' => '',
                    'desg_err' => '',
                    'empid_err' => '',
                    'zipcode_err' => '',
                    'orgtype_err' => '',
                    'address_err' => '',
                    'add_err' => '',
                    'identity_err' => '',
                    'district_err' => '',
                    'tab' => 'Individual'
                ];

                $error = false;
                // Validate Email
                if (empty($data['email_ind'])) {
                    $data['email_err_ind'] = 'Please enter email';
                    $error = true;
                } else {
                    // Check email
                    if ($this->userModel->findUserByEmail($data['email_ind'])) {
                        $data['email_err_ind'] = 'Email is already taken';
                        $error = true;
                    }
                }

                //Validate NIC
                if (empty($data['nic'])) {
                    $data['nic_err'] = 'Please enter NIC';
                    $error = true;
                } else {
                    // Check NIC
                    $nic = new NIC_Validator($data['nic']);
                    $validity = $nic->checkNIC($data['nic']);
                    if (!$validity) {
                        $data['nic_err'] = 'Enter a valid NIC';
                        $error = true;
                    }
                    if ($this->userModel->findUserByNIC($data['nic'])) {
                        $data['nic_err'] = 'NIC Number is already taken';
                        $error = true;
                    }
                }

                // Validate Password
                if (empty($data['password_ind'])) {
                    $data['password_err_ind'] = 'Please enter password';
                    $error = true;
                } elseif (strlen($data['password_ind']) < 6) {
                    $data['password_err_ind'] = 'Password must be at least 6 characters';
                    $error = true;
                }

                // Validate Confirm Password
                if (empty($data['confirm_password_ind'])) {
                    $data['confirm_password_err_ind'] = 'Please confirm password';
                    $error = true;
                } else {
                    if ($data['password_ind'] != $data['confirm_password_ind']) {
                        $data['confirm_password_err_ind'] = 'Passwords do not match';
                        $error = true;
                    }
                }

                //validate other fields
                if (empty($data['fname'])) {
                    $data['fname_err_ind'] = 'Required';
                    $error = true;
                }
                if (empty($data['lname'])) {
                    $data['lname_err_ind'] = 'Required';
                    $error = true;
                }
                if (empty($data['contact_ind'])) {
                    $data['contact_err_ind'] = 'Required';
                    $error = true;
                } else {
                    // Check contact number
                    if ($this->userModel->findUserByContact($data['contact_ind'])) {
                        $data['contact_err_ind'] = 'Contact Number is already taken';
                        $error = true;
                    }
                }
                if (empty($data['zipcode_ind'])) {
                    $data['zipcode_err_ind'] = 'Required';
                    $error = true;
                }
                if (($data['district_ind']) == 1) {
                    $data['district_err_ind'] = 'Required';
                    $error = true;
                }  

                if (empty($data['add_ind'])) {
                    $data['add_err_ind'] = 'Required';
                    $error = true;
                }

                //validate address
                if (!empty($_FILES['address_ind']['name'])) {
                    $img_name = $_FILES['address_ind']['name'];
                    $img_size = $_FILES['address_ind']['size'];
                    $tmp_name = $_FILES['address_ind']['tmp_name'];
                    $error = $_FILES['address_ind']['error'];

                    if ($error === 0) {
                        if ($img_size > 200000) {
                            $data['address_ind_err'] = "Sorry, your first image is too large.";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                $data['address_ind'] = $new_img_name;
                            } else {
                                $data['address_ind_err'] = "You can't upload files of this type";
                            }
                        }
                    } else {
                        $data['address_ind_err'] = "Unknown error occurred!";
                    }
                } else {
                    $data['address_ind_err'] = 'Please upload at least one image';
                }


                //validate identity
                if (!empty($_FILES['identity_ind']['name'])) {
                    $img_name = $_FILES['identity_ind']['name'];
                    $img_size = $_FILES['identity_ind']['size'];
                    $tmp_name = $_FILES['identity_ind']['tmp_name'];
                    $error = $_FILES['identity_ind']['error'];

                    if ($error === 0) {
                        if ($img_size > 200000) {
                            $data['identity_ind_err'] = "Sorry, your first image is too large.";
                        } else {
                            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                            $img_ex_lc = strtolower($img_ex);

                            $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                            if (in_array($img_ex_lc, $allowed_exs)) {
                                $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                                $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                                move_uploaded_file($tmp_name, $img_upload_path);
                                $data['identity_ind'] = $new_img_name;
                            } else {
                                $data['identity_ind_err'] = "You can't upload files of this type";
                            }
                        }
                    } else {
                        $data['identity_ind_err'] = "Unknown error occurred!";
                    }
                } else {
                    $data['identity_ind_err'] = 'Please upload at least one image';
                }



                // Make sure errors are empty
                if (!$error) {
                    // Validated

                    // Hash Password
                    $data['password_ind'] = password_hash($data['password_ind'], PASSWORD_DEFAULT);

                    // Register User
                    if ($this->userModel->registerBeneficiary($data, $type)) {
                        $email = new Email($data['email_ind']);
                        $email->sendVerificationEmail($data['email_ind'], $otp_code);
                        redirect('users/verify');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register_beneficiary', $data);
                }
            } else {
                //organization--------------------------------------------------------------------------------------
                $data = [
                    'email' => trim($_POST['email']),
                    'compname' => trim($_POST['compname']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'zipcode' => trim($_POST['zipcode']),
                    'district' => trim($_POST['district']),
                    'orgtype' => trim($_POST['orgtype']),
                    'fullname' => trim($_POST['fullname']),
                    'empid' => trim($_POST['empid']),
                    'desg' => trim($_POST['desg']),
                    'contact' => trim($_POST['contact']),
                    'add' => trim($_POST['add']),
                    'address' => trim($_POST['address']),
                    'identity' => trim($_POST['identity']),
                    // 'orgtype' => $_FILES['orgtype'],
                    // 'identity' => $_FILES['identity'],
                    'user_type' => 'corporate_donor',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'contact_err' => '',
                    'cname_err' => '',
                    'fullname_err' => '',
                    'desg_err' => '',
                    'empid_err' => '',
                    'zipcode_err' => '',
                    'district_err' => '',
                    'address_err' => '',
                    'identity_err' => '',
                    'orgtype_err' => '',
                    'add_err' => '',
                    'email_ind' => '',
                    'nic' => '',
                    'password_ind' => '',
                    'confirm_password_ind' => '',
                    'fname' => '',
                    'lname' => '',
                    'contact_ind' => '',
                    'zipcode_ind' => '',
                    'district_ind' => '',
                    'identity_ind' => '',
                    'address_ind' => '',
                    'add_ind' => '',
                    'otp_verify' => $otp_verify,
                    'otp_code' => $otp_code,
                    'verification_status' => $verification_status,
                    'districts' => $districts,
                    'orgtype' => $orgtype,
                    'prof_img' => 'img_profile.png',
                    'acc_status' => '1',
                    'email_err_ind' => '',
                    'nic_err' => '',
                    'password_err_ind' => '',
                    'confirm_password_err_ind' => '',
                    'district_err_ind' => '',
                    'fname_err_ind' => '',
                    'lname_err_ind' => '',
                    'contact_err_ind' => '',
                    'zipcode_err_ind' => '',
                    'identity_err_ind' => '',
                    'address_err_ind' => '',
                    'add_err_ind' => '',
                    'tab' => 'Organization'
                ];

                $error = false;

                // Validate Email
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                    $error = true;
                } else {
                    // Check email
                    if ($this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'Email is already taken';
                        $error = true;
                    }
                }

                // Validate Password
                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                    $error = true;
                } elseif (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters';
                    $error = true;
                }

                // Validate Confirm Password
                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                    $error = true;
                } else {
                    if ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match';
                        $error = true;
                    }
                }

                //validate other fieldds
                if (empty($data['contact'])) {
                    $data['contact_err'] = 'Required';
                    $error = true;
                } else {
                    // Check contact number
                    if ($this->userModel->findUserByContact($data['contact'])) {
                        $data['contact_err'] = 'Contact Number is already taken';
                        $error = true;
                    }
                }
                if (empty($data['compname'])) {
                    $data['cname_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['fullname'])) {
                    $data['fullname_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['desg'])) {
                    $data['desg_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['empid'])) {
                    $data['empid_err'] = 'Required';
                    $error = true;
                }
                if (empty($data['zipcode'])) {
                    $data['zipcode_err'] = 'Required';
                    $error = true;
                }

                if (empty($data['add'])) {
                    $data['add_err'] = 'Required';
                    $error = true;
                }
                if (($data['district']) == 1) {
                    $data['district_err'] = 'Required';
                    $error = true;
                }
                     

                            
                if (empty($data['orgtype'])) {
                    $data['orgtype_err'] = 'Required';
                    $error = true;
                }
                // Make sure errors are empty
                if (!$error) {
                    // Validated

                    // Hash Password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register User
                    if ($this->userModel->registerBeneficiary($data, $type)) {
                        $email = new Email($data['email']);
                        $email->sendVerificationEmail($data['email'], $otp_code);
                        redirect('users/verify');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register_beneficiary', $data);
                }
            }
        } else {
            // Init data
            $data = [
                'email_ind' => '',
                'nic' => '',
                'password_ind' => '',
                'confirm_password_ind' => '',
                'fname' => '',
                'lname' => '',
                'contact_ind' => '',
                'zipcode_ind' => '',
                'district_ind' => '0',
                'identity_ind' => '',
                'address_ind' => '',
                'add_ind' => '',
                'email_err_ind' => '',
                'nic_err' => '',
                'password_err_ind' => '',
                'confirm_password_err_ind' => '',
                'other_err_ind' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'compname' => '',
                'fullname' => '',
                'empid' => '',
                'desg' => '',
                'contact' => '',
                'zipcode' => '',
                'district' => '0',
                'orgtype' => '',
                'address' => '',
                'add' => '',
                'identity' => '',
                'email_err' => '',
                'nic_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'fname_err_ind' => '',
                'lname_err_ind' => '',
                'contact_err_ind' => '',
                'zipcode_err_ind' => '',
                'district_err_ind' => '',
                'identity_err_ind' => '',
                'address_err_ind' => '',
                'add_err_ind' => '',
                'zipcode_err' => '',
                'district_err' => '',
                'orgtype_err' => '',
                'identity_err' => '',
                'address_err' => '',
                'add_err' => '',
                'contact_err' => '',
                'cname_err' => '',
                'fullname_err' => '',
                'desg_err' => '',
                'empid_err' => '',
                'districts' => $districts,
                'orgtype' => $orgtype,
                'tab' => 'Individual'
            ];

            // Load view
            $this->view('users/register_beneficiary', $data);
        }
    }


    /**
     * @return void
     */
    public function registerOrganizer()
    {
        $districts = $this->userModel->getDistricts();

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $otp_verify = 0;
            $otp_code = rand(100000, 999999);
            $verification_status = 0;

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'nic' => trim($_POST['nic']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'fullname' => trim($_POST['fullname']),
                'contact' => trim($_POST['contact']),
                'comm_name' => trim($_POST['comm_name']),
                'desg' => trim($_POST['desg']),
                'city' => trim($_POST['city']),
                'district' => trim($_POST['district']),
                'otp_verify' => $otp_verify,
                'otp_code' => $otp_code,
                'verification_status' => $verification_status,
                'districts' => $districts,
                'prof_img' => 'img_profile1.jpeg',
                'acc_status' => '1',
                'email_err' => '',
                'nic_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'fullname_err' => '',
                'contact_err' => '',
                'comm_name_err' => '',
                'desg_err' => '',
                'district_err' => '',
                'city_err' => '',
            ];

            $error = false;
            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
                $error = true;
            } else {
                // Check email
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_err'] = 'Email is already taken';
                    $error = true;
                }
            }

            //Validate NIC
            if (empty($data['nic'])) {
                $data['nic_err'] = 'Please enter NIC';
                $error = true;
            } else {
                // Check NIC
                $nic = new NIC_Validator($data['nic']);
                $validity = $nic->checkNIC($data['nic']);
                if (!$validity) {
                    $data['nic_err'] = 'Enter a valid NIC';
                    $error = true;
                }
                if ($this->userModel->findUserByNIC($data['nic'])) {
                    $data['nic_err'] = 'NIC Number is already taken';
                    $error = true;
                }
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
                $error = true;
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = 'Password must be at least 6 characters';
                $error = true;
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
                $error = true;
            } else {
                if ($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords do not match';
                    $error = true;
                }
            }

            //validate other fields
            if (empty($data['fullname'])) {
                $data['fullname_err'] = 'Required';
                $error = true;
            }
            if (empty($data['contact'])) {
                $data['contact_err'] = 'Required';
                $error = true;
            } else {
                // Check contact number
                if ($this->userModel->findUserByContact($data['contact'])) {
                    $data['contact_err'] = 'Contact Number is already taken';
                    $error = true;
                }
            }
            if (empty($data['comm_name'])) {
                $data['comm_name_err'] = 'Required';
                $error = true;
            }
            if (($data['desg']) == 1) {
                $data['desg_error'] = 'Required';
                $error = true;
            }

            if (empty($data['city'])) {
                $data['city_err'] = 'Required';
                $error = true;
            }
            if (($data['district']) == 1) {
                $data['district_err'] = 'Required';
                $error = true;
            }

            // Make sure errors are empty
            if (!$error) {
                // Validated

                // Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Register User
                if ($this->userModel->registerOrganizer($data)) {

                    $email = new Email($data['email']);
                    $email->sendVerificationEmail($data['email'], $otp_code);
                    redirect('users/verify');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/register_eorganizer', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'nic' => '',
                'password' => '',
                'confirm_password' => '',
                'fullname' => '',
                'contact' => '',
                'comm_name' => '',
                'desg' => '',
                'city' => '',
                'district' => '',
                'districts' => $districts,
                'email_err' => '',
                'nic_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
                'fullname_err' => '',
                'contact_err' => '',
                'comm_name_err' => '',
                'desg_err' => '',
                'district_err' => '',
                'city_err' => '',
            ];

            // Load view
            $this->view('users/register_eorganizer', $data);
        }
    }

    //login method for all users of the system

    /**
     * @return void
     */
    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            $user_type = $this->userModel->getUserType($data['email']);
            // Check for user/email
            if ($this->userModel->findUserByEmail($data['email'])) {
                // User found
            } else {
                // User not found
                $data['email_err'] = 'No user found';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                // Check and set logged-in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);
                                       
                if ($loggedInUser) {
                    // Create Session
                    $this->createUserSession($loggedInUser);
                }               
                else{
                    $data['password_err'] = 'Password incorrect';

                    $this->view('users/login', $data);
                }
            } else {
                // Load view with errors
                $this->view('users/login', $data);
            }
        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('users/login', $data);
        }
    }


    // public function createFirstLogin()
    // {
    //     if (!isLoggedIn()) {
    //         redirect('users/login');
    //     }
    //     $this->view('users/beneficiary/first_login');
    // }


  



    //otp verification

    /**
     * @param $user
     * @return void
     */
    public function createUserSession($user)
    {
        if ($user->verification_status == 1) {
            if ($user->otp_verify == 1) {
                $_SESSION['user_id'] = $user->id;
                $_SESSION['user_email'] = $user->email;
                $_SESSION['user_type'] = $user->user_type;

                switch ($user->user_type) {
                    case 1:
                        redirect('pages/admin');
                        break;
                    case 2:
                        redirect('pages/donor');
                        break;
                    case 3:
                        redirect('pages/donor');
                        break;
                    case 4:
                        redirect('pages/beneficiary');
                        break;
                    case 5:
                         // Check if the user has logged in before
                            $org_ben = $this->userModel->getFirstLogin($_SESSION['user_id']);

                            if ($org_ben == 0) {
                                redirect('users/createFirstLogin');
                            } else {
                                // If not zero you can login
                                redirect('pages/beneficiary');
                            }
                        break;
                    case 6:
                        redirect('pages/organizer');
                        break;
                    default:
                        redirect('users/login');
                        break;
                }
            } else {
                redirect('users/verify');
            }
        } else {
            redirect('pages/processing');
        }
    }

    public function createFirstLogin()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/beneficiary/first_login');
    }


    public function addReservationDetails()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // $user_id = $this->userModel->getRequests($id);
            // $user = $this->userModel->findUserByUserId($_SESSION['user_id']);
            $id =  $_SESSION['user_id'];

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                // 'user' => $user,
                'members' => trim($_POST['members']),
                'reservation_description' => trim($_POST['reservation_description']),
                'meal_plan' => $_FILES['meal_plan'],
                'meal_planErr' => '',
                'id'=>$id
               
                
            ];

            //validate thumbnail
            if (!empty($_FILES['meal_plan']['name'])) {
                $img_name = $_FILES['meal_plan']['name'];
                $img_size = $_FILES['meal_plan']['size'];
                $tmp_name = $_FILES['meal_plan']['tmp_name'];
                $error = $_FILES['meal_plan']['error'];

                if ($error === 0) {
                    if ($img_size > 200000) {
                        $data['meal_planErr'] = "Sorry, your first image is too large.";
                    } else {
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION); //Extension type of image(jpg,png)
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png", "pdf");

                        if (in_array($img_ex_lc, $allowed_exs)) {
                            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                            $img_upload_path = dirname(APPROOT) . '/public/uploads/' . $new_img_name;
                            move_uploaded_file($tmp_name, $img_upload_path);
                            $data['meal_plan'] = $new_img_name;
                        } else {
                            $data['meal_planErr'] = "You can't upload files of this type";
                        }
                    }
                } else {
                    $data['meal_planErr'] = "Unknown error occurred!";
                }
            } else {
                $data['meal_planErr'] = 'Please upload at least one image';
            }
            if(empty($data['meal_planErr'])){

            if($this->userModel->addReservationDetails($data,$id)){
                // flash('category_message', 'Category Added');
                redirect('pages/beneficiary');
            } else {
                die('Something went wrong');
            }    
        }    
            
        } else {
            $data = [
                'members' => '',
                'reservation_description' => '',
                'meal_plan' => '',
                'meal_planErr' =>''
                // 'id'=>$id

                // 'field' => $field
            ];

            $this->view('users/beneficiary/reservation_details', $data);

        }
    }



//         public function noneedReservation(){
//         if($this->userModel->noneedReservation()){
//             $loggedInUser = $this->userModel->login($data['email'], $data['password']);
//             $this->createUserSession($loggedInUser);

//             // redirect('admin/categories');
//         } else {
//             die('Something went wrong');
//         }
// }

    /**
     * @return void
     */
    public function verify()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'otp' => trim($_POST['otp']),
                'error' => '',
                'status' => ''
            ];

            $verified = $this->verificationModel->verifyOTP($data['otp']);

            if (is_numeric($data['otp']) && $verified) {
                if ($this->verificationModel->verify($verified->id)) {
                    // set verification successful flash message
                    // setFlash("verify","Your account has been verified",Flash::FLASH_SUCCESS);
                    // redirect to the login of patient
                    redirect('users/login');
                } else {
                    // set verification failed flash message
                    // setFlash("verify","Account verification failed!",Flash::FLASH_DANGER);
                    // redirect to the signup of patient
                    redirect('users/register');
                }
            } else {
                $data['error'] = "Invalid OTP";
            }
        } else {
            $data = [
                'otp' => '',
                'error' => '',
                'status' => ''
            ];
        }
        $this->view('users/signupVerification', $data);
    }

    /**
     * @return void
     */
    public function otpVerify($field)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'otp' => trim($_POST['otp']),
                'error' => '',
                'field' => $field
            ];

            $verified = $this->verificationModel->verifyOTP($data['otp']);

            if (is_numeric($data['otp']) && $verified) {
                if ($this->verificationModel->verifyUpdate($verified->id)) {
                    redirect('pages/profileDonor');
                } else {

                    redirect('donor/changePasswordDonor');
                }
            } else {
                $data['error'] = "Invalid OTP";
                $this->view('users/otp_verification', $data);
            }
        } else {
            $data = [
                'otp' => '',
                'error' => '',
                'field' => $field
            ];

            $this->view('users/otp_verification', $data);
        }

    }

    //create sessions for all users

    /**
     * @return void
     */
    public function quitVerify($value)
    {
        $id = $_SESSION['user_id'];

        $field = $value;
        if ($this->donorModel->setToDefault($id, $field)) {
            redirect('pages/profileDonor');
        }

    }

    //logout method

    /**
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_type']);
        session_destroy();

        redirect('pages/index');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function forgotPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => trim($_POST['email']),
                'email_err' => ''
            ];

            $user = $this->userModel->findUserByEmail($data['email']);

            if ($user) {
                $token = bin2hex(random_bytes(16));
                $expiry = time() + 3600; // Token expires in 1 hour
                $this->userModel->insertPasswordResetToken($data['email'], $token, $expiry);
                // Send password reset email
                $resetLink = "http://localhost/DonateUs/users/resetPassword/" . $token;
                $mail = new Email($data['email']);
                $mail->sendPasswordResetEmail($resetLink);
//                $data['status'] = "OTP sent to your email";
                $this->view('pages/index');
            } else {
                $data['email_err'] = "Email not found";
                $this->view('users/reset_password', $data);
            }
        } else {
            $data = [
                'email' => '',
                'email_err' => ''
            ];
            $this->view('users/reset_password', $data);
        }
    }
//TODO: reset password

    /**
     * @return void
     */
    public function resetPassword($token)
    {
        $passwordReset = $this->userModel->getUserByToken($token);
        if ($passwordReset) {
            if ($passwordReset->password_reset_expiry > time()) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = [
                        'password' => trim($_POST['password']),
                        'confirm_password' => trim($_POST['confirm_password']),
                        'password_err' => '',
                        'confirm_password_err' => '',
                        'token' => $token
                    ];

                    // Validate new password
                    if (empty($data['password'])) {
                        $data['password_err'] = 'Please enter a new password.';
                    } elseif (strlen($data['password']) < 6) {
                        $data['password_err'] = 'Password must be at least 6 characters long.';
                    }

                    // Validate confirm password
                    if (empty($data['confirm_password'])) {
                        $data['confirm_password_err'] = 'Please confirm your new password.';
                    } elseif ($data['password'] != $data['confirm_password']) {
                        $data['confirm_password_err'] = 'Passwords do not match.';
                    }

                    // If there are no errors, update the user's password
                    if (empty($data['password_err']) && empty($data['confirm_password_err'])) {
                        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
                        $this->userModel->updatePassword($passwordReset->email, $hashed_password);
                        $this->userModel->deletePasswordResetToken($passwordReset->email);

                        $data = [
                            'email' => '',
                            'password' => '',
                            'email_err' => '',
                            'password_err' => '',
                        ];

                        $this->view('users/login', $data);
                    } else {
                        // If there are errors, display the form again with error messages
                        $this->view('users/forgot_password', $data);
                    }
                } else {
                    $data = [
                        'password' => '',
                        'confirm_password' => '',
                        'password_err' => '',
                        'confirm_password_err' => '',
                        'token' => $token
                    ];
                    $this->view('users/forgot_password', $data);
                }
            } else {
                $data = [
                    'password' => '',
                    'confirm_password' => '',
                    'password_err' => '',
                    'confirm_password_err' => 'Token has expired',
                    'token' => $token
                ];
                // If the token has expired, show an error message
                $this->view('users/forgot_password', $data);
            }
        } else {
            $data = [
                'password' => '',
                'confirm_password' => '',
                'password_err' => '',
                'confirm_password_err' => 'Token is invalid',
                'token' => $token
            ];
            // If the token is not valid, show an error message
            $this->view('users/forgot_password', $data);
        }
    }
}
