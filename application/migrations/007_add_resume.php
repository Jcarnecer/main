<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Resume extends CI_Migration {


    public function up() {

        $this->position();
        $this->remove_seed();
        $this->position_seed();
        $this->role();
        $this->record();
        $this->employees();
    }


    public function down() {

        $this->dbforge->drop_table('employees', TRUE);
        $this->dbforge->drop_table('record', TRUE);
        $this->dbforge->drop_table('role', TRUE);
        $this->dbforge->drop_table('position', TRUE);
    }


    public function position() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ]
            
        ]);

        $this->dbforge->add_key('id', TRUE);

        return $this->dbforge->create_table('position', TRUE);
    }


    public function position_seed() {

        $data = [

            ['id' => 1, 'name' => 'Employee'],
            ['id' => 2, 'name' => 'Intern'],
            ['id' => 3, 'name' => 'Freelance']
        ];

        return $this->db->insert_batch('position', $data);
    }


    public function role() {

        $this->dbforge->add_field([

            'role_id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'            => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'pos_id'          => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
             'status'         => [
                
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `role_ibfk_1` FOREIGN KEY (`pos_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('role_id', TRUE);
        $this->dbforge->add_key('pos_id');
        
        return $this->dbforge->create_table('role', TRUE);
    }


    public function record() {


        $this->dbforge->add_field([

            'id'               => [

                'type'            => 'INT',
                'constraint'      => 11,
                'unsigned'        => TRUE,
                'auto_increment'  => TRUE
            ],
            'first_name'       => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 50
            ],
            'last_name'        => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 50
            ],
            'middle_name'      => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 50,
                'null'            => TRUE
            ],
            'degree'           => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 100,
                'null'            => TRUE
            ],
            'school'           => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 200
            ],
            'application_date' => [
                
                'type'            => 'DATE',
                'null'            => TRUE
            ],
            'role_id'          => [
                
                'type'            => 'INT',
                'constraint'      => 11,
                'unsigned'        => TRUE,
                'null'            => TRUE
            ],
            'pos_id'           => [
                
                'type'            => 'INT',
                'constraint'      => 11,
                'unsigned'        => TRUE,
                'null'            => TRUE
            ],
            'email'            => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 100
            ],
            'comment'          => [
                
                'type'            => 'TEXT',
                'null'            => TRUE
            ],
            'home_address'     => [
                
                'type'            => 'TEXT'
            ],
            'phone_number'     => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 20
            ],
            'birthday'         => [
                
                'type'            => 'DATE'
            ],
            'date_hired'       => [
                
                'type'            => 'DATE',
                'null'            => TRUE
            ],
            'file'             => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 255,
                'null'            => TRUE
            ],
            'images'           => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 255,
                'null'            => TRUE
            ],
            'available_date'   => [
                
                'type'            => 'DATE',
                'null'            => TRUE
            ],
            'interviewer'      => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 100,
                'null'            => TRUE
            ],
            'interview_notes'  => [
                
                'type'            => 'TEXT',
                'null'            => TRUE
            ],
            'exam_result'      => [
                
                'type'            => 'TINYINT',
                'constraint'      => 4,
                'null'            => TRUE
            ],
            'interview_result' => [
                
                'type'            => 'TINYINT',
                'constraint'      => 4,
                'null'            => TRUE
            ],
            'current_status'   => [
                
                'type'            => 'VARCHAR',
                'constraint'      => 50,
                'null'            => TRUE
            ],
            
            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `record_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `record_ibfk_2` FOREIGN KEY (`pos_id`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key(['role_id', 'pos_id']);
        
        return $this->dbforge->create_table('record', TRUE);
    }


    public function employees() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'sss'             => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => TRUE
            ],
            'tin'             => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => TRUE
            ],
            'philhealth'             => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => TRUE
            ],
            'pagibig'             => [
                
                'type'           => 'VARCHAR',
                'constraint'     => 100,
                'null'           => TRUE
            ],
            'record_id'          => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`record_id`) REFERENCES `record` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('record_id');
        
        return $this->dbforge->create_table('employees', TRUE);
    }


    public function remove_seed() {

        $ids = [1,2,3];
        $this->db->where_in('id', $ids);
        $this->db->delete('position');
    }
}