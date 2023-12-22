# Command Process Manager


## Installation

```
composer require muhammetsafak/command-process:dev-develop
```

## Usage

`email_send.php` : 

```php
$to = $argv[1];

$subject = "Hello World";
$message = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sollicitudin varius dui, sit amet molestie justo pulvinar at. Nunc mi est, condimentum eget aliquet at, laoreet vel ipsum. Aliquam accumsan nulla at lorem consectetur, vitae venenatis justo rhoncus.";
$headers = "From: example@example.com";

mail($to, $subject, $message, $headers);

echo "E-Mail Gönderildi! : " . $to;
```

```php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php';
use CommandProcessManager\Process;

$to = (isset($_GET['to']) && filter_var($_GET['to'], FILTER_VALIDATE_EMAIL)) ? $_GET['to'] : 'test@example.com';

$process = new Process("php ./email_send.php " . escapeshellarg($to));

echo "E-Mail is being sent..." . PHP_EOL;
echo $process->getContents();
```


## Getting Help

If you have questions, concerns, bug reports, etc, please file an issue in this repository's Issue Tracker.

## Getting Involved

> All contributions to this project will be published under the MIT License. By submitting a pull request or filing a bug, issue, or feature request, you are agreeing to comply with this waiver of copyright interest.

There are two primary ways to help:

- Using the issue tracker, and
- Changing the code-base.

### Using the issue tracker

Use the issue tracker to suggest feature requests, report bugs, and ask questions. This is also a great way to connect with the developers of the project as well as others who are interested in this solution.

Use the issue tracker to find ways to contribute. Find a bug or a feature, mention in the issue that you will take on that effort, then follow the Changing the code-base guidance below.

### Changing the code-base

Generally speaking, you should fork this repository, make changes in your own fork, and then submit a pull request. All new code should have associated unit tests that validate implemented features and the presence or lack of defects. Additionally, the code should follow any stylistic and architectural guidelines prescribed by the project. In the absence of such guidelines, mimic the styles and patterns in the existing code-base.

## Credits

- [Muhammet ŞAFAK](https://www.muhammetsafak.com.tr) <<info@muhammetsafak.com.tr>>

## License

Copyright &copy; 2023 [MIT License](./LICENSE)