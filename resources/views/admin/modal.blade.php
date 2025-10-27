<div id="detailModal" class="modal">
    <div class="modal-content">
        <button class="close-btn">×</button>
        <div id="modalBody"></div>
        <form method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-delete">削除</button>
        </form>
    </div>
</div>

<script>
document.querySelectorAll('.btn-detail').forEach(btn => {
    btn.addEventListener('click', async () => {
        const id = btn.dataset.id;
        const response = await fetch(`/api/contacts/${id}`);
        const data = await response.json();

        let html = `
            <p><strong>お名前：</strong> ${data.last_name}　${data.first_name}</p>
            <p><strong>性別：</strong> ${data.gender}</p>
            <p><strong>メールアドレス：</strong> ${data.email}</p>
            <p><strong>電話番号：</strong> ${data.tel}</p>
            <p><strong>住所：</strong> ${data.address}</p>
            <p><strong>建物名：</strong> ${data.building ?? ''}</p>
            <p><strong>お問い合わせの種類：</strong> ${data.category}</p>
            <p><strong>お問い合わせ内容：</strong><br>${data.detail}</p>
        `;
        document.getElementById('modalBody').innerHTML = html;
        document.getElementById('deleteForm').action = `/admin/${id}`;
        document.getElementById('detailModal').style.display = 'flex';
    });
});

document.querySelector('.close-btn').addEventListener('click', () => {
    document.getElementById('detailModal').style.display = 'none';
});
</script>
