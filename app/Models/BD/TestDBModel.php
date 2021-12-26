<?php

namespace App\Models\BD;
use CodeIgniter\Model;

class TestDBModel extends Model
{
    protected $table = 'test';
    protected $allowedFields = ['Id', 'Name', 'Description'];
    protected $primaryKey = 'Id';

    protected $returnType     = 'object';
}