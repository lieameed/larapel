<?php

namespace App\Http\Controllers\classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $id)
    {
        return "mengubah data kelas dengan id: {$id}";
    }
}
