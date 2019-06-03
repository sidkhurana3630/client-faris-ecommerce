<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/sbadmin2/pnotify/PNotifyBrightTheme.css">
  <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/sbadmin2/bootstrap/css/bootstrap.css">
  <link href="<?= base_url('assets/'); ?>vendor/sbadmin2/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    /* Start by setting display:none to make this hidden.
   Then we position it in relation to the viewport window
   with position:fixed. Width, height, top and left speak
   for themselves. Background we set to 80% white with
   our animation centered, and no-repeating */
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;      
      background: url('<?= base_url("assets/img/"); ?>loading.gif') 50% 50% no-repeat;
    }

    /* When the body has the loading class, we turn
   the scrollbar off with overflow:hidden */
    body.loading .modal {
      overflow: hidden;
    }

    /* Anytime the body has the loading class, our
   modal element will be visible */
    body.loading .modal {
      display: block;
    }
  </style>

</head>

<body class="bg-gradient-primary">