<?php
// 1. التحميل التلقائي للمكعبات
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) require_once $path;
});

// 2. إدارة السياق (عزل البيانات)
class Context { public static $tenantId = null; }

// 3. الربط بقاعدة البيانات
class DB {
    private static $instance = null;
    public static function connect() {
        if (self::$instance === null) {
            self::$instance = new PDO('sqlite:database.sqlite');
            self::$instance->exec("CREATE TABLE IF NOT EXISTS orders (id TEXT, amount INTEGER, tenant_id TEXT)");
            self::$instance->exec("CREATE TABLE IF NOT EXISTS stock (product TEXT, tenant_id TEXT, qty INTEGER)");
        }
        return self::$instance;
    }
}

// 4. نظام الأحداث المركزي
class EventDispatcher {
    private static $listeners = [];
    public static function subscribe($event, $callback) { self::$listeners[$event][] = $callback; }
    public static function dispatch($event, $data = null) {
        if (isset(self::$listeners[$event])) {
            foreach (self::$listeners[$event] as $callback) { 
                call_user_func($callback, $data, Context::$tenantId); 
            }
        }
    }
}
