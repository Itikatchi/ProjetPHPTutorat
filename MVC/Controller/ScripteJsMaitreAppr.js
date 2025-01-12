document.addEventListener("DOMContentLoaded", function () {
    // Sélection des éléments HTML
    const entrepriseSelect = document.getElementById("entreprise");
    const maitreApprentissageSelect = document.getElementById("maitre-apprentissage");

    // Écouteur d'événement sur le changement de sélection de l'entreprise
    entrepriseSelect.addEventListener("change", function () {
        const entrepriseId = entrepriseSelect.value;

        // Réinitialiser les options du select maître d'apprentissage
        maitreApprentissageSelect.innerHTML = `<option value="">-- Choisir --</option>`;

        // Si une entreprise est sélectionnée
        if (entrepriseId) {
            fetch(`./JsMaitreApprentissage.php?entreprise_id=${entrepriseId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Erreur lors de la récupération des maîtres d'apprentissage.");
                    }
                    return response.json();
                })
                .then(data => {
                    if (Array.isArray(data) && data.length > 0) {
                        data.forEach(maitre => {
                            const option = document.createElement("option");
                            option.value = maitre.id; // ID du maître d'apprentissage
                            option.textContent = `${maitre.prenom} ${maitre.nom}`;
                            maitreApprentissageSelect.appendChild(option);
                        });
                    } else {
                        const option = document.createElement("option");
                        option.value = "";
                        option.textContent = "Aucun maître d'apprentissage disponible.";
                        maitreApprentissageSelect.appendChild(option);
                    }
                })
                .catch(error => {
                    console.error(error);
                    alert("Une erreur est survenue lors de la récupération des données.");
                });
        }
    });
});
