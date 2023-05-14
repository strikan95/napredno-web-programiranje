const requireLogin = function (req, res, next) {
    if (isLoggedIn(req)) {
        next(); // allow the next route to run
    } else {
        // require the user to log in
        res.redirect("/auth/login"); // or render a form, etc.
    }
}

const isLoggedIn = function (req) {
    return !!req.session.isAuthenticated;
}

module.exports = { requireLogin };