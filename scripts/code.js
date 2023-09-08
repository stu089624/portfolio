//checkt of de ingevoerde code correct is

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("codeButton").addEventListener("click", function () {
        let enteredCode = prompt("Voer de code in:");

        if (enteredCode !== null) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../scripts/code.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    if (xhr.responseText === "success") {
                        window.location.href = "../pages/insert.php";
                    } else {
                        alert("Incorrecte code. Probeer het opnieuw.");
                    }
                }
            };

            xhr.send("code=" + encodeURIComponent(enteredCode));
        }
    });
});
