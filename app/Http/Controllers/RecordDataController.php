<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientRecord\Comment;

class RecordDataController extends Controller
{
    //Delete Comment
    public function deleteComment ($id) {
        Comment::where('id', $id)->firstorfail()->delete();
          echo ("User Record deleted successfully.");
          return redirect()->back()->with("Comment Record deleted successfully.");
    }
}
