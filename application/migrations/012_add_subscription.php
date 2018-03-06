<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Subscription extends CI_Migration {


    public function up() {

        // $this->packages();
        $this->modules();
        // $this->package_details();
        $this->subscriptions();
        $this->subscription_modules();
        
        $this->modules_seed();
    }


    public function down() {

        $this->dbforge->drop_table('subscription_modules', TRUE);
        $this->dbforge->drop_table('subscriptions', TRUE);
        // $this->dbforge->drop_table('package_details', TRUE);
        $this->dbforge->drop_table('modules', TRUE);
        // $this->dbforge->drop_table('packages', TRUE);
    }


    // public function packages() {

    //     $this->dbforge->add_field([

    //         'id'              => [

    //             'type'           => 'INT',
    //             'constraint'     => 11,
    //             'unsigned'       => TRUE,
    //             'auto_increment' => TRUE
    //         ],
    //         'name'            => [

    //             'type'           => 'VARCHAR',
    //             'constraint'     => 50
    //         ]

    //     ]);

    //     $this->dbforge->add_key('id', TRUE);

    //     return $this->dbforge->create_table('packages', TRUE);
    // }


    public function modules() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'code'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 16
            ],
            'name'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ]

        ]);

        $this->dbforge->add_key('id', TRUE);

        return $this->dbforge->create_table('modules', TRUE);
    }


    public function modules_seed()
    {
        $modules = [
            [
                'code' => 'PA_PROJECT',
                'name' => 'PayakApps Project Management'
            ],
            [
                'code' => 'PA_NOTE',
                'name' => 'PayakApps Bulletin Board'
            ],
            [
                'code' => 'PA_CHAT',
                'name' => 'PayakApps Chat'
            ],
            [
                'code' => 'PA_TIMEKEEP',
                'name' => 'PayakApps Timekeeping'
            ],
            [
                'code' => 'PA_RESUME',
                'name' => 'PayakApps Resume Management'
            ],
            [
                'code' => 'PA_EXPENSE',
                'name' => 'PayakApps Expense'
            ]
        ];

        return $this->db->insert_batch('modules', $modules);
    }


    // public function package_details() {

    //     $this->dbforge->add_field([

    //         'package_id'      => [

    //             'type'           => 'INT',
    //             'constraint'     => 11,
    //             'unsigned'       => TRUE
    //         ],
    //         'module_id'       => [

    //             'type'           => 'INT',
    //             'constraint'     => 11,
    //             'unsigned'       => TRUE
    //         ],

    //         'CONSTRAINT `package_details_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
    //         'CONSTRAINT `package_details_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
    //     ]);

    //     $this->dbforge->add_key(['package_id', 'module_id'], TRUE);

    //     return $this->dbforge->create_table('package_details', TRUE);
    // }


    public function subscriptions() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'type'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'company_id'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            // 'package_id'      => [

            //     'type'           => 'INT',
            //     'constraint'     => 11,
            //     'unsigned'       => TRUE0
            // ],
            'start_date'      => [

                'type'           => 'DATE'
            ],
            'expiration_date' => [

                'type'           => 'DATE'
            ],

            'CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
            // 'CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('company_id');
        // $this->dbforge->add_key('package_id');

        $this->dbforge->create_table('subscriptions', TRUE);
    }


    public function subscription_modules() {

        $this->dbforge->add_field([

            'subscription_id'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11,
            ],
            'module_id'       => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'CONSTRAINT `subscription_modules_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `subscription_modules_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key(['subscription_id', 'module_id'], TRUE);

        return $this->dbforge->create_table('subscription_modules', TRUE);
    }
}