<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table      = 'activity_log';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'activity_type', 'table_name', 'description', 'activity_timestamp'];

    public function saveActivityLog($description, $tableName, $activityType)
    {
        $session = session();
        $data = [
            'id_user' => $session->get('user_id'),
            'activity_type' => $activityType,
            'table_name' => $tableName,
            'description' => $description
        ];

        $this->insert($data);

        return true;
    }
}
