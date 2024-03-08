// Sélectionne tous les éléments avec les classes "important", "utile" et "aucun_type"
var notes = document.querySelectorAll(".important, .utile, .aucun_type");

// Parcourt chaque élément sélectionné
notes.forEach(function (note) {
    // Récupère les boutons associés à chaque note par leur ID
    var btn = document.getElementById("btn_" + note.id);
    var btn2 = document.getElementById("btn2_" + note.id);

    // Récupère les éléments modaux de suppression et d'édition par leur ID
    var modalsDelete = document.getElementById("delete_" + note.id);
    var modalsEdit = document.getElementById("edit_" + note.id);

    // Récupère tous les éléments avec la classe "close"
    var spans = document.getElementsByClassName("close");

    // Récupère les pins par leur ID
    var pinBlue = document.getElementById("blue_" + note.id);
    var pinRed = document.getElementById("red_" + note.id);
    var pinYellow = document.getElementById("yellow_" + note.id);

    // Masquer tous les pins au début
    pinBlue.classList.add("none");
    pinRed.classList.add("none");
    pinYellow.classList.add("none");

    // Afficher le pin correspondant à la classe de la note
    if (note.classList.contains("important")) {
        pinBlue.classList.remove("none");
    } else if (note.classList.contains("utile")) {
        pinRed.classList.remove("none");
    } else if (note.classList.contains("aucun_type")) {
        pinYellow.classList.remove("none");
    }

    // Ajoute un écouteur d'événements au clic sur chaque note
    note.addEventListener('click', function (event) {
        var noteId = note.id;
        console.log("Note sélectionnée " + noteId);
        // Basculer la visibilité des boutons et la classe CSS pour la sélection de la note
        btn.classList.toggle('none');
        btn2.classList.toggle('none');
        note.classList.toggle('noteSelected');
    });

    // Ajoute un écouteur d'événements au clic sur le bouton de suppression (btn)
    if (btn) {
        btn.addEventListener('click', function (event) {
            console.log(btn);
            // Affiche le modal de suppression
            modalsDelete.style.display = "block";
            // Ajoute des écouteurs d'événements à chaque bouton de fermeture du modal
            for (var i = 0; i < spans.length; i++) {
                spans[i].onclick = function (index) {
                    return function () {
                        modalsDelete.style.display = "none";
                    }
                }(i);
            }
        });
    }

    // Ajoute un écouteur d'événements au clic sur le bouton d'édition (btn2)
    if (btn2) {
        btn2.addEventListener('click', function (event) {
            // Affiche le modal d'édition
            modalsEdit.style.display = "block";
            // Ajoute des écouteurs d'événements à chaque bouton de fermeture du modal
            for (var i = 0; i < spans.length; i++) {
                spans[i].onclick = function (index) {
                    return function () {
                        modalsEdit.style.display = "none";
                    }
                }(i);
            }
        });
    }
});
