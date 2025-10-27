<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-wrapper">
  <h1 class="site-title">FashionablyLate</h1>
  <div class="title-line"></div>
  <h2 class="page-title">Admin</h2>

  
  <div class="admin-controls">
    <form action="<?php echo e(route('admin.search')); ?>" method="get" class="search-form">
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
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option value="<?php echo e($category->id); ?>"><?php echo e($category->content); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
      <input type="date" name="created_at" class="input-date">
      <button type="submit" class="btn-search">検索</button>
      <a href="<?php echo e(route('admin.index')); ?>" class="btn-reset">リセット</a>
    </form>

    
    <div class="controls-row">
      <div class="export-container">
        <form action="<?php echo e(route('admin.export')); ?>" method="get">
          <button type="submit" class="btn-export">エクスポート</button>
        </form>
      </div>

      <div class="pagination-top">
        <?php echo e($contacts->links('pagination::bootstrap-4')); ?>

      </div>
    </div>
  </div>

  
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
      <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($contact->last_name); ?>　<?php echo e($contact->first_name); ?></td>
        <td><?php echo e(['','男性','女性','その他'][$contact->gender]); ?></td>
        <td><?php echo e($contact->email); ?></td>
        <td><?php echo e(optional($contact->category)->content ?? '―'); ?></td>
        <td><button class="btn-detail" data-id="<?php echo e($contact->id); ?>">詳細</button></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/admin/index.blade.php ENDPATH**/ ?>