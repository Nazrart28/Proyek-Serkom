<?php

namespace App\Controllers;

use App\Models\MonitoringModel;
use CodeIgniter\Model;

class Monitoring extends BaseController
{
    protected $MonitoringModel;

    public function index()
    {
        $this->MonitoringModel = new MonitoringModel();

        $data['logs'] = $this->MonitoringModel->findAll(); // Retrieve all logbook entries

        // Load a view file to display the logbook entries
        return view('monitoring/index', $data);
    }
}
