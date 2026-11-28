<?php

namespace App\Policies;

use App\Models\Gasto;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class GastoPolicy
{
    /**
     * Cualquier usuario autenticado si puede ver cualquiera de sus gastos.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Solo el dueño puede ver los detalles.
     */
    public function view(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }

    /**
     * Cualquier usuario autenticado puede crear un gasto nuevo.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Solo el dueño puede actualizar el gasto.
     */
    public function update(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }

    /**
     * Solo el dueño puede eliminar el gasto.
     */
    public function delete(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }

    /**
     * Solo el dueño puede restaurar el gasto.
     */
    public function restore(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Gasto $gasto): bool
    {
        return $user->id === $gasto->user_id;
    }
}
