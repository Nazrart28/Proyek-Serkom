<?php

namespace App\Models;

use CodeIgniter\Model;

class MonitoringModel extends Model
{
    protected $table = 'logbook'; // Name of your logbook table
    protected $primaryKey = 'id'; // Primary key column name
    protected $allowedFields = ['date', 'entry']; // Columns that can be filled

    // Add any additional methods for logbook-related operations here
}
