@props([
    'data',
    'key',
    'type' => 'text',
    // We no longer need tag, default, or class here
])

@php
    // Get the content from the database. We still need this for the data-content attribute.
    $content = $data[$key] ?? '';
@endphp

{{-- 
This component now renders ONLY the edit button for the admin, or nothing for others.
The main HTML tag (like <h1> or <p>) is placed directly in the welcome.blade.php file
to preserve the original, perfect layout.
--}}
@auth
    @if(auth()->user()->role === 'admin')
        <button 
            class="edit-button" 
            type="button"
            data-bs-toggle="modal" 
            data-bs-target="#editModal"
            data-key="{{ $key }}"
            data-type="{{ $type }}"
            data-content="{{ $type === 'text' ? $content : '' }}">
            <i class="fas fa-pencil-alt"></i>
        </button>
    @endif
@endauth