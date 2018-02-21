<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_File extends CI_Migration {


    public function up() {

        $this->folders();
        $this->files();
    }


    public function down() {

        $this->dbforge->drop_table('file_data', TRUE);
        $this->dbforge->drop_table('file_folders', TRUE);
    }


    public function folders() {

        $this->dbforge->add_field([

            'id'              => [
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'name'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'location'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'null'           => TRUE  
            ],
            'root'            => [

                'type'           => 'TINYINT',
                'constraint'     => 1,
            ],
            'deleted'         => [

                'type'           => 'TINYINT',
                'constraint'     => 3
            ],
            'created_by'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'updated_by'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'created_at DATETIME NOT NULL',
            'updated_at DATETIME NOT NULL',

            'CONSTRAINT `file_folders_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `file_folders_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `file_folders_ibfk_3` FOREIGN KEY (`location`) REFERENCES `file_folders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'

        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('created_by');
        $this->dbforge->add_key('updated_by');
        $this->dbforge->add_key('location');

        return $this->dbforge->create_table('file_folders', TRUE);
    }


    public function files() {

        $this->dbforge->add_field([

            'id'              => [
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'name'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'location'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'null'           => TRUE  
            ],
            'source'          => [

                'type'           => 'VARCHAR',
                'constraint'     => 255
            ],
            'deleted'         => [

                'type'           => 'TINYINT',
                'constraint'     => 3
            ],
            'created_by'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'updated_by'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'created_at DATETIME',
            'updated_at DATETIME',

            'CONSTRAINT `file_data_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `file_data_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `file_data_ibfk_3` FOREIGN KEY (`location`) REFERENCES `file_folders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'

        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('created_by');
        $this->dbforge->add_key('updated_by');
        $this->dbforge->add_key('location');

        return $this->dbforge->create_table('file_data', TRUE);
    }
}