<?php
namespace App\Repositories;

class StatRepository{
    private string $file = __DIR__ . '/../../stat/stats.json';

    public function incrementCommande():void{
        $stats = json_decode(
            file_get_contents($this->file),
            true
        );
        $stats['totalCommandes']++;

        file_put_contents(
            $this->file,
            json_encode($stats)
        );
    }
}