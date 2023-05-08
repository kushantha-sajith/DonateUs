<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->beneficiaryModel = $this->model('BeneficiaryModel');
        $this->donorModel = $this->model('DonorModel');
        $this->userModel = $this->model('User');
        $this->adminPageModel = $this->model('AdminPage');
        $this->adminModel = $this->model('AdminModel');
        $this->EOrganizerModel = $this->model('EOrganizerModel');
    }

    /**
     * @return void
     */
    public function index()
    {
        $data = [
            'title' => 'DonateUs'
        ];

        $this->view('pages/index', $data);
    }

    /**
     * @return void
     */
    public function about()
    {
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/about', $data);
    }

    /**
     * @return void
     */
    public function admin()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $totalUsers = $this->adminModel->getTotalUsers();
        $ongoingReqCount = $this->adminModel->getOngoingReqCount();
        $totalFinDonations = $this->adminModel->getTotalFinDonations();
        $recentDonations = $this->adminModel->getRecentDonations();
        $data = [
            'title' => 'Admin',
            'totalUsers' => $totalUsers,
            'ongoingReqCount' => $ongoingReqCount,
            'totalFinDonations' => $totalFinDonations,
            'recentDonations' => $recentDonations
        ];

        $this->view('users/admin/index', $data);
    }

    /**
     * @return void
     */
    public function donor()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $image_name = $this->profileImage();
        // $row2 = mysqli_fetch_assoc($userdata);
        // $image_name = $row2['prof_img'];
        $data = [
            'title' => 'Dashboard',
            'prof_img' => $image_name
        ];

        $this->view('users/donor/index', $data);
    }

    /**
     * @return void
     */
    public function profileImage()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $userdata = $this->donorModel->getUserData($id);
            foreach ($userdata as $user) :
                $image_name = $user->prof_img;
            endforeach;
            return $image_name;
        } else {
            $this->view('users/login', $data);
        }
    }

    /**
     * @return void
     */
    public function beneficiary()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $data = [
            'title' => 'Beneficiary'
        ];

        $this->view('users/beneficiary/index', $data);
    }

    /**
     * @return void
     */
    public function organizer()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $user_ID = $_SESSION['user_id'];

        $ongoingReqCount = $this->EOrganizerModel->getOngoingReqCount($user_ID);
        $pendingRequests = $this->EOrganizerModel->getPendingReqCount($user_ID);
        $totalDonations = $this->EOrganizerModel->getTotalDonations($user_ID);
        $recentDonations = $this->EOrganizerModel->getDonationHistory($user_ID);
        $data = [
            'title' => 'Admin',
            'ongoingReqCount' => $ongoingReqCount,
            'pendingRequests' => $pendingRequests,
            'totalDonations' => $totalDonations,
            'recentDonations' => $recentDonations
        ];

        $this->view('users/eorganizer/index', $data);
    }

    /**
     * @return void
     */
    public function profileDonor()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->donorModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);

            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name
            ];

            $this->view('users/donor/profile_donor', $data);
        } else {
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => ''
            ];
            $this->view('users/login', $data);
        }
    }

    /**
     * @return void
     */
    public function profileBeneficiary()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->donorModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);

            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name
            ];

            $this->view('users/beneficiary/profile_beneficiary', $data);
        } else {
            $this->view('users/login');
        }
    }

    /**
     * @return void
     */
    public function profileOrganizer()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->donorModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);

            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name
            ];

            $this->view('users/eorganizer/profile_eorganizer', $data);
        } else {
            $this->view('users/login');
        }
    }

    /**
     * @return void
     */
    public function editProfileDonor()
    {
        $districts = $this->userModel->getDistricts();
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->donorModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);

            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name,
                'districts' => $districts
            ];

            $this->view('users/donor/edit_profile_donor', $data);
        } else {
            $this->view('users/login_donor', $data);
        }
    }

    /**
     * @return void
     */
    public function changePasswordDonor()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->donorModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);

            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name
            ];

            $this->view('users/donor/change_password_donor', $data);
        } else {
            $this->view('users/login_donor', $data);
        }
    }

    /**
     * @return void
     */
    public function editProfileOrganizer()
    {
        $districts = $this->userModel->getDistricts();
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->EOrganizerModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);
            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name,
                'districts' => $districts
            ];

            $this->view('users/eorganizer/edit_profile_eorganizer', $data);
        } else {
            $this->view('users/login_donor', $data);
        }
    }

    /**
     * @return void
     */
    public function changePasswordOrganizer()
    {
        if (isset($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            $user_type = $_SESSION['user_type'];
            $userdata = $this->donorModel->getUserData($id);
            $personaldata = $this->donorModel->getPersonalData($id, $user_type);
            $image_name = $this->profileImage();
            $dist_name = $this->donorModel->getDistrictName($id, $user_type);

            $data = [
                'title' => 'Profile',
                'userdata' => $userdata,
                'personaldata' => $personaldata,
                'prof_img' => $image_name,
                'dist' => $dist_name
            ];

            $this->view('users/eorganizer/change_password_eorganizer', $data);
        } else {
            $this->view('users/login_donor', $data);
        }
    }

    //load donation history page

    /**
     * @return void
     */
    public function donationHistoryDonor()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $id = $_SESSION['user_id'];
        $records = $this->donorModel->getDonationHistory($id);
        $image_name = $this->profileImage();
        $data = [
            'title' => 'Donation History',
            'prof_img' => $image_name,
            'records' => $records
        ];

        $this->view('users/donor/donation_history_donor', $data);
    }

    //load donation requests page

    /**
     * @return void
     */
    public function donationRequestsDonor()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $requests = $this->donorModel->getDonationRequests();
        $financials = $this->donorModel->getFinancialRequests();
        $non_financials = $this->donorModel->getNonFinancialRequests();
        $image_name = $this->profileImage();
        $data = [
            'title' => 'Donation Requests',
            'prof_img' => $image_name,
            'requests' => $requests,
            'financials' => $financials,
            'non_financials' => $non_financials
        ];

        $this->view('users/donor/donation_requests_donor', $data);
    }

    /**
     * @return void
     */
    public function donationRequestsOrganizer()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $requests = $this->donorModel->getDonationRequests();
        $financials = $this->donorModel->getFinancialRequests();
        $non_financials = $this->donorModel->getNonFinancialRequests();
        $image_name = $this->profileImage();
        $data = [
            'title' => 'Donation Requests',
            'prof_img' => $image_name,
            'requests' => $requests,
            'financials' => $financials,
            'non_financials' => $non_financials
        ];

        $this->view('users/eorganizer/donation_requests', $data);
    }

    /**
     * @return void
     */
    public function pendingRequestDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $requestData = $this->adminPageModel->getPendingRequestDetails($id);
        $req_type = $this->adminPageModel->getReqType($id);
        $user_type = $this->adminPageModel->getUserTypeFromReq($id);
        if ($req_type == 0) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Amount',
                ];
                $this->view('users/admin/pendingRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Amount',
                ];
                $this->view('users/admin/pendingRequestDetails', $data);
            }
        } elseif ($req_type == 1) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Quantity',
                ];
                $this->view('users/admin/pendingRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Quantity',
                ];
                $this->view('users/admin/pendingRequestDetails', $data);
            }
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function ongoingRequestDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $requestData = $this->adminPageModel->getOngoingRequestDetails($id);
        $req_type = $this->adminPageModel->getReqType($id);
        $user_type = $this->adminPageModel->getUserTypeFromReq($id);
        if ($req_type == 0) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Amount',
                    'recAmount' => 'Received Amount',
                ];
                $this->view('users/admin/ongoingRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Amount',
                    'recAmount' => 'Received Amount',
                ];
                $this->view('users/admin/ongoingRequestDetails', $data);
            }
        } elseif ($req_type == 1) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Quantity',
                    'recAmount' => 'Received Quantity',
                ];
                $this->view('users/admin/ongoingRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Quantity',
                    'recAmount' => 'Received Quantity',
                ];
                $this->view('users/admin/ongoingRequestDetails', $data);
            }
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectedRequestDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $requestData = $this->adminPageModel->getRejectedRequestDetails($id);
        $req_type = $this->adminPageModel->getReqType($id);
        $user_type = $this->adminPageModel->getUserTypeFromReq($id);
        if ($req_type == 0) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Amount',
                ];
                $this->view('users/admin/rejectedRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Amount',
                ];
                $this->view('users/admin/rejectedRequestDetails', $data);
            }
        } elseif ($req_type == 1) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Quantity',
                ];
                $this->view('users/admin/rejectedRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Quantity',
                ];
                $this->view('users/admin/rejectedRequestDetails', $data);
            }
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function completedRequestDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $requestData = $this->adminPageModel->getCompletedRequestDetails($id);
        $req_type = $this->adminPageModel->getReqType($id);
        $user_type = $this->adminPageModel->getUserTypeFromReq($id);
        if ($req_type == 0) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Amount',
                    'recAmount' => 'Received Amount',
                ];
                $this->view('users/admin/completedRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Amount',
                    'recAmount' => 'Received Amount',
                ];
                $this->view('users/admin/completedRequestDetails', $data);
            }
        } elseif ($req_type == 1) {
            if ($user_type == 4) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Beneficiary Name',
                    'ID' => 'NIC',
                    'amount' => 'Quantity',
                    'recAmount' => 'Received Quantity',
                ];
                $this->view('users/admin/completedRequestDetails', $data);
            } elseif ($user_type == 5) {
                $data = [
                    'reqData' => $requestData,
                    'user' => 'Organization Name',
                    'ID' => 'Employee ID',
                    'designation' => 'Designation',
                    'amount' => 'Quantity',
                    'recAmount' => 'Received Quantity',
                ];
                $this->view('users/admin/completedRequestDetails', $data);
            }
        }
    }

    /**
     * @return void
     */
    public function requestDetails()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/admin/completedDonationDetails');
    }

    /**
     * @return void
     */
    public function userDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $user_type = $this->adminPageModel->getUserType($id);
        if ($user_type == 2) {
            $userData = $this->adminPageModel->getIndDonorDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/indDonDetails', $data);
        } elseif ($user_type == 3) {
            $userData = $this->adminPageModel->getCorpDonorDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/corpDonDetails', $data);
        } elseif ($user_type == 4) {
            $userData = $this->adminPageModel->getIndBeneficiaryDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/indBenDetails', $data);
        } elseif ($user_type == 5) {
            $userData = $this->adminPageModel->getOrgBeneficiaryDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/orgBenDetails', $data);
        } elseif ($user_type == 6) {
            $userData = $this->adminPageModel->getOrganizerDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/organizerDetails', $data);
        }
    }

    /**
     * @return void
     */
    public function approve($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $user_type = $this->adminPageModel->getUserType($id);
        if ($user_type == 4) {
            $userData = $this->adminPageModel->getIndBeneficiaryDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/verifyIndBen', $data);
        } elseif ($user_type == 5) {
            $userData = $this->adminPageModel->getOrgBeneficiaryDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/verifyOrgBen', $data);
        } elseif ($user_type == 6) {
            $userData = $this->adminPageModel->getOrganizerDetails($id);
            $data = [
                'userData' => $userData
            ];
            $this->view('users/admin/verifyOrganizer', $data);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function pendingEventDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $eventData = $this->adminPageModel->getPendingEventDetails($id);
        $data = [
            'eventData' => $eventData
        ];
        $this->view('users/admin/pendingEventDetails', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function ongoingEventDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $eventData = $this->adminPageModel->getOngoingEventDetails($id);
        $data = [
            'eventData' => $eventData
        ];
        $this->view('users/admin/ongoingEventDetails', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectedEventDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $eventData = $this->adminPageModel->getRejectedEventDetails($id);
        $data = [
            'eventData' => $eventData
        ];
        $this->view('users/admin/rejectedEventDetails', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function completedEventDetails($id)
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $eventData = $this->adminPageModel->getCompletedEventDetails($id);
        $data = [
            'eventData' => $eventData
        ];
        $this->view('users/admin/completedEventDetails', $data);
    }

    /**
     * @return void
     */
    public function changePassword()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/admin/changePassword');
    }

    /**
     * @return void
     */
    public function addNewRequest()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        $this->view('users/admin/addNewRequest');
    }

    /**
     * @return void
     */
    public function processing()
    {
        $this->view('users/processing');
    }
}
