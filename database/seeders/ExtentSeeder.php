<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExtentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = Storage::get('extent.txt');
        $lines = explode("\n", $file);

        // Skip the first row (header)
        array_shift($lines);

        foreach ($lines as $line) {
            if (empty($line)) {
                continue;
            }

            $fields = explode("\t", $line);

            DB::table('extents')->insert([
                'id' => $fields[0],
                'nev' => $fields[1],
            ]);
        }
    }
}
