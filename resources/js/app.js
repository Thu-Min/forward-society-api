import Swal from "sweetalert2";

window.showToast = function (title = "Successful", icon = "success") {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Toast.fire({
        icon,
        title,
    });
};

window.cp = function (selectorId){

    let current = document.getElementById(selectorId);

    /* Select the text field */
    current.select();
    current.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(current.value);

    showToast("Copied the URL. Paste anywhere to use it back","info")
}
