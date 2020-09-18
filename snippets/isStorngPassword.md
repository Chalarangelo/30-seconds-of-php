---
title:  isStrongPassword
tags: string,beginner
---

Checks the given password is strong enough or not.

- Use `preg_match` to find the string contained letters and decimals and also char count should be between 8 and 20 

```php
function isStrongPassword($password = ""){
    if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)){
        return TRUE;
    }
    return FALSE;
}
```

```php
isStrongPassword('123123123'); // returns FALSE;
isStrongPassword('=<rF{3J8=HV'); // returns TRUE;
```
