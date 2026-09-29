<?php
namespace App\Support;
use App\AuditLog;
use Illuminate\Database\Eloquent\Model;

class AuditLogger {
    public static function log(string $action,string $module,string $description,?Model $target=null,?array $old=null,?array $new=null): void {
        if (!auth()->check() && !app()->runningInConsole()) return;
        $user=auth()->user();
        AuditLog::create([
            'user_id'=>$user?->id,
            'role'=>$user?->getRoleNames()->first(),
            'action'=>$action,
            'module'=>$module,
            'target_type'=>$target ? get_class($target) : null,
            'target_id'=>$target?->getKey(),
            'description'=>$description,
            'ip'=>request()->ip(),
            'old_values'=>$old,
            'new_values'=>$new,
        ]);
    }
}