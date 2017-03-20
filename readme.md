# Design Thinking

Tu można umieścić dodatkowe informacje o projekcie

# Instalacja

## Baza danych do wyeksportowania znajduje się w pliku `design_thinking.sql`

## Po sklonowaniu repozytorium należy zmienić niektóre dane:
1. `application/config/config.php`
  - zmiana zawartości `$config['base_url']` na główny adres strony
2. `public/js/main.php`
  - zmiana zawartości `var baseUrl` na główny adres strony
2. `application/config/database.php`
  - zmiana zawartości `$db['default']` na dane swojej bazy danych
