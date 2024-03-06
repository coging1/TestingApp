<?php

namespace App\Http\Controllers\Contact;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Contact\Contact;


class ContactController extends Controller
{

  // Display a listing of the resource.
  public function index(Request $request): View
  {
      // Search input
      $searchVal = $request->search ?? null;
  
      // API URL
      $apiUrl = env('API_URL');
      $addPath = 'contacts';
  
      // Make HTTP request to the API
      $apiResponse = Http::get("$apiUrl/$addPath");
      $apiContacts = $apiResponse->json();

      // Check the API response for success or handle errors as needed
      $statusCode = $apiResponse->status();

      if ($statusCode == 200) {
          // Filter API contacts based on search value
          $filteredContacts = collect($apiContacts)->filter(function ($contact) use ($searchVal) {
              return stripos($contact['first_name'], $searchVal) !== false ||
                    stripos($contact['middle_name'], $searchVal) !== false;
          })->values(); // Reset array keys to ensure proper pagination

          // Paginate the filtered results
          $perPage = 10;
          $currentPage = LengthAwarePaginator::resolveCurrentPage();
          $currentItems = $filteredContacts->slice(($currentPage - 1) * $perPage, $perPage)->all();

          $contacts = new LengthAwarePaginator($currentItems, $filteredContacts->count(), $perPage);
          $contacts->withPath(route('contacts.index')); // Use the route name

          return view('contact.index', compact('contacts', 'searchVal'));
      } else {
          return view('contact.index')->with('status', 'Unable to fetch contacts. Please try again.');
      }
  }


  // Store a newly created resource in storage.
  public function store(StoreContactRequest $request): RedirectResponse
  {
    // API URL
    $apiUrl = env('API_URL');
    $addPath = 'contacts';

    // Retrieve the validated input...
    $validated = $request->validated();

    // Make HTTP request to the API
    $apiResponse = Http::post($apiUrl . '/' . $addPath , $validated);

    // Check the API response for success or handle errors as needed
    $statusCode = $apiResponse->status();

    if ($statusCode == 200) {
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully added.');
    } else {
        return redirect()->route('contacts.index')->with('status', 'Failed to add contact. Please try again.');
    }
  }


  // Update the specified resource in storage.
  public function update(UpdateContactRequest $request, Contact $contact): RedirectResponse
  {
    // API URL
    $apiUrl = env('API_URL');
    $addPath = 'contacts';

    // Retrieve the validated input...
    $validated = $request->validated();

    // Make HTTP request to the API
    $apiResponse = Http::put("$apiUrl/$addPath/{$contact->id}", $validated);

    // Check the API response for success or handle errors as needed
    $statusCode = $apiResponse->status();

    if ($statusCode == 200) {
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully updated.');
    } else {
        return redirect()->route('contacts.index')->with('status', 'Failed to update contact. Please try again.');
    }
  }


  // Remove the specified resource from storage.
  public function destroy(Contact $contact): RedirectResponse
  {
    // API URL
    $apiUrl = env('API_URL');
    $addPath = 'contacts';

    // Make HTTP request to the API
    $apiResponse = Http::delete("$apiUrl/$addPath/{$contact->id}");
   
    // Check the API response for success or handle errors as needed
    $statusCode = $apiResponse->status();

    if ($statusCode == 200) {
        return redirect()->route('contacts.index')->with('status', 'Contact has been successfully deleted!');
    } else {
        return redirect()->route('contacts.index')->with('status', 'Failed to delete contact. Please try again.');
    }
  }

  



  /**
   * Display the specified resource.
   */
  public function show(Contact $contact): View
  {
    return view('contact.show', compact('contact'));
  }

  
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
    return view('contact.create');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Contact $contact)
  {
    return view('contact.edit', compact('contact'));
  }


}
