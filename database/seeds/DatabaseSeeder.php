<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Type;
use App\Topic;
use App\Thread;
use App\Reply;
use App\Signature;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

//      Role
        Role::create(['name' => 'Administrator']);
        Role::create(['name' => 'Member']);

//      User
        User::create([
            'role_id' => 1,
            'signature_id' => 1,
            'fullname' => 'Goldwin Japar',
            'nickname' => 'goldwin.japar',
            'nim' => $faker->creditCardNumber(),
            'email' => 'goldwin.japar@gmail.com',
            'dob' => '1997/02/20',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 1,
            'fullname' => 'Nicholas Krisna Putratama Lusianto',
            'nickname' => 'nicholas.krisna',
            'nim' => $faker->creditCardNumber(),
            'email' => 'nicholas.krisna@gmail.com',
            'dob' => '1997/06/01',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Jefry',
            'nickname' => 'jeffry.binus',
            'nim' => $faker->creditCardNumber(),
            'email' => 'jeffry@gmail.com',
            'dob' => '1996/10/21',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Luciana Santami',
            'nickname' => 'luciana.santami',
            'nim' => $faker->creditCardNumber(),
            'email' => 'luciana.santami@gmail.com',
            'dob' => '1996/05/20',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Misita Pontiasa',
            'nickname' => 'misita.pontiasa',
            'nim' => $faker->creditCardNumber(),
            'email' => 'misita.pontiasa@gmail.com',
            'dob' => '1996/12/17',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'William',
            'nickname' => 'william.anggrek',
            'nim' => $faker->creditCardNumber(),
            'email' => 'william@binus.edu',
            'dob' => '1995/12/17',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);

//      Signature
        Signature::create([
            'content' => 'Hello, I\'m administrator here :D'
        ]);

//      Type
        Type::create(['name' => 'General']);
        Type::create(['name' => 'Department']);
        Type::create(['name' => 'University']);

//      Topic
        Topic::create([
            'type_id' => 1,
            'title' => 'Main Announcement',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 1,
            'title' => 'The Lounge',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Agama',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Dalam Negeri',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Kesehatan',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Kesehatan',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Luar Negeri',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Pertanian',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Pertahanan',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Kehutanan',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Perhubungan',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Departemen Sosial',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 3,
            'title' => 'Bina Nusantara University (BINUS)',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 3,
            'title' => 'Universitas Indonesia (UI)',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 3,
            'title' => 'Institut Teknologi Bandung (ITB)',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 3,
            'title' => 'Gunadarma',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 3,
            'title' => 'Universitas Gadjah Mada',
            'description' => $faker->text($maxNbChars = 40)
        ]);

//      Thread - Annoucement
        Thread::create([
            'topic_id' => 1,
            'user_id' => 2,
            'title' => 'Pengumuman Pembuatan e-KTP dan cara melakukan pendaftaran',
            'content' => $faker->realText(),
            'view' => $faker->numberBetween($min = 0, $max = 10),
            'rating' => $faker->numberBetween($min = 0, $max = 5),
            'is_announcement' => true,
            'status' => 'open',
        ]);

//      Thread - Usual
        foreach(range(1, 50) as $index){
            Thread::create([
                'topic_id' => $faker->numberBetween($min = 1, $max = Topic::all()->count()),
                'user_id' => $faker->numberBetween($min = 1, $max = User::all()->count()),
                'title' => $faker->text($maxNbChars = 20),
                'content' => $faker->realText() . $faker->realText(),
                'view' => $faker->numberBetween($min = 0, $max = 10),
                'rating' => $faker->numberBetween($min = 0, $max = 5),
                'is_announcement' => false,
                'status' => $faker->randomElement($array = array('close', 'open')),
            ]);
        }

//      Reply - Usual
        foreach(range(1, 300) as $index){
            Reply::create([
                'thread_id' => $faker->numberBetween($min = 1, $max = Thread::all()->count()),
                'user_id' => $faker->numberBetween($min = 1, $max = User::all()->count()),
                'title' => $faker->text($maxNbChars = 20),
                'content' => $faker->realText(),
            ]);
        }
    }
}
