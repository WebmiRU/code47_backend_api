<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $login
 * @property string $action
 * @property string $entity
 * @property mixed $allow
 */
class AuthResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $this->resource = (object)$this->resource;

        return [
            'login' => $this->resource->login,
            'action' => $this->action,
            'entity' => $this->entity,
            'allow' => $this->allow,
        ];
    }
}
