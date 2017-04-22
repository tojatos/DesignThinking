<?php defined('BASEPATH') or exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="<?= site_url('public/css/main.css') ?>">
    <link rel="stylesheet" href="<?= site_url('public/css/font-awesome/css/font-awesome.min.css') ?>">
    <script src="<?= site_url('public/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= site_url('public/js/bootstrap.min.js') ?>"></script>
    <script src="<?= site_url('public/js/main.js') ?>"></script>
    <script src="<?= site_url('public/js/pdfmake.min.js') ?>"></script>
    <script src="<?= site_url('public/js/vfs_fonts.js') ?>"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Młody ratownik</title>
  </head>
  <body>
  <div class="blur"></div>
  <div class="loading"></div>
  <div class="response"><div class="text"></div><button class="accept-response">Rozumiem</button></div>
