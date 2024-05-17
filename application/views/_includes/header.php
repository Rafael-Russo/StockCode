<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>StockCode</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
        <!-- Plugins css -->
        <link href="<?php echo base_url(); ?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url(); ?>assets/libs/custombox/custombox.min.css" rel="stylesheet">
        
        <link href="<?php echo base_url(); ?>assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
        
        <style>
            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                color: black;
            }
            
            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                color: black;
            }
            
            /* The switch - the box around the slider */
            .switch {
              position: relative;
              display: inline-block;
              width: 60px;
              height: 34px;
            }
            
            /* Hide default HTML checkbox */
            .switch input {
              opacity: 0;
              width: 0;
              height: 0;
            }
            
            /* The slider */
            .slider {
              position: absolute;
              cursor: pointer;
              top: 0;
              left: 0;
              right: 0;
              bottom: 0;
              background-color: #ccc;
              -webkit-transition: .4s;
              transition: .4s;
            }
            
            .slider:before {
              position: absolute;
              content: "";
              height: 26px;
              width: 26px;
              left: 4px;
              bottom: 4px;
              background-color: white;
              -webkit-transition: .4s;
              transition: .4s;
            }
            
            input:checked + .slider {
              background-color: #2196F3;
            }
            
            input:focus + .slider {
              box-shadow: 0 0 1px #2196F3;
            }
            
            input:checked + .slider:before {
              -webkit-transform: translateX(26px);
              -ms-transform: translateX(26px);
              transform: translateX(26px);
            }
            
            /* Rounded sliders */
            .slider.round {
              border-radius: 34px;
            }
            
            .slider.round:before {
              border-radius: 50%;
            }
        </style>

    </head>