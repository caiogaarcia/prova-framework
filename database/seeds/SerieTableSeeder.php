<?php
use App\User;
use Illuminate\Database\Seeder;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Apaga toda a tabela de usuários
        DB::table('series')->truncate();
        // Cria usuários admins (dados controlados)
        $this->createSeries();     
    }
    private function createSeries()
    {
        Serie::create([
            'nome' => 'Seriado teste',
        ]);
        
        // Exibe uma informação no console durante o processo de seed
        $this->command->info('Seriado teste created');
        Serie::create([
            'nome' => 'Seriado teste'
        ]);
        $this->command->info('Serie teste created');
    }
}