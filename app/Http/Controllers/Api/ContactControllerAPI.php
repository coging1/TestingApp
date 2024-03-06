<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\Contact\Contact;

class ContactControllerAPI extends Controller
{
  
  // Display a listing of the resource.
  public function getContacts(): JsonResponse
  {
    $contacts = Contact::all();
    return response()->json($contacts, 200);
  }


  // Store a newly created resource in storage.
  public function storeContact(StoreContactRequest $request): JsonResponse
  {
      $validated = $request->json()->all();

      Contact::create([
          'first_name'      => $validated['first_name'],
          'middle_name'     => $validated['middle_name'],
          'last_name'       => $validated['last_name'],
          'barangay'        => $validated['barangay'],
          'street'          => $validated['street'],
          'email_address'   => $validated['email_address'],
      ]);
      return response()->json(['message' => 'Contact Saved!'], 200);
  }


  // Update the specified resource in storage.
  public function updateContact($id, Request $request): JsonResponse
  {
    // Retrieve the validated input...
    $validated = $request->json()->all();
    $contact = Contact::findOrFail($id);

    $contact->update([
      'first_name'      => $validated['first_name'],
      'middle_name'     => $validated['middle_name'],
      'last_name'       => $validated['last_name'],
      'barangay'        => $validated['barangay'],
      'street'          => $validated['street'],
      'email_address'   => $validated['email_address'],
    ]);
    return response()->json(['message' => 'Contact Updated!'], 200);
  }


  // Remove the specified resource from storage.
  public function deleteContact($id): JsonResponse
  {
      Contact::findOrFail($id)->delete();
      return response()->json(['message' => 'Contact Deleted!'], 200);
  }






  // Show the form for creating a new resource.
  public function create()
  {
    return view('contact.create');
  }


  // Display the specified resource.
  public function show(Contact $contact): JsonResponse
  {
    return response()->json(['contact' => $contact]);
  }


  // Show the form for editing the specified resource.
  public function edit(Contact $contact)
  {
    return view('contact.edit', compact('contact'));
  }
}
