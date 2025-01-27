<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use starekrow\Lockbox\CryptoKey;

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
            'company_code' => 'integer|required',
            'company_name' => 'string|required'
        ]);

        $fullFolder = $this->pathRegistration . "/${validated['company_name']}";
        if (file_exists($fullFolder)) {
            flash("Sudah ada data ${validated['company_name']}")->error();
        }

        File::makeDirectory($fullFolder);
        $key = new CryptoKey();
        $message = json_encode($validated);
        $ciphertext = $key->Lock($message);

        file_put_contents("${fullFolder}/key.txt", $key->Export());
        file_put_contents("${fullFolder}/cipher.txt", $ciphertext);
        flash("Success, silahkan cek!\n ${validated['company_name']}")->success();
        return redirect()->route('masterPage');
    }
}
