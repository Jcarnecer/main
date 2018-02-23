<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Timekeeping extends CI_Migration {


    public function up() {

        $this->timekeeping_calendar_events();
        $this->timekeeping_leave();
        $this->timekeeping_logs();
        $this->timekeeping_menu();
        $this->timekeeping_record();
        $this->timekeeping_record_overtime();
        $this->timekeeping_school();
        $this->timekeeping_shift();
        $this->timekeeping_sub_menu();
        $this->timekeeping_file_leave();
        $this->permissions();
        $this->users_leave();
        $this->users_shift();
        $this->remove_seed();
        $this->leaves_seed();
        $this->menu_seed();
        $this->shift_seed();
        $this->sub_menu_seed();
        $this->tk_permission_seed();
        $this->tk_users_shift_seed();
    }


    public function down() {
        
        $this->db->empty_table('timekeeping_users_shift');
        $this->db->empty_table('timekeeping_permissions');
        $this->db->empty_table('timekeeping_sub_menu');
        $this->db->empty_table('timekeeping_shift');
        $this->db->empty_table('timekeeping_menu');
        $this->db->empty_table('timekeeping_leave');
        $this->dbforge->drop_table('timekeeping_users_shift', TRUE);
        $this->dbforge->drop_table('timekeeping_users_leave', TRUE);
        $this->dbforge->drop_table('timekeeping_permissions', TRUE);
        $this->dbforge->drop_table('timekeeping_file_leave', TRUE);
        $this->dbforge->drop_table('timekeeping_sub_menu', TRUE);
        $this->dbforge->drop_table('timekeeping_shift', TRUE);
        $this->dbforge->drop_table('timekeeping_school', TRUE);
        $this->dbforge->drop_table('timekeeping_record_overtime', TRUE);
        $this->dbforge->drop_table('timekeeping_record', TRUE);
        $this->dbforge->drop_table('timekeeping_menu', TRUE);
        $this->dbforge->drop_table('timekeeping_logs', TRUE);
        $this->dbforge->drop_table('timekeeping_leave', TRUE);
        $this->dbforge->drop_table('timekeeping_calendar_events', TRUE);
    }


    public function timekeeping_calendar_events() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE        
            ],
            'title'           => [

                'type'           => 'VARCHAR',
                'constraint'     => 500
            ],
            'start'           => [

                'type'           => 'DATE'
            ],
            'end'             => [

                'type'           => 'DATE'
            ],
            'description'     => [

                'type'           => 'VARCHAR',
                'constraint'     => 1000
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],

            'CONSTRAINT `timekeeping_calendar_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');

        return $this->dbforge->create_table('timekeeping_calendar_events', TRUE);
    }


    public function timekeeping_leave() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'leave_name'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'No_of_days'         => [

                'type'           => 'FLOAT',
                'constraint'     => 8
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('timekeeping_leave', TRUE);        
    }


    public function timekeeping_logs() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'action'          => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'description'     => [

                'type'           => 'TEXT'
            ],
            'position'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'ip_address'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 20
            ],
            'user'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 200
            ],

            'date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('timekeeping_logs', TRUE);
    }


    public function timekeeping_menu() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'name'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'icon'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'status'        => [

                'type'           => 'TINYINT',
                'constraint'     => 1
            ],
            'url'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'with_sub'        => [

                'type'           => 'TINYINT',
                'constraint'     => 2
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('timekeeping_menu', TRUE);
    }


    public function timekeeping_record() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'date'            => [

                'type'           => 'DATE'
            ],
            'time_in'         => [

                'type'           => 'TIME'
            ],
            'time_out'        => [

                'type'           => 'TIME'
            ],
            'status'          => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'type'            => [

                'type'           => 'VARCHAR',
                'constraint'     => 12
            ],
            'late_status'     => [

                'type'           => 'VARCHAR',
                'constraint'     => 12
            ],
            'intern_no_hrs'   => [

                'type'           => 'VARCHAR',
                'constraint'     => 20
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'CONSTRAINT `timekeeping_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        
        return $this->dbforge->create_table('timekeeping_record', TRUE);
    }


    public function timekeeping_record_overtime() {

        $this->dbforge->add_field([
            
            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'reason'            => [

                'type'           => 'text'
            ],
            'start'           => [

                'type'           => 'TIME'
            ],
            'end'             => [

                'type'           => 'TIME'
            ],
            'overtime_date'   => [

                'type'           => 'DATE'
            ],
            'date_submitted'  => [

                'type'           => 'DATE'
            ],
            'ot_hours'     => [

                'type'           => 'VARCHAR',
                'constraint'     => 20
            ],
            'status'   => [

                'type'           => 'TINYINT',
                'constraint'     => 4
            ]
        ]);
                        
        $this->dbforge->add_key('id', TRUE);
        
        return $this->dbforge->create_table('timekeeping_record_overtime', TRUE);
    }


    public function timekeeping_school() {

        $this->dbforge->add_field([
            
            'school_id'       => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'school_name'     => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'internship'      => [

                'type'           => 'INT',
                'constraint'     => 11
            ],
            'hours'           => [

                'type'           => 'INT',
                'constraint'     => 11
            ]
        ]);
                        
        $this->dbforge->add_key('school_id', TRUE);
        
        return $this->dbforge->create_table('timekeeping_school', TRUE);
    }


    public function timekeeping_shift() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'shift_type'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 50
            ],
            'start_time'      => [

                'type'           => 'TIME'
            ],
            'end_time'        => [

                'type'           => 'TIME'
            ]
        ]);

        $this->dbforge->add_key('id', TRUE);

        return $this->dbforge->create_table('timekeeping_shift', TRUE);
    }


    public function timekeeping_sub_menu() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'sub'             => [

                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'url'             => [

                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'menu_id'         => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'intern'          => [

                'type'           => 'INT',
                'constraint'     => 11
            ],
            'admin_hr'        => [

                'type'           => 'TINYINT',
                'constraint'     => 1
            ],

            'CONSTRAINT `timekeeping_sub_menu_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `timekeeping_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('menu_id');
        
        return $this->dbforge->create_table('timekeeping_sub_menu', TRUE);
    }


    public function timekeeping_file_leave() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'leave_id'        => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'user_id'         => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'start_date'      => [

                'type'           => 'DATE'
            ],
            'end_date'        => [

                'type'           => 'DATE'
            ],
            'reason'          => [

                'type'           => 'TEXT'
            ],
            'status'          => [

                'type'           => 'TEXT'
            ],
            'duration'        => [

                'type'           => 'INT',
                'constraint'     => 11
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `timekeeping_file_leave_ibfk_1` FOREIGN KEY (`leave_id`) REFERENCES `timekeeping_leave` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `timekeeping_file_leave_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('leave_id');
        $this->dbforge->add_key('user_id');

        return $this->dbforge->create_table('timekeeping_file_leave', TRUE);
    }


    public function permissions() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'permission_id'   => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'privileges'      => [

                'type'           => 'VARCHAR',
                'constraint'     => 100
            ],
            'privilege_sub_menu' => [

                'type'              => 'VARCHAR',
                'constraint'        => 100
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `timekeeping_file_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('permission_id');

        return $this->dbforge->create_table('timekeeping_permissions', TRUE);   
    }


    public function users_leave() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'user_id'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'leave_id'        => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE
            ],
            'remaining_leave' => [

                'type'           => 'INT',
                'constraint'     => 11
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `timekeeping_users_leave_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `timekeeping_users_leave_ibfk_2` FOREIGN KEY (`leave_id`) REFERENCES `timekeeping_leave` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('user_id');
        $this->dbforge->add_key('leave_id');

        return $this->dbforge->create_table('timekeeping_users_leave', TRUE);
    }


    public function users_shift() {

        $this->dbforge->add_field([

            'id'              => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE
            ],
            'users_id'        => [

                'type'           => 'VARCHAR',
                'constraint'     => 11
            ],
            'shift_id'        => [

                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => TRUE,
                'null'           => TRUE
            ],

            'created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',

            'CONSTRAINT `timekeeping_users_shift_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE',
            'CONSTRAINT `timekeeping_users_shift_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `timekeeping_shift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE'
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->add_key('users_id');
        $this->dbforge->add_key('shift_id');

        return $this->dbforge->create_table('timekeeping_users_shift', TRUE);
    }

    public function leaves_seed() {

        $data = [
            [
                "leave_name" => "Vacation Leave",
                "No_of_days" => 10
            ],
            [
                "leave_name" => "Sick Leave",
                "No_of_days" => 10
            ],
            [
                "leave_name" => "Maternity Leave",
                "No_of_days" => 50
            ]
        ];

        return $this->db->insert_batch("timekeeping_leave", $data);
    }
    

    public function menu_seed() {
        $data = [
            [
                "id" => 1,
                "name" => "Dashboard",
                "icon" => "fa fa-dashboard",
                "status"   => 1,
                "url"  => "dashboard",
                "with_sub" => NULL
            ],
            [
                "id" => 2,
                "name" => "User Management",
                "icon" => "fa fa-users",
                "status"   => 1,
                "url"  => "users",
                "with_sub" => NULL
            ],
            [
                "id" => 3,
                "name" => "Attendance",
                "icon" => "fa fa-calendar",
                "status"   => 1,
                "url"  => "",
                "with_sub" => 1 
            ],
            [
                "id" => 4,
                "name" => "Management Shift",
                "icon" => "fa fa-clock-o",
                "status"   => 1,
                "url"  => "",
                "with_sub" => 1 
            ],
            [
                "id" => 5,
                "name" => "Position Management",
                "icon" => "fa fa-sitemap",
                "status"   => 1,
                "url"  => "position",
                "with_sub" => NULL
            ],
            [
                "id" => 6,
                "name" => "Logs",
                "icon" => "fa fa-tasks",
                "status"   => 1,
                "url"  => "logs",
                "with_sub" => NULL
            ],
            [
                "id" => 7,
                "name" => "Profile",
                "icon" => "fa fa-user",
                "status"   => 1,
                "url"  => "profile",
                "with_sub" => NULL
            ],
            [
                "id" => 8,
                "name" => "Schedule",
                "icon" => "fa fa-columns",
                "status"   => 1,
                "url"  => "eschedule",
                "with_sub" => NULL
            ],
            [
                "id" => 9,
                "name" => "Leave Management",
                "icon" => "fa fa-wpforms",
                "status"   => 1,
                "url"  => "eleave",
                "with_sub" => NULL
            ]
        ];

        return $this->db->insert_batch("timekeeping_menu", $data);
    }


    public function shift_seed() {

        $data = [
            [
                "id" => 1,
                "shift_type" => "Morning",
                "start_time" => "08:00:00",
                "end_time"   => "17:00:00"
            ],
            [
                "id" => 2,
                "shift_type" => "Mid",
                "start_time" => "15:00:00",
                "end_time"   => "01:00:00"
            ],
            [
                "id" => 3,
                "shift_type" => "Night",
                "start_time" => "22:00:00",
                "end_time"   => "10:00:00"
            ]
        ];

        return $this->db->insert_batch("timekeeping_shift", $data);
    }


    public function sub_menu_seed() {

        $data = [
            [
                "id" => 1,
                "sub" => "Shift Type",
                "url" => "shift",
                "menu_id"   => 4,
                "intern" => NULL,
                "admin_hr" => 1
            ],
            // [
            //     "id" => 2,
            //     "sub" => "Timesheet",
            //     "url" => "timesheet",
            //     "menu_id"   => 3,
            //     "intern" => 1,
            //     "admin_hr" => 1
            // ],
            [
                "id" => 3,
                "sub" => "Timesheet",
                "url" => "timesheet",
                "menu_id"   => 3,
                "intern" => 1,
                "admin_hr" => 1
            ],
            [
                "id" => 4,
                "sub" => "Leaves",
                "url" => "leaves",
                "menu_id"   => 3,
                "intern" => NULL,
                "admin_hr" => 1
            ],
            [
                "id" => 5,
                "sub" => "Calendar",
                "url" => "calendar",
                "menu_id"   => 3,
                "intern" => NULL,
                "admin_hr" => 1
            ],
            [
                "id" => 6,
                "sub" => "Overtime",
                "url" => "overtime",
                "menu_id"   => 3,
                "intern" => NULL,
                "admin_hr" => 1
            ],
            [
                "id" => 7,
                "sub" => "Employee Attendance",
                "url" => "attendance/employee",
                "menu_id"   => 3,
                "intern" => NULL,
                "admin_hr" => 1
            ],
            [
                "id" => 8,
                "sub" => "Schedule",
                "url" => "eschedule",
                "menu_id"   => 4,
                "intern" => NULL,
                "admin_hr" => 1
            ],
            [
                "id" => 9,
                "sub" => "Employee Leave",
                "url" => "leave/employee",
                "menu_id"   => 3,
                "intern" => NULL,
                "admin_hr" => 1
            ]
        ];

        return $this->db->insert_batch("timekeeping_sub_menu", $data);        
    }

    
    public function tk_permission_seed() {

        $data = [
            [
                "id" => 1,
                "permission_id" => "TK_ADMIN",
                "privileges" => "3,4,8,9",
                "privilege_sub_menu" => "1,2,3,4,5,6,7,8,9",
                "created_at"   => "2018-01-01 00:00:00",
                "updated_at" => "2018-01-01 00:00:00"
            ],
            [
                "id" => 2,
                "permission_id" => "TK_EMPLOYEE",
                "privileges" => "3,8",
                "privilege_sub_menu" => "2,3,4,5,6",
                "created_at"   => "2018-01-01 00:00:00",
                "updated_at" => "2018-01-01 00:00:00"
            ],
            [
                "id" => 3,
                "permission_id" => "TK_INTERN",
                "privileges" => "3",
                "privilege_sub_menu" => "3",
                "created_at"   => "2018-01-01 00:00:00",
                "updated_at" => "2018-01-01 00:00:00"
            ]
        ];

        return $this->db->insert_batch("timekeeping_permissions", $data);
    }


    public function tk_users_shift_seed() {

        $data = [
            [
                "id" => 1,
                "users_id" => "5pv3LX6GiB9",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 2,
                "users_id" => "A2d3LiX1iUK",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 3,
                "users_id" => "e21cLiCsVUK",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 4,
                "users_id" => "eGd2Lit5ic9",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 5,
                "users_id" => "epdcLitviUK",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 6,
                "users_id" => "epv3LXtGiBO",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 7,
                "users_id" => "Ex31rijL0zT",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 8,
                "users_id" => "FpvRLXtG37O",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 9,
                "users_id" => "Ipv123tGHBO",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 10,
                "users_id" => "Rp23LXt19BO",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 11,
                "users_id" => "UpY3RXttiBO",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ],
            [
                "id" => 12,
                "users_id" => "XzdG2i1vRUK",
                "shift_id" => NULL,
                "created_at" => "2018-02-12 03:25:08",
                "updated_at" => "2018-02-12 11:25:08"
            ]

        ];

        return $this->db->insert_batch("timekeeping_users_shift", $data);
    }


    public function remove_seed() {

        $ids = [1,2,3,4,5,6,7,8,9,10,11,12];

        $tables=['timekeeping_leave', 'timekeeping_menu', 'timekeeping_shift', 'timekeeping_sub_menu', 'timekeeping_permissions', 'timekeeping_users_shift'];
        foreach ($tables as $table) {
            $this->db->where_in("id", $ids);
            $this->db->delete($table);
        }
    }
}