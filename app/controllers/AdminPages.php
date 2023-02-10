<?php

class AdminPages extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }

        $this->adminModel = $this->model('AdminModel');
        $this->adminPageModel = $this->model('AdminPage');
    }

    /**
     * @return void
     */
    public function donors(){
        $donors = $this->adminPageModel->getDonors();
        $data = [
            'donors' => $donors
        ];
        $this->view('users/admin/donors', $data);
    }

    /**
     * @return void
     */
    public function beneficiaries(){
        $beneficiaries = $this->adminPageModel->getBeneficiaries();
        $data = [
            'beneficiaries' => $beneficiaries
        ];
        $this->view('users/admin/beneficiaries', $data);
    }

    /**
     * @return void
     */
    public function organizers(){
        $organizers = $this->adminPageModel->getOrganizers();
        $data = [
            'organizers' => $organizers
        ];
        $this->view('users/admin/organizers', $data);
    }

    /**
     * @return void
     */
    public function pendingRequests(){
        $pendingRequests = $this->adminPageModel->pendingRequests();
        $data = [
            'pendingRequests' => $pendingRequests
        ];
        $this->view('users/admin/donationRequest', $data);
    }

    /**
     * @return void
     */
    public function ongoingRequests(){
        $ongoingRequests = $this->adminPageModel->ongoingRequests();
        $data = [
            'ongoingRequests' => $ongoingRequests
        ];
        $this->view('users/admin/ongoingRequests', $data);
    }

    /**
     * @return void
     */
    public function rejectedRequests(){
        $rejectedRequests = $this->adminPageModel->rejectedRequests();
        $data = [
            'rejectedRequests' => $rejectedRequests
        ];
        $this->view('users/admin/rejectedRequests', $data);
    }

    /**
     * @return void
     */
    public function completedRequests(){
        $completedRequests = $this->adminPageModel->completedRequests();
        $data = [
            'completedRequests' => $completedRequests
        ];
        $this->view('users/admin/completedRequests', $data);
    }

    /**
     * @return void
     */
    public function pendingEvents(){
        $pendingEvents = $this->adminPageModel->pendingEvents();
        $data = [
            'pendingEvents' => $pendingEvents
        ];
        $this->view('users/admin/events', $data);
    }

    /**
     * @return void
     */
    public function ongoingEvents(){
        $ongoingEvents = $this->adminPageModel->ongoingEvents();
        $data = [
            'ongoingEvents' => $ongoingEvents
        ];
        $this->view('users/admin/ongoingEvents', $data);
    }

    /**
     * @return void
     */
    public function rejectedEvents(){
        $rejectedEvents = $this->adminPageModel->rejectedEvents();
        $data = [
            'rejectedEvents' => $rejectedEvents
        ];
        $this->view('users/admin/rejectedEvents', $data);
    }

    /**
     * @return void
     */
    public function completedEvents(){
        $completedEvents = $this->adminPageModel->completedEvents();
        $data = [
            'completedEvents' => $completedEvents
        ];
        $this->view('users/admin/completedEvents', $data);
    }
}