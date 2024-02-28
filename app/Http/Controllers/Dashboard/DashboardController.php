<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
//use Illuminate\Support\Facades\DB;

use App\Models\User;
//use App\Models\Contact\Contact;
//use App\Models\Category\Category;

class DashboardController extends Controller
{

  public function index(): View
  {
        // Count all
        $usersCount = User::count();
        //$users = DB::select("CALL SelectAllUsers");
        //$usersCount = count($users);
        //$contactsCount = Contact::count();
        //$categoriesCount = Category::count();

        // String to encrypt
        $string = 'This is a secret!';
        // Encrypting data
        $encryptedData = Crypt::encryptString($string);
        // Decrypting data
        $decryptedData = Crypt::decryptString($encryptedData);
    
        //return view('dashboard', compact('usersCount', 'contactsCount', 'categoriesCount', 'encryptedData', 'decryptedData'));
        return view('dashboard', compact('usersCount','encryptedData', 'decryptedData'));
  }

}
