<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Task extends CI_Migration {


    public function up() {

        $this->kb_tags(); 
        $this->kb_tasks();
        $this->kb_ttags();
        $this->kb_notes();
        $this->pj_projects();
        $this->pj_members();
        $this->kb_tactors();
    }


    public function down() {
        $this->dbforge->drop_table('kb_tactors', TRUE);
        $this->dbforge->drop_table('pj_members', TRUE);
        $this->dbforge->drop_table('pj_projects', TRUE);
        $this->dbforge->drop_table('kb_notes', TRUE);
        $this->dbforge->drop_table('kb_ttags', TRUE);
        $this->dbforge->drop_table('kb_tasks', TRUE);
        $this->dbforge->drop_table('kb_tags', TRUE);
    }


    public function kb_tasks() {

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
            'column_id'       => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
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
            ],
            'CONSTRAINT `kb_tasks_ibfk_1` FOREIGN KEY (`column_id`) REFERENCES `kb_columns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'

        ]);
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('column_id');
        
        return $this->dbforge->create_table('kb_tasks', TRUE);
    }


    public function kb_tags() {

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
        
        return $this->dbforge->create_table('kb_tags', TRUE);
    }


    public function kb_ttags() {


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
            
            'CONSTRAINT `kb_tkb_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `kb_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `kb_tkb_tags_ibfk_2` FOREIGN KEY (`task_id`) REFERENCES `kb_tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key(['tag_id', 'task_id'], TRUE);
        $this->dbforge->add_key('task_id');
        
        return $this->dbforge->create_table('kb_ttags', TRUE);
    }


    public function kb_notes() {

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

            'CONSTRAINT `kb_notes_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `kb_tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `kb_notes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('task_id');
        
        return $this->dbforge->create_table('kb_notes', TRUE);        
    }


    public function pj_projects() {

        $this->dbforge->add_field([

            'id'              => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'name'            => [
                
                'type'           => 'TEXT'
            ],
            'admin'           => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'company_id'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'CONSTRAINT `pj_projects_ibfk_1` FOREIGN KEY (`admin`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `pj_projects_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('admin');
        
        return $this->dbforge->create_table('pj_projects', TRUE);
    }


    public function pj_members() {

        $this->dbforge->add_field([
            
            'project_id'         => [
            
                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'CONSTRAINT `pj_members_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `pj_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `pj_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key(['project_id', 'user_id'], TRUE);
        $this->dbforge->add_key('user_id');
        
        return $this->dbforge->create_table('pj_members', TRUE);
    }


    public function kb_tactors() {

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

            'CONSTRAINT `kb_tactors_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `kb_tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `kb_tactors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key(['task_id', 'user_id'], TRUE);
        $this->dbforge->add_key('user_id');
        
        return $this->dbforge->create_table('kb_tactors', TRUE);
    }
}