import './bootstrap';

import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// General site-wide logic
document.addEventListener('DOMContentLoaded', function () {

    // --- PRELOADER LOGIC ---
    // This makes the loading spinner disappear after the page loads.
    const preloader = document.getElementById('preloader');
    if (preloader) {
        window.addEventListener('load', () => {
            preloader.classList.add('fade-out');
        });
    }

    // --- FADE-IN ANIMATION ON SCROLL ---
    // This makes sections appear as you scroll down.
    const fadeInElements = document.querySelectorAll('.fade-in');
    if (fadeInElements.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        fadeInElements.forEach(el => observer.observe(el));
    }

    // --- CONTACT FORM HANDLER ---
    // This sends the contact form data to your Laravel controller without a page reload.
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function (event) {
            event.preventDefault();
            const formData = new FormData(this);
            const responseDiv = document.getElementById('contactFormResponse');
            const submitButton = this.querySelector('button[type="submit"]');

            submitButton.disabled = true;
            responseDiv.innerHTML = `<div class="alert alert-info">جاري الإرسال...</div>`;

            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    responseDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    contactForm.reset();
                } else {
                    responseDiv.innerHTML = `<div class="alert alert-danger">${data.message || 'An error occurred.'}</div>`;
                }
            })
            .catch(error => {
                responseDiv.innerHTML = `<div class="alert alert-danger">حدث خطأ. الرجاء المحاولة مرة أخرى.</div>`;
            })
            .finally(() => {
                submitButton.disabled = false;
            });
        });
    }
});


// --- Admin Message Modal Handler ---
// For the Message Modal
const messageModalEl = document.getElementById('messageModal');
if (messageModalEl) { /* ... as provided before ... */ }

// For the Request Details Modal
const requestDetailsModalEl = document.getElementById('requestDetailsModal');
if (requestDetailsModalEl) {
    requestDetailsModalEl.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const notes = button.getAttribute('data-notes');
        const date = button.getAttribute('data-date');
        document.getElementById('requestDate').textContent = date;
        document.getElementById('requestNotes').textContent = notes || 'لا توجد ملاحظات.';
    });
}



