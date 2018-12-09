const mysql = require('mysql');


const connection = mysql.createPool ({
    host: '192.168.1.79',
    port: '3306',
    user: 'root',
    password: 'secret',
    database: 'desafio_apae'
});

module.exports = connection;