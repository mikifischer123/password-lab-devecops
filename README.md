# Lab: Web Application with XAMPP, GitHub, Continuous Testing, and Security as Code

## 1. Overview

This repository contains a laboratory web application prepared for a Windows 10 NAT environment with XAMPP. The project combines frontend debugging, PHP and HTML integration, GitHub collaboration, Continuous Testing, and Security as Code.

The application includes:

- a local XAMPP web page,
- JavaScript password decoding logic,
- PHP validation for `pass_accept.php`,
- an HTML/PHP form that sends the required variables,
- automated JavaScript and PHP tests,
- a GitHub Actions CI/CD pipeline,
- security checks integrated into the pipeline.

Public repository:

```text
https://github.com/mikifischer123/password-lab-devecops
```

## 2. Learning Objectives

The lab demonstrates how to:

1. Configure and run a website with XAMPP on Windows.
2. Debug JavaScript with browser developer tools.
3. Review and improve PHP code quality and security.
4. Integrate HTML forms with PHP backend logic.
5. Collaborate through GitHub branches, pull requests, reviews, and merges.
6. Run Continuous Testing with GitHub Actions.
7. Add Security as Code checks to the development workflow.

## 3. Environment

Target environment:

- Operating system: Windows 10 NAT
- Web server: XAMPP with Apache and PHP
- PHP: 8.2 or newer
- Dependency manager: Composer
- JavaScript runtime: Node.js and npm
- Browser: Chrome or Edge with DevTools
- Version control: Git and GitHub

Local project path used during the lab:

```text
C:\xampp\htdocs\password-lab-devecops\password-lab-devecops
```

Check PHP and Composer:

```powershell
php -v
composer --version
```

Install PHP dependencies:

```powershell
composer install
```

Install JavaScript dependencies:

```powershell
npm ci
```

## 4. Repository Structure

```text
.
|-- .github/workflows/ci.yml       GitHub Actions pipeline
|-- css/                           CSS assets
|-- docs/                          Technical documentation and reports
|-- img/                           Image assets
|-- js/                            JavaScript source files
|-- mail/                          PHP mail example from the starter project
|-- src/                           PHP application logic
|-- tests/js/                      Jest tests
|-- tests/php/                     PHPUnit tests
|-- vendor/                        Frontend vendor assets from starter files
|-- composer.json                  PHP dependencies and scripts
|-- composer.lock                  Locked PHP dependency versions
|-- eslint.config.js               ESLint and security rules
|-- index.html                     JavaScript lab page
|-- package.json                   JavaScript dependencies and scripts
|-- pass_accept.php                PHP result page
|-- password-form.php              HTML/PHP form for required variables
|-- phpstan.neon                   PHPStan static analysis config
|-- phpunit.xml                    PHPUnit config
|-- script.js                      Browser integration script
```

## 5. Running the Application in XAMPP

Start Apache from the XAMPP Control Panel.

Open the PHP form:

```text
http://localhost/password-lab-devecops/password-lab-devecops/password-form.php
```

Use the test values:

```text
fName: Mikolaj
pws: Th15_15_5TR0n6
srt: 1352
```

Expected result:

```text
Access granted for Mikolaj.
```

Invalid values should display:

```text
Access denied. Check the password, secret code and first name.
```

## 6. JavaScript Debugging

JavaScript debugging was performed with Chrome DevTools:

- Console was used to identify runtime and syntax errors.
- Sources and breakpoints were used to trace execution.
- unsafe or unnecessary `innerHTML` usage was replaced where appropriate.
- Base64 decoding logic was moved into `js/passwordCodec.js`.

Detailed notes are available in:

```text
docs/DEBUGGING-JS.md
```

Run JavaScript tests:

```powershell
npm test
```

Run JavaScript linting and security rules:

```powershell
npm run lint
```

## 7. PHP Review and HTML Integration

The original `pass_accept.php` directly accessed `$_POST` values and mixed validation logic with output. The improved version:

- safely reads `$_POST['pws']`, `$_POST['srt']`, and `$_POST['fName']`,
- avoids undefined index warnings,
- escapes user-visible output with `htmlspecialchars`,
- delegates validation to `App\PasswordValidator`,
- provides success and error states for the user.

The form is implemented in:

```text
password-form.php
```

The PHP validation logic is implemented in:

```text
src/PasswordValidator.php
```

## 8. Automated Tests

JavaScript tests are implemented with Jest:

```text
tests/js/passwordCodec.test.js
```

PHP tests are implemented with PHPUnit:

```text
tests/php/PasswordValidatorTest.php
```

Run PHP tests:

```powershell
composer test:php
```

Run PHP static analysis:

```powershell
composer analyse:php
```

Local verification completed successfully:

```text
PHPUnit: OK (4 tests, 5 assertions)
PHPStan: No errors
GitHub Actions: green
```

## 9. CI/CD Pipeline

The GitHub Actions workflow is defined in:

```text
.github/workflows/ci.yml
```

The pipeline runs on every push and pull request.

Jobs:

- JavaScript tests and linting
- PHP tests and static analysis
- Security scans

Main commands executed by CI:

```powershell
npm ci
npm run lint
npm test
npm run audit --audit-level=high
composer install --no-interaction --prefer-dist
composer test:php
composer analyse:php
composer audit
```

## 10. Security as Code

Security checks are part of the pipeline:

- ESLint with `eslint-plugin-security` for JavaScript security patterns
- PHPStan for PHP static analysis
- Gitleaks for secret scanning
- OWASP Dependency Check for dependency vulnerability scanning
- npm audit for JavaScript dependencies
- composer audit for PHP dependencies

The pipeline is configured to fail when tests, static analysis, secret scanning, or high-severity dependency checks fail. This prevents unsafe changes from being merged when branch protection requires passing checks.

Security report:

```text
docs/SECURITY-REPORT.md
```

## 11. GitHub Workflow

The team workflow used in the lab:

1. Create or update a feature branch.
2. Commit changes locally.
3. Push the branch to GitHub.
4. Open a pull request to `main`.
5. Run GitHub Actions automatically.
6. Review code by the second team member.
7. Merge after the pipeline is green and review is complete.

Example:

```powershell
git checkout main
git pull origin main
git checkout -b feature/example-change
git add .
git commit -m "feat: describe change"
git push -u origin feature/example-change
```

## 12. Deliverables

Completed deliverables:

- Public GitHub repository
- Working XAMPP website
- PHP and JavaScript integration
- JavaScript tests with Jest
- PHP tests with PHPUnit
- PHP static analysis with PHPStan
- GitHub Actions CI/CD workflow
- Security as Code pipeline
- Security report
- Technical documentation

