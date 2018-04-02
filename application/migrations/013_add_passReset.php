<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Add_PassReset extends CI_Migration
{

    public function up()
    {

        $this->passResetKeys();
        // $this->packages();
        // $this->modules();
        // $this->package_details();
        // $this->subscriptions();
        // $this->packages_seed();
        // $this->modules_seed();
        // $this->package_details_seed();
    }

    public function down()
    {
        // $this->db->empty_table('pass_reset_keys');
        // $this->db->empty_table('package_details');
        // $this->db->empty_table('modules');
        // $this->db->empty_table('packages');
        $this->dbforge->drop_table('pass_reset_keys', true);
        // $this->dbforge->drop_table('subscriptions', true);
        // $this->dbforge->drop_table('package_details', true);
        // $this->dbforge->drop_table('modules', true);
        // $this->dbforge->drop_table('packages', true);
    }

    public function passResetKeys() {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'userid' => [
                'type' => 'VARCHAR',
                'constraint' => 11,
            ],
            'request_date' => [
                'type' => 'DATETIME'
            ],
            'request_expiry' => [
                'type' => 'DATETIME'
            ],
            'deleted' => [
                'type' => 'TINYINT',
                'constraint' => 3
            ],

            'CONSTRAINT `reset_keys_ibfk_1`
                FOREIGN KEY (`userid`)
                REFERENCES `users` (`id`)
                ON DELETE CASCADE
                ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', true);
        $this->dbforge->add_key('userid');

        return $this->dbforge->create_table('pass_reset_keys', true);
    }

    // public function packages()
    // {

    //     $this->dbforge->add_field([

    //         'id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 16,
    //         ],
    //         'name' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 50,
    //         ],

    //     ]);

    //     $this->dbforge->add_key('id', true);

    //     return $this->dbforge->create_table('packages', true);
    // }

    // public function modules()
    // {

    //     $this->dbforge->add_field([

    //         'id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 16,
    //         ],
    //         'name' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 50,
    //         ],

    //     ]);

    //     $this->dbforge->add_key('id', true);

    //     return $this->dbforge->create_table('modules', true);
    // }

    // public function package_details()
    // {

    //     $this->dbforge->add_field([

    //         'package_id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 16,
    //         ],
    //         'module_id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 16,
    //         ],

    //         'CONSTRAINT `package_details_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
    //         'CONSTRAINT `package_details_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
    //     ]);

    //     $this->dbforge->add_key(['package_id', 'module_id'], true);

    //     return $this->dbforge->create_table('package_details', true);
    // }

    // public function subscriptions()
    // {

    //     $this->dbforge->add_field([

    //         'id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 11,
    //         ],
    //         'type' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 50,
    //         ],
    //         'company_id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 11,
    //         ],
    //         'package_id' => [

    //             'type' => 'VARCHAR',
    //             'constraint' => 16,
    //         ],
    //         'start_date' => [

    //             'type' => 'DATE',
    //         ],
    //         'expiration_date' => [

    //             'type' => 'DATE',
    //         ],

    //         'CONSTRAINT `subscriptions_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
    //         'CONSTRAINT `subscriptions_ibfk_2` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
    //     ]);

    //     $this->dbforge->add_key('id', true);
    //     $this->dbforge->add_key('company_id');
    //     $this->dbforge->add_key('package_id');

    //     $this->dbforge->create_table('subscriptions', true);
    // }

    // public function packages_seed()
    // {

    //     // ids have prefix of "PKG_" which means package
    //     $data = [
    //         [
    //             'id' => 'PKG_PRP',
    //             'name' => 'Project Package',
    //         ],
    //         [
    //             'id' => 'PKG_SMP',
    //             'name' => 'Shift Management Package',
    //         ],
    //         [
    //             'id' => 'PKG_HRA',
    //             'name' => 'Human Resource Package',
    //         ],
    //         [
    //             'id' => 'PKG_PSP',
    //             'name' => 'PayakApp Suite Package',
    //         ],
    //     ];

    //     return $this->db->insert_batch('packages', $data);
    // }

    // public function modules_seed()
    // {

    //     // ids have prefix of "MDL_" which means module
    //     $modules = [
    //         [
    //             'id' => 'MDL_DSB',
    //             'name' => 'Dashboard',
    //         ],
    //         [
    //             'id' => 'MDL_PRJ',
    //             'name' => 'Project',
    //         ],
    //         [
    //             'id' => 'MDL_BBD',
    //             'name' => 'Bulletin Board',
    //         ],
    //         [
    //             'id' => 'MDL_CHT',
    //             'name' => 'Chat',
    //         ],
    //         [
    //             'id' => 'MDL_TKP',
    //             'name' => 'Timekeeping',
    //         ],
    //         [
    //             'id' => 'MDL_RSM',
    //             'name' => 'Resume Management',
    //         ],
    //         [
    //             'id' => 'MDL_XPX',
    //             'name' => 'Expense',
    //         ],
    //         [
    //             'id' => 'MDL_PTK',
    //             'name' => 'Personal Tasks',
    //         ],
    //     ];

    //     return $this->db->insert_batch('modules', $modules);
    // }

    // public function package_details_seed()
    // {

    //     $data = [

    //         // MODULES OF PROJECT PACKAGE
    //         [
    //             'package_id' => 'PKG_PRP',
    //             'module_id' => 'MDL_DSB',
    //         ],
    //         [
    //             'package_id' => 'PKG_PRP',
    //             'module_id' => 'MDL_PRJ',
    //         ],
    //         [
    //             'package_id' => 'PKG_PRP',
    //             'module_id' => 'MDL_BBD',
    //         ],
    //         [
    //             'package_id' => 'PKG_PRP',
    //             'module_id' => 'MDL_PTK',
    //         ],
    //         [
    //             'package_id' => 'PKG_PRP',
    //             'module_id' => 'MDL_CHT',
    //         ],

    //         // MODULES OF SHIFT MANAGEMENT PACKAGE
    //         [
    //             'package_id' => 'PKG_SMP',
    //             'module_id' => 'MDL_DSB',
    //         ],
    //         [
    //             'package_id' => 'PKG_SMP',
    //             'module_id' => 'MDL_TKP',
    //         ],
    //         [
    //             'package_id' => 'PKG_SMP',
    //             'module_id' => 'MDL_BBD',
    //         ],
    //         [
    //             'package_id' => 'PKG_SMP',
    //             'module_id' => 'MDL_PTK',
    //         ],
    //         [
    //             'package_id' => 'PKG_SMP',
    //             'module_id' => 'MDL_CHT',
    //         ],
    //     ];

    //     return $this->db->insert_batch('package_details', $data);
    // }
}
