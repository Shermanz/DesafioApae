const dbMysql = require('../bin/config');

transacoes = {
    get:  (callback) =>{
        return dbMysql.query(`SELECT * FROM donations`,callback)
    }
}


module.exports = transacoes;