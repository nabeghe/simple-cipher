# Simple Cipher for PHP

> A simple cipher using OpenSSL with a few additional tweaks.

Implementing a cipher to encrypt and decrypt your data can be a bit tricky, but with OpenSSL, it's a breeze.
However, this library combines several techniques to give you a simple yet effective way to handle encryption and
decryption.
You don’t even need to set a secret or password for your cipher system!
If you don’t specify one,
a default value is used that’s unique and remains constant throughout the program, except in special cases.
However, it's not recommended

The best part? You'll be working with a SimpleCipher class here,
where its methods are accessible both statically and through object instances.
Data is returned in the same type it was encrypted with, ensuring consistency.
but objects converted into arrays, and you also have the option to set a default value in case there’s an issue with
decryption.

<hr>

## 🫡 Usage

### 🚀 Installation

You can install the package via composer:

```bash
composer require nabeghe/simple-cipher
```

<hr>

### Configuration

The configuration can be an array, string, number, or null.
A string or number means setting the secret (password), null means using default values, and an array allows for setting each option separately.

#### Array Syntax:

| Optiona name  | Description                                                                                                                                                                                                                                                                            |
|---------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| algo          | The cipher method.<br>Default: aes-256-gcm                                                                                                                                                                                                                                             |
| secret        | The cipher secret (password).<br>Default: A random value is generated at the start & stored in a file within the library's directory. However, the priority is first given to a constant named `SIMPLE_CIPHER_SECRET`, , and then to an environment key with the same name in `$_ENV`. |
| default       | A default value is used in case there’s an issue in the decryption process, which is null if not set.                                                                                                                                                                                  |

### Static Mode

#### Syntax:

```php
SimpleCipher::encrypt(mixed $data, array|string|int|null $config): string;

SimpleCipher::decrypt(string $data, array|string|int|null $config): mixed;
```

#### Example:

```php
use Nabeghe\SimpleCipher\SimpleCipher;

$data = 'nabeghe/simple-cipher';

$encrypted = SimpleCipher::encrypt($data, 'YOUR_SECRET');
echo "Encrypted Data:\n";
echo "$encrypted\n\n";

$decrypted = SimpleCipher::decrypt($encrypted, 'YOUR_SECRET');
echo "Decrypted Data:\n";
var_dump($decrypted);
```

<hr>

### Instance Mode

#### Syntax:

```php
__construct(array|string|int|null $config = null)

$cipher->encrypt(mixed $data): string;

$cipher->decrypt(string $data, mixed $default = null): mixed;
```

#### Example:

```php
use Nabeghe\SimpleCipher\SimpleCipher;

$data = 'nabeghe/simple-cipher';

$cipher = new SimpleCipher('YOUR_SECRET');

$encrypted = $cipher->encrypt($data);
echo "Encrypted Data:\n";
echo "$encrypted\n\n";

$decrypted = $cipher->decrypt($encrypted);
echo "Decrypted Data:\n";
var_dump($decrypted);
```

<hr>

## 📖 License

Copyright (c) 2024 Hadi Akbarzadeh

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.