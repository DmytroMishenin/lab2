function SaveContent() {
    localStorage.setItem("savedContent", document.getElementById("content0").innerHTML);
}

function ShowContent() {
    if ("savedContent" in localStorage) {
        document.getElementById("content").innerHTML = decodeURI(localStorage.getItem("savedContent"));
    }
}