<?php

namespace App\Service;

class Session
{
    /**
     * Save a key/value data in the session.
     *
     * @param string $key
     * @param string $value
     * @return void
     */
    public static function save(string $key, string $value): void
    {
        if (!self::exists($key)) {
            $_SESSION[$key] = $value;
        }
    }

    /**
     * Delete the value of a specific key of the session.
     *
     * @param string $key
     * @return bool
     */
    public static function delete(string $key): bool
    {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    /**
     * Checks if a specific key of a session exists.
     *
     * @param string $key
     * @return bool
     */
    public static function exists(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get the value of a specific key of the session if it exists.
     *
     * @param string $key
     * @return mixed|null
     */
    public static function get(string $key)
    {
        return self::exists($key) ? $_SESSION[$key] : null;
    }

    /**
     * Starts the session.
     *
     * @return void
     */
    public static function start(): void
    {
        session_start();
    }

    /**
     * Destroy the session.
     *
     * @return void
     */
    public static function destroy(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
    }
}
