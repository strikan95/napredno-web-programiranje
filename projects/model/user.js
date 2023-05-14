var mongoose = require('mongoose');

var userSchema = mongoose.Schema(
    {
        name: {
            type: String,
            required: [true, 'User name cannot be null']
        },
        email: {
            type: String,
            required: [true, 'Email must be provided']
        },
        password: {
            type: String,
            required: [true, 'Password must be provided']
        }
    }
);

var UserModel = mongoose.model('User', userSchema);
module.exports = UserModel;