<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\Item;
use App\Models\Role;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(["name" => "Administrator"]);
        $bank_mini = Role::create(["name" => "Bank Mini"]);
        $kantin = Role::create(["name" => "Kantin"]);
        $siswa = Role::create(["name" => "Siswa"]);

        User::create([
            "name" => "Septy Almeria",
            "email" => "sptyalmria@gmail.com",
            "password" => Hash::make("septy"),
            "role_id" => $admin->id
        ]);

        User::create([
            "name" => "Park Chanyeol",
            "email" => "realpcy@gmail.com",
            "password" => Hash::make("chanyeol"),
            "role_id" => $bank_mini->id
        ]);

        User::create([
            "name" => "Haruto Watanabe",
            "email" => "hrutowtnb@gmail.com",
            "password" => Hash::make("haruto"),
            "role_id" => $kantin->id
        ]);

        $mark = User::create([
            "name" => "Mark Lee",
            "email" => "marklee@gmail.com",
            "password" => Hash::make("marklee"),
            "role_id" => $siswa->id
        ]);

        $bakso = Item::create([
            "image" => "burger.png",
            "name" => "Burger",
            "price" => 6000,
            "stock" => 25,
            "desc" => "Roti dan Daging"
        ]);

        $mie_ayam = Item::create([
            "image" => "risol.png",
            "name" => "Risol",
            "price" => 12000,
            "stock" => 25,
            "desc" => "Risol Mayones"
        ]);

        $teh_botol = Item::create([
            "image" => "teh_botol.png",
            "name" => "Teh Botol",
            "price" => 5000,
            "stock" => 25,
            "desc" => "Teh Botol"
        ]);

        $aqua = Item::create([
            "image" => "aqua.png",
            "name" => "Aqua",
            "price" => 3000,
            "stock" => 25,
            "desc" => "Air Mineral"
        ]);

        Balance::create([
            "user_id" => $mark->id,
            "saldo" => 50000
        ]);

        //Isi Saldo
        Transaction::create([
            "user_id" => $mark->id,
            "item_id" => null,
            "jumlah" => 50000,
            "invoice_id" => "SAL_001",
            "type" => 1,
            "status" => 2
        ]);

        //Belanja
        Transaction::create([
            "user_id" => $mark->id,
            "item_id" => $mie_ayam->id,
            "jumlah" => 2,
            "invoice_id" => "INV_001",
            "type" => 2,
            "status" => 1
        ]);

        Transaction::create([
            "user_id" => $mark->id,
            "item_id" => $teh_botol->id,
            "jumlah" => 2,
            "invoice_id" => "INV_001",
            "type" => 2,
            "status" => 1
        ]);
    }
}
