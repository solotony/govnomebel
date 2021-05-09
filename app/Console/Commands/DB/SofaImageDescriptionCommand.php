<?php

namespace App\Console\Commands\DB;

use App\Models\Sofa;
use Illuminate\Console\Command;
use Faker\Generator as Faker;


class SofaImageDescriptionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateDb:textImage';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = \Faker\Factory::create();
        $sofa = Sofa::all();

        foreach ($sofa as $item) {
            $item->image_description = $faker->text(100);
            $item->save();
        }
        $this->info('Ok');
        return 0;
    }
}
