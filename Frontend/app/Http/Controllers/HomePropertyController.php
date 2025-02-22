<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\PropertyAsset;
use App\Models\Asset;
use App\Models\Country;
use App\Models\State;

class HomePropertyController extends Controller
{
    public function homeProperty() {
        return view('homeproperty.homeproperty');
    }
    public function homePropertyAssets() {
        return view('homeproperty.homepropertyassets');
    }
    public function stepOne() {
        $assets = Asset::all();
        return view('homeproperty.step1', compact('assets'));
    }
    public function stepTwo(Request $request) {
        $selectedId = $request->query('selected_id'); // Get the selected asset ID
        $assets = Asset::all();
        $countries = Country::all();
        return view('homeproperty.step2', compact('selectedId','assets','countries'));
    }
    public function getStates($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }
    public function addStep2(Request $request)
    {
       $validateData= $request->validate([
        'type_of_assets'=> 'required',
        'label_your_property'=> 'required',
        'address_1'=> 'required',
        'address_2'=> 'required',
        'country'=> 'required',
        'state'=> 'required',
        'zip_code'=> 'required',
        ]);

        // Store data in session
        session(['step1' => $validateData]);

        return redirect()->route('step3');
    }
    public function stepThree() {
        $ownerships=Ownership::get();
        return view('homeproperty.step3',compact('ownerships'));
    }
    public function addStep3(Request $request)
    {
        // Validate incoming request
        $validateData = $request->validate([
            'own_or_rent' => 'required',
            'deed_storage_location' => 'required',
            'ownership_structure' => 'required',
            'additional_notes' => 'required',
            'document_image' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048', // Validate file type and size
        ]);

        // Handle file upload
        if ($request->hasFile('document_image')) {
            // Store the file in the 'public/uploads' directory
            $filePath = $request->file('document_image')->store('uploads', 'public');

            // Add file path to validated data
            $validateData['document_image'] = $filePath;
        }

        // Store data in session (store only the path, not the file object)
        session(['step2' => $validateData]);

        return redirect()->route('step4');
    }


    public function stepFour() {
        return view('homeproperty.step4');
    }
    public function addStep4(Request $request)
    {
       $validateData= $request->validate([
       'insurance_company_name'=> 'required',
        'policy_number'=> 'required',
        'policy_document_location'=> 'required',
        'insurance_types'=> 'array|required',
        ]);
        // Convert the insurance types to a JSON string or comma-separated string
    $validateData['insurance_types'] = implode(',', $request->input('insurance_types'));
        // Store data in session
        session(['step3' => $validateData]);

        return redirect()->route('step5');
    }
    public function stepFive() {
        return view('homeproperty.step5');
    }

    public function submitHomeProperty(Request $request)
    {
        $validateData= $request->validate([
        'security_company_name'=> 'required',
        'account_number'=> 'required',
        'phone_safe_word'=> 'required',
        'extra_keys_location'=> 'required',
        ]);

        session(['step4' => $validateData]);

        // Retrieve all session data
        $formData = array_merge(
            session('step1', []),
            session('step2', []),
            session('step3', []),
            session('step4', [])
        );
        $formData['user_id']=auth()->id();
        $formData['created_at']=now();
        $formData['updated_at']=now();
        // Process the form data (e.g., save to the database)
        PropertyAsset::insert($formData);

        // Clear the session
        session()->forget(['step1', 'step2', 'step3', 'step4']);

        return redirect()->route('step1')->with('success', 'Form submitted successfully!');
    }
}
