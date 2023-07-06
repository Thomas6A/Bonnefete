<?php

// Declare the namespace for the class
namespace App\Controllers;

// Include the required model classes
require_once 'Models/LogsModel.php';

use App\Models\LogsModel;

class LogsController
{
    protected $logsModel;

    // Constructor method
    public function __construct()
    {
        $this->logsModel = new LogsModel();
    }

    // Method for getting the index page
    public function getIndex()
    {
        $logs = $this->logsModel->getAll();
        require_once 'Views/logs/index.php';
    }
}