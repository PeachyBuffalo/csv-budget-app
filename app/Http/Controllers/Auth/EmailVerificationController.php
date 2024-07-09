<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class EmailVerificationController extends \App\Http\Controllers\Controller
{
    public function __invoke(string $id, string $hash): RedirectResponse
    {
        $user = Auth::user();

        if (!$user instanceof MustVerifyEmail) {
            throw new AuthorizationException();
        }

        if (!hash_equals((string) $id, (string) $user->getKey())) {
            throw new AuthorizationException();
        }

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            throw new AuthorizationException();
        }

        if ($user->hasVerifiedEmail()) {
            return redirect(route('home'));
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect(route('home'));
    }
}
