<?php

class EOrganizer extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->EOrganizerModel = $this->model('EOrganizerModel');
        $this->userModel = $this->model('User');
    }

    //load donor dashboard

    /**
     * @return void
     */
    public function index()
    {
        if (isset($_SESSION['user_id'])) {

            $id = $_SESSION['user_id'];

            $userdata = $this->donorModel->getUserData($id);
            foreach ($userdata as $user) :
                $image_name = $user->prof_img;
            endforeach;
            $data = [
                'title' => 'Dashboard',
                'prof_img' => $image_name
            ];

            $this->view('users/eorganizer/index', $data);
        } else {
            $this->view('users/login', $data);
        }
    }

    /**
     * @return void
     */
    public function updateProfileEorganizer()
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $otp_code = rand(100000, 999999);
        $verification_status = 1;
        $type = $_SESSION['user_type'];
        $id = $_SESSION['user_id'];
        $districts = $this->userModel->getDistricts();

        // Init data
        $data = [
            'full_name' => trim($_POST['full_name']),
            'contact' => trim($_POST['contact']),
            'comm_name' => trim($_POST['comm_name']),
            'desg' => trim($_POST['desg']),
            'city' => trim($_POST['city']),
            'district' => trim($_POST['district']),
            'type' => $type,
            'id' => $id
        ];

        if ($this->EOrganizerModel->update_profile_eorganizer($data)) {
            redirect('pages/profile_eorganizer');
        } else {
            redirect('pages/edit_profile_eorganizer');
        }
    }

    /**
     * @return void
     */
    public function stats()
    {
<<<<<<< Updated upstream
        $image_name = $this->profileImage();
        $data = [
            'title' => 'Statistics',
            'prof_img' => $image_name
        ];
        $this->view('users/donor/stats', $data);
=======
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/stats');
    }

    public function rejected()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/event_req_rejected');
    }

    public function completed()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/event_req_completed');
    }

    public function ongoing()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/event_req_ongoing');
    }


    //add a new Event
    public function Addevent()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $id = $_SESSION['user_id'];

            $data = [
                // 'id' => $id,
                'title' => trim($_POST['title']),
                'ammount' => trim($_POST['ammount']),
                'description' => trim($_POST['description']),
                'city' => trim($_POST['city']),
                'duedate' => trim($_POST['duedate']),
                'accountno' => trim($_POST['accountno']),
                'bankname' => trim($_POST['bankname']),
                'event_org_id' => $_SESSION['user_id'],
                'titleErr' => '',
                'amountErr' => '',
                'descriptionErr' => '',
                'cityErr' => '',
                'duedateErr' => '',
                'proofErr' => '',
                'passbookErr' => '',
                'thumbErr' => '',
                'user_idErr' => '',
                'accnumberErr' => '',
                'banknameErr' => '',
                //  'categories' => $categories,
                'user_id' => $id
            ];

            $file = [
                'thumb_name' => $_FILES['thumb']['name'],
                'thumb_type' => $_FILES['thumb']['type'],
                'thumb_size' => $_FILES['thumb']['size'],
                'thumb_temp_name' => $_FILES['thumb']['tmp_name'],

                'passbook_name' => $_FILES['passbook']['name'],
                'passbook_type' => $_FILES['passbook']['type'],
                'passbook_size' => $_FILES['passbook']['size'],
                'passbook_temp_name' => $_FILES['passbook']['tmp_name'],

                'proof_name' => $_FILES['proof']['name'],
                'proof_type' => $_FILES['proof']['type'],
                'proof_size' => $_FILES['proof']['size'],
                'proof_temp_name' => $_FILES['proof']['tmp_name'],

                'thumb_upload_to' => PUBROOT . '\public\img\uploads\thumb\\',
                'passbookb_upload_to' => PUBROOT . '\public\img\uploads\passbook\\',
                'proof_upload_to' => PUBROOT . '\public\img\uploads\proof\\'

            ];



            if (empty($data['title'])) {
                $data['titleErr'] = 'Please enter title';
            }


            if (empty($data['ammount'])) {
                $data['amountErr'] = 'Please enter amount';
            }

            if (empty($data['description'])) {
                $data['descriptionErr'] = 'Please enter description';
            }



            if (empty($data['city'])) {
                $data['cityErr'] = 'Please enter city';
            }

            if (empty($data['duedate'])) {
                $data['duedateErr'] = 'Please enter duedate';
            }

            if (empty($data['proof'])) {
                $data['proofErr'] = 'Please enter image';
            }

            if (empty($data['passbook'])) {
                $data['passbookErr'] = 'Please enter image';
            }

            if (empty($data['accountno'])) {
                $data['accnumberErr'] = 'Please enter account number';
            }

            if (empty($data['bankname'])) {
                $data['banknameErr'] = 'Please enter bank';
            }




            // Make sure no errors
            if (empty($data['descriptionErr']) && empty($data['titleErr']) && empty($data['amountErr']) && empty($data['duedateErr']) && empty($data['nameErr'])  && empty($data['NICErr']) && empty($data['cityErr']) &&  empty($data['accnumberErr']) && empty($data['banknameErr'])) {
                // Validated

                if ($this->EOrganizerModel->addevent($data, $file)) {
                    //  redirect('EOrganizer/');
                    $this->view('users/eorganizer/create_events', $data);
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('users/eorganizer/create_events', $data);
            }
        } else {
            $data = [
                /* 'id' => '',*/
                'title' => '',

                //'cat_id' => '',

                'amount' => '',
                'description' => '',
                'contact' => '',
                'city' => '',
                'duedate' => '',
                'proof' => '',
                'passbook' => '',
                'accnumber' => '',
                'bankname' => '',
                // 'img2' => '',
                //  'img3' => '',
                'titleErr' => '',
                'nameErr' => '',
                'NICErr' => '',
                //'categoryErr' => '',
                'descriptionErr' => '',
                'amountErr' => '',
                // 'typeErr' => '',
                'contactErr' => '',
                'cityErr' => '',
                // 'publisheddateErr' => '',
                'duedateErr' => '',
                // 'user_idErr' => '',
                'passbookErr' => '',
                'proofErr' => '',
                'accnumberErr' => '',
                'banknameErr' => '',
                // 'img2Err' => '',
                // 'img3Err' => '',
                // 'categories' => $categories
            ];

            $this->view('users/eorganizer/create_events', $data);
        }
>>>>>>> Stashed changes
    }
}

    