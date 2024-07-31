<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\GreetingAgentModel;

class Agreetingagent extends BaseController
{
    public $greetingAgentModel;
    public $db;
    public $ses_tipe_agent;

    public function __construct(){
        $this->greetingAgentModel = new GreetingAgentModel();
        $this->db = db_connect();
        $this->ses_tipe_agent = session()->get('tipe_agent');
    }

    public function index(){
        $data['sidebar'] = "home";
        $data['title'] = "Home";

        return view('agent_area/pages/greeting-agent', $data);
    }

    public function getAllGreeting()
    {
        $data = $this->greetingAgentModel->orderby('urutan')->findAll();

        $data = $this->db->query("
            SELECT
            *
            FROM 
            greeting_agent a
            WHERE (a.deleted_at = '0000-00-00 00:00:00' OR a.deleted_at IS NULL)
            AND (akses_greeting = 'semua agent' OR akses_greeting LIKE '%$this->ses_tipe_agent%')
        ")->getResultArray();
        
        return json_encode($data);
    }
}