class AppStorage {
    storeToken(token) {
        localStorage.setItem("tpken", token);
    }

    storeUser(user) {
        localStorage.setItem("user", user);
    }

    store(user, token) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear() {
        localStorage.removeItem("token");
        localStorage.removeItem("user");
    }

    getToken() {
        return localStorage.getItem("token");
    }

    getuser() {
        return localStorage.getItem("user");
    }
}

export default AppStorage = new AppStorage();
