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
        $this->adminModel = $this->model('adminModel');
        $this->statModel = $this->model('statModel');
    }



    /** Event Organizers Pages  */
    public function CreateEvent()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        //get the number of pending and ongoing reequests and if the sum is greater than 3 redirect to you have reached the limit
        $id = $_SESSION['user_id'];
        $ongoingRequestCount = $this->EOrganizerModel->getOngoingReqCount($id);
        $pendingRequestCount = $this->EOrganizerModel->getPendingReqCount($id);
        if ($ongoingRequestCount + $pendingRequestCount >= 3) {
            $this->view('users/eorganizer/limit_reached');
            return;
        }

        $data = [
            'title' => '',
            'ammount' => '',
            'description' => '',
           
            'city' => '',
            'duedate' => '',
            'proof' => '',
            'passbook' => '',
            'thumb' => '',
            'accountno' => '',
            'bankname' => '',
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
            'user_id' => ''
        ];
        $this->view('users/eorganizer/create_events', $data);
    }

    /**
     * @return void
     */
    public function updateprofileeorganizer()
    {

        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $otp_code = rand(100000, 999999);
        $verification_status = 1;
        $otp_verify = 1;
        $otp_code = 0;
        $type = $_SESSION['user_type'];
        $id = $_SESSION['user_id'];
        $districts = $this->userModel->getDistricts();

        // Init data
        $data = [
            'full_name' => trim($_POST['full_name']),
            'comm_name' => trim($_POST['comm_name']),
            'desg' => trim($_POST['desg']),
            'contact' => trim($_POST['contact']),
            'city' => trim($_POST['city']),
            'district' => trim($_POST['district']),
            'type' => $type,
            'id' => $id,
            'otp_code' => $otp_code,
            'otp_verify' => $otp_verify
        ];

        if ($this->EOrganizerModel->updateprofileeorganizer($data)) {
            redirect('pages/profileOrganizer');
        } else {
            redirect('pages/editProfileOrganizer');
        }
    }


    public function DonationHistory()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $user_ID = $_SESSION['user_id'];
        $data = $this->EOrganizerModel->getDonationHistory($user_ID);
        $this->view('users/eorganizer/donation_history', $data);
    }

    public function DonationReq()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/donation_requests');
    }

    public function EventDetails($status)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $id = $_SESSION['user_id'];
        $data['event_req'] = $this->EOrganizerModel->getEvents($id, $status);
        switch ($status) {
            case '0':
                $data['status'] = 'Pending Events';
                break;
            case '1':
                $data['status'] = 'Ongoing Events';
                break;
            case '2':
                $data['status'] = 'Rejected Events';
                break;
            case '3':
                $data['status'] = 'Completed Events';
                break;
        }
        $data['statusNumber'] = intval($status);
        $this->view('users/eorganizer/event_details', $data);
    }

    public function EventDetailsFull($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $eventDetails = $this->EOrganizerModel->getEvent($id);
        $data = [
            'eventDetails' => $eventDetails,
            'statusNumber' => intval($eventDetails->status),
            'eventID' => $id,
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
            'update' => false
        ];
        // exit(json_encode($data));

        $this->view('users/eorganizer/event_details_more', $data);
    }

    public function updateEvent($event_id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = $_SESSION['user_id'];
        }
        //Data from input tags
        $data = [
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
            'user_id' => $id,
            'event_id' => $event_id,
            'update' => true
        ];
        //Data from image uploads
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

        /***Validations****/

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
            $eventDetails = $this->EOrganizerModel->getEvent($event_id);
            if($file['thumb_name'] == ''){
                $file['thumb_name'] = $eventDetails->thumbnail;
            }
            if($file['passbook_name'] == ''){
                $file['passbook_name'] = $eventDetails->bank_pass_book;
            }
            if($file['proof_name'] == ''){
                $file['proof_name'] = $eventDetails->proof_letter;
            }
            if ($this->EOrganizerModel->updateEvent($data, $file)) {
                redirect('EOrganizer/EventDetailsFull/' . $event_id);
            } else {
                die('Something went wrong');
            }
        } else {
            // Load view with errors
            $dataRedirect = [
                'eventDetails' => $this->EOrganizerModel->getEvent($event_id),
                'statusNumber' => intval($this->EOrganizerModel->getEvent($event_id)->status),
                'eventID' => $event_id,
                'titleErr' => $data['titleErr'],
                'amountErr' => $data['amountErr'],
                'descriptionErr' => $data['descriptionErr'],
                'cityErr' => $data['cityErr'],
                'duedateErr' => $data['duedateErr'],
                'proofErr' => $data['proofErr'],
                'passbookErr' => $data['passbookErr'],
                'thumbErr' => $data['thumbErr'],
                'user_idErr' => $data['user_idErr'],
                'accnumberErr' => $data['accnumberErr'],
                'banknameErr' => $data['banknameErr'],
                'update' => true
            ];
            $this->view('users/eorganizer/event_details_more', $dataRedirect);
        }
    }

    public function Reports()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
      
    }

    public function stats()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/stats');
    }

    public function Sponserships()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/eorganizer/sponserships');
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
                    redirect('EOrganizer/EventDetails/0');
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
    }

    public function eventReqReport()
    {
        $events = $this->adminModel->eventHistory();
        $ongoing = $this->statModel->ongoingEvents();
        $completed = $this->statModel->completedEvents();
        $rejected = $this->statModel->rejectedEvents();
        $data = [
            'title' => 'Event Report',
            'events' => $events,
            'ongoing' => $ongoing,
            'completed' => $completed,
            'rejected' => $rejected
        ];

        $this->view('users/eorganizer/reports', $data);
    }
}
