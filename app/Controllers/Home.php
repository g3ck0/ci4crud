<?php

namespace App\Controllers;
use App\Models\BaseModel;
use App\Models\BD\TestDBModel;
use \Hermawan\DataTables\DataTable;

class Home extends BaseController
{
    protected $modelo;
    public function __construct(){
        $this->modelo = new BaseModel();
        $this->modelo->db = new TestDBModel();

    }

    public function index()
    {
        return view('crud/view');
    }

    public function ajax_list(){
        $db = db_connect();
        $builder = $db->table('test')->select('Id, Name, Description');

        return DataTable::of($builder)
            ->setSearchableColumns(['Name', 'Description'])
            ->add('action', function($row){
                return '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_item('."'".$row->Id."'".')"><i class="bx bxs-edit"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_item('."'".$row->Id."'".')"><i class="bi-trash"></i> Delete</a>';
            }, 'last')
            ->hide('Id')
            ->toJson();
    }

    public function ajax_edit($Id)
    {
        $data = $this->modelo->get_by_id($Id);
        return $this->response->setJSON($data);
    }

    public function ajax_add()
    {

        if($this->validar('item_add'))
        {
            $data = array(
                'Name' => $this->request->getPost('Name'),
                'Description' => $this->request->getPost('Description'),
            );
            $insert = $this->modelo->save($data);
            return $this->response->setJSON(array("status" => TRUE));
        }
    }

    public function ajax_update()
    {
        if($this->validar('item_edit'))
        {
            $data = array(
                'Name' => $this->request->getPost('Name'),
                'Description' => $this->request->getPost('Description'),
            );
            $this->modelo->update(array('Id' => $this->request->getPost('Id')), $data);
            return $this->response->setJSON(array("status" => TRUE));
        }
    }

    public function ajax_delete($id)
    {
        $this->modelo->delete_by_id($id);
        return $this->response->setJSON(array("status" => TRUE));
    }
}
