<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Seed extends CI_Migration {


    public function up() {
        $this->companies_seed();
        $this->roles_seed();
        $this->permissions_seed();
        $this->roles_permissions_seed();
        $this->users_seed();
    }


    public function down() {
        $ids = [
            'epdcLitviUK',
            'eGd2Lit5ic9', 
            'Ex31rijL0zT', 
            'XzdG2i1vRUK', 
            'A2d3LiX1iUK', 
            'e21cLiCsVUK', 
            'epv3LXtGiBO', 
            'FpvRLXtG37O', 
            'Ipv123tGHBO', 
            'UpY3RXttiBO', 
            '5pv3LX6GiB9', 
            'Rp23LXt19BO'
        ];
        $this->db->where_in("id", $ids);
        $this->db->delete("users");
        $this->db->where("id", 'astridtech');
        $this->db->delete("companies");
    }


    public function companies_seed() {
        return $this->db->insert('companies', [
            "id" => "astridtech", 
            "name" => "Astrid Technologies",
            "created_at" => date("Y-m-d H:i:s")
        ]);
    }

    public function roles_seed() {
        $roles = [
            [
                "id" => "1",
                "company_id" => null,
                "name" => "Root",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => "2",
                "company_id" => "astridtech",
                "name" => "Admin",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => "3",
                "company_id" => "astridtech",
                "name" => "Staff",
                "created_at" => date("Y-m-d H:i:s")
            ]
        ];

        return $this->db->insert_batch("roles", $roles);
    }

    public function permissions_seed() {
        $permissions = [
            [
                "id" => "ROLE_LIST",
                "name" => "ROLE_LIST",
                "description" => "Allow user to view the list of roles"
            ],
            [
                "id" => "ROLE_VIEW",
                "name" => "ROLE_VIEW",
                "description" => "Allow user to view roles"
            ],
            [
                "id" => "ROLE_CREATE",
                "name" => "ROLE_CREATE",
                "description" => "Allow user to create roles"
            ],
            [
                "id" => "ROLE_UPDATE",
                "name" => "ROLE_UPDATE",
                "description" => "Allow user to update roles"
            ],
            [
                "id" => "USER_LIST",
                "name" => "USER_LIST",
                "description" => "Allow user to view the list of users"
            ],
            [
                "id" => "USER_VIEW",
                "name" => "USER_VIEW",
                "description" => "Allow user to view users"
            ],
            [
                "id" => "USER_CREATE",
                "name" => "USER_CREATE",
                "description" => "Allow user to create users"
            ],
            [
                "id" => "USER_UPDATE",
                "name" => "USER_UPDATE",
                "description" => "Allow user to update users"
            ],
            [   
                "id" => "TK_ADMIN",
                "name" => "TK_ADMIN",
                "description" => "Allow user to have Level 3 access(Timekeeping)"
            ],
            [   
                "id" => "TK_EMPLOYEE",
                "name" => "TK_EMPLOYEE",
                "description" => "Allow user to have Level 2 access(Timekeeping)"
            ],
            [   
                "id" => "TK_INTERN",
                "name" => "TK_INTERN",
                "description" => "Allow user to have Level 1\r\naccess(Timekeeping)"
            ]
        ];

        return $this->db->insert_batch("permissions", $permissions);
    }

    public function roles_permissions_seed() {
        $roles_permissions = [
            [
                "role_id" => "1",
                "permission_id" => "ROLE_LIST"
            ],
            [
                "role_id" => "1",
                "permission_id" => "ROLE_VIEW"
            ],
            [
                "role_id" => "1",
                "permission_id" => "ROLE_CREATE"
            ],
            [
                "role_id" => "1",
                "permission_id" => "ROLE_UPDATE"
            ],
            [
                "role_id" => "1",
                "permission_id" => "USER_LIST"
            ],
            [
                "role_id" => "1",
                "permission_id" => "USER_VIEW"
            ],
            [
                "role_id" => "1",
                "permission_id" => "USER_CREATE"
            ],
            [
                "role_id" => "1",
                "permission_id" => "USER_UPDATE"
            ],
            [
                "role_id" => "1",
                "permission_id" => "TK_ADMIN"
            ],
            [
                "role_id" => "2",
                "permission_id" => "TK_EMPLOYEE"
            ],
            [
                "role_id" => "3",
                "permission_id" => "TK_INTERN"
            ]
        ];

        return $this->db->insert_batch("roles_permissions", $roles_permissions);
    }

    public function users_seed() {
        $data = [
            [
                'id'             => 'epdcLitviUK',
                'company_id'     => 'astridtech',
                'email_address'  => 'jun.carnecer@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Jun',
                'last_name'      => 'Carnecer',
                'role'           => '1',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'eGd2Lit5ic9',
                'company_id'     => 'astridtech',
                'email_address'  => 'christian.dalan@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Christian Jordan',
                'last_name'      => 'Dalan',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'Ex31rijL0zT',
                'company_id'     => 'astridtech',
                'email_address'  => 'ana.rivera@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Ana',
                'last_name'      => 'Rivera',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'XzdG2i1vRUK',
                'company_id'     => 'astridtech',
                'email_address'  => 'martin.lizardo@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Antonio Martin',
                'last_name'      => 'Lizardo',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'A2d3LiX1iUK',
                'company_id'     => 'astridtech',
                'email_address'  => 'johnaidon.nadal@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'John Aidon',
                'last_name'      => 'Nadal',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'e21cLiCsVUK',
                'company_id'     => 'astridtech',
                'email_address'  => 'tess.sanglay@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Tess',
                'last_name'      => 'Sanglay',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'epv3LXtGiBO',
                'company_id'     => 'astridtech',
                'email_address'  => 'von.sison@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Von Vincent',
                'last_name'      => 'Sison',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'FpvRLXtG37O',
                'company_id'     => 'astridtech',
                'email_address'  => 'ian.cruz@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Ian David',
                'last_name'      => 'Cruz',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'Ipv123tGHBO',
                'company_id'     => 'astridtech',
                'email_address'  => 'katrina.delfin@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Katrina Michaela',
                'last_name'      => 'Delfin',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'UpY3RXttiBO',
                'company_id'     => 'astridtech',
                'email_address'  => 'nathan.abriol@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Nathaniel Siegfrid',
                'last_name'      => 'Abriol',
                'role'           => '3',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => '5pv3LX6GiB9',
                'company_id'     => 'astridtech',
                'email_address'  => 'mohammadz.guro@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Mohammad Zahaire',
                'last_name'      => 'Guro',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ],
            [
                'id'             => 'Rp23LXt19BO',
                'company_id'     => 'astridtech',
                'email_address'  => 'janmichael.jimenez@astridtechnologies.com',
                'password'       => '28428395f74bf6ad08b7c79e6b98f76a3fe64b58bf1bb8d3685d58b17458f44ddffce5acebdc09accea7c4c1f1037836d7f5cd2629a253b19a855f89de790673y35uXTaWjx9xnFwJGQf03ISqgWahlzskXLJ9CcnyRY8=',
                'first_name'     => 'Jan Michael',
                'last_name'      => 'Jimenez',
                'role'           => '2',
                'created_at'     => date("Y-m-d H:i:s"),
                'last_login_at'  => date("Y-m-d H:i:s"),
                'avatar_url'     => DEFAULT_AVATAR_URL
            ]
        ];

        return $this->db->insert_batch('users', $data);
    }
}