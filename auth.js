auth.onAuthStateChanged(user => {
    if(user){
        location.href = 'main.php';
    }
})
const signupform = document.querySelector("#signup-form");
signupform.addEventListener('submit', (e) => {
    e.preventDefault();
    let email = signupform['signup-email'].value;
    let password = signupform['signup-password'].value;

    // signup the user
    auth.createUserWithEmailAndPassword(email, password).then(cred => {
        return db.collection('users').doc(cred.user.uid).set({
            emergency: signupform['signup-number'].value
        })
    }).then(() => {
        location.href = 'main.php';
    })
    .catch((error) => {
        let errorCode = error.code;
        let errorMssg = error.message;
        if (errorCode == 'auth/weak-password') {
            alert('The password is too weak.');
            signupform['signup-password'].focus();
        } else {
            alert(errorMssg);
            signupform['signup-email'].focus();
        }
    })
})
