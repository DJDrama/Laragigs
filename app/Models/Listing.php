<?php

namespace App\Models;

use Exception;

class Listing
{
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Listing 1',
                'description' => 'Listing 1 Description'
            ],
            [
                'id' => 2,
                'title' => 'Listing 2',
                'description' => 'Listing 2 Description'
            ]
        ];
    }

    /**
     * @throws Exception
     */
    public static function find($id)
    {
        $listings = self::all(); // use self (like 'this')
        foreach($listings as $listing){
            if($listing['id'] == $id)
                return $listing;
        }
        throw new Exception("No Data Found!");
    }
}
