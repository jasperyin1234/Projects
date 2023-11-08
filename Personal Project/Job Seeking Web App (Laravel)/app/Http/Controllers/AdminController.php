<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Listing;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use App\Notifications\DatabaseNotification;

class AdminController extends Controller
{
    //admin module
    public function admin_module(Request $request)
    {
        // retrieve all reported listings
        $reportedListings = Listing::where('reported', 1)->get();

        return view('pages/admin_module', ['reportedListings' => $reportedListings]);
    }

    //delete listing
    public function deleteListing($Id)
    {
        try {
            // Find the listing by its ID
            $listing = Listing::findOrFail($Id);

            // Delete listing
            $listing->delete();

            return redirect()->route('admin_module')->with(['message' => 'Listing deleted']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Listing not found!']);
        }
    }

    //verify listing
    public function verifyListing($Id)
    {
        try {
            // Find the listing by its ID
            $listing = Listing::findOrFail($Id);

            // Verify listing
            $listing->reported = 0;
            $listing->verified = 1;
            $listing->update();

            return redirect()->route('admin_module')->with(['message' => 'Listing verified']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Listing not found!']);
        }
    }
}
