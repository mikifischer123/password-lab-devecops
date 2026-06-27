# Security Report

## 1. Scope

This report describes the Security as Code controls used in the `password-lab-devecops` project. The checks are integrated into GitHub Actions and run automatically on push and pull request events.

Repository:

```text
https://github.com/mikifischer123/password-lab-devecops
```

Workflow file:

```text
.github/workflows/ci.yml
```

## 2. Security Tools

### PHPStan

Purpose:

- static analysis for PHP code,
- detects type issues, unreachable code, invalid calls, and common logic mistakes.

Configuration:

```text
phpstan.neon
```

CI command:

```powershell
composer analyse:php
```

Current result:

```text
No errors
```

### ESLint with Security Rules

Purpose:

- lint JavaScript code,
- detect risky JavaScript patterns through `eslint-plugin-security`.

Configuration:

```text
eslint.config.js
```

CI command:

```powershell
npm run lint
```

### Gitleaks

Purpose:

- scans the repository history for secrets,
- detects accidental commits of credentials, tokens, API keys, and passwords.

CI integration:

```yaml
uses: gitleaks/gitleaks-action@v2
```

The workflow checks the repository with full Git history enabled.

### OWASP Dependency Check

Purpose:

- scans project dependencies for known vulnerabilities,
- produces an HTML report as a GitHub Actions artifact.

CI integration:

```yaml
uses: dependency-check/Dependency-Check_Action@main
```

Fail threshold:

```text
CVSS >= 7
```

Report artifact:

```text
owasp-dependency-check-report
```

### npm audit

Purpose:

- checks JavaScript dependencies for known vulnerabilities.

CI command:

```powershell
npm run audit --audit-level=high
```

The job fails if high or critical JavaScript dependency vulnerabilities are detected.

### Composer Audit

Purpose:

- checks PHP dependencies for known vulnerabilities.

CI command:

```powershell
composer audit
```

## 3. Pipeline Blocking Rules

The CI pipeline blocks unsafe changes by failing the pull request checks when one of these conditions occurs:

- Jest tests fail.
- PHPUnit tests fail.
- ESLint reports JavaScript issues.
- PHPStan reports PHP static analysis errors.
- Gitleaks detects committed secrets.
- npm audit detects high or critical vulnerabilities.
- composer audit detects vulnerable PHP packages.
- OWASP Dependency Check finds vulnerabilities with CVSS score 7 or higher.

When GitHub branch protection is enabled for `main`, failed checks prevent merging until the issue is fixed.

## 4. PHP Security Review

Reviewed file:

```text
pass_accept.php
```

Findings from the original implementation:

- direct access to `$_POST` keys could produce undefined index warnings,
- validation logic was embedded directly in the page,
- user-provided name was not explicitly escaped before output,
- the code was difficult to test because validation was not isolated.

Implemented improvements:

- input values are read with null coalescing defaults,
- user-visible name is escaped with `htmlspecialchars`,
- validation is isolated in `src/PasswordValidator.php`,
- validation logic is covered by PHPUnit tests,
- invalid form submissions receive an error message.

## 5. Test and Analysis Results

Local PHP verification:

```text
PHPUnit: OK (4 tests, 5 assertions)
PHPStan: No errors
```

GitHub Actions:

```text
CI and Security workflow: green
```

## 6. Residual Risk

The project is a laboratory application and intentionally displays unlocked JavaScript code after successful validation. In a production application, sensitive logic should not be exposed to the browser and secrets should not be stored in source code.

The current implementation is acceptable for the lab objective because the goal is to demonstrate PHP validation, JavaScript debugging, CI/CD, and Security as Code.

## 7. Recommendations

Recommended future improvements:

- enable GitHub branch protection for `main`,
- require pull request review before merge,
- require all GitHub Actions checks to pass before merge,
- keep PHP, Composer dependencies, Node.js, and npm dependencies updated,
- review OWASP Dependency Check artifacts after every pipeline run,
- avoid storing real secrets in source code or repository history.

