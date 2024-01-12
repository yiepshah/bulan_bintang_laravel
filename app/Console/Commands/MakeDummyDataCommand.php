<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class MakeDummyDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bulanbintang:dummy';

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
//     public function handle()
//     {
//     //     for ($i=0; $i < 9000; $i++) { 
//     //         Post::create([
//     //             'user_id'             => '2',
//     //             'item_name'           => 'Baju Melayu Tailored Fit (Honeydew)',
//     //             'price'               => '229.00',
//     //             'product_information' => '✅ Baju Melayu Cekak Musang. ✅ Cutting Tailored Fit...',
//     //             'material'            => 'Italian Avanti Fabric.',
//     //             'inside_box'          => '✅ Long sleeved Baju Melayu Tailored Fit top ✅ Long...',
//     //             'image_path'          => 'CoYZCtGUsRb9Euw74xYr0b0Jw89LLgzEZUmMkIev.webp',
//     //             'category'            => 'Men',
//     //             'subcategory'         => 'Tailored Fit',
//     //         ]);
//     //     }
//     // }
}
