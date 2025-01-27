<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RegisterController extends Controller

{
    public string $pathRegistration;
    public $path = 'register';

    public function __construct()
    {
        $this->pathRegistration = public_path($this->path);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (!file_exists($this->pathRegistration)) {
            File::makeDirectory($this->path);
        }

        $validated = $request->validate([
            'branch_code' => 'integer|required',
            'branch_name' => 'string|required'
        ]);

        $fullFolder = $this->pathRegistration . "/${validated['branch_name']}";
        if (file_exists($fullFolder)) {
            return redirect()->route('masterPage', ['message' => "Sudah ada data ${validated['branch_name']}"]);
        }

        File::makeDirectory($fullFolder);
    }
}
