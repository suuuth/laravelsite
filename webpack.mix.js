const mix = require('laravel-mix');
const config = require('./webpack-config.js');

mix.webpackConfig(config).vue();
