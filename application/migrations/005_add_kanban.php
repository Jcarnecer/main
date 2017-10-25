<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Kanban extends CI_Migration {


    public function up() {
        $this->boards();
        $this->columns();
        $this->tasks();
    }


    public function down() {
        $this->dbforge->drop_table('kanban_tasks', TRUE);
        $this->dbforge->drop_table('kanban_columns', TRUE);
        $this->dbforge->drop_table('kanban_boards', TRUE);
    }


    public function boards() {

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
            'team_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'CONSTRAINT `kanban_boards_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('team_id');
        $this->dbforge->create_table('kanban_boards');
    }


    public function columns() {

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

            'CONSTRAINT `kanban_columns_ibfk_1` FOREIGN KEY (`board_id`) REFERENCES `kanban_boards` (`id`) ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('board_id');
        
        return $this->dbforge->create_table('kanban_columns');
    }


    public function tasks() {


        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'column_id'       => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            
            'CONSTRAINT `kanban_tasks_ibfk_1` FOREIGN KEY (`id`) REFERENCES `tasks` (`id`) ON UPDATE CASCADE',
            'CONSTRAINT `kanban_tasks_ibfk_2` FOREIGN KEY (`column_id`) REFERENCES `kanban_columns` (`id`) ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key(['id', 'column_id'], TRUE);
        $this->dbforge->add_key('column_id');
        
        return $this->dbforge->create_table('kanban_tasks');
    }
}