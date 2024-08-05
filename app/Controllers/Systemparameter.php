<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\SystemParameterModel;

class Systemparameter extends BaseController
{
    public $systemParameterModel;
    public $db;

    public function __construct(){
        $this->systemParameterModel = new SystemParameterModel();
        $this->db = db_connect();
    }

    public function index()
    {
        $data['sidebar'] = "systemparameter";
        $data['title'] = "List System Parameter";
        $data['deskripsi'] = "List seluruh parameter system";

        return view('admin/pages/system-parameter', $data);
    }

    public function getList()
    {
        $query = "
            CREATE TEMPORARY TABLE ListParameter AS
            SELECT
                *
            FROM system_parameter a
            WHERE is_show = 1;
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $builder = $this->db->table('ListParameter');
        // $this->db->query("DROP TEMPORARY TABLE IF EXISTS Listtravel");
        return DataTable::of($builder)->toJson(true);
    }

    public function getData($pk_id_system_parameter)
    {
        $data = $this->systemParameterModel->find($pk_id_system_parameter);
        return json_encode($data);
    }

    public function save()
    {
        $data = [
            'setting_name' => $this->request->getPost('setting_name'),
            'setting_value' => $this->request->getPost('setting_value'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        $pk_id_system_parameter = $this->request->getPost('pk_id_system_parameter');

        $searchParameter = $this->systemParameterModel->find($pk_id_system_parameter);
        if ($searchParameter) {
            if($this->systemParameterModel->update($pk_id_system_parameter, $data) === true){
                $response = [
                    'status' => 'success',
                    'message' => 'Berhasil mengubah data parameter'
                ];
            } else {
                $response = [
                    "error" => $this->systemParameterModel->errors()
                ];
            }
        }

        return json_encode($response);
    }

    public function getParameter(){
        $setting_name = $this->request->getPost('setting_name');

        $data = $this->db->query("
            SELECT
                *
            FROM system_parameter
            WHERE setting_name = '$setting_name'
        ")->getRowArray();

        return json_encode($data);
    }
}
