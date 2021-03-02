<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

abstract class BaseSeeder extends Seeder
{
    const TABLE = 'seeder_like_migration';

    /**
     * @var array
     */
    protected $seeds = [];
    /**
     * @var array
     */
    protected $seedsEverRun = [];
    /**
     * @var array
     */
    private $seedAlreadyRun = [];

    public function __construct()
    {
        $this->getSeedAlreadyRun();
    }

    private function getSeedAlreadyRun()
    {
        $this->seedAlreadyRun = DB::table(self::TABLE)
            ->pluck('seeder')
            ->toArray();
    }

    public function run()
    {
        try {

            DB::beginTransaction();

            foreach ($this->seeds as $seed) {
                $this->callSeeder($seed);
            }

            foreach ($this->seedsEverRun as $seed) {
                $this->callSeeder($seed, true);
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    private function callSeeder($seeder, bool $everRun = false)
    {
        if(in_array($seeder, $this->seedAlreadyRun) && $everRun === false){
            return;
        }

        $this->call($seeder);
        $this->setSeederRun($seeder);
    }

    private function setSeederRun(string $seeder)
    {

        if(in_array($seeder, $this->seedAlreadyRun)){
            return;
        }

        DB::table(self::TABLE)->insert([
            'seeder' => $seeder,
        ]);
    }
}
