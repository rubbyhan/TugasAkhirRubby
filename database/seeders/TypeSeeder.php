<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class TypeSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'types';
        $this->file = '/database/seeders/csv/type.csv';
        $this->delimiter = ';';
        $this->mapping = [
            0 => 'id',
            1 => 'name'
        ];
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
