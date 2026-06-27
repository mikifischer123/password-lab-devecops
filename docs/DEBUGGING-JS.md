# JavaScript debugging

## Tools used
- Google Chrome DevTools
- Console
- Sources
- Breakpoints

## Errors found

| Error | Cause | Fix |
|---|---|---|
| `i+++` | Invalid increment syntax | Changed to `i++` |
| `!!==` | Invalid comparison operator | Changed to `!==` |
| `return "output"` | Returned text instead of variable value | Changed to `return output` |
| `innerHTML` | HTML parsing was not needed | Replaced with `textContent` |