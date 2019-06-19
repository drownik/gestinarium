<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="es">
  <head>
    <!-- Site Title-->
    <title>Clinica Veterinaria Paguera</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <!-- <link rel="icon" href="<?php echo base_url('assets/images/'); ?>favicon.ico" type="image/x-icon"> -->
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato:300,400,700%7CRoboto:400,500,700">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/'); ?>bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/'); ?>fonts.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/'); ?>style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
  	<div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="<?php echo base_url('assets/images/'); ?>ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
	    <!-- Page Loader-->
	    <div class="preloader" id="preloader">
	      <div class="page-loader-logo">
	        <div class="brand">
	          <div class="brand__name"><img src="<?php echo base_url('assets/images/'); ?>logo-default-380x100.png" alt="" width="190" height="50"/>
	          </div>
	        </div>
	      </div>
	      <div class="page-loader-body">
	        <div id="loadingProgressG">
	          <div class="loadingProgressG" id="loadingProgressG_1"></div>
	        </div>
	      </div>
	    </div>
	    <!-- Page-->
	    <div class="page">
	      <header class="page-header section">
	        <!-- RD Navbar-->
	        <div class="rd-navbar-wrap">
	          <nav class="rd-navbar rd-navbar-creative" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-sm-device-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-device-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-fullwidth" data-xxl-device-layout="rd-navbar-fullwidth" data-xxl-layout="rd-navbar-fullwidth" data-stick-up-clone="false" data-md-stick-up-offset="150px" data-lg-stick-up-offset="60px" data-md-stick-up="true" data-lg-stick-up="true">
	            <div class="border-bottom border-primary rd-navbar-main-outer">
	              <div class="rd-navbar-main">
	                <!-- RD Navbar Panel-->
	                <div class="rd-navbar-panel">
	                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
	                  <!-- RD Navbar Brand-->
	                  <div class="rd-navbar-brand"><a class="brand" href="<?php echo base_url(); ?>">
	                      <div class="brand__name"><img src="<?php echo base_url('assets/images/'); ?>logo-default-380x100.png" alt="" width="190" height="50"/>
	                      </div></a></div>
	                </div>
	                <!-- RD Navbar Nav-->
	                <div class="rd-navbar-nav-wrap">
	                  	<div class="rd-navbar-main-item">
	                  		<a class="button button-xs button-primary" href="<?php echo base_url('gestinarium'); ?>"><span class="icon icon-md fa-user"></span> Acceso para empleados</a>
	                  	</div>
	                  <!-- RD Navbar Nav-->
	                  <ul class="rd-navbar-nav">
	                    <li class="active"><a href="<?php echo base_url(); ?>">Home</a>
	                    </li>
	                    <li><a href="<?php echo base_url('clinica/about'); ?>">Sobre nosotros</a>
	                    </li>
	                    <li><a href="<?php echo base_url('clinica/contact'); ?>">Contacto</a>
	                    </li>
	                  </ul>
	                </div>
	              </div>
	            </div>
	          </nav>
	        </div>
	      </header>