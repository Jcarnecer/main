<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_Seed extends CI_Migration {


    public function up() {

        $this->companies_seed();
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
        $this->db->where_in('id', $ids);
        $this->db->delete('users');
        $this->db->where('id', 'BM2RHidnpvG');
        $this->db->delete('companies');
    }


    public function companies_seed() {

        $data = [['id' => 'BM2RHidnpvG', 'name' => 'Astrid Technologies']];

        return $this->db->insert_batch('companies', $data);
    }


    public function users_seed() {

        $data = [

            [
                'id'             => 'epdcLitviUK',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'jun.carnecer@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Jun',
                'last_name'      => 'Carnecer',
                'role'           => '1'
            ],

            [
                'id'             => 'eGd2Lit5ic9',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'cjdalan@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Christian Jordan',
                'last_name'      => 'Dalan',
                'role'           => '2'
            ],

            [
                'id'             => 'Ex31rijL0zT',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'ana.rivera@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Ana',
                'last_name'      => 'Rivera',
                'role'           => '2'
            ],

            [
                'id'             => 'XzdG2i1vRUK',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'amlizardo@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Antonio Martin',
                'last_name'      => 'Lizardo',
                'role'           => '2'
            ],

            [
                'id'             => 'A2d3LiX1iUK',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'janadal@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'John Aidon',
                'last_name'      => 'Nadal',
                'role'           => '2'
            ],

            [
                'id'             => 'e21cLiCsVUK',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'tess.sanglay@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Tess',
                'last_name'      => 'Sanglay',
                'role'           => '2'
            ],

            [
                'id'             => 'epv3LXtGiBO',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'vvsison@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Von Vincent',
                'last_name'      => 'Sison',
                'role'           => '2'
            ],

            [
                'id'             => 'FpvRLXtG37O',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'idcruz@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Ian David',
                'last_name'      => 'Cruz',
                'role'           => '2'
            ],

            [
                'id'             => 'Ipv123tGHBO',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'kmdelfin@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Katrina Michaela',
                'last_name'      => 'Delfin',
                'role'           => '2'
            ],

            [
                'id'             => 'UpY3RXttiBO',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'nsabriol@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Nathaniel Siegfrid',
                'last_name'      => 'Abriol',
                'role'           => '3'
            ],

            [
                'id'             => '5pv3LX6GiB9',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'krishia.ellis@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Krishia',
                'last_name'      => 'Ellis',
                'role'           => '2'
            ],

            [
                'id'             => 'Rp23LXt19BO',
                'company_id'     => 'BM2RHidnpvG',
                'email_address'  => 'jmjimenez@astridtechnologies.com',
                'password'       => '2939dc5ddc7c515b680fd02e6c958ffe8a5329363fdc9ad43e2f62e26226e83c5584c79a742f2bf414e896f6b0a07084b13c8cda9e45b7e4fda9ca3dfc17ac5eBa+TaVRnd746vLo4RL+OGzGkAPVHfsDYFPo2E/Ibx+Q=',
                'first_name'     => 'Jan Michael',
                'last_name'      => 'Jimenez',
                'role'           => '2'
            ]
        ];

        return $this->db->insert_batch('users', $data);
    }
}