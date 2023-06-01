<?php

namespace App\Validations;


class CategoryValidation
{

    public static function storeValidate($request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        return $data;
    }

    public static function updateValidate($request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    }
}
