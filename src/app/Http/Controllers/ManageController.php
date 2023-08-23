<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class ManageController extends Controller
{
    public function index()
    {
        $contents = Contact::paginate(10);
        return view('manage', compact('contents'));
    }

    public function search(Request $request)
    {
        $word = $request->get('search'); 
        $query = Contact::query();
        if (isset($word)) {
            $array_words = preg_split('/\s+/ui', $word, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($array_words as $w) {
                $escape_word = addcslashes($w, '\\_%');
                $query = $query->where(DB::raw("CONCAT(fullName, ' ', gender, ' ', email, ' ', opinion)"), 'like', '%' . $escape_word . '%');
            }
        }
        $articles = $query->get();
        return view('manage', compact($articles));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manages');
    }
}
