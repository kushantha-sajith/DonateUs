<?php

class StatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return false|mixed
     */
    public function No_of_requests()
    {
        $this->db->query('select * from donation_req');
        $row = $this->db->resultSet();
        //check row
        if ($this->db->rowCount() > 0) {
            return $this->db->rowCount();
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function donationQuantity()
    {
        $this->db->query('select * from donation_history');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @param $month
     * @return false|mixed
     */
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

    /**
     * @return false|mixed
     */
    public function financialCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_history WHERE type=0');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function nonFinancialCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_history WHERE type=1');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function pendingRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=0');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function ongoingRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=1');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function completedRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=3');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function rejectedRequests()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM donation_req WHERE status=2');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function pendingEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=0');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function ongoingEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=1');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function completedEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=3');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function rejectedEvents()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE status=2');
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function getDonorCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM reg_user WHERE user_type = 2 OR user_type = 3');
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return false|mixed
     */
    public function getBeneficiaryCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM reg_user WHERE user_type = 4 OR user_type = 5');
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    public function getOrganizerCount()
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM reg_user WHERE user_type = 6');
        $row = $this->db->single();
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @param $month
     * @return false|mixed
     */
    public function donationEveViaMonths($month)
    {
        $this->db->query('SELECT COUNT(*) AS num_rows FROM events WHERE MONTH(published_date)=:month AND YEAR(published_date)=YEAR(CURDATE())');
        $this->db->bind(':month', $month);
        $row = $this->db->single();
        //check row
        if ($this->db->rowCount() > 0) {
            return $row;
        } else return false;
    }

    /**
     * @return array
     */
    public function categoryCount()
    {
        $this->db->query('SELECT categories.category_name AS category, COUNT(donation_req.cat_id) AS count FROM donation_req INNER JOIN categories ON donation_req.cat_id = categories.id GROUP BY categories.id;');
        $result = $this->db->resultSet();
        return $result;
    }
}