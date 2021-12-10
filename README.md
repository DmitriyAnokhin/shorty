# Shorty - сокращатель ссылок

## Методы

### GET /shorty?url={your-link}

Ответ
```json
{
    "short_url": "{your-domain}/{hash}"
}
```

### GET /{hash}

Редирект на {your-link}

Если {hash} не найден, то редирект на {you-domain}

## P.S.

Использован микрофреймворк Lumen https://lumen.laravel.com/

```text
App\Containers                                           - логика обработки API
App\Containers\{RouteSection}\{ModelGroup}\Controllers   - контроллеры
App\Containers\{RouteSection}\{ModelGroup}\Dto           - data transfer objects
App\Containers\{RouteSection}\{ModelGroup}\Requests      - валидация FormRequest
App\Containers\{RouteSection}\{ModelGroup}\Resources     - JSON структуры ответов
App\Containers\{RouteSection}\{ModelGroup}\Services      - бизнес-логика {RouteSection*}\{ModelGroup**}
App\Components                                           - общая бизнес-логика
App\Interfaces                                           - интерфейсы и базовые классы
App\Models                                               - модели Eloquent
App\Repositories                                         - работа с моделями

*  - группа маршрутов отдельного файла в routes (api.php)
** - название группы моделей (Url => Models\Url\ShortUrl.php)


Название классов

App\Containers\{RouteSection}\{ModelGroup}\Controllers\{RouteSection}{Model}Controller.php

App\Containers\Api\Url\Controllers\ApiShortUrlController.php
```

Этот проект https://github.com/DmitriyAnokhin/shorty

Мой профиль https://github.com/DmitriyAnokhin
