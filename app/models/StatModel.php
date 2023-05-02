<?php

class StatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function No_of_requests()
    {
        $this->db->query('select * from donation_req');
        $row = $this->db->resultSet();
        //check row
        if ($this->db->rowCount() > 0) {
            return $this->db->rowCount();
        } else return false;
    }

    public function donationQuantity()
    {
        $this->db->query('select * from donation_history');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function donationViaMonths($month)
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE MONTH(published_date)=:month AND YEAR(published_date)=YEAR(CURDATE())');
        $this->db->bind(':month', $month);
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function financialCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_history WHERE type=0');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function nonFinancialCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_history WHERE type=1');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function pendingRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=0');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function ongoingRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=1');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function completedRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=3');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function rejectedRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=2');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function pendingEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=0');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function ongoingEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=1');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function completedEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=3');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function rejectedEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=2');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }
}