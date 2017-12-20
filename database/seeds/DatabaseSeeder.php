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
            'nickname' => 'golz',
            'nim' => '1901472631',
            'email' => 'golzwinsjapar@gmail.com',
            'dob' => '1998/02/15',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 1,
            'fullname' => 'Nicholas Krisna Putratama Lusianto',
            'nickname' => 'Zephkiel',
            'nim' => '1901487596',
            'email' => 'nicholaskrisnapl@gmail.com',
            'dob' => '1997/06/01',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Jefry',
            'nickname' => 'jeffchange',
            'nim' => '1901500585',
            'email' => 'jeffry.chang70@gmail.com',
            'dob' => '1996/10/21',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Luciana Dian Santami',
            'nickname' => 'luciana_lim',
            'nim' => '1901460240',
            'email' => 'lucianaleminho@gmail.com',
            'dob' => '1997/04/17',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Misita Pontiasa',
            'nickname' => 'misitasasa',
            'nim' => '1901460240',
            'email' => 'misita.pontiasa@gmail.com',
            'dob' => '1996/12/17',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'William',
            'nickname' => 'Yoda',
            'nim' => '1801415886',
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
            'title' => 'Faculty of Engineering',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Faculty of Humanities',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'School of Computer Science',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'School of Information Systems',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'School of Business Management',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'School of Design',
            'description' => $faker->text($maxNbChars = 40)
        ]);
        Topic::create([
            'type_id' => 2,
            'title' => 'Graduate Program',
            'description' => $faker->text($maxNbChars = 40)
        ]);

//      Thread - Annoucement
        Thread::create([
            'topic_id' => 1,
            'user_id' => 2,
            'title' => 'Pengumuman PKM-KC dan PKM-K',
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
