<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Kanban extends CI_Migration {


    public function up() {

        $this->kb_boards();
        $this->kb_columns();
    }


    public function down() {

        $this->dbforge->drop_table('kb_columns', TRUE);
        $this->dbforge->drop_table('kb_boards', TRUE);
    }


    public function kb_boards() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'            => [

                'type'           => 'TEXT'
            ],
            'project_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            // 'CONSTRAINT `kanban_boards_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('project_id');

        return $this->dbforge->create_table('kb_boards', TRUE);
    }


    public function kb_columns() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'            => [
                
                'type'           => 'TEXT'
            ],
            'position'        => [

                'type'           => 'TINYINT',
                'constraint'     => 3,
                'unsigned'       => TRUE
            ],
             'board_id'       => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'CONSTRAINT `kanban_columns_ibfk_1` FOREIGN KEY (`board_id`) REFERENCES `kb_boards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('board_id');
        
        return $this->dbforge->create_table('kb_columns', TRUE);
    }
}