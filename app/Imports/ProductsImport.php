<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductsImport implements ToCollection
{
    public function collection(Collection $collection)
    {
        foreach ($collection as $key=>$value) {
            if ($key !== 0) {

                if (DB::table('products')->where('code', $value[0])->exists()) {
                    DB::table('products')
                        ->update([
                            'code'           => $value[0],
                            'title'          => $value[1],
                            'price'          => $value[2],
                            'stock_quantity' => $value[3]
                        ]);
                } else {
                    DB::table('products')
                        ->insert([
                            'code'           => $value[0],
                            'title'          => $value[1],
                            'price'          => $value[2],
                            'stock_quantity' => $value[3]
                        ]);
                }
            } else {
                DB::table('products')
                    ->delete();
            }
        }
    }
}


//, 'title' !== $value[1], 'price' !== $value[2], 'stock_quantity' !== $value[3]]
