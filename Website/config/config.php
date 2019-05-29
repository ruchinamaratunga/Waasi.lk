<?php   

    define('DEBUG',true);
    define('DB_NAME', 'newmvc');                                               // database name
    define('DB_USER', 'root');                                              // database user
    define('DB_PASSWORD', '');                                              // database password
    define('DB_HOST', '127.0.0.1');                                         // database host *** use IP address to avoid DNS lookup              
    define('DEFAULT_CONTROLLER' , 'Home');                                  // default controller if there isn't one defined in the url
    define('DEFAULT_LAYOUT','default');                                     // if no layout is set in the controller use this layout.
    define('PROOT', '/Waasi.lk7/alphapack-Refactor/Website/');       // set this to '/' for a live server.
    define('SITE_TITLE', 'වාසි.lk');                                  // this will be used if no site title is set
    define('CURRENT_USER_SESSION_NAME', 'kdlasfjaKjdfjASLKFDFdgRIG');       // session name for logged in
    define('REMEMBER_ME_COOKIE_NAME','ASLKFSFJO32424AFS8F9AFAF98FHI');      //cookie name for logged in user remember me function
    define('REMEMBER_ME_COOKIE_EXPIRY', 604800);                            //time in seconds for remember me cookie to live (30 days)
    define('IMAGE_STORE_PATH','/home/damika/lampp/htdocs/alphapack-master/alphapack-Refactor/Website/img/Promotions/');   // Location to where promotion images should be stored
    define('TEST', ROOT . PROOT . 'img/Promotions/');
    define('ACCESS_RESTRICTED', 'Restricted');                              //controller name for the restricted redirect
	define('BUSINESS_EMAIL','waasilk444@gmail.com');						//Bussiness email use to send email to promoters when there promotions 																			get accepted or rejected
	define('BUSINESS_PASSWORD','David@246');
