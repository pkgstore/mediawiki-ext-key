# Information

Выделение кнопки клавиатуры, либо кнопки функционального окна приложения.

## Install

1. Загрузите папки и файлы в директорию `extensions/MW_EXT_Key`.
2. В самый низ файла `LocalSettings.php` добавьте строку:

```php
wfLoadExtension( 'MW_EXT_Key' );
```

## Syntax

```html
{{#key: [CTRL]|[ALT]|[DEL]}}
```
