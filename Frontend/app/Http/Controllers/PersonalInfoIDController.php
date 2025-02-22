<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Question;
use App\Models\UserAnswer;
use App\Models\Nominee;
use App\Models\UserProfile;
use App\Models\Document;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\Log;

class PersonalInfoIDController extends Controller
{
    public function show(){
        $documents=Document::all();
        return view('personalinfo.personalinfoid',compact('documents'));
    }
    public function submitPersonalInfoID(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'document_type' => 'required',
            'document_number' => 'required',
            'expire_date' => 'required',
            'location_of_item' => 'required',
            'additional_notes' => 'nullable',
            'image'=>'required|file|mimes:jpeg,png,jpg,pdf|max:2048'
        ]);
    

        // Handle file upload
        if ($request->hasFile('image')) {
            // Store the file in the 'public/uploads' directory
            $filePath = $request->file('image')->store('uploads', 'public');

            // Add file path to validated data
            $validateData['image'] = $filePath;
        }
        // Save the selected options to the database (Example)
       
        $createPersonalInformation= PersonalInformation::create([
                'user_id' => auth()->id(), // Assuming the user is logged in
                'document_type' => $validatedData['document_type'],
                'document_number' => $validatedData['document_number'],
                'expire_date' => $validatedData['expire_date'],
                'location_of_item' => $validatedData['location_of_item'],
                'additional_notes' => $validatedData['additional_notes'],
                'image' => $validatedData['image'],
            ]);
            if($createPersonalInformation){
                return redirect()->route('viewPersonalInfoID')->with('success', 'Personal Info submitted successfully.');
            }
         
            return redirect()->back()->with('error', 'Failed to submit Personal Info.');
      
    }

    public function viewPersonalInfoID()
    {
        $getPersonalInformation = PersonalInformation::with('document', 'user')->get();
        return view('personalinfo.viewpersonalinfoid', compact('getPersonalInformation'));
    }


}
