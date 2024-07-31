<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\CustomerModel;

class Acustomer extends BaseController
{
    public $customerModel;
    public $db;
    public $ses_pk_id_agent;

    public function __construct(){
        $this->customerModel = new CustomerModel();
        $this->db = db_connect();

        $this->ses_pk_id_agent = session()->get('pk_id_agent');
    }

    public function index()
    {
        $data['sidebar'] = "customer";
        $data['title'] = "List Customer";
        $data['deskripsi'] = "List seluruh data customer Anda";

        return view('agent_area/pages/customer', $data);
    }

    public function getData($pk_id_customer)
    {
        $agent = $this->db->query("
            SELECT
                *
            FROM agent
            WHERE pk_id_agent = $this->ses_pk_id_agent
        ")->getRowArray();

        if($agent['tipe_agent'] == 'leader agent'){
            $data = $this->db->query("
                SELECT
                    a.*,
                    b.nama_agent as nama_agent,
                    c.nama_agent as nama_leader_agent,
                    CASE
                        WHEN a.fk_id_agent = $this->ses_pk_id_agent THEN a.no_wa
                        WHEN a.fk_id_agent IS NOT NULL THEN '-'
                        ELSE a.no_wa
                    END AS no_wa_customer,
                    CASE
                        WHEN a.fk_id_agent = $this->ses_pk_id_agent THEN a.email
                        WHEN a.fk_id_agent IS NOT NULL THEN '-'
                        ELSE a.email
                    END AS email_customer,
                    a.kota_kabupaten
                FROM customer a
                LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
                LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
                WHERE a.pk_id_customer = $pk_id_customer
                AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent)
            ")->getRowArray();
        } else {
            $data = $this->db->query("
                SELECT
                    a.*,
                    b.nama_agent as nama_agent,
                    c.nama_agent as nama_leader_agent,
                    a.no_wa AS no_wa_customer,
                    a.email AS email_customer,
                    a.kota_kabupaten
                FROM customer a
                LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
                LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
                WHERE a.pk_id_customer = $pk_id_customer
                AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent)
            ")->getRowArray();
        }

        return json_encode($data);
    }

    public function getList()
    {
        $agent = $this->db->query("
            SELECT
                *
            FROM agent
            WHERE pk_id_agent = $this->ses_pk_id_agent
        ")->getRowArray();

        if($agent['tipe_agent'] == 'leader agent'){
            $query = "
                CREATE TEMPORARY TABLE Listcustomer AS
                SELECT
                    a.*,
                    CASE
                        WHEN a.fk_id_agent = $this->ses_pk_id_agent THEN a.no_wa
                        WHEN a.fk_id_agent IS NOT NULL THEN '-'
                        ELSE a.no_wa
                    END AS no_wa_customer,
                    b.nama_agent as nama_agent,
                    c.nama_agent as nama_leader_agent
                FROM customer a
                LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
                LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
                WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
                AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent);
            ";
        } else {
            $query = "
                CREATE TEMPORARY TABLE Listcustomer AS
                SELECT
                    a.*,
                    a.no_wa AS no_wa_customer,
                    b.nama_agent as nama_agent,
                    c.nama_agent as nama_leader_agent
                FROM customer a
                LEFT JOIN agent b ON a.fk_id_agent = b.pk_id_agent
                LEFT JOIN agent c ON a.fk_id_leader_agent = c.pk_id_agent
                WHERE a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL
                AND (a.fk_id_agent = $this->ses_pk_id_agent OR a.fk_id_leader_agent = $this->ses_pk_id_agent);
            ";
        }

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('Listcustomer');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listcustomer");
        return DataTable::of($builder)->toJson(true);
    }
}