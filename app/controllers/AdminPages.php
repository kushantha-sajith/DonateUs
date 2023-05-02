<?php

class AdminPages extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->adminModel = $this->model('AdminModel');
        $this->adminPageModel = $this->model('AdminPage');
    }

    /**
     * @return void
     */
    public function donors()
    {
        $indDonors = $this->adminPageModel->getIndDonors();
        $corpDonors = $this->adminPageModel->getCorpDonors();
        $data = [
            'indDonors' => $indDonors,
            'corpDonors' => $corpDonors
        ];
        $this->view('users/admin/donors', $data);
    }

    /**
     * @return void
     */
    public function beneficiaries()
    {
        $indBeneficiaries = $this->adminPageModel->getIndBeneficiaries();
        $corpBeneficiaries = $this->adminPageModel->getOrgBeneficiaries();
        $data = [
            'indBeneficiaries' => $indBeneficiaries,
            'corpBeneficiaries' => $corpBeneficiaries
        ];
        $this->view('users/admin/beneficiaries', $data);
    }

    /**
     * @return void
     */
    public function verifyBeneficiaries()
    {
        $indBeneficiaries = $this->adminPageModel->verifyIndBeneficiaries();
        $corpBeneficiaries = $this->adminPageModel->verifyOrgBeneficiaries();
        $data = [
            'indBeneficiaries' => $indBeneficiaries,
            'corpBeneficiaries' => $corpBeneficiaries
        ];
        $this->view('users/admin/verifyBeneficiaries', $data);
    }

    /**
     * @return void
     */
    public function organizers()
    {
        $organizers = $this->adminPageModel->getOrganizers();
        $data = [
            'organizers' => $organizers
        ];
        $this->view('users/admin/organizers', $data);
    }

    /**
     * @return void
     */
    public function verifyOrganizers()
    {
        $organizers = $this->adminPageModel->verifyOrganizers();
        $data = [
            'organizers' => $organizers
        ];
        $this->view('users/admin/verifyOrganizers', $data);
    }

    /**
     * @return void
     */
    public function pendingRequests()
    {
        $pendingRequests = $this->adminPageModel->pendingRequests();
        $data = [
            'pendingRequests' => $pendingRequests
        ];
        $this->view('users/admin/donationRequest', $data);
    }

    /**
     * @return void
     */
    public function ongoingRequests()
    {
        $ongoingRequests = $this->adminPageModel->ongoingRequests();
        $data = [
            'ongoingRequests' => $ongoingRequests
        ];
        $this->view('users/admin/ongoingRequests', $data);
    }

    /**
     * @return void
     */
    public function rejectedRequests()
    {
        $rejectedRequests = $this->adminPageModel->rejectedRequests();
        $data = [
            'rejectedRequests' => $rejectedRequests
        ];
        $this->view('users/admin/rejectedRequests', $data);
    }

    /**
     * @return void
     */
    public function completedRequests()
    {
        $completedRequests = $this->adminPageModel->completedRequests();
        $data = [
            'completedRequests' => $completedRequests
        ];
        $this->view('users/admin/completedRequests', $data);
    }

    /**
     * @return void
     */
    public function pendingEvents()
    {
        $pendingEvents = $this->adminPageModel->pendingEvents();
        $data = [
            'pendingEvents' => $pendingEvents
        ];
        $this->view('users/admin/events', $data);
    }

    /**
     * @return void
     */
    public function ongoingEvents()
    {
        $ongoingEvents = $this->adminPageModel->ongoingEvents();
        $data = [
            'ongoingEvents' => $ongoingEvents
        ];
        $this->view('users/admin/ongoingEvents', $data);
    }

    /**
     * @return void
     */
    public function rejectedEvents()
    {
        $rejectedEvents = $this->adminPageModel->rejectedEvents();
        $data = [
            'rejectedEvents' => $rejectedEvents
        ];
        $this->view('users/admin/rejectedEvents', $data);
    }

    /**
     * @return void
     */
    public function completedEvents()
    {
        $completedEvents = $this->adminPageModel->completedEvents();
        $data = [
            'completedEvents' => $completedEvents
        ];
        $this->view('users/admin/completedEvents', $data);
    }

    /**
     * @return void
     */
    public function updateAccStatus($id)
    {
        // retrieve the selected value from the POST parameters
        if (isset($_POST['status'])) {
            $selected_option = $_POST['status'];

            // call the model method to update the database
            if ($this->adminPageModel->updateAccStatus($id, $selected_option)) {
                $res = [
                    'statusCode' => 200,
                    'message' => "success"
                ];
            } else {
                $res = [
                    'statusCode' => 500,
                    'message' => "error"
                ];
            }
            echo json_encode($res);
        } else {
            echo json_encode(['statusCode' => 500, 'message' => 'error']);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function acceptBeneficiary($id)
    {
        if ($this->adminPageModel->acceptUser($id)) {
            //TODO : Send Email
            redirect('adminPages/verifyBeneficiaries');
        } else {
            die('Something went wrong');
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function acceptOrganizers($id)
    {
        if ($this->adminPageModel->acceptUser($id)) {
            //TODO : Send Email
            redirect('adminPages/verifyOrganizers');
        } else {
            die('Something went wrong');
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function acceptRequest($id)
    {
        if ($this->adminPageModel->acceptRequest($id)) {
            //TODO : Send Email
            redirect('adminPages/pendingRequests');
        } else {
            die('Something went wrong');
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function acceptEvent($id)
    {
        if ($this->adminPageModel->acceptEvent($id)) {
            //TODO : Send Email
            redirect('adminPages/pendingEvents');
        } else {
            die('Something went wrong');
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectBeneficiary($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'note' => trim($_POST['note']),
                'note_err' => ''
            ];

            // Validate data
            if (empty($data['note'])) {
                $data['note_err'] = 'Please enter note';
                redirect('adminPages/rejectUserNote/' . $id);
            }

            // Make sure no errors
            if (empty($data['note_err'])) {
                // Validated
                if ($this->adminPageModel->rejectUser($data)) {
                    //TODO : Send Email
                    redirect('adminPages/verifyBeneficiaries');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('adminPages/rejectUserNote', $data);
            }
        } else {
            // Init data
            $data = [
                'id' => $id,
                'note' => '',
                'note_err' => ''
            ];

            // Load view
            $this->view('adminPages/rejectUserNote', $data);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectOrganizers($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'note' => trim($_POST['note']),
                'note_err' => ''
            ];

            // Validate data
            if (empty($data['note'])) {
                $data['note_err'] = 'Please enter note';
                redirect('adminPages/rejectOrgUserNote/' . $id);
            }

            // Make sure no errors
            if (empty($data['note_err'])) {
                // Validated
                if ($this->adminPageModel->rejectUser($data)) {
                    //TODO : Send Email
                    redirect('adminPages/verifyOrganizers');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('adminPages/rejectOrgUserNote', $data);
            }
        } else {
            // Init data
            $data = [
                'id' => $id,
                'note' => '',
                'note_err' => ''
            ];

            // Load view
            $this->view('adminPages/rejectOrgUserNote', $data);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectRequest($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'note' => trim($_POST['note']),
                'note_err' => ''
            ];

            // Validate data
            if (empty($data['note'])) {
                $data['note_err'] = 'Please enter note';
                redirect('adminPages/rejectReqNote/' . $id);
            }

            // Make sure no errors
            if (empty($data['note_err'])) {
                // Validated
                if ($this->adminPageModel->rejectRequest($data)) {
                    //TODO : Send Email
                    redirect('adminPages/pendingRequests');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('adminPages/rejectReqNote', $data);
            }
        } else {
            // Init data
            $data = [
                'id' => $id,
                'note' => '',
                'note_err' => ''
            ];

            // Load view
            $this->view('adminPages/rejectReqNote', $data);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectEvent($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'note' => trim($_POST['note']),
                'note_err' => ''
            ];

            // Validate data
            if (empty($data['note'])) {
                $data['note_err'] = 'Please enter note';
                redirect('adminPages/rejectEventNote/' . $id);
            }

            // Make sure no errors
            if (empty($data['note_err'])) {
                // Validated
                if ($this->adminPageModel->rejectEvent($data)) {
                    //TODO : Send Email
                    redirect('adminPages/pendingEvents');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('adminPages/rejectEventNote', $data);
            }
        } else {
            // Init data
            $data = [
                'id' => $id,
                'note' => '',
                'note_err' => ''
            ];

            // Load view
            $this->view('adminPages/rejectEventNote', $data);
        }
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectUserNote($id)
    {
        $data = [
            'id' => $id,
            'note' => '',
            'note_err' => ''
        ];
        $this->view('users/admin/rejectionNote', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectOrgUserNote($id)
    {
        $data = [
            'id' => $id,
            'note' => '',
            'note_err' => ''
        ];
        $this->view('users/admin/rejectionOrgNote', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function rejectReqNote($id)
    {
        $data = [
            'id' => $id,
            'note' => '',
            'note_err' => ''
        ];
        $this->view('users/admin/rejectionReqNote', $data);
    }

    /**
     * @return void
     */
    public function rejectEventNote($id)
    {
        $data = [
            'id' => $id,
            'note' => '',
            'note_err' => ''
        ];
        $this->view('users/admin/rejectionEventNote', $data);
    }

    /**
     * @param $id
     * @return void
     */
    public function financialDonations($id)
    {
        $donationDetails = $this->adminPageModel->getFinancialDonationDetails($id);
        $data = [
            'donationDetails' => $donationDetails
        ];
        $this->view('users/admin/finDonDetails', $data);
    }

    public function nonFinancialDonations($id)
    {
        $donationDetails = $this->adminPageModel->getNonFinancialDonationDetails($id);
        $data = [
            'donationDetails' => $donationDetails
        ];
        $this->view('users/admin/nonFinDonDetails', $data);
    }

    public function eventDonations($id)
    {
        $donationDetails = $this->adminPageModel->getEventDonationDetails($id);
        $data = [
            'donationDetails' => $donationDetails
        ];
        $this->view('users/admin/eventDonDetails', $data);
    }
}