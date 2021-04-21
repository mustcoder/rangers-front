const express = require('express');
const router = express.Router();

router.get('/', function(req, res, next) {
    res.render('home', {title: 'Home Page'});
});

router.get('/inner', function(req, res, next) {
    res.render('inner-page', {title: 'Inner Page'});
});

router.get('/root', function(req, res, next) {
    res.render('root-page', {title: 'Root Page'});
});

router.get('/about', function(req, res, next) {
    res.render('about-page', {title: 'About Page'});
});

router.get('/foo', function(req, res, next) {
    res.render('index', {title: 'Foo Page'});
});

module.exports = router;