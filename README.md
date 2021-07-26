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
