<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show(Request $request, Form $form)
    {
        return $form;
    }
}
