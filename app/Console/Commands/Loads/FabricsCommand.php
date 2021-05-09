<?php

namespace App\Console\Commands\Loads;

use App\Models\Fabrics\Collection;
use App\Models\Fabrics\Color;
use App\Models\Fabrics\Fabric;
use App\Models\Fabrics\FabricType;
use App\Models\Fabrics\Producer;
use DirectoryIterator;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;

class FabricsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loads:fill-fabrics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Заполнить таблицу Fabrics';

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
        $this->info('Start');
        /*Fabric::truncate();
        $contents = File::get('public/load/1.txt');
        $rows = explode("\n", $contents);
        foreach ($rows as $data) {
            if (empty($data)) continue;
            $items = explode("\t", $data);
            $row = array_map(function ($val) {
                return trim($val);
            }, $items);
            $row[0] = str_replace(' ', '', $row[0]);

            $producers = Producer::where('name', $row[1])->firstOrFail();
            $collection = Collection::where('name', $row[3])->firstOrFail();
            $fabricType = FabricType::where('name', $row[6])->firstOrFail();
            $baseColor = Color::where('name', $row[7])->firstOrFail();
            $subDopColor = Color::where('name', $row[8])->firstOrFail();

            if (isset($row[9])) {
                $dopColor = Color::where('name', $row[9])->firstOrFail();;
            }

            $fabrics = Fabric::make([
                'price' => $row[0],
                'name_site' => $row[2],
                'color_number' => $row[4],
                'fabric_code' => $row[5]
            ]);

            $fabrics->producers()->associate($producers);
            $fabrics->collection()->associate($collection);
            $fabrics->fabricType()->associate($fabricType);
            $fabrics->baseColor()->associate($baseColor);
            $fabrics->subDopColor()->associate($subDopColor);
            if (isset($row[9])) {
                $fabrics->addCharacteristic()->associate($dopColor);
            }

            $fabrics->saveOrFail();
        }
        $this->info('--------- END INSERT BD ---------');*/

        $this->info('--------- START INSERT IMAGES to BD ---------');
        $dir_path = 'xxx-mebel/FabriksForDivan';
//        $dir_path = public_path() . '/dirname';
        $dir = new DirectoryIterator($dir_path);
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                $str = explode('.', $fileinfo->getFilename())[0];

                $fabric = Fabric::where('fabric_code', 'TD_' . $str)->first();
                if (!is_null($fabric)) {
                    $file = new UploadedFile($fileinfo->getPathname(), $fileinfo->getFilename()/*, 'image/jpeg'*/);
                    $new_file_name = md5($file->getFilename().random_int(1, 9999).time()).'.'.$file->getExtension();
                    $file_path = $file->storeAs("fabrics", $new_file_name, "public");

                    $fabric->image=$file_path;
                    $fabric->save();
                }
            }
        }
        return 0;
    }
}
