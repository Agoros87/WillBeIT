export function centerDataRevealScroll() {
    if (document.querySelector('.center-data')) {
        const revealElements = document.querySelectorAll('.reveal-scroll');

        function revealCenterData() {

            revealElements.forEach(elem => {

                const centerData = elem.querySelector('.center-data');

                if (elem.style.transform === 'scale(1)') {
                    centerData.classList.add('revealed');
                } else {
                    centerData.classList.remove('revealed');
                }
            })
        }

        window.removeEventListener('load', revealCenterData);
        window.removeEventListener('scroll', revealCenterData);
        window.removeEventListener('resize', revealCenterData);

        window.addEventListener('load', revealCenterData);
        window.addEventListener('scroll', revealCenterData);
        window.addEventListener('resize', revealCenterData);

        revealCenterData();
    }
}
