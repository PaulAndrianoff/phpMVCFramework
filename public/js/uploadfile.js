function displayFileName () {
    var fileName = document.getElementById('path').files[0].name;
    document.getElementsByClassName('path--name')[0].textContent = fileName;
}

document.getElementById('path').addEventListener('change', displayFileName);