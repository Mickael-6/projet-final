document.addEventListener("DOMContentLoaded", function () {
    // Fonction pour gérer le défilement fluide
    function scrollToSection(targetId) {
        const targetSection = document.getElementById(targetId);
        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth'
            });
        }
    }

    // Ajouter des gestionnaires d'événements pour les liens de navigation
    const navigationLinks = document.querySelectorAll('nav a');
    navigationLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            scrollToSection(targetId);
        });
    });

    // Ajouter un gestionnaire d'événements pour le bouton "Voir Plus"
    const seeMoreButton = document.getElementById("see-more");
    if (seeMoreButton) {
        seeMoreButton.addEventListener("click", function (event) {
            event.preventDefault();
            const targetId = this.querySelector('a').getAttribute('href').substring(1);
            scrollToSection(targetId);
        });
    }
});
