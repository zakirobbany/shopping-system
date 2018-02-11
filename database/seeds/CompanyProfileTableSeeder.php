<?php

use Illuminate\Database\Seeder;
use App\Models\Core\CompanyProfile;

class CompanyProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('TRUNCATE TABLE company_profile');
        $mission = '1. Memberikan Pelayanan Terbaik. 2. Memberikan Harga Termurah';
        $data = [
            'name' => 'Sinar Indah 2',
            'vision' => 'Menjadi Toko Bangunan Terbaik Pilihan Masyarakat',
            'mission' => $mission,
            'about' => 'Toko Sinar Indah 2 adalah bagian dari Sinar Indah Group yang fokus menangani jual
                        beli bahan bangunan.'
        ];

        CompanyProfile::create($data);
    }
}
