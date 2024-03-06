<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
// use Illuminate\Support\Facades\DB;

use App\Models\User\User;
use App\Models\Contact\Contact;
//use App\Models\Category\Category;

class DashboardController extends Controller
{

  public function index(): View
  {
        // Count all
        $userId = 1;
        //$users = DB::select("EXEC GetContactById ?", [$userId]);
        //$users = DB::select("EXEC GetContactByID(1)");
        //print_r($users);
        //$usersCount = count($users);
        $usersCount = User::count();
        $contactsCount = Contact::count();
        //$categoriesCount = Category::count();

        // String to encrypt
        $string = 'This is a secret!';
        // Encrypting data
        $encryptedData = Crypt::encryptString($string);
        // Decrypting data
        $decryptedData = Crypt::decryptString($encryptedData);
    
        //return view('dashboard', compact('usersCount', 'contactsCount', 'categoriesCount', 'encryptedData', 'decryptedData'));
        return view('dashboard', compact('usersCount', 'contactsCount', 'encryptedData', 'decryptedData'));
  }

}
