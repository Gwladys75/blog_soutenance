function showPass() {
    if (password.type === "password") {
        password.type = "text";
        confirmMdp.type = "text";
    } else {
        password.type = "password";
        confirmMdp.type = "password";
    }
}
