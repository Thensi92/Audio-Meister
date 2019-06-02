window.onload = function () {

    let checkboxTermsOfUse = document.getElementById("checkTermsOfUse");
    let submitRegister = document.getElementById("submit");
    
    checkboxTermsOfUse.addEventListener("click", isChecked);

    function isChecked() {
        if (this.checked) {
            submitRegister.disabled = false;
        } else {
            submitRegister.disabled = true;
        }
    }
}