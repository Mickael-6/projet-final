var notes = document.querySelectorAll(".important, .utile, .aucun_type");

    notes.forEach(function (note) {
        var pinBlue = document.getElementById("blue_" + note.id);
        var pinRed = document.querySelector("red_" + note.id);
        var pinYellow = document.querySelector("yel1low_" + note.id);

        console.log(pinBlue, pinRed, pinYellow);
        
        if (note.classList.contains("important")) {
            pinBlue.classList.remove("none");
            pinRed.classList.add("none");
            pinYellow.classList.add("none");
        } else if (note.classList.contains("utile")) {
            pinBlue.classList.add("none");
            pinRed.classList.remove("none");
            pinYellow.classList.add("none");
        } else if (note.classList.contains("aucun_type")) {
            pinBlue.classList.add("none");
            pinRed.classList.add("none");
            pinYellow.classList.remove("none");
        }
    });
