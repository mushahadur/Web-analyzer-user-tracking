/*------------------------------------------------------------------
* Bootstrap Simple Admin Template
* Version: 3.0
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-------------------------------------------------------------------*/
(function() {
    'use strict';
    // Toggle sidebar on Menu button click
    $('#sidebarCollapse').on('click', function() {
        $('#sidebar').toggleClass('active');
        $('#body').toggleClass('active');
    });
    $('#sidebar').toggleClass('active');
    $('#body').toggleClass('active');

})();

