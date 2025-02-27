<?php

declare(strict_types=1);

namespace MoonShine\Components;

use Closure;
use Illuminate\View\ComponentSlot;

/**
 * @method static static make(Closure|string $title = '', Closure|string $thumbnail = '', Closure|string $url = '#', Closure|array $values = [], Closure|string|null $subtitle = null)
 */
final class Card extends MoonShineComponent
{
    protected string $view = 'moonshine::components.card';

    protected Closure|string $content = '';

    protected Closure|string $header = '';

    protected Closure|string $actions = '';

    public function __construct(
        protected Closure|string $title = '',
        protected Closure|string $thumbnail = '',
        protected Closure|string $url = '#',
        protected Closure|array $values = [],
        protected Closure|string|null $subtitle = null,
        protected bool $overlay = false,
    ) {
    }

    public function content(Closure|string $value): self
    {
        $this->content = $value;

        return $this;
    }

    public function header(Closure|string $value): self
    {
        $this->header = $value;

        return $this;
    }

    public function actions(Closure|string $value): self
    {
        $this->actions = $value;

        return $this;
    }

    public function subtitle(Closure|string $value): self
    {
        $this->subtitle = $value;

        return $this;
    }

    public function url(Closure|string $value): self
    {
        $this->url = $value;

        return $this;
    }

    public function thumbnail(Closure|string $value): self
    {
        $this->thumbnail = $value;

        return $this;
    }

    public function values(Closure|array $values): self
    {
        $this->values = $values;

        return $this;
    }

    public function overlay(): self
    {
        $this->overlay = true;

        return $this;
    }

    protected function viewData(): array
    {
        return [
            'title' => value($this->title, $this),
            'url' => value($this->url, $this),
            'thumbnail' => value($this->thumbnail, $this),
            'overlay' => $this->overlay,
            'subtitle' => value($this->subtitle, $this),
            'values' => value($this->values, $this),
            'slot' => new ComponentSlot(
                value($this->content, $this),
            ),
            'header' => new ComponentSlot(
                value($this->header, $this),
            ),
            'actions' => new ComponentSlot(
                value($this->actions, $this),
            ),
        ];
    }
}
