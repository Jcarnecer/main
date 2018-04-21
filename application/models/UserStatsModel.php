<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserStatsModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDistribution()
    {
        $this->db
            ->select('S.type AS `type`, COUNT(U.email_address) as `users`')
            ->from('users U')
            ->join('subscriptions S', 'U.company_id = S.company_id')
            ->where('U.company_id != "astridtech"')
            ->group_by('S.type');

        $query = $this->db->get();

        return $query->result();
    }

    public function getTotals()
    {
        $results = new StdClass();

        $this->db
            ->select('COUNT(*) AS `totalUsers`')
            ->from('users')
            ->where('company_id != "astridtech"');

        $query = $this->db->get();

        $results = $query->row();

        $this->db
            ->select('SEC_TO_TIME(ROUND(AVG(TIMEDIFF(U.last_login_at, U.created_at)), 0)) AS `trialTimeAvg`')
            ->from('users U')
            ->join('subscriptions S', 'U.company_id = S.company_id')
            ->where('S.type = "trial"');

        $query = $this->db->get();

        $results = (object) array_merge((array) $results, (array) $query->row());

        $this->db
            ->select('COUNT(*) as `trialDiscontinued`')
            ->from('users U')
            ->join('subscriptions S', 'U.company_id = S.company_id')
            ->where(
                array(
                    'U.company_id !=' => 'astridtech',
                    'S.type =' => 'trial',
                    'NOW() <' => 'S.expiration_date',
                )
            );

        $query = $this->db->get();

        $results = (object) array_merge((array) $results, (array) $query->row());

        $this->db
            ->select('COUNT(*) as `trialUsers`')
            ->from('users U')
            ->join('subscriptions S', 'U.company_id = S.company_id')
            ->where(array(
                'U.company_id !=' => 'astridtech',
                'S.type =' => 'trial',
                'NOW() >' => 'S.expiration_date')
            );

        $query = $this->db->get();

        $results = (object) array_merge((array) $results, (array) $query->row());

        // var_dump($results);

        return $results;

    }

}
