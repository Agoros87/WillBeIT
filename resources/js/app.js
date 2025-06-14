import {initRevealScroll} from './features/reveal-scroll.js';
import {centerDataRevealScroll} from './features/center-data-reveal-scroll.js';
import {darkModeToggleButtonAction, initializeDarkMode} from './features/dark-mode.js';
import {initRevealTextAnimation} from "./features/reveal-text-animation.js";

// Importar Trix
import "trix";
import "trix/dist/trix.css";

function initializeFeatures() {
    initRevealScroll();
    centerDataRevealScroll();
    initializeDarkMode();
    darkModeToggleButtonAction();
    initRevealTextAnimation();
}

document.addEventListener('DOMContentLoaded', initializeFeatures);
document.addEventListener('livewire:navigated', initializeFeatures);

// Configuración de Trix para subida de imágenes
document.addEventListener("trix-attachment-add", function (event) {
    if (event.attachment.file) {
        uploadFileAttachment(event.attachment);
    }
});

function uploadFileAttachment(attachment) {
    const file = attachment.file;
    const form = new FormData();
    form.append("file", file);

    // Agregar token CSRF
    const token = document.querySelector('meta[name="csrf-token"]');
    if (token) {
        form.append("_token", token.getAttribute('content'));
    }

    fetch("/upload-trix-image", {
        method: "POST",
        body: form
    })
        .then(response => response.json())
        .then(data => {
            if (data.url) {
                attachment.setAttributes({
                    url: data.url,
                    href: data.url
                });
            } else {
                attachment.remove();
            }
        })
        .catch(error => {
            console.error('Error uploading file:', error);
            attachment.remove();
        });
}
