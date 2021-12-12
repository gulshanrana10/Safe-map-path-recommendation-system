auth.onAuthStateChanged(user => {
    if(user){
        location.href = 'main.php';
    }
})
const login = document.querySelector("#login-form");

login.addEventListener('submit', (e) => {
    e.preventDefault();
    let email = login['login-email'].value;
    let password = login['login-password'].value;

    // login the user
    auth.signInWithEmailAndPassword(email, password).then(cred => {
        location.href = 'main.php';
    })
    .catch(() => {
        alert("Wrong credentials!!!");
        login['login-email'].focus();
    })
})