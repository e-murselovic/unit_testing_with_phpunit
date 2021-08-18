# unit_testing_with_phpunit

# Setting up PHPUnit

1. Install PHPUnit using following command `composer require phpunit/phpunit`
2. To run PHPUnit use `./vendor/bin/phpunit`
3. Create `tests` folder for all of our tests to be stored
4. Create `app` folder for application source code
5. Setup autoload within `composer.json` by using following:
    ```
    ...

    "autoload": {
        "psr-4": {
            "App\\" : "app"
        }
    }
    
    ...
    ```
6. Run command for autoloading `composer dump-autoload -o`
7. Setup PHPUnit configuration by creating `phpunit.xml` file
    ```
    <?xml version="1.0" encoding="UTF-8"?>
        <phpunit bootstrap="vendor/autoload.php"
                colors="true"
                verbose="true"
                stopOnFailure="false">

            <testsuites>
                <testsuite name="Test suite">
                    <directory>tests</directory>
                </testsuite>
            </testsuites>
        </phpunit>
    ```