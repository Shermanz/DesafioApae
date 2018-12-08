const express = require('express');
const router = express.Router();
const transacoes = require('../model/transacoes');

router.get('/', (req, res, next) =>{
    transacoes.get((err,data) =>{
        if (err){
            console.log(err);
            res.send(err);
        }
        res.send(data);
    })
});

module.exports = router;