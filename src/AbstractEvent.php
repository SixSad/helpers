<?php

namespace Sixsad\Helpers;

use Egal\Core\Events\Event;
use Egal\Core\Session\Session;
use Egal\Model\Model;
use Illuminate\Support\Facades\Log;

abstract class AbstractEvent extends Event
{
    private Model $model;

    public function __construct(Model $model)
    {
        $this->setModel($model);

        Log::info(sprintf("Event [%s] was fired with model [%s]. (%s). %s",
            get_class($this),
            get_class($model),
            $model->wasChanged()
                ? "Changes: true" :
                ($model->isDirty()
                    ? "Dirty: true"
                    : "Dirty: false"),
            $model->getAttributes()
                ? "Serialized model: $model"
                : "",
        ));
    }

    public function setModel(Model $model): void
    {
        $this->model = $model;
    }

    public function getModel(): Model
    {
        return $this->model;
    }

    public function getAttributes(): array
    {
        return $this->model->getAttributes();
    }

    public function getAttribute(string $name): mixed
    {
        return $this->model->getAttribute($name);
    }

    public function setModelAttribute(string $name, mixed $value): void
    {
        $this->model->setAttribute($name, $value);
    }

    public function clearModelAttribute(string $attr): void
    {
        $this->model->offsetUnset($attr);
    }

}