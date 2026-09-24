<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Email;

class EmailUploadController extends Controller
{
    public function showForm()
    {
        return view('emails.upload');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getRealPath(), 'r');
        $count = 0;
        while (($row = fgetcsv($handle)) !== false) {
            echo "\n" . $row[0];
            // Si la fila está vacía o es el encabezado, la ignora
            $email = trim($row[0]);
            if (strtolower($email) === 'email' || $email === '') {
                continue;
            }
            //dd($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Email::firstOrCreate(['email' => $email]);
                $count++;
            }
        }
        dd($file);
        fclose($handle);
        return back()->with('success', "Se subieron $count emails correctamente.");
    }

    public function deleteAll()
    {
        $count = Email::count();
        Email::truncate();
        return back()->with('success', "Se eliminaron $count emails correctamente.");
    }
}
