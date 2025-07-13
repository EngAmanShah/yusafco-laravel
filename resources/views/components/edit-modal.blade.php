<!-- Universal Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل المحتوى</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editModalForm" method="POST" action="{{ route('admin.content.update') }}">
                @csrf
                <div class="modal-body">
                    {{-- This hidden input will hold the 'key' of the content we are editing --}}
                    <input type="hidden" id="editModalKey" name="content[key_placeholder]">
                    
                    {{-- This textarea will hold the content value --}}
                    <div class="mb-3">
                        <label for="editModalTextarea" class="form-label">النص</label>
                        <textarea class="form-control" id="editModalTextarea" name="content[value_placeholder]" rows="8"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>