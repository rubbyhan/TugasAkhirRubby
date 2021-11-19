<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class QuestionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'questions';
        $this->file = '/database/seeders/csv/question.csv';
        $this->delimiter = ';';
        $this->mapping = [
            0 => 'id',
            1 => 'question',
            2 => 'optionA',
            3 => 'optionB',
            4 => 'type_id'
        ];
    }

    public function run()
    {
        DB::disableQueryLog();
        parent::run();
    }
}
