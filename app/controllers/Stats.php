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
}