# Shorty - сокращатель ссылок

## Методы

### GET /shorty?url={your-link}

Ответ
```json
{
    "short_url": "{you-domain}/{hash}"
}
```

### GET /{hash}

Редирект на {your-link}

Если {hash} не найден, то редирект на {you-domain}

## P.S.

Использован микрофреймворк Lumen https://lumen.laravel.com/

```text
App\Containers                                      - логика обработки API
App\Containers\{RouteSection}\{Model}\Controllers   - контроллеры
App\Containers\{RouteSection}\{Model}\Dto           - data transfer objects
App\Containers\{RouteSection}\{Model}\Requests      - валидация FormRequest
App\Containers\{RouteSection}\{Model}\Resources     - JSON структуры ответов
App\Containers\{RouteSection}\{Model}\Services      - бизнес-логика {RouteSection*}\{Model}
App\Components                                      - общая бизнес-логика
App\Interfaces                                      - интерфейсы и базовые классы
App\Models                                          - модели Eloquent
App\Repositories                                    - работа с моделями

* - группа маршрутов отдельного файла в routes
```

Этот проект https://github.com/DmitriyAnokhin/shorty

Мой профиль https://github.com/DmitriyAnokhin
