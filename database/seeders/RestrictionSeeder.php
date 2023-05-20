<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RestrictionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileContents = Storage::get('restriction.txt');
        $lines = explode("\n", $fileContents);

        // Skip the first row (header)
        array_shift($lines);

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            $fields = explode("\t", $line);

            $restriction = [
                'roadnumber' => $fields[0],
                'frompoint' => $fields[1],
                'topoint' => $fields[2],
                'settlement' => $fields[3],
                'fromdate' => $fields[4],
                'todate' => $fields[5],
                'namingid' => $fields[6],
                'extentid' => $fields[7],
                'speed' => isset($fields[8]) ? substr($fields[8], 0, 10) : null, // Truncate the speed value to fit the column length
            ];

            $existingRecord = DB::table('restrictions')
                ->where($restriction)
                ->first();

            if (!$existingRecord) {
                try {
                    DB::table('restrictions')->insert($restriction);
                } catch (\Exception $e) {
                    dd($restriction, $e->getMessage());
                }
            }
        }
    }
}