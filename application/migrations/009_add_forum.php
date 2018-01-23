<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Forum extends CI_Migration {


    public function up() {

        $this->posts();
        $this->comments();
    }


    public function down() {

        $this->dbforge->drop_table('forum_comments');
        $this->dbforge->drop_table('forum_posts');
    }


    public function posts() {

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
            'company_id'      => [

                "type"           => "VARCHAR",
                "constraint"     => 11
            ],
            'deleted'         => [

                'type'           => 'TINYINT',
                'constraint'     => 3
            ],

            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',

            'CONSTRAINT `forum_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `forum_posts_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('company_id');

        return $this->dbforge->create_table('forum_posts');
    }


    public function comments() {

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
            'post_id'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ], 
            'deleted'         => [

                'type'           => 'TINYINT',
                'constraint'     => 3
            ],

            'created_at TIMESTAMP',
            'updated_at TIMESTAMP',

            'CONSTRAINT `forum_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `forum_comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `forum_posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('post_id');
        
        return $this->dbforge->create_table('forum_comments');        
    }
}