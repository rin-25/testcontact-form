<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        $contacts = $query->paginate(10);
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        // ① 名前検索（姓・名・フルネーム対応、部分一致OK）
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                  ->orWhere('last_name', 'like', "%{$keyword}%")
                  ->orWhereRaw("CONCAT(last_name, first_name) LIKE ?", ["%{$keyword}%"]);
            });
        }

        // ② 性別検索
        // 性別検索
        if ($request->has('gender') && $request->input('gender') !== '' && $request->input('gender') !== 'all') {
            $query->where('gender', $request->input('gender'));
        }



        // ③ メールアドレス検索
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->input('email')}%");
        }

        // ④ お問い合わせ種類検索
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        // ⑤ 日付検索
        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->input('created_at'));
        }

        // ページネーション付きで結果を返す
        $contacts = $query->paginate(10)->appends($request->query());
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }


    public function export(Request $request)
    {
        return Excel::download(new ContactsExport($request), 'contacts.csv');
    }

    // 詳細データを返すAPI
    public function show($id)
    {
    $contact = Contact::with('category')->findOrFail($id);
    return response()->json([
        'id' => $contact->id,
        'last_name' => $contact->last_name,
        'first_name' => $contact->first_name,
        'gender_text' => ['','男性','女性','その他'][$contact->gender],
        'email' => $contact->email,
        'tel' => $contact->tel,
        'address' => $contact->address,
        'building' => $contact->building,
        'category_name' => optional($contact->category)->content,
        'detail' => $contact->detail,
    ]);
    }
    public function destroy($id)
{
    $contact = Contact::findOrFail($id);
    $contact->delete();

    return redirect()->route('admin.index')->with('success', '削除しました');
}

}
