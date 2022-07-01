<?php

namespace App\Models;

/**
 * @method static MaterialType BOOK()
 * @method static MaterialType POST()
 * @method static MaterialType VIDEO()
 * @method static MaterialType SITE()
 * @method static MaterialType SELECTION()
 * @method static MaterialType IDEA()
 */

final class MaterialType extends \MyCLabs\Enum\Enum
{
    private const BOOK = 'Книга';
    private const POST = 'Статья';
    private const VIDEO = 'Видео';
    private const SITE = 'Сайт';
    private const SELECTION = 'Подборка';
    private const IDEA = 'Идея';
}
