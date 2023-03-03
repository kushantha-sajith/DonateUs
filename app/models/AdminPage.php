<?php

class AdminPage{
    private $db;
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
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.city WHEN rb.user_type = 5 THEN org_ben.city END AS city, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function ongoingRequests(){
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN fr.received_amount WHEN dr.req_type = 1 THEN nf.received_quantity END AS rec_amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.city WHEN rb.user_type = 5 THEN org_ben.city END AS city, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function rejectedRequests(){
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.city WHEN rb.user_type = 5 THEN org_ben.city END AS city, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 2');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function completedRequests(){
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN fr.received_amount WHEN dr.req_type = 1 THEN nf.received_quantity END AS rec_amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.city WHEN rb.user_type = 5 THEN org_ben.city END AS city, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 3');
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

    /**
     * @return mixed
     */
    public function getUserType($id){
        $this->db->query('SELECT user_type FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results->user_type;
    }

    /**
     * @return mixed
     */
    public function getIndDonorDetails($id){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_don ON reg_user.id = ind_don.user_id INNER JOIN district ON district.id = ind_don.district WHERE reg_user.user_type = 2 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getCorpDonorDetails($id){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN corp_don ON reg_user.id = corp_don.user_id INNER JOIN district ON district.id = corp_don.district WHERE reg_user.user_type = 3 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getIndBeneficiaryDetails($id){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_ben ON reg_user.id = ind_ben.user_id INNER JOIN district ON district.id = ind_ben.district WHERE reg_user.user_type = 4 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrgBeneficiaryDetails($id){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN org_ben on reg_user.id = org_ben.user_id INNER JOIN district ON district.id = org_ben.district WHERE reg_user.user_type = 5 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrganizerDetails($id){
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN event_org on reg_user.id = event_org.user_id INNER JOIN district ON district.id = event_org.district WHERE reg_user.user_type = 6 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @param $selected_status
     * @return bool
     */
    public function updateAccStatus($id, $selected_status){
        $user_type = $this->getUserType($id);
        if ($user_type == 2){
            $this->db->query('UPDATE ind_don INNER JOIN reg_user ON ind_don.user_id = reg_user.id SET ind_don.acc_status = :selected_status WHERE ind_don.user_id = :id');
        }elseif ($user_type == 3){
            $this->db->query('UPDATE corp_don INNER JOIN reg_user ON corp_don.user_id = reg_user.id SET corp_don.acc_status = :selected_status WHERE corp_don.user_id = :id');
        }elseif ($user_type == 4){
            $this->db->query('UPDATE ind_ben INNER JOIN reg_user ON ind_ben.user_id = reg_user.id SET ind_ben.acc_status = :selected_status WHERE ind_ben.user_id = :id');
        }elseif ($user_type == 5){
            $this->db->query('UPDATE org_ben INNER JOIN reg_user ON org_ben.user_id = reg_user.id SET org_ben.acc_status = :selected_status WHERE org_ben.user_id = :id');
        }else{
            $this->db->query('UPDATE event_org INNER JOIN reg_user ON event_org.user_id = reg_user.id SET event_org.acc_status = :selected_status WHERE event_org.user_id = :id');
        }
        $this->db->bind(':id', $id);
        $this->db->bind(':selected_status', $selected_status);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}