<?php

namespace App\Http\Controllers;

use App\Models\News;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function news_post(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'news_title' => 'required',
            'news_desc' => 'required',
            'news_pic' => 'required',            
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
     
        $news = new News;

        $news->news_title = $request->input('news_title');
        $news->news_desc = $request->input('news_desc');

        if ($request->hasFile('news_pic')) {
            $request->news_pic->store('news_pictures', 'public');
            $news->news_pic = $request->news_pic->hashName();
        }

        $news->news_datetime = Carbon::now();
        $news->admin_id= Auth::user()->admin_id;

        $news->save();

        return Redirect::back()->with('message', 'News Successfully Uploaded.');

    }
}
