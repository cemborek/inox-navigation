Inox Navigation
===============

Requirements
------------

* [Zend Framework 2](https://github.com/zendframework/zf2) 

Installation
------------

### Main Setup

#### With composer

1. Add this project in your composer.json:

    ```json
    "require": {
        "inox/inox-navigation": "dev-master"
    }
    ```
2. Now tell composer to download files by running the command:

    ```bash
    $ php composer.phar update
    ```

#### Post installation

1. Enabling it in your `application.config.php`file.

    ```php
    <?php
    return array(
        'modules' => array(
            // ...
            'InoxNavigation',
        ),
        // ...
    );
    ```
3. Edit the application module configuration file `module/Application/config/module.config.php`, adding the configuration fragment below:

    ```php
        use InoxNavigation\Navigation\Service\CustomNavigationFactory as CustomNavigationFactory;
        return array(
        // ....
            'navigation' => array(
                'default' => array(
                    'login' => array(
                        'label' => 'Login',
                        'route' => 'zfcuser/login',
                        'controller' => 'index'
                    ),
                    'register' => array(
                        'label' => 'Register',
                        'route' => 'zfcuser/register',
                        'controller' => 'index'
                    ),
                ),
                'logged' => array(
                    'login' => array(
                        'label' => 'Account',
                        'route' => 'zfcuser',
                        'controller' => 'index',
                    ),
                    'login' => array(
                        'label' => 'logout',
                        'route' => 'zfcuser/logout',
                        'controller' => 'index',
                    ),
                ),
            ),
            'service_manager' => array(
                'factories' => array(
                    'navigation_unlogged' => function ($sm) {
                            $factory = new CustomNavigationFactory();
                            $factory->setName('default');
                            return $factory->createService($sm);
                    },
                    'navigation_logged' => function ($sm) {
                            $factory = new CustomNavigationFactory();
                            $factory->setName('logged');
                            return $factory->createService($sm);
                    },
                ),
            ),
        ); 
    ```

4. In your template 
    ```php
    <?php

        echo $this->navigation()->menu('navigation_logged')->render();
        echo $this->navigation()->menu('navigation_unlogged')->render();
    ?>
    ```