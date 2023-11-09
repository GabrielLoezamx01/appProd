<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EtiquetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = [
            'Amor', 'Familia', 'Amigos', 'Viajes', 'Fotografía', 'ComidaDeliciosa',
            'Aventura', 'Música', 'Feliz', 'Diversión', 'Naturaleza', 'Arte',
            'Deportes', 'Cine', 'Libros', 'Tecnología', 'Moda', 'Animales',
            'Salud', 'Belleza', 'Humor', 'Inspiración', 'Educación', 'Noticias',
            'Política', 'Citas', 'Negocios', 'Motivación', 'MedioAmbiente', 'Ciencia',
            'Cultura', 'Religión', 'ViajeEnElTiempo', 'Ecología', 'Cocina', 'Hogar',
            'Entretenimiento', 'Historia', 'Astronomía', 'Clima', 'Bricolaje', 'Mascotas',
            'ClimaEspacial', 'Diseño', 'Gaming', 'BuenosDías', 'BuenasNoches',
            'FelizCumpleaños', 'TrabajoDesdeCasa',
            'FinanzasPersonales', 'Bodas', 'Vacaciones', 'Playa', 'Montaña', 'Bicicleta',
            'Carrera', 'Yoga', 'Ejercicio', 'CocinaCasera', 'Restaurante', 'ComidaVegana',
            'Recetas', 'MúsicaClásica', 'Rock', 'HipHop', 'Rap', 'Pop', 'Jazz', 'Conciertos',
            'FotografíaArtística', 'Pintura', 'Escultura', 'Danza', 'Teatro', 'DeportesAcuáticos',
            'Fútbol', 'Baloncesto', 'Tenis', 'Golf', 'Esquí', 'Snowboard', 'Ciclismo',
            'ArteDigital', 'Arquitectura', 'Tatuajes', 'Maquillaje', 'Peluquería', 'Spa',
            'HumorGráfico', 'Chistes', 'Risas', 'FrasesDivertidas', 'CitasMotivadoras',
            'Aprendizaje', 'EducaciónOnline', 'NoticiasMundiales', 'Elecciones', 'DerechosHumanos',
            'Emprendimiento', 'Empresarios', 'Innovación', 'Sostenibilidad', 'Biodiversidad',
            'Migración', 'EnergíaRenovable', 'CambioClimático', 'Espacio', 'Astronáutica',
            'Marte', 'MisiónLunar', 'Arqueología', 'Antropología', 'CulturaPop',
            'HistoriaDelArte', 'Teología', 'ReligiónComparada', 'Espiritualidad', 'Medicina',
            'SaludMental', 'Fitness', 'Nutrición', 'RecetasSaludables', 'Alimentación',
            'MedioAmbiente', 'Sostenibilidad', 'Reciclaje', 'Conservación', 'FaunaSalvaje',
            'ArteUrbano', 'Graffiti', 'DiseñoGráfico', 'Videojuegos', 'E3', 'RealidadVirtual',
            'CineIndie', 'Documentales', 'BuenasAcciones', 'Voluntariado', 'Solidaridad',
            'Amistad', 'AmorPropio', 'Empatía', 'Esperanza', 'Éxito', 'MotivaciónDiaria',
            'Reflexiones', 'Sarcasmo', 'ViajeEnElTiempo', 'Espiritismo', 'CienciaFicción',
            'Robótica', 'GastronomíaMolecular', 'Astrofotografía', 'Exoplanetas', 'ArteRupestre',
            'MúsicaElectrónica', 'Dubstep', 'ArteCulinario', 'ReciclajeCreativo', 'CulturaJaponesa',
            'AnimalesDomésticos', 'ArteRenacentista', 'Ballet', 'Atletismo', 'NutriciónDeportiva',
            'SaludFísica', 'ArquitecturaSostenible', 'ArtePop', 'RisasDiarias', 'FrasesGraciosas',
            'AprendizajeOnline', 'NoticiasLocales', 'Economía', 'InnovaciónEmpresarial',
            'MedicinaAlternativa', 'YogaEnCasa', 'Ecoturismo', 'ConservaciónMarina',
            'ArtePrehistórico', 'CienciaEspacial', 'MarteExploration', 'CulturaIndígena',
            'HistoriaDelCine', 'EstudiosReligiosos', 'MenteSana', 'Bienestar', 'JuegosDeMesa',
            'VideojuegosRetro', 'CineClásico', 'Empoderamiento', 'CambioSocial',
            'BiodiversidadMarina', 'PinturaAlÓleo', 'RockClásico', 'RapNacional',
            'InspiraciónDiaria', 'AprenderConstantemente', 'ConcienciaAmbiental'
        ];
        foreach ($etiquetas as $etiqueta) {
            DB::table('etiquetas')->insert([
                'nombre' => $etiqueta,
            ]);
        }
    }
}
