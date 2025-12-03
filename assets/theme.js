document.addEventListener("DOMContentLoaded", () => {
    const body = document.body;

    // Charger le thème depuis localStorage
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark");
    }

    const themeToggle = document.getElementById("themeToggle");

    // Détecte si le bouton existe
    document.addEventListener("click", function(e) {
        if (e.target && e.target.id === "themeToggle") {
            body.classList.toggle("dark");

            // Sauvegarde du thème
            if (body.classList.contains("dark")) {
                localStorage.setItem("theme", "dark");
                e.target.textContent = "☀️";
            } else {
                localStorage.setItem("theme", "light");
                e.target.textContent = "🌙";
            }
        }
    });

    // Ajuste l'icône selon le thème actuel
    setTimeout(() => {
        const toggleIcon = document.getElementById("themeToggle");
        if (toggleIcon) {
            toggleIcon.textContent = body.classList.contains("dark") ? "☀️" : "🌙";
        }
    }, 50);
});