<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Forum extends CI_Migration {


    public function up() {

        $this->threads();
        $this->replies();
        $this->reactions();
    }


    public function down() {

        $this->dbforge->drop_table('forum_reactions', TRUE);
        $this->dbforge->drop_table('forum_replies', TRUE);
        $this->dbforge->drop_table('forum_threads', TRUE);
    }


    public function threads() {

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
            'body'            => [

                'type'           => 'TEXT'
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'project_id'      => [

                "type"           => "VARCHAR",
                "constraint"     => 11
            ],
            'deleted'         => [

                'type'           => 'TINYINT',
                'constraint'     => 3
            ],

            'created_at DATETIME',
            'updated_at DATETIME',

            'CONSTRAINT `forum_threads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `forum_threads_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `pj_projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('company_id');

        return $this->dbforge->create_table('forum_threads', TRUE);
    }


    public function replies() {

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
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'thread_id'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ], 
            'deleted'         => [

                'type'           => 'TINYINT',
                'constraint'     => 3
            ],

            'created_at DATETIME',
            'updated_at DATETIME',

            'CONSTRAINT `forum_replies_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `forum_replies_ibfk_2` FOREIGN KEY (`thread_id`) REFERENCES `forum_threads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('thread_id');
        
        return $this->dbforge->create_table('forum_replies', TRUE);        
    }


    public function reactions() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'reply_id'            => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'like'            => [
                
                'type'           => 'TINYINT',
                'constraint'     => 1,
                'unsigned'       => TRUE
            ], 

            'created_at DATETIME',
            'updated_at DATETIME',

            'CONSTRAINT `forum_reactions_ibfk_1` FOREIGN KEY (`reply_id`) REFERENCES `forum_replies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `forum_reactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('reply_id');
        
        return $this->dbforge->create_table('forum_reactions', TRUE); 
    }
}