<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

  /**
  * Auto generated seed file
  *
  * @return void
  */
  public function run()
  {
    $user = new User;
    $user->name = 'Andrew Wint';
    $user->email = 'wint.andrew@gmail.com';
    $user->password = bcrypt('password123');
    $user->save();

    $user = new User;
    $user->name = 'Kristopher DaCosta';
    $user->email = 'kdacosta@visitjamaica.com';
    $user->password = bcrypt('password123');
    $user->save();

    $user = new User;
    $user->name = 'Allana Faustin';
    $user->email = 'afaustin@visitjamaica.com';
    $user->password = bcrypt('password123');
    $user->save();

    $user = new User;
    $user->name = 'Karlene Shakes';
    $user->email = 'kshakes@visitjamaica.com';
    $user->password = bcrypt('password123');
    $user->save();

  }
}
