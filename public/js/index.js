//Modal de confirmação para excluir usuário
let idModal;
const clickedId = (id) => {
    idModal = id;
}

const confirmaExclusao = () => {
    url = `app/models/modelRemoveFunc.php?id=${idModal}`;
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url, false);
    xhttp.send();
    window.location.href = url;
}
