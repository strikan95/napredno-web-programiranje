const User = require("../model/user");

exports.renderRegisterView = (req, res) => {
    res.render('auth/register-form');
}

exports.renderLoginView = (req, res) => {
    res.render('auth/login-form');
}

exports.register = (req, res) =>
{
    const user = new User(
        {
            name: req.body.name,
            email: req.body.email,
            password: req.body.password
        }
    );

    user.save()
        .then(() => {
            res.redirect('/auth/login');
        })
        .catch(err => {
            res.render('error', {message: err.message, error: err})
        });
}

exports.login = (req, res) =>
{
    const user = User.findOne({email: req.body.email})
        .then((user) => {
            if(!user || user.password !== req.body.password) {
                res.render('error', {message: 'Wrong email or password', error: null})
            } else {
                req.session.user = {id: user.id, name: user.name, email: user.email}
                req.session.isAuthenticated = true;
                res.redirect('/me');
            }
        })
}

exports.logout = (req, res) =>
{
    const session = req.session;
    if(session.isAuthenticated)
    {
        req.session.destroy();
    }
    return res.redirect('/auth/login');
}