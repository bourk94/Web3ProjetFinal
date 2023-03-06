<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActeursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acteurs')->insert([
            [
                'nom'=>'Wood',
                'prenom'=>'Elijah',
                'date_naissance'=>'1981-01-28',
                'nationalite'=>'États-Unis',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcT8Rx0fVUwYgE7d2sdPZDce4dWCewxovPNm8EFMs_rzBi5ESUaABUeuIgeyJP72mVt0',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'McKellen',
                'prenom'=>'Ian',
                'date_naissance'=>'1939-05-25',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcS3t-u2Cacif7RzNpSU-m76VR9tBLlJi8SqSIB_tSw88JjmxS6G5OeFIfEWEsTtEP6a',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Tyler',
                'prenom'=>'Liv',
                'date_naissance'=>'1977-07-01',
                'nationalite'=>'États-Unis',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSrsGpNyvmyXSg6BvPDmw_2cl1h98o1QbP7GdvLC3zPsCFqReHoUXE_7bJkldzEBV-7',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Mortensen',
                'prenom'=>'Viggo',
                'date_naissance'=>'1958-10-20',
                'nationalite'=>'États-Unis',
                'photo'=>'http://t0.gstatic.com/licensed-image?q=tbn:ANd9GcRHBTDL6mugC7caOet5e4b7gCWJzluI_8QkO9MoaAp7RVOHosgvin3maW4voP5Z29GX',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Astin',
                'prenom'=>'Sean',
                'date_naissance'=>'1971-02-25',
                'nationalite'=>'États-Unis',
                'photo'=>'http://t1.gstatic.com/licensed-image?q=tbn:ANd9GcS4KKe7c-3ktDJWZLCN2nop5UOq2kT8c9hHQbqMSn4OHZLK0-66OH4bq9LocubJ3maE',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Blanchett',
                'prenom'=>'Catherine',
                'date_naissance'=>'1969-05-14',
                'nationalite'=>'Australie',
                'photo'=>'http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcRtgcHxcUHUn28ssFFnvYiiYoGgf_adQXVu1lq6dVcxYaWuVs9O4b-lxxMIwGJa-Gqr',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Rhys-Davies',
                'prenom'=>'John',
                'date_naissance'=>'1944-05-05',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcRNVF7iFQPNkay2WqSiRIQ-T4sMiaFgeN7wQr-s8V1mFTXc9qTLXUFrMgUhk8knUhzq',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Lee',
                'prenom'=>'Christopher',
                'date_naissance'=>'1922-05-27',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcR6ryBP5Txx3gQB4kmQr9ZnYIYj0i_yhtSi5CTReAzwySwCfiZxPYgB4uLfKAZde-Qz',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Boyd',
                'prenom'=>'Billy',
                'date_naissance'=>'1968-08-28',
                'nationalite'=>'Écosse',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcSEw1dBqfOH3CAgvI-8DpozbYCB2ASuQc6b3R4l8irmOEwoofJny5vCsuwnHrSMjI98',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Monaghan',
                'prenom'=>'Dominic',
                'date_naissance'=>'1976-12-08',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcRHeWiXMUZNuG7Z7HDtJ8KN4d94bWDX4d_hhoiFyMbNwRH0APDOgii0M_gUkIh2gSvh',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Bloom',
                'prenom'=>'Orlando',
                'date_naissance'=>'1977-01-13',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t0.gstatic.com/licensed-image?q=tbn:ANd9GcSMI2wPpVmPYq47xP93tR77ftRgeZYMqncADCqcbEHbC886_9lCSpQ0jbyECM1MkH-x',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Weaving',
                'prenom'=>'Hugo',
                'date_naissance'=>'1960-04-04',
                'nationalite'=>'Australie',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcQoHq9nWwx15Qa34t4oNOovNrXJ3HIW-7_EoeX91Jyo2QdZqN5RSFjK4qp3FJWAcJZ8',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Serkis',
                'prenom'=>'Andy',
                'date_naissance'=>'1964-04-20',
                'nationalite'=>'Angleterre',
                'photo'=>'https://flxt.tmsimg.com/assets/85991_v9_bb.jpg',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Bean',
                'prenom'=>'Sean',
                'date_naissance'=>'1959-04-17',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t0.gstatic.com/licensed-image?q=tbn:ANd9GcQbMGGQmrOKzjJUWoyzxJfy0G7EbJ1E64vKVOaQUqp7lDrrRtYuJGMYp4FwlJP9cuaT',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Radcliffe',
                'prenom'=>'Daniel',
                'date_naissance'=>'1989-07-23',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcRNx8Pg7tSuvTShDovgkVbTVNNYiysYG13ItbmJRr9xP_kvNpla_Oa_uwGI9BJEAqmr',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Watson',
                'prenom'=>'Emma',
                'date_naissance'=>'1990-04-15',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t2.gstatic.com/licensed-image?q=tbn:ANd9GcQlthIBJZNS8N17_Z55nXAHqzx8QGe4AQP9mZsVFscvo9w-xkWyj2hGl8klskk4zKH3',
                'created_at'=> date('Y-m-d H:i:s')
            ],
            [
                'nom'=>'Grint',
                'prenom'=>'Rupert',
                'date_naissance'=>'1988-08-24',
                'nationalite'=>'Angleterre',
                'photo'=>'http://t3.gstatic.com/licensed-image?q=tbn:ANd9GcT_65AC_CVLHKD29mk4ksgzVoEz8ku5eQ31UFSDfanwd1495skaxORypEcec3ceT5d2',
                'created_at'=> date('Y-m-d H:i:s')
            ]
        ]);
    }
}
