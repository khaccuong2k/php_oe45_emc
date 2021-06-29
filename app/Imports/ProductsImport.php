<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    private const DELETE_FIRST_ROW_FILE_INPUT = 1;

    public function headingRow() : int
    {
        return self::DELETE_FIRST_ROW_FILE_INPUT;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product(
            [
            'name' => $row['name'],
            'thumbnail' => $row['thumbnail'],
            'content' => $row['content'],
            'short_description' => $row['short_description'],
            'quantity' => $row['quantity'],
            'views' => $row['views'],
            'price' => $row['price'],
            'number_of_vote_submissions' => $row['number_of_vote_submissions'],
            'total_vote' => $row['total_vote'],
            'sold' => $row['sold'],
            ]
        );
    }
}
