const express = require('express');
const router = express.Router();

router.get('/', function(req, res, next) {
    res.render('home', {title: 'APP Home Page'});
});

router.get('/app-foo', function(req, res, next) {
    res.send("FOO PAGE!!");
});

module.exports = router;