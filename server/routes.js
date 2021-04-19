const express = require('express');
const router = express.Router();

router.get('/', function(req, res, next) {
    res.render('home', {title: 'Home Page'});
});

router.get('/inner', function(req, res, next) {
    res.render('inner-page', {title: 'Inner Page'});
});

router.get('/foo', function(req, res, next) {
    res.render('index', {title: 'Foo Page'});
});

module.exports = router;