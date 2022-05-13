# Fixture factories association tests

## Installation

```shell
git clone https://github.com/Erwane/fixture-factories-tests.git
cd fixture-factories-tests
composer install
```

## Tests

### Complex factory writing, but OK

`phpunit --colors=always --dont-report-useless-tests --filter Complex`

### Incompatible association

`phpunit --colors=always --dont-report-useless-tests --filter Incompatible`
This test don't return same error if run in a global `phpunit` command.

### is_super is null

`phpunit --colors=always --dont-report-useless-tests --filter SuperNotSet`
