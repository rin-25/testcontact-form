@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-wrapper">
  <h1 class="site-title">FashionablyLate</h1>
  <div class="title-line"></div>
  <h2 class="page-title">Admin</h2>

  {{-- 🔹 検索フォーム＋エクスポートボタン全体をまとめる --}}
  <div class="admin-controls">
    <form action="{{ route('admin.search') }}" method="get" class="search-form">
      <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" class="input-text">
      <select name="gender" class="input-select">
        <option value="">性別</option>
        <option value="all">全て</option>
        <option value="1">男性</option>
        <option value="2">女性</option>
        <option value="3">その他</option>
      </select>
      <select name="category_id" class="input-select">
        <option value="">お問い合わせの種類</option>
        @foreach($categories as $category)
          <option value="{{ $category->id }}">{{ $category->content }}</option>
        @endforeach
      </select>
      <input type="date" name="created_at" class="input-date">
      <button type="submit" class="btn-search">検索</button>
      <a href="{{ route('admin.index') }}" class="btn-reset">リセット</a>
    </form>

    {{-- 🔹 エクスポート＋ページ番号 --}}
    <div class="controls-row">
      <div class="export-container">
        <form action="{{ route('admin.export') }}" method="get">
          <button type="submit" class="btn-export">エクスポート</button>
        </form>
      </div>

      <div class="pagination-top">
        {{ $contacts->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>

  {{-- テーブル --}}
  <table class="contact-table">
    <thead>
      <tr>
        <th>お名前</th>
        <th>性別</th>
        <th>メールアドレス</th>
        <th>お問い合わせの種類</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($contacts as $contact)
      <tr>
        <td>{{ $contact->last_name }}　{{ $contact->first_name }}</td>
        <td>{{ ['','男性','女性','その他'][$contact->gender] }}</td>
        <td>{{ $contact->email }}</td>
        <td>{{ optional($contact->category)->content ?? '―' }}</td>
        <td><button class="btn-detail" data-id="{{ $contact->id }}">詳細</button></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- ===============================
     モーダルウィンドウ
================================ -->
<div id="detailModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <div class="modal-body">
      <table class="modal-table">
        <tr><th>お名前</th><td id="modal-name"></td></tr>
        <tr><th>性別</th><td id="modal-gender"></td></tr>
        <tr><th>メールアドレス</th><td id="modal-email"></td></tr>
        <tr><th>電話番号</th><td id="modal-phone"></td></tr>
        <tr><th>住所</th><td id="modal-address"></td></tr>
        <tr><th>建物名</th><td id="modal-building"></td></tr>
        <tr><th>お問い合わせの種類</th><td id="modal-category"></td></tr>
        <tr><th>お問い合わせ内容</th><td id="modal-content"></td></tr>
      </table>
      <form id="deleteForm" method="POST" style="text-align:center; margin-top:20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">削除</button>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const modal = document.getElementById("detailModal");
  const closeBtn = document.querySelector(".close");

  // 詳細ボタンにイベントを付与
  document.querySelectorAll(".btn-detail").forEach(button => {
    button.addEventListener("click", function () {
      // モーダルを強制的に表示
      modal.style.display = "block";

      const id = this.dataset.id;

      fetch(`/admin/${id}/json`)
        .then(res => res.json())
        .then(data => {
          console.log("受け取ったデータ:", data);
          document.getElementById("modal-name").textContent = (data.last_name || "") + "　" + (data.first_name || "");
          document.getElementById("modal-gender").textContent = data.gender_text || "-";
          document.getElementById("modal-email").textContent = data.email || "-";
          document.getElementById("modal-phone").textContent = data.tel || "-";
          document.getElementById("modal-address").textContent = data.address || "-";
          document.getElementById("modal-building").textContent = data.building || "-";
          document.getElementById("modal-category").textContent = data.category_name || "-";
          document.getElementById("modal-content").textContent = data.detail || "-";
          document.getElementById("deleteForm").action = `/admin/${id}`;
          modal.style.display = "block";
        })
        .catch(error => console.error("データ取得エラー:", error));
    });
  });

  // 閉じるボタン
  closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
  });
});

// 削除ボタン処理
const deleteForm = document.getElementById("deleteForm");
    deleteForm.addEventListener("submit", function(e) {
        if (!confirm("本当に削除しますか？")) {
            e.preventDefault();
     }
    });
</script>
@endsection

