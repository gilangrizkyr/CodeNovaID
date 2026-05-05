<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\CreditCardRules;
use CodeIgniter\Validation\StrictRules\FileRules;
use CodeIgniter\Validation\StrictRules\FormatRules;
use CodeIgniter\Validation\StrictRules\Rules;

class Validation extends BaseConfig
{
    // --------------------------------------------------------------------
    // Setup
    // --------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var list<string>
     */
    public array $ruleSets = [
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
    public array $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    // --------------------------------------------------------------------
    // Rules
    // --------------------------------------------------------------------

    public array $login = [
        'email'    => 'required|valid_email',
        'password' => 'required|min_length[5]',
    ];

    public array $contact = [
        'name'           => 'required|min_length[3]|max_length[100]',
        'email'          => 'required|valid_email',
        'phone'          => 'required|numeric|min_length[10]',
        'service_type'   => 'required',
        'project_detail' => 'required|min_length[10]',
    ];

    public array $service = [
        'title'             => 'required|min_length[5]|max_length[200]',
        'slug'              => 'required|alpha_dash|is_unique[services.slug,id,{id}]',
        'short_description' => 'required|max_length[500]',
        'price_start'       => 'required|numeric',
    ];
}
