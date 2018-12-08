const dbMysql = require('../bin/config');

transacoes = {
    get:  (callback) =>{
        return dbMysql.query(`SELECT * FROM user`,callback)
    }
}


module.exports = transacoes;