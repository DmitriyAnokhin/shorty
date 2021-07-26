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
    App\Containers   - логика обработки API
    App\Components   - бизнес-логика
    App\Models       - модели Eloquent
    App\Repositories - работа с моделями
```

Этот проект https://github.com/DmitriyAnokhin/shorty

Мой профиль https://github.com/DmitriyAnokhin
