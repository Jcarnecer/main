<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Card extends CI_Migration {


    public function up() {

        $this->cards(); 
        $this->comments();
        $this->cards_tagging();
        $this->viewers();
    }


    public function down() {

        $this->dbforge->drop_table('viewers', TRUE);
        $this->dbforge->drop_table('cards_tagging', TRUE);
        $this->dbforge->drop_table('comments', TRUE);
        $this->dbforge->drop_table('cards', TRUE);
    }


    public function cards() {

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
            'body'     => [

                'type'           => 'TEXT'
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'privacy'         => [
                
                'type'           => 'TINYINT',
                'constraint'     => 3  
            ],
            'color'           => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 7
            ],
            'company_id'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'status'          => [

                'type'           => 'INT',
                'constraint'     => 11
            ],

            'CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `cards_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'

        ]);
        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('cards', TRUE);
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
            'card_id'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],            
            'author'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('card_id');
        
        return $this->dbforge->create_table('comments', TRUE);        
    }


    public function cards_tagging() {

        $this->dbforge->add_field([

            'tag_id'          => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'card_id'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            
            'CONSTRAINT `cards_tagging_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `kb_tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `cards_tagging_ibfk_2` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key(['tag_id', 'card_id'], TRUE);
        $this->dbforge->add_key('card_id');
        
        return $this->dbforge->create_table('cards_tagging', TRUE);
    }


    public function viewers() {

        $this->dbforge->add_field([

            'card_id'         => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'user_id'         => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'CONSTRAINT `viewers_ibfk_1` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `viewers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key(['card_id', 'user_id'], TRUE);
        $this->dbforge->add_key('user_id');
        
        return $this->dbforge->create_table('viewers', TRUE);
    }
}