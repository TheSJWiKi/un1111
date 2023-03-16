<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config = [
    'login' => [
        [
            'field' => 'email_address',
            'label' => 'Email Address',
            'rules' => 'required|valid_email'
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ]
    ],
    'change_password' => [
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ],
        [
            'field' => 'c_password',
            'label' => 'Confirm Password',
            'rules' => 'required'
        ]
    ],
    'contact_us' => [
        [
            'field' => 'full_name',
            'label' => 'Full Name',
            'rules' => 'required'
        ],
        [
            'field' => 'email_address',
            'label' => 'Email Address',
            'rules' => 'required|valid_email'
        ],
        [
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required'
        ]
    ],
    'just_email_address' => [
        [
            'field' => 'email_address',
            'label' => 'Email Address',
            'rules' => 'required|valid_email'
        ]
    ],
    'compose_email' => [
        [
            'field' => 'subject',
            'label' => 'Subject',
            'rules' => 'required'
        ],
        [
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required'
        ]
    ],
    'service' => [
        [
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|max_length[30]'
        ],
        [
            'field' => 'short_description',
            'label' => 'Short Description',
            'rules' => 'required|max_length[255]'
        ]
    ],
    'settings_general' => [
        [
            'field' => 'g_site_name',
            'label' => 'Name',
            'rules' => 'required'
        ]
    ],
    'settings_counter' => [
        [
            'field' => 'c_type_text1',
            'label' => 'Type Text 1',
            'rules' => 'required'
        ],
        [
            'field' => 'c_type_text2',
            'label' => 'Type Text 2',
            'rules' => 'required'
        ],
        [
            'field' => 'c_type_text3',
            'label' => 'Type Text 3',
            'rules' => 'required'
        ],
        [
            'field' => 'c_rdate',
            'label' => 'Release Date',
            'rules' => 'required|exact_length[12]'
        ]
    ],
    'settings_contact_us' => [
        [
            'field' => 'cu_email_address',
            'label' => 'Email Address',
            'rules' => 'valid_email'
        ]
    ],
    'settings_email_smtp' => [
        [
            'field' => 'e_host',
            'label' => 'Host',
            'rules' => 'required'
        ],
        [
            'field' => 'e_username',
            'label' => 'Username',
            'rules' => 'required'
        ],
        [
            'field' => 'e_password',
            'label' => 'Password',
            'rules' => 'required'
        ],
        [
            'field' => 'e_sender',
            'label' => 'From Address',
            'rules' => 'valid_email|required'
        ],
        [
            'field' => 'e_sender_name',
            'label' => 'From Name',
            'rules' => 'required'
        ],
        [
            'field' => 'e_port',
            'label' => 'Port',
            'rules' => 'is_natural|required'
        ]
    ],
    'settings_email_mail' => [
        [
            'field' => 'e_sender',
            'label' => 'From Address',
            'rules' => 'valid_email|required'
        ],
        [
            'field' => 'e_sender_name',
            'label' => 'From Name',
            'rules' => 'required'
        ]
    ]
];
