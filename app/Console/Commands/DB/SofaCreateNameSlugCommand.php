<?php

namespace App\Console\Commands\DB;

use App\Models\Sofa;
use Illuminate\Console\Command;

class SofaCreateNameSlugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'UpdateDb:SofaNameSlug';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Формирование имени и slug';

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
        $this->info('!!!! comment exit');
        exit;
        $sofa = Sofa::all();
        $type = Sofa::typeSofa();
        foreach ($sofa as $item){
            if(isset($type[$item->config])) {
                $item->name = $item->name . ' - ' . $type[$item->config]."\n\r";
                $item->slug = null;
                $item->save();
            }
        }
        $this->info('Ok');
        return 0;
    }
}
