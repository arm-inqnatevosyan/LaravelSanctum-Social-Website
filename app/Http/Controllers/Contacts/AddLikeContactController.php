<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Like;
use App\Http\Controllers\BaseController;

class AddLikeContactController  extends BaseController
{
    public function __invoke($contactId,Request $request){
        $user = auth()->user();
        $contact = Contact::findOrFail($contactId);

        $like = Like::where('user_id', $user->id)
            ->where('contact_id', $contact->id)
            ->first();
    
        if ($like) {
            $like->delete();
            return response()->json(['message' => 'Contact unliked','like' => 'false']);
        }
    
        $like = Like::create([
            'user_id' => $user->id,
            'contact_id' => $contact->id
        ]);
        $like->save();

        return $this->sendSuccess($like,'success');
    }
}
