<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;
use App\Type;
use App\Topic;
use App\Thread;
use App\Reply;

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
            'fullname' => 'Goldwin Japar',
            'username' => 'golz',
            'nim' => '1901472631',
            'email' => 'golzwinsjapar@gmail.com',
            'dob' => '1998/02/15',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 1,
            'fullname' => 'Nicholas Krisna Putratama Lusianto',
            'username' => 'Zephkiel',
            'nim' => '1901487596',
            'email' => 'nicholaskrisnapl@gmail.com',
            'dob' => '1997/06/01',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
        ]);
        User::create([
            'role_id' => 2,
            'fullname' => 'Jefry',
            'username' => 'jeffchange',
            'nim' => '1901500585',
            'email' => 'jeffry.chang70@gmail.com',
            'dob' => '1996/10/21',
            'image' => 'default.jpg',
            'password' => bcrypt('asdasd123123')
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
            'title' => 'School of Computer Science',
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
        foreach(range(1, 20) as $index){
            Thread::create([
                'topic_id' => $faker->numberBetween($min = 1, $max = Topic::all()->count()),
                'user_id' => $faker->numberBetween($min = 1, $max = User::all()->count()),
                'title' => $faker->text($maxNbChars = 20),
                'content' => $faker->realText(),
                'view' => $faker->numberBetween($min = 0, $max = 10),
                'rating' => $faker->numberBetween($min = 0, $max = 5),
                'is_announcement' => false,
                'status' => $faker->randomElement($array = array('close', 'open')),
            ]);
        }

//      Reply - Usual
        foreach(range(1, 40) as $index){
            Reply::create([
                'thread_id' => $faker->numberBetween($min = 1, $max = Thread::all()->count()),
                'user_id' => $faker->numberBetween($min = 1, $max = User::all()->count()),
                'title' => $faker->text($maxNbChars = 20),
                'content' => $faker->realText(),
            ]);
        }
    }
}
