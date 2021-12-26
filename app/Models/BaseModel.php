<?php

namespace App\Models;

class BaseModel
{
    public $db;

    public function get_by_id($id)
    {
        $data = $this->db->where('id' ,$id)->first();

        return $data;
    }

    public function save($data)
    {
        return $this->db->insert($data);
    }

    public function update($where, $data)
    {
        return $this->db->update($where, $data);
    }

    public function delete_by_id($id)
    {
        $data = array(
            'id' => $id,
        );
        $this->db->delete($data);
    }
}