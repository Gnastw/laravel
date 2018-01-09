<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allFiles = File::allFiles(public_path('images'));

        foreach ($allFiles as $f) {
            File::delete($f); // supprime le fichier si il existe
        }

        factory(App\User::class,20)->create()->each(function ($user){

            $file = file_get_contents('https://placeimg.com/400/200/animals/'. rand(1,9));
            $link = str_random(12) . '.jpg';
            File::put(
                public_path('images') . '/' . $link,  // dans le dossier public dossier images
                $file
            );

            $user->picture()->create([
              'name' => $link,
              'link' =>   '/images/'.$link
            ]);

            //generation des dates
            $year = rand(2000,2018);
            $month = rand(1,12);
            $day = rand(1,31);
            $started = Carbon::create($year,$month,$day,0);
            $ended = Carbon::create($year,$month,$day,0)->addWeeks(rand(1,10));
            // pour calculer la différence en jours entre deux dates :

            $s = \Carbon\Carbon::parse($started);
            $e = \Carbon\Carbon::parse($ended);

            $days = $s->diffInDays($e); // donne le nombre de jour(s)

            $user->part()->create([
                'days' => $days,
                'started' => $started,
                'ended' => $ended,
            ]);
        });
    }
}
