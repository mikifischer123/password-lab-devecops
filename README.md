# password-lab-devecops

## Environment

This project is prepared for XAMPP on Windows.

Required tools:

- PHP 8.2 or newer
- Composer
- Node.js and npm for JavaScript tests

Check PHP and Composer:

```powershell
php -v
composer --version
```

The project should be placed under:

```text
C:\xampp\htdocs\password-lab-devecops\password-lab-devecops
```

## PHP Form

Open the PHP form through XAMPP:

```text
http://localhost/password-lab-devecops/password-lab-devecops/password-form.php
```

The form sends the required variables to `pass_accept.php`:

- `fName`
- `pws`
- `srt`

Expected test values:

```text
fName: Mikolaj
pws: Th15_15_5TR0n6
srt: 1352
```

## PHP Tests

Install PHP dependencies:

```powershell
composer install
```

Run PHPUnit:

```powershell
composer test:php
```

Run PHPStan:

```powershell
composer analyse:php
```

## JavaScript Tests

Run Jest:

```powershell
npm test
```

Run ESLint:

```powershell
npm run lint
```
