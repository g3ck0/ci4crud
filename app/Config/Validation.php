<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $item_add = [
        'Name' => ['label' => 'Name', 'rules' => 'required'],
        'Description' => ['label' => 'Descripción', 'rules' => 'required']
    ];

    public $item_edit = [
        'Id' => ['label' => 'Item', 'rules' => 'required'],
        'Name' => ['label' => 'Name', 'rules' => 'required'],
        'Description' => ['label' => 'Descripción', 'rules' => 'required']
    ];
}
