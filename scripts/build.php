<?php

$projectDir = dirname(__FILE__) . '/../';

$readme = '# 30 seconds of php code
> A curated collection of useful PHP snippets that you can understand in 30 seconds or less.

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

$readme .= '#### Related

- [30 Seconds of Code](https://github.com/Chalarangelo/30-seconds-of-code)
- [30 Seconds of Python](https://github.com/kriadmin/30-seconds-of-python-code)

## License

This project is licensed under the CC0 1.0 License - see the [License File](LICENSE) for details
';

file_put_contents($projectDir . 'README.md', $readme);
