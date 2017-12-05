<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Task extends CI_Migration {


    public function up() {

        $this->tags(); 
        $this->tasks();
        $this->tasks_tagging();
        $this->task_notes();
        $this->teams();
        $this->teams_mapping();
        $this->tasks_assignment();
    }


    public function down() {
        $this->dbforge->drop_table('tasks_assignment', TRUE);
        $this->dbforge->drop_table('teams_mapping', TRUE);
        $this->dbforge->drop_table('teams', TRUE);
        $this->dbforge->drop_table('task_notes', TRUE);
        $this->dbforge->drop_table('tasks_tagging', TRUE);
        $this->dbforge->drop_table('tasks', TRUE);
        $this->dbforge->drop_table('tags', TRUE);
    }


    public function tasks() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'title'           => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'description'     => [

                'type'           => 'TEXT'
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'due_date'        => [
                
                'type'           => 'DATE'
            ],
            'completion_date' => [
                
                'type'           => 'DATE'
            ],
            'color'           => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 7
            ],
            'status'          => [

                'type'           => 'INT',
                'constraint'     => 11
            ],
            'created_at'      => [

                'type'           => 'DATE'
            ],
            'updated_at'      => [
             
                'type'           => 'DATE'
            ]

        ]);
        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('tasks');
    }


    public function tags() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'            => [
            
                'type'           => 'TEXT'
            ]
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('tags');
    }


    public function tasks_tagging() {


        $this->dbforge->add_field([

            'tag_id'          => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'task_id'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            
            'CONSTRAINT `tasks_tagging_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `tasks_tagging_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key(['tag_id', 'task_id'], TRUE);
        $this->dbforge->add_key('task_id');
        
        return $this->dbforge->create_table('tasks_tagging');
    }


    public function task_notes() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'body'            => [

                'type'           => 'TEXT'
            ],
            'task_id'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],            
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'created_at'      => [

                'type'           => 'DATE'
            ],

            'CONSTRAINT `task_notes_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `task_notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('task_id');
        
        return $this->dbforge->create_table('task_notes');        
    }


    public function teams() {

        $this->dbforge->add_field([

            'id'              => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'name'            => [
                
                'type'           => 'TEXT'
            ],
             'admin'          => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'CONSTRAINT `teams_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('admin');
        
        return $this->dbforge->create_table('teams');
    }


    public function teams_mapping() {

        $this->dbforge->add_field([
            
            'team_id'         => [
            
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'CONSTRAINT `teams_mapping_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `teams_mapping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key(['team_id', 'user_id'], TRUE);
        $this->dbforge->add_key('user_id');
        
        return $this->dbforge->create_table('teams_mapping');
    }


    public function tasks_assignment() {

        $this->dbforge->add_field([

            'task_id'         => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'user_id'         => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'CONSTRAINT `tasks_assignment_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `tasks_assignment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key(['task_id', 'user_id'], TRUE);
        $this->dbforge->add_key('user_id');
        
        return $this->dbforge->create_table('tasks_assignment');
    }
}