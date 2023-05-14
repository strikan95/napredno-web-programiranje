var mongoose = require('mongoose');
var db = mongoose.connect(
    'mongodb+srv://db_user:j5JlBRo2SkHoLh1q@napredno-web-programira.dmbnbiw.mongodb.net/?retryWrites=true&w=majority'
)
    .then(() => {
        console.log('Database connection successful.');
    })
    .catch((error) => {
        console.log(error);
    });