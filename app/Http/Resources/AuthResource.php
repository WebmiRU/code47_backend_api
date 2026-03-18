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
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'login' => $this->login,
            'action' => $this->action,
            'entity' => $this->entity,
            'allow' => $this->allow,
        ];
    }
}
