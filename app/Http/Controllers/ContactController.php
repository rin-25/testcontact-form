<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('contact.index', compact('categories'));
    }

   public function confirm(ContactRequest $request)
{

    // バリデーション済みのデータを取得
    $inputs = $request->validated();

    // 3つの電話番号入力を1つに結合
    $inputs['tel'] = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

    // カテゴリー情報を取得
    $category = Category::find($inputs['category_id']);

    // 確認画面に渡す
    return view('contact.confirm', compact('inputs', 'category'));
}


    public function store(Request $request)
    {
        if ($request->input('action') === 'back') {
            return redirect('/')->withInput();
        }
        $tel = $request->tel1 . '-' . $request->tel2 . '-' . $request->tel3;

        Contact::create([
            'category_id' => $request->category_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'tel' => $tel,
            'address' => $request->address,
            'building' => $request->building,
            'detail' => $request->detail,
        ]);

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}
