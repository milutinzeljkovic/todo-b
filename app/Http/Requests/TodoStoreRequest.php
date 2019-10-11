<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required'
        ];
    
    }
}
