<?php

class AdminPage
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**
     * @return mixed
     */
    public function getIndDonors()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_don ON reg_user.id = ind_don.user_id WHERE reg_user.user_type = 2');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getCorpDonors()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN corp_don ON reg_user.id = corp_don.user_id WHERE reg_user.user_type = 3');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getIndBeneficiaries()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_ben ON reg_user.id = ind_ben.user_id WHERE reg_user.user_type = 4 AND verification_status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrgBeneficiaries()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN org_ben on reg_user.id = org_ben.user_id WHERE reg_user.user_type = 5 AND verification_status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function verifyIndBeneficiaries()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_ben ON reg_user.id = ind_ben.user_id WHERE reg_user.user_type = 4 AND verification_status = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function verifyOrgBeneficiaries()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN org_ben on reg_user.id = org_ben.user_id WHERE reg_user.user_type = 5 AND verification_status = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrganizers()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN event_org on reg_user.id = event_org.user_id WHERE reg_user.user_type = 6 AND verification_status = 1');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function verifyOrganizers()
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN event_org on reg_user.id = event_org.user_id WHERE reg_user.user_type = 6 AND verification_status = 0');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function pendingRequests()
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 0 ORDER BY dr.id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function ongoingRequests()
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN fr.received_amount WHEN dr.req_type = 1 THEN nf.received_quantity END AS rec_amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 1 ORDER BY dr.id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function rejectedRequests()
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 2 ORDER BY dr.rejected_date DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function completedRequests()
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN fr.received_amount WHEN dr.req_type = 1 THEN nf.received_quantity END AS rec_amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id where dr.status = 3 ORDER BY dr.completed_date DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function pendingEvents()
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, e.due_date, e.budget, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 0 ORDER BY e.id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function ongoingEvents()
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, e.due_date, e.budget, e.received, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 1  ORDER BY e.id DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function rejectedEvents()
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, e.rejected_date, e.budget, e.rejection_note, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 2 ORDER BY e.rejected_date DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function completedEvents()
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, e.completed_date, e.budget, e.received, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 3 ORDER BY e.completed_date DESC');
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getIndDonorDetails($id)
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_don ON reg_user.id = ind_don.user_id INNER JOIN district ON district.id = ind_don.district WHERE reg_user.user_type = 2 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getCorpDonorDetails($id)
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN corp_don ON reg_user.id = corp_don.user_id INNER JOIN district ON district.id = corp_don.district WHERE reg_user.user_type = 3 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getIndBeneficiaryDetails($id)
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN ind_ben ON reg_user.id = ind_ben.user_id INNER JOIN district ON district.id = ind_ben.district WHERE reg_user.user_type = 4 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrgBeneficiaryDetails($id)
    {
        $this->db->query('SELECT *, reg_user.id as id FROM reg_user INNER JOIN org_ben on reg_user.id = org_ben.user_id INNER JOIN district ON district.id = org_ben.district WHERE reg_user.user_type = 5 AND reg_user.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @return mixed
     */
    public function getOrganizerDetails($id)
    {
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
    public function updateAccStatus($id, $selected_status)
    {
        $user_type = $this->getUserType($id);
        if ($user_type == 2) {
            $this->db->query('UPDATE ind_don INNER JOIN reg_user ON ind_don.user_id = reg_user.id SET ind_don.acc_status = :selected_status WHERE ind_don.user_id = :id');
        } elseif ($user_type == 3) {
            $this->db->query('UPDATE corp_don INNER JOIN reg_user ON corp_don.user_id = reg_user.id SET corp_don.acc_status = :selected_status WHERE corp_don.user_id = :id');
        } elseif ($user_type == 4) {
            $this->db->query('UPDATE ind_ben INNER JOIN reg_user ON ind_ben.user_id = reg_user.id SET ind_ben.acc_status = :selected_status WHERE ind_ben.user_id = :id');
        } elseif ($user_type == 5) {
            $this->db->query('UPDATE org_ben INNER JOIN reg_user ON org_ben.user_id = reg_user.id SET org_ben.acc_status = :selected_status WHERE org_ben.user_id = :id');
        } else {
            $this->db->query('UPDATE event_org INNER JOIN reg_user ON event_org.user_id = reg_user.id SET event_org.acc_status = :selected_status WHERE event_org.user_id = :id');
        }
        $this->db->bind(':id', $id);
        $this->db->bind(':selected_status', $selected_status);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function getUserType($id)
    {
        $this->db->query('SELECT user_type FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results->user_type;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getReqType($id)
    {
        $this->db->query('SELECT req_type FROM donation_req WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();;
        return $results->req_type;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserTypeFromReq($id)
    {
        $this->db->query('SELECT user_id FROM donation_req WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();;
        $user_type = $this->getUserType($results->user_id);
        return $user_type;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPendingRequestDetails($id)
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, dr.due_date, rb.tp_number, rb.email, rb.user_type AS user_type, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN "Money" WHEN dr.req_type = 1 THEN nf.item END AS item, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id WHERE dr.status = 0 AND dr.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOngoingRequestDetails($id)
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, dr.due_date, rb.email, rb.tp_number, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN "Money" WHEN dr.req_type = 1 THEN nf.item END AS item, CASE WHEN dr.req_type = 0 THEN fr.received_amount WHEN dr.req_type = 1 THEN nf.received_quantity END AS rec_amount,  dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id WHERE dr.status = 1 AND dr.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRejectedRequestDetails($id)
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, dr.due_date, dr.rejected_date, rb.tp_number, rb.email, dr.rejection_note, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN dr.req_type = 0 THEN "Money" WHEN dr.req_type = 1 THEN nf.item END AS item, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id WHERE dr.status = 2 AND dr.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCompletedRequestDetails($id)
    {
        $this->db->query('SELECT dr.id, dr.request_title AS request_title, dr.completed_date, rb.email, rb.tp_number, CASE WHEN rb.user_type = 4 THEN ind_ben.f_name WHEN rb.user_type = 5 THEN org_ben.org_name END AS ben_id, CASE WHEN dr.req_type = 0 THEN "Money" WHEN dr.req_type = 1 THEN nf.item END AS item, CASE WHEN rb.user_type = 4 THEN ind_ben.NIC WHEN rb.user_type = 5 THEN org_ben.emp_id END AS nic, CASE WHEN dr.req_type = 0 THEN fr.total_amount WHEN dr.req_type = 1 THEN nf.quantity END AS amount, CASE WHEN dr.req_type = 0 THEN fr.received_amount WHEN dr.req_type = 1 THEN nf.received_quantity END AS rec_amount, dr.description AS description, CASE WHEN dr.req_type = 0 THEN "Financial" WHEN dr.req_type = 1 THEN "Non-financial" END AS req_type, c.category_name, CASE WHEN rb.user_type = 4 THEN ind_ben.zipcode WHEN rb.user_type = 5 THEN org_ben.zipcode END AS zipcode, d.dist_name AS district FROM donation_req dr    JOIN reg_user rb ON dr.user_id = rb.id LEFT JOIN financial_req fr ON dr.id = fr.req_id LEFT JOIN nfinancial_req nf ON dr.id = nf.req_id JOIN district d ON dr.id = d.id JOIN categories c ON dr.cat_id = c.id LEFT JOIN ind_ben ON rb.id = ind_ben.user_id LEFT JOIN org_ben ON rb.id = org_ben.user_id WHERE dr.status = 3 AND dr.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getPendingEventDetails($id)
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, o.community_name, o.designation, o.NIC, r.tp_number, e.due_date, e.budget, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 0 AND e.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOngoingEventDetails($id)
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, e.received, o.community_name, o.designation, o.NIC, r.tp_number, e.due_date, e.budget, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 1 AND e.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getRejectedEventDetails($id)
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, o.community_name, o.designation, o.NIC, r.tp_number, e.rejected_date, e.rejection_note, e.budget, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 2 AND e.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCompletedEventDetails($id)
    {
        $this->db->query('SELECT e.id, e.event_title, e.description, e.received, o.community_name, o.designation, o.NIC, r.tp_number, e.completed_date, e.budget, e.location, r.email, o.full_name FROM events e JOIN reg_user r ON e.event_org_id = r.id JOIN event_org o ON e.event_org_id = o.user_id WHERE e.status = 3 AND e.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return bool
     */
    public function acceptRequest($id)
    {
        $this->db->query('UPDATE donation_req SET status = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function acceptEvent($id)
    {
        $this->db->query('UPDATE events SET status = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return bool
     */
    public function acceptUser($id)
    {
        $this->db->query('UPDATE reg_user SET verification_status = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function rejectRequest($data)
    {
        $this->db->query('UPDATE donation_req SET status = 2, rejection_note = :note, rejected_date = CURDATE() WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':note', $data['note']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function rejectEvent($data)
    {
        $this->db->query('UPDATE events SET status = 2, rejection_note = :note, rejected_date = CURDATE() WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':note', $data['note']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $data
     * @return bool
     */
    public function rejectUser($data)
    {
        $this->db->query('UPDATE reg_user SET verification_status = 2, rejection_note = :note WHERE id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':note', $data['note']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getFinancialDonationDetails($id)
    {
        $this->db->query('SELECT dh.id, dr.request_title, r.tp_number AS donor_tp, r.email AS donor_email, dh.date_of_completion,rq.email AS ben_email, rq.tp_number AS ben_tp, fn.amount_donated, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, IF(rq.user_type = 4, ib.f_name, ob.org_name) AS ben_name, dr.id as req_id FROM donation AS dh JOIN financial_donation AS fn ON dh.id = fn.donation_id JOIN reg_user AS r ON dh.donor_id = r.id JOIN donation_req AS dr ON dh.request_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 JOIN reg_user AS rq ON dr.user_id = rq.id LEFT JOIN ind_ben AS ib ON rq.id = ib.user_id AND rq.user_type = 4 LEFT JOIN org_ben AS ob ON rq.id = ob.user_id AND rq.user_type = 5 WHERE dh.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getNonFinancialDonationDetails($id)
    {
        $this->db->query('SELECT dh.id, dr.request_title, r.tp_number AS donor_tp, r.email AS donor_email, dh.date_of_completion, c.category_name AS category, nr.item AS item, rq.email AS ben_email, rq.tp_number AS ben_tp, fn.quantity_donated, IF(r.user_type = 2, id.f_name, cd.comp_name) AS donor_name, IF(rq.user_type = 4, ib.f_name, ob.org_name) AS ben_name, dr.id as req_id, CASE WHEN dh.status = 0 THEN "Pending" WHEN dh.status = 1 THEN "Completed" WHEN dh.status = 2 THEN "Delivered" WHEN dh.status = 3 THEN "Cancelled" END AS status FROM donation AS dh JOIN nfinancial_donation AS fn ON dh.id = fn.donation_id JOIN reg_user AS r ON dh.donor_id = r.id JOIN categories AS c ON dh.cat_id = c.id JOIN nfinancial_req AS nr ON nr.req_id = dh.request_id JOIN donation_req AS dr ON dh.request_id = dr.id LEFT JOIN ind_don AS id ON r.id = id.user_id AND r.user_type = 2 LEFT JOIN corp_don AS cd ON r.id = cd.user_id AND r.user_type = 3 JOIN reg_user AS rq ON dr.user_id = rq.id LEFT JOIN ind_ben AS ib ON rq.id = ib.user_id AND rq.user_type = 4 LEFT JOIN org_ben AS ob ON rq.id = ob.user_id AND rq.user_type = 5 WHERE dh.id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEventDonationDetails($id)
    {
        $this->db->query('SELECT edh.id AS id, IF(ru.user_type = 2, ind_don.f_name, corp_don.comp_name) AS donor_name, et.event_title, eo.community_name, rq.email AS cm_email, rq.tp_number AS cm_tp_number, edh.date_of_completion, edh.amount, ru.tp_number AS donor_contact_number, ru.email AS donor_email FROM event_donation_history AS edh INNER JOIN reg_user AS ru ON edh.don_id = ru.id LEFT JOIN ind_don ON edh.don_id = ind_don.user_id AND ru.user_type = 2 LEFT JOIN corp_don ON edh.don_id = corp_don.user_id AND ru.user_type = 3 INNER JOIN events AS et ON edh.event_id = et.id INNER JOIN event_org AS eo ON et.event_org_id = eo.user_id INNER JOIN reg_user AS rq ON rq.id = eo.user_id WHERE edh.id = :id ORDER BY id ');
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserEmail($id)
    {
        $this->db->query('SELECT email FROM reg_user WHERE id = :id');
        $this->db->bind(':id', $id);
        $results = $this->db->single();
        return $results;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getReqEmail($id)
    {
        $this->db->query('SELECT ru.email AS email FROM donation_req dr INNER JOIN reg_user ru ON ru.id = dr.user_id WHERE dr.id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEventEmail($id)
    {
        $this->db->query('SELECT ru.email AS email FROM events dr INNER JOIN reg_user ru ON ru.id = dr.event_org_id WHERE dr.id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

    /**
     * @param $text
     * @return mixed
     */
    public function getRequestDetails($text)
    {
        $this->db->query('SELECT * FROM donation_req WHERE request_title LIKE :text');
        $this->db->bind(':text', '%' . $text . '%');
        $row = $this->db->single();
        return $row;
    }

}