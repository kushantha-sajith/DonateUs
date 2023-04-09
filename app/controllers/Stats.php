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
            'pending' => 'pending Requests',
            'ongoing' => 'ongoing Requests',
            'completed' => 'completed Requests',
            'rejected' => 'rejected Requests',
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
            'jan' => 'jan',
            'feb' => 'feb',
            'mar' => 'mar',
            'apr' => 'apr',
            'may' => 'may',
            'jun' => 'jun',
            'jul' => 'jul',
            'aug' => 'aug',
            'sep' => 'sep',
            'oct' => 'oct',
            'nov' => 'nov',
            'dec' => 'dec',
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
            'financial' => 'financial',
            'nonFinancial' => 'nonFinancial',
            'financialCount' => $financial,
            'nonFinancialCount' => $nonFinancial,

        ];
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}