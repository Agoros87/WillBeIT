export function initRevealTextAnimation() {
    const revealTextList = document.querySelectorAll('.reveal-text');

    if (revealTextList.length === 0) return;

    revealTextList.forEach((elem, i) => elem.style.animationDelay = i * 0.3 + 's')
}