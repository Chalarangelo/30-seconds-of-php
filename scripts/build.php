<?php

$projectDir = dirname(__FILE__) . '/../';

$readme = '![Logo](/logo.png)

# 30 seconds of php code
> A curated collection of useful PHP snippets that you can understand in 30 seconds or less.

Note: This project is inspired by [30 Seconds of Code](https://github.com/Chalarangelo/30-seconds-of-code), but there is no affiliation with that project.

## Table of Contents
';

$tags = json_decode(file_get_contents($projectDir . '/data/tags.json'));
$database = json_decode(file_get_contents($projectDir . '/data/database.json'));

$tableOfContents = '';
$snippets = '';
foreach ($tags as $tag) {
$tableOfContents .= "
### {$tag->icon} {$tag->name}

<details>
<summary>View contents</summary>

";
$snippets .= "
---
 ## {$tag->icon} {$tag->name}

";

    $tagName = strtolower($tag->name);
    foreach ($database as $function => $functionTags) {
        if (in_array($tagName, $functionTags)) {
            $tableOfContents .= "* [`{$function}`](#" . strtolower($function) . ")\n";

            $snippets .= file_get_contents($projectDir . 'snippets/' . $function . '.md');
            $snippets .= "\n<br>[⬆ Back to top](#table-of-contents)\n\n";
        }
    }

$tableOfContents .= '
</details>
';
}

$readme .= $tableOfContents;
$readme .= $snippets;

$readme .= '## Contribute
You\'re always welcome to contribute to this project. Please read the [contribution guide](CONTRIBUTING.md).

## License

This project is licensed under the MIT License - see the [License File](LICENSE) for details
';

file_put_contents($projectDir . 'README.md', $readme);
echo "\nREADME.md file has been updated.\n";
