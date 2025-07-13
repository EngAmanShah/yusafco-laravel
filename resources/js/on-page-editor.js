// This file ONLY contains the logic to prepare the modal.
// It DOES NOT handle the form submission.

document.addEventListener('DOMContentLoaded', function () {
    const editModalEl = document.getElementById('editModal');
    if (!editModalEl) {
        return;
    }

    const modalForm = document.getElementById('editModalForm');
    const modalTitle = editModalEl.querySelector('.modal-title');
    const modalBody = editModalEl.querySelector('.modal-body');

    // This event prepares the modal *before* it is shown
    editModalEl.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        if (!button || !button.hasAttribute('data-key')) return;

        const key = button.getAttribute('data-key');
        const type = button.getAttribute('data-type');

        // Set the form's action URL
        modalForm.setAttribute('action', `/admin/content/${key}`);

        let formContent = `<input type="hidden" name="type" value="${type}">`;

        if (type === 'text') {
            const content = button.getAttribute('data-content');
            modalTitle.textContent = `تعديل: ${key}`;
            formContent += `<div class="mb-3"><label class="form-label">المحتوى</label><textarea class="form-control" name="value" rows="8">${content}</textarea></div>`;
        } else { // Handles both image and video
            modalTitle.textContent = `تغيير: ${key}`;
            formContent += `<div class="mb-3"><label class="form-label">ارفع ملف جديد</label><input type="file" class="form-control" name="value" required></div>`;
        }
        modalBody.innerHTML = formContent;
    });
});