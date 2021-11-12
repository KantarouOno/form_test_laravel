<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;

class WritingService
{
    public function contactData($request)
    {
      $inputs = $request->all();

      return DB::table('contact_data')->insert([
        'name' => $inputs['name'],
        'furigana' => $inputs['furigana'],
        'email' => $inputs['email'],
        'title' => $inputs['title'],
        'body' => $inputs['body'],
    ]);
    }
}