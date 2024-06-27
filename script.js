// Dados de login (simulados)
const users = [
    { username: "24890444866", password: "122300", redirect: "pagina_leopoldo.html" },
    { username: "cliente2", password: "senha2", redirect: "pagina_cliente2.html" }
];

function login() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const loginStatus = document.getElementById("loginStatus");

    // Verifica se o usuário e senha correspondem aos dados simulados
    const user = users.find(u => u.username === username && u.password === password);

    if (user) {
        // Redireciona para a página exclusiva do cliente
        window.location.href = user.redirect;
        return false; // Evita o envio do formulário (não necessário aqui)
    } else {
        loginStatus.textContent = "Usuário ou senha inválidos. Tente novamente.";
        return false; // Evita o envio do formulário (não necessário aqui)
    }
}
