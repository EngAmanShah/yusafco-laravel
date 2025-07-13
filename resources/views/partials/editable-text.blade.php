@auth
    @if(auth()->user()->role === 'admin')
        {{-- This is what the ADMIN sees: a div with an edit button --}}
        <div class="editable-container">
            <button 
                class="edit-button" 
                data-bs-toggle="modal" 
                data-bs-target="#editModal"
                data-key="{{ $key }}"
                data-content="{{ $site_content[$key] ?? '' }}">
                <i class="fas fa-pencil-alt"></i>
            </button>
            <p id="content-{{$key}}" class="lead mb-4">{!! nl2br(e($site_content[$key] ?? '...انقر على زر التعديل لإضافة نص هنا')) !!}</p>
        </div>
    @else
        {{-- This is what a normal FARMER or VISITOR sees: just the text --}}
        <p class="lead mb-4">{!! nl2br(e($site_content[$key] ?? '...')) !!}</p>
    @endif
@else
    {{-- This is what a GUEST sees: just the text --}}
    <p class="lead mb-4">{!! nl2br(e($site_content[$key] ?? '...')) !!}</p>
@endauth