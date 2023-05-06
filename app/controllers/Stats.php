<?php

class Stats extends Controller
{

    /**
     * @var mixed
     */
    private $statModel;

    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->statModel = $this->model('StatModel');
    }

    /**
     * @return void
     */
    public function requestStatus()
    {
        $pending = $this->statModel->pendingRequests();
        $ongoing = $this->statModel->ongoingRequests();
        $completed = $this->statModel->completedRequests();
        $rejected = $this->statModel->rejectedRequests();
        $data = [
            'pending' => 'Pending Requests',
            'ongoing' => 'Ongoing Requests',
            'completed' => 'Completed Requests',
            'rejected' => 'Rejected Requests',
            'pendingCount' => $pending,
            'ongoingCount' => $ongoing,
            'completedCount' => $completed,
            'rejectedCount' => $rejected
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @return void
     */
    public function eventStatus()
    {
        $pending = $this->statModel->pendingEvents();
        $ongoing = $this->statModel->ongoingEvents();
        $completed = $this->statModel->completedEvents();
        $rejected = $this->statModel->rejectedEvents();
        $data = [
            'pending' => 'Pending Events',
            'ongoing' => 'Ongoing Events',
            'completed' => 'Completed Events',
            'rejected' => 'Rejected Events',
            'pendingCount' => $pending,
            'ongoingCount' => $ongoing,
            'completedCount' => $completed,
            'rejectedCount' => $rejected
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @return void
     */
    public function donationRequests()
    {
        $jan = $this->statModel->donationViaMonths(1);
        $feb = $this->statModel->donationViaMonths(2);
        $mar = $this->statModel->donationViaMonths(3);
        $apr = $this->statModel->donationViaMonths(4);
        $may = $this->statModel->donationViaMonths(5);
        $jun = $this->statModel->donationViaMonths(6);
        $jul = $this->statModel->donationViaMonths(7);
        $aug = $this->statModel->donationViaMonths(8);
        $sep = $this->statModel->donationViaMonths(9);
        $oct = $this->statModel->donationViaMonths(10);
        $nov = $this->statModel->donationViaMonths(11);
        $dec = $this->statModel->donationViaMonths(12);
        $data = [
            'jan' => 'Jan',
            'feb' => 'Feb',
            'mar' => 'Mar',
            'apr' => 'Apr',
            'may' => 'May',
            'jun' => 'Jun',
            'jul' => 'Jul',
            'aug' => 'Aug',
            'sep' => 'Sep',
            'oct' => 'Oct',
            'nov' => 'Nov',
            'dec' => 'Dec',
            'janCount' => $jan,
            'febCount' => $feb,
            'marCount' => $mar,
            'aprCount' => $apr,
            'mayCount' => $may,
            'junCount' => $jun,
            'julCount' => $jul,
            'augCount' => $aug,
            'sepCount' => $sep,
            'octCount' => $oct,
            'novCount' => $nov,
            'decCount' => $dec,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @return void
     */
    public function eventRequests()
    {
        $jan = $this->statModel->donationEveViaMonths(1);
        $feb = $this->statModel->donationEveViaMonths(2);
        $mar = $this->statModel->donationEveViaMonths(3);
        $apr = $this->statModel->donationEveViaMonths(4);
        $may = $this->statModel->donationEveViaMonths(5);
        $jun = $this->statModel->donationEveViaMonths(6);
        $jul = $this->statModel->donationEveViaMonths(7);
        $aug = $this->statModel->donationEveViaMonths(8);
        $sep = $this->statModel->donationEveViaMonths(9);
        $oct = $this->statModel->donationEveViaMonths(10);
        $nov = $this->statModel->donationEveViaMonths(11);
        $dec = $this->statModel->donationEveViaMonths(12);
        $data = [
            'jan' => 'Jan',
            'feb' => 'Feb',
            'mar' => 'Mar',
            'apr' => 'Apr',
            'may' => 'May',
            'jun' => 'Jun',
            'jul' => 'Jul',
            'aug' => 'Aug',
            'sep' => 'Sep',
            'oct' => 'Oct',
            'nov' => 'Nov',
            'dec' => 'Dec',
            'janCount' => $jan,
            'febCount' => $feb,
            'marCount' => $mar,
            'aprCount' => $apr,
            'mayCount' => $may,
            'junCount' => $jun,
            'julCount' => $jul,
            'augCount' => $aug,
            'sepCount' => $sep,
            'octCount' => $oct,
            'novCount' => $nov,
            'decCount' => $dec,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @return void
     */
    public function donationQuantity()
    {
        $financial = $this->statModel->financialCount();
        $nonFinancial = $this->statModel->nonFinancialCount();

        $data = [
            'financial' => 'Financial Donations',
            'nonFinancial' => 'Non Financial Donations',
            'financialCount' => $financial,
            'nonFinancialCount' => $nonFinancial,
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @return void
     */
    public function userCount()
    {
        $donors = $this->statModel->getDonorCount();
        $beneficiaries = $this->statModel->getBeneficiaryCount();
        $organizers = $this->statModel->getOrganizerCount();
        $data = [
            'donors' => 'Donors',
            'beneficiaries' => 'Beneficiaries',
            'organizers' => 'Event Organizers',
            'donorCount' => $donors,
            'beneficiaryCount' => $beneficiaries,
            'organizerCount' => $organizers
        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }

    /**
     * @return void
     */
    public function categoryCount()
    {
        $response1 = $this->statModel->categoryCount();
        print_r($response1);
        header('Content-Type: application/json');
        echo json_encode($response1);
    }
}