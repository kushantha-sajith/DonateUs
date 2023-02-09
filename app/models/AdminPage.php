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
    public function getIndDonors(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_don ON reg_user.id = ind_don.user_id WHERE reg_user.user_type = 2');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getCorpDonors(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN corp_don ON reg_user.id = corp_don.user_id WHERE reg_user.user_type = 3');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getIndBeneficiaries(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_ben ON reg_user.id = ind_ben.user_id WHERE reg_user.user_type = 4 AND verification_status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrgBeneficiaries(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN org_ben on reg_user.id = org_ben.user_id WHERE reg_user.user_type = 5 AND verification_status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function verifyIndBeneficiaries(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_ben ON reg_user.id = ind_ben.user_id WHERE reg_user.user_type = 4 AND verification_status = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function verifyOrgBeneficiaries(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN org_ben on reg_user.id = org_ben.user_id WHERE reg_user.user_type = 5 AND verification_status = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrganizers(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN event_org on reg_user.id = event_org.user_id WHERE reg_user.user_type = 6 AND verification_status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function verifyOrganizers(){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN event_org on reg_user.id = event_org.user_id WHERE reg_user.user_type = 6 AND verification_status = 0');
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