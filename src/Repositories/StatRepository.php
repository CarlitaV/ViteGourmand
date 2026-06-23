<?php
namespace App\Repositories;

class StatRepository{
    private string $file = __DIR__ . '/../storage/stats.json';

    public function incrementCommande():void{
        if (!file_exists($this->file)){
            file_put_contents(
                $this->file,
                json_encode([
                    'totalCommandes' => 0,
                    'totalAvis' => 0,
                    'platsVendus' => []
                ])
            );
        } 
        $stats = json_decode(
            file_get_contents($this->file),
            true
        );
        $stats['totalCommandes'] = ($stats['totalCommandes'] ?? 0) + 1;

        file_put_contents(
            $this->file,
            json_encode($stats, JSON_PRETTY_PRINT)
        );
        
    }
}