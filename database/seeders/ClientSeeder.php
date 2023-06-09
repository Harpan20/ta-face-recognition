<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'name' => 'Bank Galuh 1',
                'image' => 'https://lh6.googleusercontent.com/peZWxSrAo1NyaFxJRWeh8ZS3RZKk5RO4Ef9yBMgrFqUihFjDCydJz6urCFBw3hIqaXo=w2400'
            ],
            [
                'name' => 'Bank Kota Bogor 2',
                'image' => 'https://lh6.googleusercontent.com/0gS924c9wtllNnurxRJAOEVZ8rgUYp-atcrCxJrx2ADpeGZ50RH5X1WZQScTHTz1wjg=w2400'
            ],
            [
                'name' => 'Bank BGJ 3',
                'image' => 'https://lh3.googleusercontent.com/h5k__uR8IRNa2SZZfTiIudmOVGZestJaCt1rzq94bp1N5CcJda90E5Kf_XcTTcU3CgA=w2400'
            ],
            [
                'name' => 'BPR 4',
                'image' => 'https://lh5.googleusercontent.com/K3NzNSwM69l03ztMuNFAURaHPL9CJjIhd-zTz1-z1oG3AypZOghfldopzFzcPch0OSk=w2400'
            ],
            [
                'name' => 'PT. BPR Madani Sejahtera Abadi 5',
                'image' => 'https://lh3.googleusercontent.com/23l0NDX97A-m2ZA0_Li6xcSpBuaQJkrVFkrKIYt7-MkrQrBjIO9XXkXCmghSkbebO7c=w2400'
            ],
            [
                'name' => 'PT. LKM Sumedang 6',
                'image' => 'https://lh5.googleusercontent.com/H9q2tZuY1r1h0tAUDfcXnCZpZekhMdyBGUIH73_mYG8fvXMOh8sI1x93Mle4X37YitY=w2400'
            ],
            [
                'name' => 'BKPD Cijulang 8',
                'image' => 'https://lh5.googleusercontent.com/m-u7LpoCok1VGKaQsgV8ffwed9uJ27mbPkPoo4oVVcLFOU7Mjc7OXr0omyOzSZBlwwg=w2400'
            ],
            [
                'name' => 'BPR SMA 9',
                'image' => 'https://lh3.googleusercontent.com/Xk0M7EFtSjVbaX1obGxeFiczAAA0tBw-N-MGOLOUg2CLzT-Q3NBXjFZkBc3BGOn4FcA=w2400'
            ],
            [
                'name' => 'Bank Galuh 10',
                'image' => 'https://lh6.googleusercontent.com/peZWxSrAo1NyaFxJRWeh8ZS3RZKk5RO4Ef9yBMgrFqUihFjDCydJz6urCFBw3hIqaXo=w2400'
            ],
            [
                'name' => 'Bank Kota Bogor 11',
                'image' => 'https://lh6.googleusercontent.com/0gS924c9wtllNnurxRJAOEVZ8rgUYp-atcrCxJrx2ADpeGZ50RH5X1WZQScTHTz1wjg=w2400'
            ],
            [
                'name' => 'Bank BGJ 12',
                'image' => 'https://lh3.googleusercontent.com/h5k__uR8IRNa2SZZfTiIudmOVGZestJaCt1rzq94bp1N5CcJda90E5Kf_XcTTcU3CgA=w2400'
            ],
            [
                'name' => 'BPR 13',
                'image' => 'https://lh5.googleusercontent.com/K3NzNSwM69l03ztMuNFAURaHPL9CJjIhd-zTz1-z1oG3AypZOghfldopzFzcPch0OSk=w2400'
            ],
            [
                'name' => 'PT. BPR Madani Sejahtera Abadi 14',
                'image' => 'https://lh3.googleusercontent.com/23l0NDX97A-m2ZA0_Li6xcSpBuaQJkrVFkrKIYt7-MkrQrBjIO9XXkXCmghSkbebO7c=w2400'
            ],
            [
                'name' => 'PT. LKM Sumedang 15',
                'image' => 'https://lh5.googleusercontent.com/H9q2tZuY1r1h0tAUDfcXnCZpZekhMdyBGUIH73_mYG8fvXMOh8sI1x93Mle4X37YitY=w2400'
            ],
            [
                'name' => 'BKPD Cijulang 16',
                'image' => 'https://lh5.googleusercontent.com/m-u7LpoCok1VGKaQsgV8ffwed9uJ27mbPkPoo4oVVcLFOU7Mjc7OXr0omyOzSZBlwwg=w2400'
            ],
            [
                'name' => 'BPR SMA 17',
                'image' => 'https://lh3.googleusercontent.com/Xk0M7EFtSjVbaX1obGxeFiczAAA0tBw-N-MGOLOUg2CLzT-Q3NBXjFZkBc3BGOn4FcA=w2400'
            ],
            [
                'name' => 'Bank Galuh 18',
                'image' => 'https://lh6.googleusercontent.com/peZWxSrAo1NyaFxJRWeh8ZS3RZKk5RO4Ef9yBMgrFqUihFjDCydJz6urCFBw3hIqaXo=w2400'
            ],
            [
                'name' => 'Bank Kota Bogor 19',
                'image' => 'https://lh6.googleusercontent.com/0gS924c9wtllNnurxRJAOEVZ8rgUYp-atcrCxJrx2ADpeGZ50RH5X1WZQScTHTz1wjg=w2400'
            ],
            [
                'name' => 'Bank BGJ 20',
                'image' => 'https://lh3.googleusercontent.com/h5k__uR8IRNa2SZZfTiIudmOVGZestJaCt1rzq94bp1N5CcJda90E5Kf_XcTTcU3CgA=w2400'
            ],
            [
                'name' => 'BPR 21',
                'image' => 'https://lh5.googleusercontent.com/K3NzNSwM69l03ztMuNFAURaHPL9CJjIhd-zTz1-z1oG3AypZOghfldopzFzcPch0OSk=w2400'
            ],
            [
                'name' => 'PT. BPR Madani Sejahtera Abadi 22',
                'image' => 'https://lh3.googleusercontent.com/23l0NDX97A-m2ZA0_Li6xcSpBuaQJkrVFkrKIYt7-MkrQrBjIO9XXkXCmghSkbebO7c=w2400'
            ],
            [
                'name' => 'PT. LKM Sumedang 23',
                'image' => 'https://lh5.googleusercontent.com/H9q2tZuY1r1h0tAUDfcXnCZpZekhMdyBGUIH73_mYG8fvXMOh8sI1x93Mle4X37YitY=w2400'
            ],
            [
                'name' => 'BKPD Cijulang 24',
                'image' => 'https://lh5.googleusercontent.com/m-u7LpoCok1VGKaQsgV8ffwed9uJ27mbPkPoo4oVVcLFOU7Mjc7OXr0omyOzSZBlwwg=w2400'
            ],
            [
                'name' => 'BPR SMA 25',
                'image' => 'https://lh3.googleusercontent.com/Xk0M7EFtSjVbaX1obGxeFiczAAA0tBw-N-MGOLOUg2CLzT-Q3NBXjFZkBc3BGOn4FcA=w2400'
            ],
        ];

        foreach ($clients as $client) {
            Client::query()->updateOrCreate([
                'name' => $client['name'],
                'image' => $client['image'],
            ]);
        }
    }
}
