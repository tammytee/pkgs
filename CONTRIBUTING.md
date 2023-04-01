# Contributing

## Getting Started

> TODO

## Duster

This project uses [Duster](https://github.com/tighten/duster#readme) for code style linting and fixing.

> *The `duster-fix-blame` action will also fix and commit any linting errors when opening a pull request.*

To lint everything

```sh
./vendor/bin/duster lint
```

To fix all linter findings

```sh
./vendor/bin/duster fix
```

To dust only uncommitted files, add the `--dirty` option.