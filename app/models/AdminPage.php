<?php

class AdminPage{
    private $db;

    /**
     *
     */
    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getDonors(){
        $this->db->query('SELECT * FROM reg_user');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaries(){
        $this->db->query('SELECT * FROM reg_user');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrganizers(){
        $this->db->query('SELECT * FROM reg_user');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function pendingRequests(){
        $this->db->query('SELECT * FROM donation_req');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function ongoingRequests(){
        $this->db->query('SELECT * FROM donation_req');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function rejectedRequests(){
        $this->db->query('SELECT * FROM donation_req');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function completedRequests(){
        $this->db->query('SELECT * FROM donation_req');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function pendingEvents(){
        $this->db->query('SELECT * FROM events');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function ongoingEvents(){
        $this->db->query('SELECT * FROM events');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function rejectedEvents(){
        $this->db->query('SELECT * FROM events');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function completedEvents(){
        $this->db->query('SELECT * FROM events');
        $results = $this->db->resultSet();
        return $results;
    }

}